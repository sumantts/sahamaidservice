
function validateForm(){
    $serviceName = $('#serviceName').val().replace(/^\s+|\s+$/gm,'');
    $serviceDescription = $('#serviceDescription').val().replace(/^\s+|\s+$/gm,'');
    $status = true;

    if($serviceName == ''){
        $status = false;
        $('#serviceName').removeClass('is-valid');
        $('#serviceName').addClass('is-invalid');
    }else{
        $status = true;
        $('#serviceName').removeClass('is-invalid');
        $('#serviceName').addClass('is-valid');
    }

    if($serviceDescription == ''){
        $status = false;
        $('#serviceDescription').removeClass('is-valid');
        $('#serviceDescription').addClass('is-invalid');
    }else{
        $status = true;
        $('#serviceDescription').removeClass('is-invalid');
        $('#serviceDescription').addClass('is-valid');
    }

    console.log('serviceName: '+$serviceName);

    $('#submitForm_spinner').hide();
    $('#submitForm_spinner_text').hide();
    $('#submitForm_text').show();

    return $status;
}//en validate form

function clearForm(){
    $('#serviceName').val('');
    $('#serviceName').removeClass('is-valid');
    $('#serviceName').removeClass('is-invalid');

    $('#serviceDescription').val('');
    $('#serviceDescription').removeClass('is-valid');
    $('#serviceDescription').removeClass('is-invalid');

}//end 

$(".form-control").blur(function(){
    $('#orgFormAlert').css("display", "none");
    $formVallidStatus = validateForm();
});

$('#submitForm').click(function(){
    $('#submitForm_spinner').show();
    $('#submitForm_spinner_text').show();
    $('#submitForm_text').hide();
    setTimeout(function(){
        $formVallidStatus = validateForm();

        if($formVallidStatus == true){
            $.ajax({
                method: "POST",
                url: "setup/services/function.php",
                data: { fn: "saveServices", serviceName: $serviceName, serviceDescription: $serviceDescription }
            })
            .done(function( res ) {
                console.log(res);
                $res1 = JSON.parse(res);
                if($res1.status == true){
                    $('#orgFormAlert1').css("display", "block");
                    $('.toast-right').toast('show');
                    //$('#liveToast').toast('show');
                    clearForm();
                    $('#exampleModalLong').modal('hide');
                    populateDataTable();
                }else{
                    
                }
            });//end ajax
        }

    }, 500)    
})

//Delete function	
function deleteService($service_id){
    console.log('Delete Service Id: '+$service_id);
    if (confirm('Are you sure to delete the Service?')) {
        $.ajax({
            method: "POST",
            url: "setup/services/function.php",
            data: { fn: "deleteService", service_id: $service_id }
        })
        .done(function( res ) {
            console.log(res);
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
        ajax: {'url': 'setup/services/function.php?fn=getServices' },
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
        order: [[0, 'desc']],

    });
}//end fun

$(document).ready(function () {
    populateDataTable()
});