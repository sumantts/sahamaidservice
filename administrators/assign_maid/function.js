$('#onMyModal').on('click', function(){
    $('#myForm')[0].reset(); 
    $('#assign_id').val('0'); 
    $('#exampleModalLong').modal('show');
    $('#submitForm').removeClass('d-none');
    $('#submitForm').addClass('d-block');

    $('#div_paid_amount').removeClass('d-block');
    $('#div_paid_amount').addClass('d-none');

    $('#div_payment_mode').removeClass('d-block');
    $('#div_payment_mode').addClass('d-none');

    $('#div_transaction_id').removeClass('d-block');
    $('#div_transaction_id').addClass('d-none');

    $('#div_rcv_btn').removeClass('d-block');
    $('#div_rcv_btn').addClass('d-none');

    $('#div_p_history').removeClass('d-block');
    $('#div_p_history').addClass('d-none');
    
})


$('#submitForm').click(function(){ 
    $assign_id = $('#assign_id').val();
    $client_id = $('#client_id').val();
    $rcvabl_amount = $('#rcvabl_amount').val(); 
    $worker_id = $('#worker_id').val();
    $exp_salary = $('#exp_salary').val();

    $from_date = $('#from_date').val();
    $to_date = $('#to_date').val();
    $from_time = $('#from_time').val(); 
    $to_time = $('#to_time').val();    
    $hsn_code = $('#hsn_code').val(); 

    if($client_id <= 0 || $rcvabl_amount == '' || $worker_id == '' || $exp_salary <= 0 || $from_date == '' || $to_date == '' || $from_time == '' || $to_time == ''){
        alert('All fields are mandatory, please enter properly');
    }else{
        $('#submitForm_spinner').show();
        $('#submitForm_spinner_text').show();
        $('#submitForm_text').hide();

        $.ajax({
            method: "POST",
            url: "assign_maid/function.php",
            data: { fn: "saveFormData", assign_id: $assign_id, client_id: $client_id, rcvabl_amount: $rcvabl_amount, worker_id: $worker_id, exp_salary: $exp_salary, from_date: $from_date, to_date: $to_date, from_time: $from_time, to_time: $to_time, hsn_code: $hsn_code }
        })
        .done(function( res ) {
            //console.log(res);
            $res1 = JSON.parse(res);
            if($res1.status == true){
                $('#orgFormAlert1').show();
                $('#myForm')[0].reset();
                $('#exampleModalLong').modal('hide');
                populateDataTable();
            }
                            
            $('#submitForm_spinner').hide();
            $('#submitForm_spinner_text').hide();
            $('#submitForm_text').show();
        });//end ajax
    }  
})

function editTableData($assign_id){
    $('#myForm')[0].reset(); 
    $('#submitForm').removeClass('d-block');
    $('#submitForm').addClass('d-none');

    

    $('#div_paid_amount').removeClass('d-none');
    $('#div_paid_amount').addClass('d-block');

    $('#div_payment_mode').removeClass('d-none');
    $('#div_payment_mode').addClass('d-block');

    $('#div_transaction_id').removeClass('d-none');
    $('#div_transaction_id').addClass('d-block');

    $('#div_rcv_btn').removeClass('d-none');
    $('#div_rcv_btn').addClass('d-block');

    $('#div_p_history').removeClass('d-none');
    $('#div_p_history').addClass('d-block');

    $.ajax({
        method: "POST",
        url: "assign_maid/function.php",
        data: { fn: "getFormEditData", assign_id: $assign_id }
    })
    .done(function( res ) {
        //console.log(res);
        $res1 = JSON.parse(res);
        if($res1.status == true){  
            $client_id = $res1.client_id;
            $worker_id = $res1.worker_id;
            $bill_status = $res1.bill_status;

            $('#assign_id').val($res1.assign_id); 
            $('#rcvabl_amount').val($res1.rcvabl_amount);  
            $('#exp_salary').val($res1.exp_salary);

            $('#from_date').val($res1.from_date);
            $('#to_date').val($res1.to_date);
            $('#from_time').val($res1.from_time); 
            $('#to_time').val($res1.to_time); 
            $('#hsn_code').val($res1.hsn_code); 
             
            setTimeout(function(){
                $('#client_id').val($client_id).trigger('change');
                $('#worker_id').val($worker_id).trigger('change');
                $('#bill_status').val($bill_status).trigger('change'); 
            },300);

            $('#exampleModalLong').modal('show');
        }
    });//end ajax

}

 
// Attendance function
function viewAttendanceData($assign_id){
    //$('#myForm2')[0].reset(); 
    $('#attenModalLong').modal('show');
    $('#assign_id').val($assign_id);

    $.ajax({
        method: "POST",
        url: "assign_maid/function.php",
        data: { fn: "getAttendance", assign_id: $assign_id }
    })
    .done(function( res ) {
        //console.log(res);
        $res1 = JSON.parse(res);
        if($res1.status == true){            
            //Populate attendance list
            $atten_data = $res1.atten_data; 
            $full_name = $res1.full_name; 
            $('#attenModalLongTitle').html('Attendance Report of: ' + $full_name);
            
            if($atten_data.length > 0){
                $attendance_ui = '';
                for($i = 0; $i < $atten_data.length; $i++){
                    $slno = $atten_data[$i].slno;
                    $atten_date = $atten_data[$i].atten_date;
                    $pre_abs_lev = $atten_data[$i].pre_abs_lev;
                    $atten_note = $atten_data[$i].atten_note;

                    $attendance_ui += '<div class="col-md-3 mb-2">';
                        $attendance_ui += '<input class="form-control form-control-sm" type="text" id="atten_date_'+$slno+'" name="atten_date_'+$slno+'" value="'+$atten_date+'" readonly>';
                        $attendance_ui += '</div>';
                        $attendance_ui += '<div class="col-md-3 mb-2">'; 
                            $attendance_ui += '<select class="form-control form-control-sm" id="pre_abs_lev_'+$slno+'" name="pre_abs_lev_'+$slno+'" onchange="updateAttendance('+$slno+')">';
                                $attendance_ui += '<option value="">Present/Absent/Leave</option>'; 
                                if($pre_abs_lev == '1'){
                                    $attendance_ui += '<option value="1" selected>Present</option>'; 
                                }else{
                                    $attendance_ui += '<option value="1">Present</option>'; 
                                }
                                if($pre_abs_lev == '2'){
                                    $attendance_ui += '<option value="2" selected>Absent</option>';
                                }else{
                                    $attendance_ui += '<option value="2">Absent</option>';
                                } 
                                if($pre_abs_lev == '2'){
                                    $attendance_ui += '<option value="3" selected>Leave</option>'; 
                                }else{
                                    $attendance_ui += '<option value="3">Leave</option>'; 
                                }
                            $attendance_ui += '</select>';
                        $attendance_ui += '</div>';
                        $attendance_ui += '<div class="col-md-6 mb-2">';
                        $attendance_ui += '<input class="form-control form-control-sm" placeholder="Note" type="text" id="atten_note_'+$slno+'" name="atten_note_'+$slno+'" value="'+$atten_note+'" onblur="updateAttendance('+$slno+')">';
                    $attendance_ui += '</div>';
                }//end for
                $('#attendance_ui').html($attendance_ui);                
            }//end if attendance
        }
    });//end ajax 
}

// Update Attendance
function updateAttendance(slno){
    $pre_abs_lev = $('#pre_abs_lev_'+slno).val();
    $atten_note = $('#atten_note_'+slno).val(); 
    $assign_id = $('#assign_id').val();    
    
    $.ajax({
        method: "POST",
        url: "assign_maid/function.php",
        data: { fn: "updateAttendance", serial_no: slno, pre_abs_lev: $pre_abs_lev, atten_note: $atten_note, assign_id: $assign_id }
    })
    .done(function( res ) {
        $res1 = JSON.parse(res); 
        if($res1.status == true){ 
            /*$atten_id = $res1.atten_id;  
            $('#atten_id').val($atten_id);
            $('#orgFormAlert1').css("display", "block");
            $('.toast-right').toast('show');*/
        }        
    });//end ajax

}//end if

//Delete function	
function deleteTableData($assign_id){
    if (confirm('Are you sure to delete the data?')) {
        $.ajax({
            method: "POST",
            url: "assign_maid/function.php",
            data: { fn: "deleteTableData", assign_id: $assign_id }
        })
        .done(function( res ) {
            //console.log(res);
            $res1 = JSON.parse(res);
            if($res1.status == true){
                $('#orgFormAlert').show();
                populateDataTable();
            }
        });//end ajax
    }		
}//end delete



function populateDataTable(){
    $('#example').dataTable().fnClearTable();
    $('#example').dataTable().fnDestroy();

    $('#example').DataTable({ 
        responsive: true,
        serverMethod: 'GET',
        ajax: {'url': 'assign_maid/function.php?fn=getTableData' },
        dom: 'Bfrtip',
        buttons: [
            {
                extend:    'copyHtml5',
                text:      '<i class="fa fa-files-o"></i>',
                titleAttr: 'Copy'
            },
            {
                extend:    'excelHtml5',
                text:      '<i class="fa fa-file-excel-o"></i>',
                titleAttr: 'Excel'
            },
            {
                extend:    'csvHtml5',
                text:      '<i class="fa fa-file-text-o"></i>',
                titleAttr: 'CSV'
            },
            {
                extend:    'pdfHtml5',
                text:      '<i class="fa fa-file-pdf-o"></i>',
                titleAttr: 'PDF'
            },
            {
                extend: 'print',
                text: '<i class="fa fa-print"></i>',
                titleAttr: 'Print'
            },
        ],

    });
}//end fun


function configureLeaveStatDD(){
    $.ajax({
        method: "POST",
        url: "assign_maid/function.php",
        data: { fn: "configureLeaveStatDD" }
    })
    .done(function( res ) {
        $res1 = JSON.parse(res);
        //console.log(JSON.stringify($res1));
        if($res1.status == true){
            $rows = $res1.data;

            if($rows.length > 0){
                $('#lsm_id').html('');
                $html = "";

                for($i = 0; $i < $rows.length; $i++){
                    $html += "<option value='"+$rows[$i].lsm_id+"'>"+$rows[$i].l_stat_name+"</option>";                    
                }//end for
                
                $('#lsm_id').html($html);
            }//end if
        }        
    });//end ajax
}//end 


// User 
function configureClientUsersDd(){
    $user_type = '4';
    if(parseInt($user_type) > 0){
        $.ajax({
            method: "POST",
            url: "attendance/function.php",
            data: { fn: "configureUsersDd", user_type: $user_type }
        })
        .done(function( res ) {
            $res1 = JSON.parse(res); 
            if($res1.status == true){
                $rows = $res1.data;

                if($rows.length > 0){
                    $('#client_id').html('');
                    $html = "<option value=''>Select</option>";
                    for($i = 0; $i < $rows.length; $i++){
                        $html += "<option value='"+$rows[$i].id+"'>"+$rows[$i].name+"</option>";                    
                    }//end for                
                    $('#client_id').html($html);
                }else{
                    $('#client_id').html('');
                    $html = "<option value=''>Select</option>";
                    $('#client_id').html($html);
                }//end if
            }        
        });//end ajax
    }//end if
}//end 

// Bill Status 
function configureBillStatusDd(){ 
    $.ajax({
        method: "POST",
        url: "assign_maid/function.php",
        data: { fn: "configureBillStatusDd" }
    })
    .done(function( res ) {
        $res1 = JSON.parse(res); 
        if($res1.status == true){
            $rows = $res1.data;

            if($rows.length > 0){
                $('#bill_status').html('');
                $html = "<option value=''>Select</option>";
                for($i = 0; $i < $rows.length; $i++){
                    $html += "<option value='"+$rows[$i].bs_id+"'>"+$rows[$i].bill_status_name+"</option>";                    
                }//end for                
                $('#bill_status').html($html);
            }else{
                $('#bill_status').html('');
                $html = "<option value=''>Select</option>";
                $('#bill_status').html($html);
            }//end if
        }        
    });//end ajax 
}//end 

function configureWorkerUsersDd(){
    $user_type = '5';
    if(parseInt($user_type) > 0){
        $.ajax({
            method: "POST",
            url: "attendance/function.php",
            data: { fn: "configureUsersDd", user_type: $user_type }
        })
        .done(function( res ) {
            $res1 = JSON.parse(res); 
            if($res1.status == true){
                $rows = $res1.data;

                if($rows.length > 0){
                    $('#worker_id').html('');
                    $html = "<option value=''>Select</option>";
                    for($i = 0; $i < $rows.length; $i++){
                        $html += "<option value='"+$rows[$i].id+"' data-exp_salary='"+$rows[$i].exp_salary+"'>"+$rows[$i].name+"</option>";                    
                    }//end for                
                    $('#worker_id').html($html);
                }else{
                    $('#worker_id').html('');
                    $html = "<option value=''>Select</option>";
                    $('#worker_id').html($html);
                }//end if
            }        
        });//end ajax
    }//end if
}//end 

$('#worker_id').on('change', function(){
    $expSalary = $('#worker_id option:selected').data('exp_salary');
    $('#exp_salary').val($expSalary);
})

$('#div_rcv_btn').on('click', function(){
    $payment_mode = '';
    $html = '';        
    $assign_id = $('#assign_id').val();
    $paid_amount = $('#paid_amount').val();
    $transaction_id = $('#transaction_id').val();
    
    if ($('#payment_mode').is(':checked')) {
        $payment_mode = '1';        
    }else{
        $payment_mode = '0';
    }
    console.log('fun call..'+$payment_mode);

    if($paid_amount == ''){
        alert('Please enter Amount');
    }else if($payment_mode == '1' && $transaction_id == ''){
        alert('Please enter transaction ID');
    }else{        
        $('#div_p_history').html($html);
        $.ajax({
            method: "POST",
            url: "assign_maid/function.php",
            data: { fn: "saveReceiveAmount", paid_amount: $paid_amount, payment_mode: $payment_mode, transaction_id: $transaction_id, assign_id: $assign_id }
        })
        .done(function( res ) {
            $res1 = JSON.parse(res); 
            if($res1.status == true){
                $html += '<h5>Payment Receive History</h5>';
                $payment_history = $res1.payment_history;                
                $rcvabl_amount = $res1.rcvabl_amount;
                $total_received = 0;
                $total_due = 0;
                if($payment_history.length > 0){
                    for($i = 0; $i < $payment_history.length; $i++){
                        $pay_mode = '';
                        if($payment_history[$i].payment_mode == '1'){
                            $pay_mode = 'UPI';
                        }else{
                            $pay_mode = 'Cash';
                        }
                        $html += '<div class="col-md-12"> Amount: Rs. '+$payment_history[$i].paid_amount+'/- Received by '+$pay_mode+' on '+$payment_history[$i].received_at_f+' </div>';
                        $total_received = parseFloat($total_received) + parseFloat($payment_history[$i].paid_amount);
                    }
                }
                $total_due = parseFloat($rcvabl_amount) - parseFloat($total_received);
                $html += '<div class="col-md-12"> Total Amount Received: Rs. '+$total_received.toFixed(2)+'/- Total Due: Rs. '+$total_due.toFixed(2)+'</div>';                
                $('#div_p_history').html($html);
            }        
        });//end ajax
        
        
    }
})

$(document).ready(function () {
    populateDataTable(); 
    configureClientUsersDd();  
    configureWorkerUsersDd(); 
    configureBillStatusDd();
});