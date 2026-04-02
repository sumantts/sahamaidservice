$('#onMyModal').on('click', function(){
    $('#myForm')[0].reset(); 
    $('#l_id').val('0'); 
    $('#exampleModalLong').modal('show');
})


$('#submitForm').click(function(){ 
    $l_id = $('#l_id').val();
    $user_type = $('#user_type').val();
    $user_id = $('#user_id').val(); 
    $from_date = $('#from_date').val();
    $to_date = $('#to_date').val();
    $leave_subject = $('#leave_subject').val();
    $leave_message = $('#leave_message').val();
    $lsm_id = $('#lsm_id').val(); 

    if($from_date == ''){
        alert('Please Choose From Date');
    }else if($to_date == ''){
        alert('Please Choose To Date');
    }else if($leave_subject == ''){
        alert('Please enter Subject');
    }else if($leave_message == ''){
        alert('Please enter Message');
    }else{
        $('#submitForm_spinner').show();
        $('#submitForm_spinner_text').show();
        $('#submitForm_text').hide();

        $.ajax({
            method: "POST",
            url: "leave/function.php",
            data: { fn: "saveFormData", l_id: $l_id, user_type: $user_type, user_id: $user_id, from_date: $from_date, to_date: $to_date, leave_subject: $leave_subject, leave_message: $leave_message, lsm_id: $lsm_id }
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

function editTableData($l_id){
    $('#myForm')[0].reset(); 

    $.ajax({
        method: "POST",
        url: "leave/function.php",
        data: { fn: "getFormEditData", l_id: $l_id }
    })
    .done(function( res ) {
        //console.log(res);
        $res1 = JSON.parse(res);
        if($res1.status == true){   
            $('#l_id').val($res1.l_id);   
            //$('#full_name').val($res1.full_name);   
            //$('#user_type_text').val($res1.user_type_text);   
            $('#from_date').val($res1.from_date);   
            $('#to_date').val($res1.to_date);   
            $('#leave_subject').val($res1.leave_subject);
            $('#leave_message').val($res1.leave_message); 
            $('#lsm_id').val($res1.lsm_id).trigger('change'); 

            $user_type = $res1.user_type;
            $user_id = $res1.user_id;
             
            $('#user_type').val($user_type).trigger('change'); 
            setTimeout(function(){
                $('#user_id').val($user_id).trigger('change'); 
            },300);

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




// user type 
function configureUserTypeDd(){
    $.ajax({
        method: "POST",
        url: "attendance/function.php",
        data: { fn: "configureUserTypeDd" }
    })
    .done(function( res ) {
        $res1 = JSON.parse(res); 
        if($res1.status == true){
            $rows = $res1.data;

            if($rows.length > 0){
                $('#user_type').html('');
                $html = "<option value=''>Select</option>";
                for($i = 0; $i < $rows.length; $i++){
                    $html += "<option value='"+$rows[$i].id+"'>"+$rows[$i].name+"</option>";                    
                }//end for                
                $('#user_type').html($html);
            }else{
                $('#user_type').html('');
                $html = "<option value=''>Select</option>";
                $('#user_type').html($html);
            }//end if
        }        
    });//end ajax
}//end 

$('#user_type').on('change', function(){
    configureUsersDd();    
});


// User 
function configureUsersDd(){
    $user_type = $('#user_type').val();
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
                    $('#user_id').html('');
                    $html = "<option value=''>Select</option>";
                    for($i = 0; $i < $rows.length; $i++){
                        $html += "<option value='"+$rows[$i].id+"'>"+$rows[$i].name+"</option>";                    
                    }//end for                
                    $('#user_id').html($html);
                }else{
                    $('#user_id').html('');
                    $html = "<option value=''>Select</option>";
                    $('#user_id').html($html);
                }//end if
            }        
        });//end ajax
    }//end if
}//end 

$(document).ready(function () {
    populateDataTable();
    configureLeaveStatDD();
    configureUserTypeDd();
    //configureCategoryDropDown();
});