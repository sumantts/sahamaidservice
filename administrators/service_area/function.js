
function validateForm(){
    $area_location = $('#area_location').val().replace(/^\s+|\s+$/gm,'');
    $pincode = $('#pincode').val().replace(/^\s+|\s+$/gm,'');
    $street_name = $('#street_name').val().replace(/^\s+|\s+$/gm,'');
    $landmark = $('#landmark').val().replace(/^\s+|\s+$/gm,'');
    $sa_status = $('#sa_status').val();

    $status = true;

    if($area_location == ''){
        $status = false;
        $('#area_location').removeClass('is-valid');
        $('#area_location').addClass('is-invalid');
    }else{
        $status = true;
        $('#area_location').removeClass('is-invalid');
        $('#area_location').addClass('is-valid');
    }   

    if($street_name == ''){
        $status = false;
        $('#street_name').removeClass('is-valid');
        $('#street_name').addClass('is-invalid');
    }else{
        $status = true;
        $('#street_name').removeClass('is-invalid');
        $('#street_name').addClass('is-valid');
    }   

    $('#submitForm_spinner').hide();
    $('#submitForm_spinner_text').hide();
    $('#submitForm_text').show();

    return $status;
}//en validate form

function clearForm(){
    $('#area_location').val('');
    $('#area_location').removeClass('is-valid');
    $('#area_location').removeClass('is-invalid');

    $('#pincode').val('');
    $('#pincode').removeClass('is-valid');
    $('#pincode').removeClass('is-invalid');

    $('#street_name').val('');
    $('#street_name').removeClass('is-valid');
    $('#street_name').removeClass('is-invalid');

    $('#landmark').val('');
    $('#landmark').removeClass('is-valid');
    $('#landmark').removeClass('is-invalid');

    $('#serviceDescription').val('');
    $('#serviceDescription').removeClass('is-valid');
    $('#serviceDescription').removeClass('is-invalid');
    $('#sa_id').val('0');

}//end 

$('#addNewBtn, .card-option a[data-target="#exampleModalLong"]').on('click', function(){
    $('#sa_id').val('0');
    $('#sa_status').val('1').trigger('change');

    $('#area_location').val('');
    $('#area_location').removeClass('is-valid');
    $('#area_location').removeClass('is-invalid');
    
    $('#pincode').val('');
    $('#pincode').removeClass('is-valid');
    $('#pincode').removeClass('is-invalid');
    
    $('#street_name').val('');
    $('#street_name').removeClass('is-valid');
    $('#street_name').removeClass('is-invalid');
    
    $('#landmark').val('');
    $('#landmark').removeClass('is-valid');
    $('#landmark').removeClass('is-invalid'); 

    initObjects();
    renderIncludedTableData(); 
});

$(".form-control").blur(function(){
    $('#orgFormAlert').css("display", "none");
    $formVallidStatus = validateForm();
});

$('#submitForm').click(function(){
    $('#submitForm_spinner').show();
    $('#submitForm_spinner_text').show();
    $('#submitForm_text').hide();
    //setTimeout(function(){
        $formVallidStatus = validateForm();

        if($formVallidStatus == true){
            $sa_id = $('#sa_id').val();
            $area_location = $('#area_location').val().replace(/^\s+|\s+$/gm,'');
            $sa_status = $('#sa_status').val();

            $.ajax({
                method: "POST",
                url: "service_area/function.php",
                data: { fn: "saveServices", sa_id: $sa_id, area_location: $area_location, pincode: $pincode, street_name: $street_name, landmark: $landmark, building_name_arr: JSON.stringify($building_name_arr), sa_status: $sa_status }
            })
            .done(function( res ) {
                //console.log(res);
                $res1 = JSON.parse(res);
                if($res1.status == true){
                    $('#orgFormAlert1').css("display", "block");
                    $('.toast-right').toast('show');
                    $('#sa_id').val($res1.sa_id); 
                    populateDataTable();

                    alert('Area / Location saved successfully!');
                }else{
                    alert('Error occurred while saving the Area / Location.');
                }
            });//end ajax
        }

    //}, 500)    
})

function editService($sa_id){
    $('#exampleModalLong').modal('show');
    $.ajax({
        method: "POST",
        url: "service_area/function.php",
        data: { fn: "getServiceAreaData", sa_id: $sa_id }
    })
    .done(function( res ) {
        //console.log(res);
        $res1 = JSON.parse(res);
        if($res1.status == true){
            $('#area_location').val($res1.area_location);
            $('#pincode').val($res1.pincode);
            $('#street_name').val($res1.street_name);
            $('#landmark').val($res1.landmark);
            $('#sa_id').val($sa_id);
            $('#sa_status').val($res1.sa_status).trigger('change');
            $building_name_arr = $res1.building_names;

            renderIncludedTableData(); 
        }
    });//end ajax

}

//Delete function	
function deleteServiceArea($sa_id){
    if (confirm('Are you sure to delete the Location?')) {
        $.ajax({
            method: "POST",
            url: "service_area/function.php",
            data: { fn: "deleteServiceArea", sa_id: $sa_id }
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
        ajax: {'url': 'service_area/function.php?fn=getServices' },
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
        order: [[0, 'asc']],

    });
}//end fun

$('#building_name_btn').on('click', function(){
    $building_name = $('#building_name').val().replace(/^\s+|\s+$/gm,'');
    if($building_name == ''){
        alert('Please enter Building Name');
    }else{
        $('#building_name').val('');
        
        $svc_inc_obj = {
            obj_id: Date.now().toString(36) + Math.random().toString(36).slice(2, 8),
            name: $building_name,
        };

        $building_name_arr.push($svc_inc_obj);
        renderIncludedTableData();
        
        $svc_inc_obj = {
            obj_id: '',
            name: '',
        };

        console.log(JSON.stringify($building_name_arr));

    }
}); 


function initObjects(){

    $building_name_arr = [];
    $svc_inc_obj = {
        obj_id: '',
        name: '',
    }; 

}

function renderIncludedTableData(){
    const $tbody = $('#includedServicesTable tbody').empty();

    $building_name_arr.forEach(function(service, index){
        const $row = $('<tr>');
        $('<th>', { scope: 'row' }).text(index + 1).appendTo($row);
        $('<td>').text(service.name).appendTo($row);
        const $removeButton = $('<button>', {
            type: 'button',
            class: 'btn btn-sm remove-included-service',
            'aria-label': 'Remove included service',
        }).attr('data-obj-id', service.obj_id);
        $('<i>', { class: 'fas fa-trash', 'aria-hidden': 'true' }).appendTo($removeButton);
        $('<td>').append($removeButton).appendTo($row);
        $tbody.append($row);
    });
}

$('#includedServicesTable').on('click', '.remove-included-service', function(){
    if(!confirm('Are you sure you want to remove this Building Name?')){
        return;
    }

    const objId = $(this).attr('data-obj-id');

    // remove it from database and then remove it from the array   
    
    $.ajax({
        method: "POST",
        url: "service_area/function.php",
        data: { fn: "deleteBuildingName", obj_id: objId }
    })
    .done(function( res ) {
        //console.log(res);
        $res1 = JSON.parse(res);
        if($res1.status == true){ 
            populateDataTable();
            alert('Building Name removed successfully!');
        }
    });//end ajax

    const serviceIndex = $building_name_arr.findIndex(function(service){
        return service.obj_id === objId;
    });

    if(serviceIndex !== -1){
        $building_name_arr.splice(serviceIndex, 1);
        renderIncludedTableData();
    }
}); 




$(document).on("change", "[id^='sa_status_']", function(){
    let id = this.id.split("_").pop();
    let status = $(this).is(":checked") ? 1 : 2;

    console.log('id: ' + id + ' status: ' +  status);

    $status_text = ''
    if(status == '1'){
        $status_text = 'Active';
    }else{
        $status_text = 'Inactive';
    }

    if(confirm('Are you sure to change the status to '+$status_text+'?')){
        $.ajax({
            method: "GET",
            url: "service_area/function.php",
            data: { fn: "update_active_status", sa_id: id, sa_status: status }
        })
        .done(function( res ) {
            console.log(res);
            $res1 = JSON.parse(res);
            if($res1.status == true){
                populateDataTable();
                
            }
        });//end ajax
    }
}); 

$(document).ready(function () {
    populateDataTable();
    initObjects();
});