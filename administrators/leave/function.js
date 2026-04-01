$('#onMyModal').on('click', function(){
    $('#exampleModalLong').modal('show');
})

$('#almari_name').on('blur', function(){
    $almari_name = $('#almari_name').val();
})

function validateForm(){
    $l_id = $('#l_id').val();
    $almari_name = $('#almari_name').val().replace(/^\s+|\s+$/gm,'');
    $almari_status = $('#almari_status').val();
    $status = true;

    if($almari_name == ''){
        $status = false;
        $('#almari_name').removeClass('is-valid');
        $('#almari_name').addClass('is-invalid');
    }else{
        $('#almari_name').removeClass('is-invalid');
        $('#almari_name').addClass('is-valid');
    }  

    $('#submitForm_spinner').hide();
    $('#submitForm_spinner_text').hide();
    $('#submitForm_text').show();

    return $status;
}//en validate form

$('#submitForm').click(function(){
    $('#submitForm_spinner').show();
    $('#submitForm_spinner_text').show();
    $('#submitForm_text').hide();
    setTimeout(function(){
        $formVallidStatus = validateForm();

        if($formVallidStatus == true){
            $l_id = $('#l_id').val();

            $.ajax({
                method: "POST",
                url: "leave/function.php",
                data: { fn: "saveFormData", l_id: $l_id, almari_name: $almari_name, almari_status: $almari_status }
            })
            .done(function( res ) {
                //console.log(res);
                $res1 = JSON.parse(res);
                if($res1.status == true){
                    $('#orgFormAlert1').show();
                    $('#myForm')[0].reset();
                    $('#exampleModalLong').modal('hide');
                    populateDataTable();
                }else{
                    alert('This name ia already exist')
                }                
                $('#submitForm_spinner').hide();
                $('#submitForm_spinner_text').hide();
                $('#submitForm_text').show();
            });//end ajax
        }

    }, 500)    
})

function editTableData($l_id){
    $('#myForm')[0].reset();
    $("#post_video_link").hide();

    $.ajax({
        method: "POST",
        url: "leave/function.php",
        data: { fn: "getFormEditData", l_id: $l_id }
    })
    .done(function( res ) {
        //console.log(res);
        $res1 = JSON.parse(res);
        if($res1.status == true){ 
            /*$('#almari_name').val($res1.almari_name); 
            $('#almari_status').val($res1.almari_status).trigger('change');   
            $('#l_id').val($res1.l_id);*/

            $('#exampleModalLong').modal('show');
        }
    });//end ajax

}

//Delete function	
function deleteTableData($l_id){
    if (confirm('Are you sure to delete the data?')) {
        $.ajax({
            method: "POST",
            url: "leave/function.php",
            data: { fn: "deleteTableData", l_id: $l_id }
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
        localStorage.setItem("post_image", reader.result);
        $('#post_image_data').val(reader.result);
    }, false);

    if (imgPath) {
        reader.readAsDataURL(imgPath);
    }

    //To display image again
    setTimeout(function(){
    let img = document.getElementById('image');
    img.src = localStorage.getItem('post_image');
    }, 250);
}


function populateDataTable(){
    $('#example').dataTable().fnClearTable();
    $('#example').dataTable().fnDestroy();

    $('#example').DataTable({ 
        responsive: true,
        serverMethod: 'GET',
        ajax: {'url': 'leave/function.php?fn=getTableData' },
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

function configureCategoryDropDown(){
    $.ajax({
        method: "POST",
        url: "leave/function.php",
        data: { fn: "getAllCategoryName" }
    })
    .done(function( res ) {
        $res1 = JSON.parse(res);
        //console.log(JSON.stringify($res1));
        if($res1.status == true){
            $rows = $res1.data;

            if($rows.length > 0){
                $('#l_id').html('');
                $option_l_id = "<option value='0'>Select</option>";

                for($i = 0; $i < $rows.length; $i++){
                    $option_l_id += "<option value='"+$rows[$i].l_id+"'>"+$rows[$i].almari_name+"</option>";                    
                }//end for
                
                $('#l_id').html($option_l_id);
            }//end if
        }        
    });//end ajax
}//end

function configureLeaveStatDD(){
    $.ajax({
        method: "POST",
        url: "leave/function.php",
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

$(document).ready(function () {
    populateDataTable();
    configureLeaveStatDD();
    //configureCategoryDropDown();
});