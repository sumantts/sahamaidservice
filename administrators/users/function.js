
$(document).on("blur", ".form-control", function(){
    var fieldId = $(this).attr("id");
    var fieldValue = $(this).val();

    console.log("Field ID: " + fieldId);
    console.log("Field Value: " + fieldValue);

    $serial_number = $('#serial_number').val();

    if(fieldValue != ''){
        $.ajax({
            type: "POST",
            url: "users/function.php",
            dataType: "json",
            data: { fn: "saveFormData", field_id: fieldId, field_val: fieldValue, current_tab: $current_tab, serial_number: $serial_number }
        })
        .done(function( res ) {
            //$res1 = JSON.parse(res);
            JSON.stringify(res);

            if(res.status == true){    
                $serial_number = res.serial_number;
                $('#serial_number').val($serial_number); 
                //populateDataTable(); 
            }else{
                console.log('Error: ' + res.serial_number)
            }        
        });//end ajax 
    }//end if  
});


$('#cancelForm').on('click', function(){
    $('#serial_number').val('0');
    $("#myForm")[0].reset(); 
    populateDataTable(); 
})


$('#addNewBtn').on('click', function(){
    $("#myForm")[0].reset(); 
    $("#preview_adhar_card_img").html(''); 
    $("#preview_adhar_card_back_img").html('');
    $("#preview_pan_card_img").html('');
    $("#preview_voter_id_card_img").html('');
    $("#preview_voter_id_card_back_img").html('');
    $("#preview_user_photo").html('');
    $("#preview_bank_details_img").html('');
    
    console.log('opening with modal: ' + $current_tab);
    $modal_title = $current_tab + ' Details';
    
    $('#serial_number').val('0');
    $('#exampleModalLongTitle').html($modal_title);
    $("#partTwoBoard").hide();
    $("#partThreeBoard").hide();
    $("#partFourBoard").hide();
    $("#partFiveBoard").hide();
    $("#partSixBoard").hide();
    $("#partSevenBoard").hide();
    $("#partEightBoard").hide();
    $("#partNineBoard").hide();
});

$("#partTwoSwitch").click(function(){
    $("#partTwoBoard").toggle('slow');
});

$("#partThreeSwitch").click(function(){
    $("#partThreeBoard").toggle('slow');
});

$("#partFourSwitch").click(function(){
    $("#partFourBoard").toggle('slow');
});

$("#partFiveSwitch").click(function(){
    $("#partFiveBoard").toggle('slow');
});

$("#partSixSwitch").click(function(){
    $("#partSixBoard").toggle('slow');
});

$("#partSevenSwitch").click(function(){
    $("#partSevenBoard").toggle('slow');
});

$("#partEightSwitch").click(function(){
    $("#partEightBoard").toggle('slow');
});

$("#partNineSwitch").click(function(){
    $("#partNineBoard").toggle('slow');
});

function populateDataTable(){
    $table_id = $current_tab+'_list';

    $('#'+$table_id).dataTable().fnClearTable();
    $('#'+$table_id).dataTable().fnDestroy();

    $('#'+$table_id).DataTable({ 
        responsive: true,
        serverMethod: 'GET',
        ajax: {'url': 'users/function.php?fn=getuserDetails&current_tab='+$current_tab },
        dom: 'Bfrtip',
        buttons: [],
        order: [[0, 'desc']],

    });
}//end fun


// Gender 
function configureGenderDd(){
    $.ajax({
        method: "POST",
        url: "users/function.php",
        data: { fn: "configureGenderDd" }
    })
    .done(function( res ) {
        $res1 = JSON.parse(res); 
        if($res1.status == true){
            $rows = $res1.data;

            if($rows.length > 0){
                $('#gender').html('');
                $html = "<option value='0'>Select</option>";
                for($i = 0; $i < $rows.length; $i++){
                    $html += "<option value='"+$rows[$i].g_id+"'>"+$rows[$i].gender_name+"</option>";                    
                }//end for                
                $('#gender').html($html);
            }else{
                $('#gender').html('');
                $html = "<option value='0'>Select</option>";
                $('#gender').html($html);
            }//end if
        }        
    });//end ajax
}//end 

// Marital Status 
function configureMaritalStatusDd(){
    $.ajax({
        method: "POST",
        url: "users/function.php",
        data: { fn: "configureMaritalStatusDd" }
    })
    .done(function( res ) {
        $res1 = JSON.parse(res); 
        if($res1.status == true){
            $rows = $res1.data;

            if($rows.length > 0){
                $('#m_id').html('');
                $html = "<option value='0'>Select</option>";
                for($i = 0; $i < $rows.length; $i++){
                    $html += "<option value='"+$rows[$i].m_id+"'>"+$rows[$i].m_status_name+"</option>";                    
                }//end for                
                $('#m_id').html($html);
            }else{
                $('#m_id').html('');
                $html = "<option value='0'>Select</option>";
                $('#m_id').html($html);
            }//end if
        }        
    });//end ajax
}//end 

// Country
function configureCountrysDd(){
    $.ajax({
        method: "POST",
        url: "users/function.php",
        data: { fn: "configureCountrysDd" }
    })
    .done(function( res ) {
        $res1 = JSON.parse(res); 
        if($res1.status == true){
            $rows = $res1.data;

            if($rows.length > 0){
                $('#country_id').html('');
                $html = "<option value='0'>Select</option>";
                for($i = 0; $i < $rows.length; $i++){
                    $html += "<option value='"+$rows[$i].id+"'>"+$rows[$i].name+"</option>";                    
                }//end for                
                $('#country_id').html($html);
            }else{
                $('#country_id').html('');
                $html = "<option value='0'>Select</option>";
                $('#country_id').html($html);
            }//end if
        }        
    });//end ajax
}//end 

$('#country_id').on('change', function(){
    configureStatesDd();    
});

// State
function configureStatesDd(){
    $country_id = $('#country_id').val();
    if(parseInt($country_id) > 0){
        $.ajax({
            method: "POST",
            url: "users/function.php",
            data: { fn: "configureStatesDd", country_id: $country_id }
        })
        .done(function( res ) {
            $res1 = JSON.parse(res); 
            if($res1.status == true){
                $rows = $res1.data;

                if($rows.length > 0){
                    $('#state_id').html('');
                    $html = "<option value='0'>Select</option>";
                    for($i = 0; $i < $rows.length; $i++){
                        $html += "<option value='"+$rows[$i].id+"'>"+$rows[$i].name+"</option>";                    
                    }//end for                
                    $('#state_id').html($html);
                }else{
                    $('#state_id').html('');
                    $html = "<option value='0'>Select</option>";
                    $('#state_id').html($html);
                }//end if
            }        
        });//end ajax
    }//end if
}//end 

$('#state_id').on('change', function(){
    configureCityDd();    
});

// State
function configureCityDd(){
    $state_id = $('#state_id').val();
    if(parseInt($state_id) > 0){
        $.ajax({
            method: "POST",
            url: "users/function.php",
            data: { fn: "configureCityDd", state_id: $state_id }
        })
        .done(function( res ) {
            $res1 = JSON.parse(res); 
            if($res1.status == true){
                $rows = $res1.data;

                if($rows.length > 0){
                    $('#city_id').html('');
                    $html = "<option value='0'>Select</option>";
                    for($i = 0; $i < $rows.length; $i++){
                        $html += "<option value='"+$rows[$i].id+"'>"+$rows[$i].name+"</option>";                    
                    }//end for                
                    $('#city_id').html($html);
                }else{
                    $('#city_id').html('');
                    $html = "<option value='0'>Select</option>";
                    $('#city_id').html($html);
                }//end if
            }        
        });//end ajax
    }//end if
}//end 


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


// Skills
function configureSkillsDd(){
    $.ajax({
        method: "POST",
        url: "users/function.php",
        data: { fn: "configureSkillsDd" }
    })
    .done(function( res ) {
        $res1 = JSON.parse(res); 
        if($res1.status == true){
            $rows = $res1.data;

            if($rows.length > 0){
                $('#sk_id').html('');
                $html = "";
                for($i = 0; $i < $rows.length; $i++){
                    $html += "<option value='"+$rows[$i].id+"'>"+$rows[$i].name+"</option>";                    
                }//end for                
                $('#sk_id').html($html);
            }else{
                $('#sk_id').html('');
                $html = "<option value='0'>Select</option>";
                $('#sk_id').html($html);
            }//end if
        }        
    });//end ajax
}//end 


// Language
function configureLanguagesKnownDd(){
    $.ajax({
        method: "POST",
        url: "users/function.php",
        data: { fn: "configureLanguagesKnownDd" }
    })
    .done(function( res ) {
        $res1 = JSON.parse(res); 
        if($res1.status == true){
            $rows = $res1.data;

            if($rows.length > 0){
                $('#l_id').html('');
                $html = "";
                for($i = 0; $i < $rows.length; $i++){
                    $html += "<option value='"+$rows[$i].id+"'>"+$rows[$i].name+"</option>";                    
                }//end for                
                $('#l_id').html($html);
            }else{
                $('#l_id').html('');
                $html = "<option value='0'>Select</option>";
                $('#l_id').html($html);
            }//end if
        }        
    });//end ajax
}//end 

// Work Type
function configureStayTypeDd(){
    $.ajax({
        method: "POST",
        url: "users/function.php",
        data: { fn: "configureStayTypeDd" }
    })
    .done(function( res ) {
        $res1 = JSON.parse(res); 
        if($res1.status == true){
            $rows = $res1.data;

            if($rows.length > 0){
                $('#st_id').html('');
                $html = "<option value='0'>Select</option>";
                for($i = 0; $i < $rows.length; $i++){
                    $html += "<option value='"+$rows[$i].id+"'>"+$rows[$i].name+"</option>";                    
                }//end for                
                $('#st_id').html($html);
            }else{
                $('#st_id').html('');
                $html = "<option value='0'>Select</option>";
                $('#st_id').html($html);
            }//end if
        }        
    });//end ajax
}//end 

// Weekly Off Required
function configureWeeklyOffDd(){
    $.ajax({
        method: "POST",
        url: "users/function.php",
        data: { fn: "configureWeeklyOffDd" }
    })
    .done(function( res ) {
        $res1 = JSON.parse(res); 
        if($res1.status == true){
            $rows = $res1.data;

            if($rows.length > 0){
                $('#wf_id').html('');
                $html = "<option value='0'>Select</option>";
                for($i = 0; $i < $rows.length; $i++){
                    $html += "<option value='"+$rows[$i].id+"'>"+$rows[$i].name+"</option>";                    
                }//end for                
                $('#wf_id').html($html);
            }else{
                $('#wf_id').html('');
                $html = "<option value='0'>Select</option>";
                $('#wf_id').html($html);
            }//end if
        }        
    });//end ajax
}//end 

// Any Major Illness?
function configureMajorIllnessDd(){
    $.ajax({
        method: "POST",
        url: "users/function.php",
        data: { fn: "configureMajorIllnessDd" }
    })
    .done(function( res ) {
        $res1 = JSON.parse(res); 
        if($res1.status == true){
            $rows = $res1.data;

            if($rows.length > 0){
                $('#il_id').html('');
                $html = "<option value='0'>Select</option>";
                for($i = 0; $i < $rows.length; $i++){
                    $html += "<option value='"+$rows[$i].id+"'>"+$rows[$i].name+"</option>";                    
                }//end for                
                $('#il_id').html($html);
            }else{
                $('#il_id').html('');
                $html = "<option value='0'>Select</option>";
                $('#il_id').html($html);
            }//end if
        }        
    });//end ajax
}//end 

// Police Verification Done?
function configurePoliceVerificationDd(){
    $.ajax({
        method: "POST",
        url: "users/function.php",
        data: { fn: "configurePoliceVerificationDd" }
    })
    .done(function( res ) {
        $res1 = JSON.parse(res); 
        if($res1.status == true){
            $rows = $res1.data;

            if($rows.length > 0){
                $('#pv_id').html('');
                $html = "<option value='0'>Select</option>";
                for($i = 0; $i < $rows.length; $i++){
                    $html += "<option value='"+$rows[$i].id+"'>"+$rows[$i].name+"</option>";                    
                }//end for                
                $('#pv_id').html($html);
            }else{
                $('#pv_id').html('');
                $html = "<option value='0'>Select</option>";
                $('#pv_id').html($html);
            }//end if
        }        
    });//end ajax
}//end 

// Any Criminal Case History?
function configureCriminalHistoryDd(){
    $.ajax({
        method: "POST",
        url: "users/function.php",
        data: { fn: "configureCriminalHistoryDd" }
    })
    .done(function( res ) {
        $res1 = JSON.parse(res); 
        if($res1.status == true){
            $rows = $res1.data;

            if($rows.length > 0){
                $('#ch_id').html('');
                $html = "<option value='0'>Select</option>";
                for($i = 0; $i < $rows.length; $i++){
                    $html += "<option value='"+$rows[$i].id+"'>"+$rows[$i].name+"</option>";                    
                }//end for                
                $('#ch_id').html($html);
            }else{
                $('#ch_id').html('');
                $html = "<option value='0'>Select</option>";
                $('#ch_id').html($html);
            }//end if
        }        
    });//end ajax
}//end 

// Lead or Confirm 
function configureLeadConfirmDD(){
    $.ajax({
        method: "POST",
        url: "users/function.php",
        data: { fn: "configureLeadConfirmDD" }
    })
    .done(function( res ) {
        $res1 = JSON.parse(res); 
        if($res1.status == true){
            $rows = $res1.data;

            if($rows.length > 0){
                $('#lc_id').html('');
                $html = "<option value='0'>Select</option>";
                for($i = 0; $i < $rows.length; $i++){
                    $html += "<option value='"+$rows[$i].id+"'>"+$rows[$i].name+"</option>";                    
                }//end for                
                $('#lc_id').html($html);
            }else{
                $('#lc_id').html('');
                $html = "<option value='0'>Select</option>";
                $('#lc_id').html($html);
            }//end if
        }        
    });//end ajax
}//end 

$(document).ready(function () {
    $current_tab = 'admin';
    $sess_user_type = $('#sess_user_type').val();
    if($sess_user_type == '1'){
        $current_tab = 'admin';
    }else if($sess_user_type == '2'){
        $current_tab = 'manager';
    }else if($sess_user_type == '3'){
        $current_tab = 'employee';
    }else if($sess_user_type == '4'){
        $current_tab = 'client';
    }else{}
    
    setTimeout(function(){ 
        $table_id = $current_tab+'_list';
        console.log('table_id: '+$table_id);
        populateDataTable();

        // Dropdown List
        configureGenderDd();
        configureMaritalStatusDd();
        configureCountrysDd();
        configureWorkTypeDd();
        configureSkillsDd();
        configureLanguagesKnownDd();
        configureStayTypeDd();
        configureWeeklyOffDd();
        configureMajorIllnessDd();
        configurePoliceVerificationDd();
        configureCriminalHistoryDd();
        configureLeadConfirmDD();

    },300);
});


// Select all tab buttons
const buttons = document.querySelectorAll('.tab-btn');
const panes = document.querySelectorAll('.tab-pane');

buttons.forEach(button => {
    button.addEventListener('click', function () {

        // Remove active class from all buttons
        buttons.forEach(btn => btn.classList.remove('active'));

        // Hide all tab panes
        panes.forEach(pane => pane.classList.remove('active'));

        // Add active class to clicked button
        this.classList.add('active');

        // Show corresponding tab pane
        const tabId = this.getAttribute('data-tab');
        document.getElementById(tabId).classList.add('active');

        // Active Tab Name
        let activeTab = document.querySelector('.tab-pane.active');
        if (activeTab) {
            console.log(activeTab.id);
            $current_tab = activeTab.id;                
            populateDataTable();

            if($current_tab == 'client' || $current_tab == 'worker'){
                $('#col_lc_id').removeClass('d-none');
                $('#col_lc_id').addClass('d-block');
            }else{
                $('#col_lc_id').removeClass('d-block');
                $('#col_lc_id').addClass('d-none');
            }
        }

    });
});


// Delete Data
function deleteTabledata(sl){
    console.log('sl: ' + sl);
    if(confirm('Are you sure to delete the record?')){
        $.ajax({
            method: "POST",
            url: "users/function.php",
            data: { fn: "deleteTabledata", serial_no: sl }
        })
        .done(function( res ) {
            $res1 = JSON.parse(res); 
            if($res1.status == true){                 
                populateDataTable();
                //alert('Data Deleted successfully');
            }        
        });//end ajax
    }//end fonfirm if
}//end if 

// Print Data
function printTabledata(sl){
    console.log('sl: ' + sl);
    
    window.open("./users/print_users.php?user_id="+sl, "_blank");
}//end if 

// Get data for Edit
function editTabledata(sl){
    console.log('sl: ' + sl);    
    $modal_title = $current_tab + ' Details';
    $('#exampleModalLongTitle').html($modal_title);
    $("#partTwoBoard").hide();
    $("#partThreeBoard").hide();
    $("#partFourBoard").hide();
    $("#partFiveBoard").hide();
    $("#partSixBoard").hide();
    $("#partSevenBoard").hide();
    $("#partEightBoard").hide();
    $("#partNineBoard").hide();

    $.ajax({
        method: "POST",
        url: "users/function.php",
        data: { fn: "editTabledata", serial_no: sl }
    })
    .done(function( res ) {
        $res1 = JSON.parse(res); 
        if($res1.status == true){ 
            setTimeout(function(){
            },3000);
            
            $('#serial_number').val($res1.user_id);
            
			$('#username').val($res1.username); 
			$('#password').val($res1.password); 
			$('#user_type').val($res1.user_type); 
			$('#added_by').val($res1.added_by); 
			$('#full_name').val($res1.full_name); 
			$('#fat_hus_name').val($res1.fat_hus_name); 
			$('#email_id').val($res1.email_id); 
			$('#phone_number').val($res1.phone_number); 
			$('#alt_phone_number').val($res1.alt_phone_number); 
			$('#m_id').val($res1.m_id); 
			$('#date_of_birth').val($res1.date_of_birth); 
			$('#gender').val($res1.gender); 
			$('#address').val($res1.address); 
			$('#curr_address').val($res1.curr_address);  
			$('#country_id').val($res1.country_id).trigger('change'); 

            $state_id = $res1.state_id;
            $city_id = $res1.city_id;
            setTimeout(function(){ 
                console.log(' state id: ' + $state_id);
                $('#state_id').val($state_id).trigger('change');
            },2000);
            setTimeout(function(){
                $('#city_id').val($city_id).trigger('change');  
            },3000);

			$('#pincode').val($res1.pincode); 
			$('#adhar_card').val($res1.adhar_card); 
            if($res1.adhar_card_img != ''){
                $("#preview_adhar_card_img").html('<img src="users/uploads/'+$res1.adhar_card_img+'" width="200" height="150">');
            }
            if($res1.adhar_card_back_img != ''){
                $("#preview_adhar_card_back_img").html('<img src="users/uploads/'+$res1.adhar_card_back_img+'"  width="200" height="150">');
            }

			$('#pan_card').val($res1.pan_card); 
			//$('#pan_card_img').val($res1.pan_card_img);  
            if($res1.pan_card_img != ''){
                $("#preview_pan_card_img").html('<img src="users/uploads/'+$res1.pan_card_img+'"  width="200" height="150">');
            }

			$('#voter_id_card').val($res1.voter_id_card);  
            if($res1.voter_id_card_img != ''){
                $("#preview_voter_id_card_img").html('<img src="users/uploads/'+$res1.voter_id_card_img+'"  width="200" height="150">');
            }
            
            if($res1.voter_id_card_back_img != ''){
                $("#preview_voter_id_card_back_img").html('<img src="users/uploads/'+$res1.voter_id_card_back_img+'"  width="200" height="150">');
            }

			//$('#user_photo').val($res1.user_photo);  
            if($res1.user_photo != ''){
                $("#preview_user_photo").html('<img src="users/uploads/'+$res1.user_photo+'"  width="200" height="150">');
            }

			$('#wt_id').val($res1.wt_id); 
			$('#work_exp').val($res1.work_exp); 
			$('#earlier_work_city').val($res1.earlier_work_city); 
			$('#last_emplr_name').val($res1.last_emplr_name); 
			$('#sk_id').val($res1.sk_id); 
			$('#l_id').val($res1.l_id); 
			$('#work_loc').val($res1.work_loc); 
			$('#st_id').val($res1.st_id); 
			$('#exp_salary').val($res1.exp_salary); 
			$('#available_from').val($res1.available_from); 
			$('#wf_id').val($res1.wf_id); 
			$('#il_id').val($res1.il_id); 
			$('#pv_id').val($res1.pv_id); 
			$('#ch_id').val($res1.ch_id); 
			$('#emg_cont_person').val($res1.emg_cont_person); 
			$('#relation').val($res1.relation); 
			$('#emg_cont_number').val($res1.emg_cont_number); 
			$('#bank_details').val($res1.bank_details); 
			//$('#bank_details_img').val($res1.bank_details_img);  
            if($res1.bank_details_img != ''){
                $("#preview_bank_details_img").html('<img src="users/uploads/'+$res1.bank_details_img+'"  width="200" height="150">');
            }
			$('#highest_edu').val($res1.highest_edu); 

			if(parseInt($res1.declaration) == 1)  {
                $("#declaration").prop("checked", true);
            }else{
                $("#declaration").prop("checked", false);
            }

			$('#inserted_by').val($res1.inserted_by); 
			$('#updated_by').val($res1.updated_by); 
			$('#insert_date').val($res1.insert_date); 
			$('#update_date').val($res1.update_date); 
			$('#lc_id').val($res1.lc_id).trigger('change'); 
        }        
    });//end ajax
}//end if 

$("#declaration").change(function(){
    $check_box_val = '';
    if($(this).is(":checked")){
        $check_box_val = '1';
    }else{
        $check_box_val = '0';
    }
    console.log('check_box_val: ' + $check_box_val);
    

    $serial_number = $('#serial_number').val();

    //if(fieldValue != ''){
        $.ajax({
            type: "POST",
            url: "users/function.php",
            dataType: "json",
            data: { fn: "saveFormData", field_id: 'declaration', field_val: $check_box_val, current_tab: $current_tab, serial_number: $serial_number }
        })
        .done(function( res ) {
            //$res1 = JSON.parse(res);
            JSON.stringify(res);

            if(res.status == true){    
                $serial_number = res.serial_number;
                $('#serial_number').val($serial_number); 
                //populateDataTable(); 
            }else{
                console.log('Error: ' + res.serial_number)
            }        
        });//end ajax 
    //}//end if

});

// Aadhar Card photo upload
function uploadPhoto(img_id){
    $("#"+img_id).change(function(){
        $serial_number = $('#serial_number').val();
        if(parseInt($serial_number) > 0){
            var file_data = $('#'+img_id).prop('files')[0];
            var form_data = new FormData();
            form_data.append('image', file_data);
            form_data.append('field_name', img_id);
            form_data.append('serial_number', $serial_number);

            $.ajax({
                url: "users/upload.php",
                type: "POST",
                data: form_data,
                contentType: false,
                processData: false,
                success:function(response)
                {
                    //$("#result_"+img_id).html(response);
                    $("#preview_"+img_id).html('<img src="users/uploads/'+response+'"  width="200" height="150">');
                }
            });
        }else{
            alert('Please complete \'Basic Details\' first');
        }

    });

}//end if

/*$(document).ready(function(){

    $("#imageUpload").change(function(){

        var file_data = $('#imageUpload').prop('files')[0];

        var form_data = new FormData();
        form_data.append('image', file_data);

        $.ajax({
            url: "users/upload.php",
            type: "POST",
            data: form_data,
            contentType: false,
            processData: false,
            success:function(response)
            {
                //$("#result").html(response);
                $("#preview").html('<img src="users/uploads/'+response+'"  width="200" height="150">');
            }
        });

    });

});*/