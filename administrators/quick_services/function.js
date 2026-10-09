
function validateForm(){
    $serviceName = $('#serviceName').val().replace(/^\s+|\s+$/gm,'');
    //$serviceDescription = $('#serviceDescription').val().replace(/^\s+|\s+$/gm,'');
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
    $('#qs_id').val('0');

}//end 

$('#addNewBtn, .card-option a[data-target="#exampleModalLong"]').on('click', function(){
    $('#qs_id').val('0');
    $('#serviceName').val('');
    $('#svc_status').val('1').trigger('change');
    $('#serviceName').removeClass('is-valid');
    $('#serviceName').removeClass('is-invalid');
    initObjects();
    renderIncludedTableData();
    renderNotIncludedTableData();
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
            $qs_id = $('#qs_id').val();
            $serviceName = $('#serviceName').val().replace(/^\s+|\s+$/gm,'');
            $svc_status = $('#svc_status').val();

            $.ajax({
                method: "POST",
                url: "quick_services/function.php",
                data: { fn: "saveServices", qs_id: $qs_id, serviceName: $serviceName, scv_inc_arr: JSON.stringify($scv_inc_arr), scv_notinc_arr: JSON.stringify($scv_notinc_arr), svc_status: $svc_status }
            })
            .done(function( res ) {
                //console.log(res);
                $res1 = JSON.parse(res);
                if($res1.status == true){
                    $('#orgFormAlert1').css("display", "block");
                    $('.toast-right').toast('show');
                    $('#qs_id').val($res1.qs_id); 
                    populateDataTable();

                    alert('Quick Service saved successfully!');
                }else{
                    alert('Error occurred while saving the Quick Service.');
                }
            });//end ajax
        }

    //}, 500)    
})

function editService($qs_id){
    initObjects();
    $('#exampleModalLong').modal('show');
    $.ajax({
        method: "POST",
        url: "quick_services/function.php",
        data: { fn: "getServiceData", qs_id: $qs_id }
    })
    .done(function( res ) {
        //console.log(res);
        $res1 = JSON.parse(res);
        if($res1.status == true){
            $('#serviceName').val($res1.service_name);
            $('#qs_id').val($qs_id);
            $('#svc_status').val($res1.svc_status).trigger('change');
            $scv_inc_arr = $res1.svc_included;
            $scv_notinc_arr = $res1.svc_not_included;

            renderIncludedTableData();
            renderNotIncludedTableData();
        }
    });//end ajax

}

//Delete function	
function deleteService($qs_id){
    if (confirm('Are you sure to delete the Service?')) {
        $.ajax({
            method: "POST",
            url: "quick_services/function.php",
            data: { fn: "deleteService", qs_id: $qs_id }
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

//Image upload
function savePhoto(){
    const imgPath = document.querySelector('input[type=file]').files[0];
    const reader = new FileReader();

    reader.addEventListener("load", function () {
        // convert image file to base64 string and save to localStorage
        localStorage.setItem("image", reader.result);
    }, false);

    if (imgPath) {
        reader.readAsDataURL(imgPath);
    }

    //To display image again
    setTimeout(function(){
    let img = document.getElementById('image');
    img.src = localStorage.getItem('image');
    }, 250);
}


function populateDataTable(){
    $('#example').dataTable().fnClearTable();
    $('#example').dataTable().fnDestroy();

    $('#example').DataTable({ 
        responsive: true,
        serverMethod: 'GET',
        ajax: {'url': 'quick_services/function.php?fn=getServices' },
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

$('#scv_inc_btn').on('click', function(){
    $scv_inc = $('#scv_inc').val().replace(/^\s+|\s+$/gm,'');
    if($scv_inc == ''){
        alert('Please enter Service Included');
    }else{
        $('#scv_inc').val('');
        
        $svc_inc_obj = {
            obj_id: Date.now().toString(36) + Math.random().toString(36).slice(2, 8),
            name: $scv_inc,
        };

        $scv_inc_arr.push($svc_inc_obj);
        renderIncludedTableData();
        
        $svc_inc_obj = {
            obj_id: '',
            name: '',
        };

        console.log(JSON.stringify($scv_inc_arr));

    }
});


$('#svc_notinc_btn').on('click', function(){
    $svc_notinc = $('#svc_notinc').val().replace(/^\s+|\s+$/gm,'');
    if($svc_notinc == ''){
        alert('Please enter Service Not Included');
    }else{
        $('#svc_notinc').val('');
        
        $svc_notinc_obj = {
            obj_id: Date.now().toString(36) + Math.random().toString(36).slice(2, 8),
            name: $svc_notinc,
        };

        $scv_notinc_arr.push($svc_notinc_obj);
        renderNotIncludedTableData();
        
        $svc_notinc_obj = {
            obj_id: '',
            name: '',
        };

        console.log('not inc: ' + JSON.stringify($scv_notinc_arr));

    }
});


function initObjects(){

    $scv_inc_arr = [];
    $svc_inc_obj = {
        obj_id: '',
        name: '',
    };

    $scv_notinc_arr = [];
    $svc_notinc_obj = {
        obj_id: '',
        name: '',
    };

}

function renderIncludedTableData(){
    const $tbody = $('#includedServicesTable tbody').empty();

    if($scv_inc_arr.length === 0){
        const $row = $('<tr>');
        $('<td>', { colspan: 3, class: 'text-center' }).text('No included services added.').appendTo($row);
        $tbody.append($row);
        return;
    }else{
        $scv_inc_arr.forEach(function(service, index){
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
}

$('#includedServicesTable').on('click', '.remove-included-service', function(){
    if(!confirm('Are you sure you want to remove this included service?')){
        return;
    }

    const objId = $(this).attr('data-obj-id');
    const serviceIndex = $scv_inc_arr.findIndex(function(service){
        return service.obj_id === objId;
    });

    if(serviceIndex !== -1){
        $scv_inc_arr.splice(serviceIndex, 1);
        renderIncludedTableData();
    }
});

function renderNotIncludedTableData(){
    const $tbody = $('#notIncludedServicesTable tbody').empty();

    if($scv_notinc_arr.length === 0){
        const $row = $('<tr>');
        $('<td>', { colspan: 3, class: 'text-center' }).text('No not-included services added.').appendTo($row);
        $tbody.append($row);
        return;
    }else{
        $scv_notinc_arr.forEach(function(service, index){
            const $row = $('<tr>');
            $('<th>', { scope: 'row' }).text(index + 1).appendTo($row);
            $('<td>').text(service.name).appendTo($row);
            const $removeButton = $('<button>', {
                type: 'button',
                class: 'btn btn-sm remove-not-included-service',
                'aria-label': 'Remove not-included service',
            }).attr('data-obj-id', service.obj_id);
            $('<i>', { class: 'fas fa-trash', 'aria-hidden': 'true' }).appendTo($removeButton);
            $('<td>').append($removeButton).appendTo($row);
            $tbody.append($row);
        });
    }

}

$('#notIncludedServicesTable').on('click', '.remove-not-included-service', function(){
    if(!confirm('Are you sure you want to remove this not-included service?')){
        return;
    }

    const objId = $(this).attr('data-obj-id');
    const serviceIndex = $scv_notinc_arr.findIndex(function(service){
        return service.obj_id === objId;
    });

    if(serviceIndex !== -1){
        $scv_notinc_arr.splice(serviceIndex, 1);
        renderNotIncludedTableData();
    }
});




$(document).on("change", "[id^='svc_status_']", function(){
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
            url: "quick_services/function.php",
            data: { fn: "update_active_status", qs_id: id, svc_status: status }
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