
$('#myForm').on('submit', function(){
    console.log('Validated..'); 
    $br_id = $('#br_id').val();   
    $br_name = $('#br_name').val();   

    $('#message_text').html('');
    $('#message_text').removeClass('d-block');
    $('#message_text').addClass('d-none');

    $.ajax({
        type: "POST",
        url: "branches/function.php",
        dataType: "json",
        data: { fn: "saveFormData", br_id: $br_id, br_name: $br_name}
    })
    .done(function( res ) {
        //$res1 = JSON.parse(res);
        if(res.status == true){             
            $('#br_id').val('');
            $('#myForm').trigger('reset');
            $('#theme-settings-offcanvas').offcanvas('hide'); 
            populateDataTable();   
            populateCompanyDD();
        } 
        alert(res.error_message); 
    });//end ajax 

    return false;
}) //end fun

$('#cancelForm').on('click', function(){
    $('#myForm').trigger('reset');   
    $msg_text = '';
    showNotification($msg_text);
})

function populateDataTable(){ 
    $('#message_text').html('');
    $('#message_text').removeClass('d-block');
    $('#message_text').addClass('d-none');

    $('#datatable-buttons').dataTable().fnClearTable();
    $('#datatable-buttons').dataTable().fnDestroy();

    $('#datatable-buttons').DataTable({  
        responsive: true,
        serverMethod: 'GET',
        ajax: {'url': 'branches/function.php?fn=getTableData' },
        dom: 'Bfrtip' 
    });
}//end fun

function editTabledata(sl){
    console.log('sl: ' + sl);
    $.ajax({
        method: "POST",
        url: "branches/function.php",
        data: { fn: "editTabledata", br_id: sl }
    })
    .done(function( res ) {
        $res1 = JSON.parse(res); 
        if($res1.status == true){ 
            $('#br_id').val($res1.br_id); 
            $('#br_name').val($res1.br_name);  
        }        
    });//end ajax
}//end if 

function deleteTabledata(sl){
    console.log('sl: ' + sl);
    if(confirm('Are you sure to delete the record?')){
        $.ajax({
            method: "POST",
            url: "branches/function.php",
            data: { fn: "deleteTabledata", br_id: sl }
        })
        .done(function( res ) {
            $res1 = JSON.parse(res); 
            if($res1.status == true){ 
                $msg_text = 'Data Deleted successfully';
                showNotification($msg_text);
                populateDataTable();                  
                populateCompanyDD();
            }        
        });//end ajax
    }//end fonfirm if
}//end if 

function showNotification($msg_text){
    $('#alert_div').removeClass('d-none');
    $('#alert_div').addClass('d-block');

    $('#alert_span').html($msg_text);
}//end fun  


$(document).ready(function () {
    populateDataTable(); 
});