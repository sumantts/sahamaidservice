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
    $log_id = $('#log_id').val();
    $client_id = $('#client_id').val(); 
    $client_name = $('#client_name').val(); 
    $client_mobile = $('#client_mobile').val(); 

    $area_location_id = $('#area_location_id').val(); 
    $area_location_name = $('#area_location_id option:selected').text(); 
    $building_id = $('#building_id').val(); 
    $building_name = $('#building_id option:selected').text(); 
    $service_id = $('#service_id').val(); 
    $service_name = $('#service_id option:selected').text(); 

    $service_rate_per_hour = $('#service_rate_per_hour').val(); 
    $booking_date_f = $('#booking_date_f').val(); 
    $booking_date_t = $('#booking_date_t').val(); 
    $from_time = $('#from_time').val(); 
    $to_time = $('#to_time').val(); 
    $total_hours = $('#total_hours').val(); 
    
    $total_amount = $schedule_log.total_amount; 
    $bill_type = $('#bill_type').val(); 
    $bill_type_name = $('#bill_type option:selected').text(); 
    $cgst_percent = $('#cgst_percent').val(); 
    $cgst_amount = $schedule_log.cgst_amount; 
    $sgst_percent = $('#sgst_percent').val(); 
    $sgst_amount = $schedule_log.sgst_amount; 
    $total_amount_with_tax = $schedule_log.total_amount_with_tax; 

    $amount_paid = 0; 
    $amount_due = 0; 

    $worker_id = $('#worker_id').val(); 
    $worker_name = $('#worker_name option:selected').text(); 
    $worker_mobile = $schedule_log.worker_mobile; 
    $order_status = $('#bill_status').val(); 

    $order_placed_date = $('#order_placed_date').val(); 
    $current_time = new Date();
    $order_placed_time = String($current_time.getHours()).padStart(2, '0') + ':' + String($current_time.getMinutes()).padStart(2, '0');
    $order_placed_by = '';// $('#order_placed_by').val(); 
    $order_placed_by_name = '';// $('#order_placed_by_name').val(); 
    $order_channel_name = 'web';//$('#order_channel_name').val(); 
    $payment_history = [];//$('#payment_history').val(); 
    $order_status_history = [];//$('#order_status_history').val();

    if($client_mobile == ''){
        alert('All fields are mandatory, please enter properly');
    }else{
        $('#submitForm_spinner').show();
        $('#submitForm_spinner_text').show();
        $('#submitForm_text').hide();

        $.ajax({
            method: "POST",
            url: "schedule_log/function.php",
            data: {
                fn: "saveFormData",
                log_id: $log_id,
                client_id: $client_id,
                client_name: $client_name,
                client_mobile: $client_mobile,
                area_location_id: $area_location_id,
                area_location_name: $area_location_name,
                building_id: $building_id,
                building_name: $building_name,
                service_id: $service_id,
                service_name: $service_name,
                service_rate_per_hour: $service_rate_per_hour,
                booking_date_f: $booking_date_f,
                booking_date_t: $booking_date_t,
                from_time: $from_time,
                to_time: $to_time,
                total_hours: $total_hours,
                total_amount: $total_amount,
                bill_type: $bill_type,
                bill_type_name: $bill_type_name,
                cgst_percent: $cgst_percent,
                cgst_amount: $cgst_amount,
                sgst_percent: $sgst_percent,
                sgst_amount: $sgst_amount,
                total_amount_with_tax: $total_amount_with_tax,
                amount_paid: $amount_paid,
                amount_due: $amount_due,
                worker_id: $worker_id,
                worker_name: $worker_name,
                worker_mobile: $worker_mobile,
                order_status: $order_status,
                order_placed_date: $order_placed_date,
                order_placed_time: $order_placed_time,
                order_placed_by: $order_placed_by,
                order_placed_by_name: $order_placed_by_name,
                order_channel_name: $order_channel_name,
                payment_history: JSON.stringify($payment_history),
                order_status_history: JSON.stringify($order_status_history)
            }
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
    //$('#submitForm').removeClass('d-block');
    //$('#submitForm').addClass('d-none');

    

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
        url: "schedule_log/function.php",
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
            $('#wt_id').val($res1.wt_id); 
            /*$two_days_leave = $res1.two_days_leave;
            if($two_days_leave == '1'){
                $('#two_days_leave').prop('checked', true);
            }else{
                $('#two_days_leave').prop('checked', false);
            }*/
            $holiday_count = $res1.holiday_count;
            $('#holiday_count').val($holiday_count);
            $cal_ty_id = $res1.cal_ty_id;
            setTimeout(function(){
                $('#cal_ty_id').val($cal_ty_id).trigger('change');
            },300);

            setTimeout(function(){
                $('#client_id').val($client_id).trigger('change');
                $('#worker_id').val($worker_id).trigger('change');
                $('#bill_status').val($bill_status).trigger('change'); 
            },300);
            
            $('#otcc').val($res1.otcc); 
            $('#ticket_fare').val($res1.ticket_fare); 
            $('#food_cost').val($res1.food_cost); 
            $('#tr_jc').val($res1.tr_jc); 

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
        url: "schedule_log/function.php",
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
                                $attendance_ui += '<option value="">Present/Absent/Leave/Half Day</option>'; 
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
                                if($pre_abs_lev == '3'){
                                    $attendance_ui += '<option value="3" selected>Leave</option>'; 
                                }else{
                                    $attendance_ui += '<option value="3">Leave</option>'; 
                                }
                                if($pre_abs_lev == '4'){
                                    $attendance_ui += '<option value="4" selected>Half Day</option>'; 
                                }else{
                                    $attendance_ui += '<option value="4">Half Day</option>'; 
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
        url: "schedule_log/function.php",
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
            url: "schedule_log/function.php",
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
        ajax: {'url': 'schedule_log/function.php?fn=getTableData' },
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
        url: "schedule_log/function.php",
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
        url: "schedule_log/function.php",
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

/*****
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
*****/

$('#worker_id').on('change', function(){
    $schedule_log.worker_mobile = $('#worker_id option:selected').data('phone_number'); 
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
            url: "schedule_log/function.php",
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

// Work Type
function configureWorkTypeDd(){
    $.ajax({
        method: "POST",
        url: "users/function.php",
        data: { fn: "configureWorkTypeDd" }
    })
    .done(function( res ) {
        $res1 = JSON.parse(res); 
        if($res1.status == true){
            $rows = $res1.data;

            if($rows.length > 0){
                $('#wt_id').html('');
                $html = "<option value='0'>Select</option>";
                for($i = 0; $i < $rows.length; $i++){
                    $html += "<option value='"+$rows[$i].id+"'>"+$rows[$i].name+"</option>";                    
                }//end for                
                $('#wt_id').html($html);
            }else{
                $('#wt_id').html('');
                $html = "<option value='0'>Select</option>";
                $('#wt_id').html($html);
            }//end if
        }        
    });//end ajax
}//end 

// Calculation Type
function configureCalculationTypeeDd(){
    $.ajax({
        method: "POST",
        url: "schedule_log/function.php",
        data: { fn: "configureCalculationTypeeDd" }
    })
    .done(function( res ) {
        $res1 = JSON.parse(res); 
        if($res1.status == true){
            $rows = $res1.data;

            if($rows.length > 0){
                $('#cal_ty_id').html('');
                $html = "";
                for($i = 0; $i < $rows.length; $i++){
                    $html += "<option value='"+$rows[$i].cal_ty_id+"'>"+$rows[$i].cal_ty_name+"</option>";                    
                }//end for                
                $('#cal_ty_id').html($html);
            }else{
                $('#cal_ty_id').html('');
                $html = "<option value='0'>Select</option>";
                $('#cal_ty_id').html($html);
            }//end if
        }        
    });//end ajax
}//end 

$("#paymentSwitch").click(function(){
    $("#paymentBoard").toggle('slow');
    $("#div_p_history1").toggle('slow');
});


// service area 
function configureServiceAreaDd(){
    $.ajax({
        method: "POST",
        url: "service_rate_chart/function.php",
        data: { fn: "configureServiceAreaDd" }
    })
    .done(function( res ) {
        $res1 = JSON.parse(res); 
        if($res1.status == true){
            $rows = $res1.data;

            if($rows.length > 0){
                $('#area_location_id').html('');
                $html = "<option value=''>Select</option>";
                for($i = 0; $i < $rows.length; $i++){ 
                    $html += "<option value='"+$rows[$i].id+"'>"+$rows[$i].name+"</option>";   
                                    
                }//end for                
                $('#area_location_id').html($html);
            }else{
                $('#area_location_id').html('');
                $html = "<option value=''>Select</option>";
                $('#area_location_id').html($html);
            }//end if
        }        
    });//end ajax
}//end 

$('#area_location_id').on('change', function(){    
    
    $('#building_id').html('');
    $html = "<option value=''>Select</option>";
    $('#building_id').html($html);

    $area_location_id = $('#area_location_id').val();
    if($area_location_id > 0){
        $.ajax({
            method: "POST",
            url: "schedule_log/function.php",
            data: { fn: "configureBuildingDd", area_location_id: $area_location_id }
        })
        .done(function( res ) {
            $res1 = JSON.parse(res); 
            if($res1.status == true){
                $rows = $res1.data;

                if($rows.length > 0){
                    $('#building_id').html('');
                    $html = "<option value=''>Select</option>";
                    for($i = 0; $i < $rows.length; $i++){ 
                        $html += "<option value='"+$rows[$i].sa_id_child+"'>"+$rows[$i].name+"</option>";   
                                        
                    }//end for                
                    $('#building_id').html($html);
                }else{
                    $('#building_id').html('');
                    $html = "<option value=''>Select</option>";
                    $('#building_id').html($html);
                }//end if
            }else{
                $('#building_id').html('');
                $html = "<option value=''>Select</option>";
                $('#building_id').html($html);
            }//end if        
        });//end ajax
    }
});//end 

// Get available services an rates based on selected area and building
$('#building_id').on('change', function(){
    $area_location_id = $('#area_location_id').val();
    $building_id = $('#building_id').val();

    if($area_location_id > 0 && $building_id > 0){
        $.ajax({
            method: "POST",
            url: "schedule_log/function.php",
            data: { fn: "configureServiceDd", area_location_id: $area_location_id, building_id: $building_id }
        })
        .done(function( res ) {
            $res1 = JSON.parse(res);
            if($res1.status == true){
                $rows = $res1.data;

                if($rows.length > 0){
                    $('#service_id').html('');
                    $html = "<option value=''>Select</option>";
                    for($i = 0; $i < $rows.length; $i++){
                        $html += "<option value='"+$rows[$i].qs_id+"' data-rate_first='"+$rows[$i].rate_first+"' data-rate_normal='"+$rows[$i].rate_normal+"'>"+$rows[$i].service_name+"</option>";   
                    }//end for
                    $('#service_id').html($html);
                }else{
                    $('#service_id').html('');
                    $html = "<option value=''>Select</option>";
                    $('#service_id').html($html);
                }
            }else{
                $('#service_id').html('');
                $html = "<option value=''>Select</option>";
                $('#service_id').html($html);
            }    
        });//end ajax
    }
});//end

// Get service rate per hour based on selected service
$('#service_id').on('change', function(){
    $service_id = $('#service_id').val();
    $client_id = $('#client_id').val();

    if($service_id > 0){
        $rate_first = $('#service_id option:selected').data('rate_first');
        $rate_normal = $('#service_id option:selected').data('rate_normal');

        if($client_id > 0){
            $('#service_rate_per_hour').val($rate_normal);
        }else{
            $('#service_rate_per_hour').val($rate_first);
        }

        $('#rate_first').val($rate_first);
        $('#rate_normal').val($rate_normal);
    }
});

// Calculate total hours from the selected start and end date-times
$('#booking_date_f, #from_time, #booking_date_t, #to_time').on('blur', function(){
    const fromDate = $('#booking_date_f').val();
    const fromTime = $('#from_time').val();
    const toDate = $('#booking_date_t').val();
    const toTime = $('#to_time').val();

    if(!fromDate || !fromTime || !toDate || !toTime){
        $('#total_hours').val('');
        return;
    }

    const fromDateTime = new Date(fromDate + 'T' + fromTime);
    const toDateTime = new Date(toDate + 'T' + toTime);

    if(Number.isNaN(fromDateTime.getTime()) || Number.isNaN(toDateTime.getTime()) || toDateTime < fromDateTime){
        $('#total_hours').val('');
        return;
    }

    const totalHours = (toDateTime.getTime() - fromDateTime.getTime()) / (60 * 60 * 1000);
    $('#total_hours').val(totalHours.toFixed(2));

    // Get available user list based on selected date and time
    $.ajax({
        method: "POST",
        url: "schedule_log/function.php",
        data: { fn: "getAvailableWorkerForQuickService", from_date: fromDate, from_time: fromTime, to_date: toDate, to_time: toTime }
    })
    .done(function( res ) {
        $res1 = JSON.parse(res);
        if($res1.status == true){
            $rows = $res1.data;

            if($rows.length > 0){
                $('#worker_id').html('');
                $html = "<option value=''>Select</option>";
                for($i = 0; $i < $rows.length; $i++){
                    $html += "<option value='"+$rows[$i].user_id+"' data-phone_number='"+$rows[$i].phone_number+"'>"+$rows[$i].full_name+"</option>";   
                }//end for
                $('#worker_id').html($html);
            }else{
                $('#worker_id').html('');
                $html = "<option value=''>Select</option>";
                $('#worker_id').html($html);
            }
        }else{
            $('#worker_id').html('');
            $html = "<option value=''>Select</option>";
            $('#worker_id').html($html);
        }    
    });

});

// Get status list for quick service
function configureQuickServiceStatusDd(){
    $.ajax({
        method: "POST",
        url: "schedule_log/function.php",
        data: { fn: "configureQuickServiceStatusDd" }
    }).done(function(res){
        //$('#quick_service_status').html(data);
        $res1 = JSON.parse(res);
            if($res1.status == true){
                $rows = $res1.data;

                if($rows.length > 0){
                    $('#bill_status').html('');
                    $html = "<option value=''>Select</option>";
                    for($i = 0; $i < $rows.length; $i++){
                        $html += "<option value='"+$rows[$i].id+"'>"+$rows[$i].name+"</option>";   
                    }//end for
                    $('#bill_status').html($html);
                }else{
                    $('#bill_status').html('');
                    $html = "<option value=''>Select</option>";
                    $('#bill_status').html($html);
                }
            }else{
                $('#bill_status').html('');
                $html = "<option value=''>Select</option>";
                $('#bill_status').html($html);
            }  
    });
}

// Get customer name and mobile number based on selected client
$('#client_mobile').on('blur', function(){
    $client_mobile = $('#client_mobile').val();
    if($client_mobile){
        $.ajax({
            method: "POST",
            url: "schedule_log/function.php",
            data: { fn: "getClientNameByMobile", mobile_no: $client_mobile }
        }).done(function(res){
            $res1 = JSON.parse(res);
            if($res1.status == true){
                $('#client_name').val($res1.data[0].full_name);
                $('#client_id').val($res1.data[0].user_id);
            }else{
                $('#client_name').val('');
                $('#client_id').val(''); 
            }
        });
    }
});

// Calculate total amount based on total hours and service rate per hour
$('#total_hours, #total_amount_with_tax, #bill_type, #cgst_percent, #sgst_percent').on('blur', function(){
    console.log('Calculating total amount...');
    $total_hours = parseFloat($('#total_hours').val());
    $service_rate_per_hour = parseFloat($('#service_rate_per_hour').val()); 

    $client_id = $('#client_id').val();
    $cgst_percent = parseFloat($('#cgst_percent').val());
    $sgst_percent = parseFloat($('#sgst_percent').val());
    $bill_type = $('#bill_type').val();

    $cgst_amount = 0;
    $sgst_amount = 0;

    if($client_id > 0){
        $service_rate_per_hour = parseFloat($('#rate_normal').val());      
    }else{
        $service_rate_per_hour = parseFloat($('#rate_first').val());
    }

    if($bill_type == '1'){
        $cgst_amount = ($total_hours * $service_rate_per_hour) * ($cgst_percent / 100);
        $sgst_amount = ($total_hours * $service_rate_per_hour) * ($sgst_percent / 100);
        $schedule_log.cgst_amount = $cgst_amount;
        $schedule_log.sgst_amount = $sgst_amount;
    }

    $schedule_log.total_amount = ($total_hours * $service_rate_per_hour);
    $total_amount = ($total_hours * $service_rate_per_hour) + $cgst_amount + $sgst_amount;

    if(!isNaN($total_amount)){
        $('#total_amount_with_tax').val($total_amount.toFixed(2));
        $schedule_log.total_amount_with_tax = $total_amount;
    }
    console.log('Total amount calculated: ' + $total_amount.toFixed(2));
});



$(document).ready(function () {
    populateDataTable(); 
    configureClientUsersDd();  
    //configureWorkerUsersDd(); 
    configureBillStatusDd();
    configureWorkTypeDd();
    configureCalculationTypeeDd();
    configureServiceAreaDd();
    configureQuickServiceStatusDd();

    $schedule_log = {
        client_id: '',
        client_name: '',
        client_mobile: '',
        area_location_id: '',
        area_location_name: '',
        building_id: '',
        building_name: '',
        service_id: '',
        service_name: '',
        service_rate_per_hour: '',
        booking_date: '',
        from_time: '',
        to_time: '',
        total_hours: '',
        total_amount: '',
        cgst_percent: '',
        cgst_amount: '',
        sgst_percent: '',
        sgst_amount: '',
        total_amount_with_tax: '',
        amount_paid: '',
        amount_due: '',
        worker_id: '',
        worker_name: '',
        worker_mobile: '', 
        order_placed_date: '',
        order_placed_time: '',
        order_placed_by: '',
        order_placed_by_name: '',
        order_channel_name: 'Web',
        payment_history: [],
        order_status_history: [],

    };
});


//quick_service_status
