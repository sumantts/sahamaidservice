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

    if($client_id <= 0 || $rcvabl_amount == '' || $worker_id == '' || $exp_salary <= 0 || $from_date == '' || $to_date == '' || $from_time == '' || $to_time == ''){
        alert('All fields are mandatory, please enter properly');
    }else{
        $('#submitForm_spinner').show();
        $('#submitForm_spinner_text').show();
        $('#submitForm_text').hide();

        $.ajax({
            method: "POST",
            url: "assign_maid/function.php",
            data: { fn: "saveFormData", assign_id: $assign_id, client_id: $client_id, rcvabl_amount: $rcvabl_amount, worker_id: $worker_id, exp_salary: $exp_salary, from_date: $from_date, to_date: $to_date, from_time: $from_time, to_time: $to_time }
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

            $('#assign_id').val($res1.assign_id); 
            $('#rcvabl_amount').val($res1.rcvabl_amount);  
            $('#exp_salary').val($res1.exp_salary);

            $('#from_date').val($res1.from_date);
            $('#to_date').val($res1.to_date);
            $('#from_time').val($res1.from_time); 
            $('#to_time').val($res1.to_time); 
             
            setTimeout(function(){
                $('#client_id').val($client_id).trigger('change');
                $('#worker_id').val($worker_id).trigger('change'); 
            },300);

            $('#exampleModalLong').modal('show');
        }
    });//end ajax

}

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

$(document).ready(function () {
    populateDataTable(); 
    configureClientUsersDd();  
    configureWorkerUsersDd(); 
});