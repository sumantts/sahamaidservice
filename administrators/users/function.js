
$(document).on("blur", ".form-control", function(){
    var fieldId = $(this).attr("id");
    var fieldValue = $(this).val();

    console.log("Field ID: " + fieldId);
    console.log("Field Value: " + fieldValue);

    $serial_number = $('#serial_number').val();

    if(fieldValue != '' && fieldId != 'inv_month' && fieldId != 'terms_condi'){
        $.ajax({
            type: "POST",
            url: "users/function.php",
            dataType: "json",
            data: { fn: "saveFormData", field_id: fieldId, field_val: fieldValue, current_tab: $current_tab, serial_number: $serial_number }
        })
        .done(function( res ) {
            if(res.status == true){    
                $serial_number = res.serial_number;
                $('#serial_number').val($serial_number); 
                //populateDataTable(); 
            }else{
                alert('Error: ' + res.error_message);
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


// Working Hours 
function configureWorkingHoursDd(){
    $.ajax({
        method: "POST",
        url: "users/function.php",
        data: { fn: "configureWorkingHoursDd" }
    })
    .done(function( res ) {
        $res1 = JSON.parse(res); 
        if($res1.status == true){
            $rows = $res1.data;

            if($rows.length > 0){
                $('#wh_id').html('');
                $html = "<option value='0'>Select</option>";
                for($i = 0; $i < $rows.length; $i++){
                    $html += "<option value='"+$rows[$i].wh_id+"'>"+$rows[$i].wh_name+"</option>";                    
                }//end for                
                $('#wh_id').html($html);
            }else{
                $('#wh_id').html('');
                $html = "<option value='0'>Select</option>";
                $('#wh_id').html($html);
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

// Nurses
function configureNursesDd(){
    $.ajax({
        method: "POST",
        url: "users/function.php",
        data: { fn: "configureNursesDd" }
    })
    .done(function( res ) {
        $res1 = JSON.parse(res); 
        if($res1.status == true){
            $rows = $res1.data;

            if($rows.length > 0){
                $('#nr_id').html('');
                $html = "";
                for($i = 0; $i < $rows.length; $i++){
                    $html += "<option value='"+$rows[$i].id+"'>"+$rows[$i].name+"</option>";                    
                }//end for                
                $('#nr_id').html($html);
            }else{
                $('#nr_id').html('');
                $html = "<option value='0'>Select</option>";
                $('#nr_id').html($html);
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
        configureWorkingHoursDd();
        configureMaritalStatusDd();
        configureCountrysDd();
        configureWorkTypeDd();
        configureSkillsDd();
        configureLanguagesKnownDd();
        configureNursesDd();
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

            // For worker
            if($current_tab == 'worker'){
                // Section 4                   
                $('#partFourSwitch').removeClass('d-none');
                $('#partFourSwitch').addClass('d-block');                
                $('#partFourTitl').removeClass('d-none');
                $('#partFourTitl').addClass('d-block'); 

                $('#sec_4_1').removeClass('d-none');
                $('#sec_4_1').addClass('d-block');  
                $('#sec_4_2').removeClass('d-none');
                $('#sec_4_2').addClass('d-block');  
                $('#sec_4_3').removeClass('d-none');
                $('#sec_4_3').addClass('d-block');  
                $('#sec_4_4').removeClass('d-none');
                $('#sec_4_4').addClass('d-block');  
                $('#sec_4_5').removeClass('d-none');
                $('#sec_4_5').addClass('d-block');  
                $('#sec_4_6').removeClass('d-none');
                $('#sec_4_6').addClass('d-block'); 
                $('#sec_4_7').removeClass('d-none');
                $('#sec_4_7').addClass('d-block');  
                $('#sec_4_8').removeClass('d-none');
                $('#sec_4_8').addClass('d-block');  
                $('#sec_4_9').removeClass('d-none');
                $('#sec_4_9').addClass('d-block');  
                $('#sec_4_10').removeClass('d-none');
                $('#sec_4_10').addClass('d-block');  
                $('#sec_4_11').removeClass('d-none');
                $('#sec_4_11').addClass('d-block');  
                $('#sec_4_12').removeClass('d-none');
                $('#sec_4_12').addClass('d-block');  
                $('#sec_4_13').removeClass('d-none');
                $('#sec_4_13').addClass('d-block');
                

                //Section 5 Fields 
                $('#sec_5_1').removeClass('d-none');
                $('#sec_5_1').addClass('d-block');
                
                $('#sec_5_2').removeClass('d-none');
                $('#sec_5_2').addClass('d-block');

                //Section 6 Fields                 
                $('#partSixSwitch').removeClass('d-none');
                $('#partSixSwitch').addClass('d-block');                
                $('#partSixTitl').removeClass('d-none');
                $('#partSixTitl').addClass('d-block');     

                $('#partSixBoard1').removeClass('d-none');
                $('#partSixBoard1').addClass('d-block');  
                $('#partSixBoard2').removeClass('d-none');
                $('#partSixBoard2').addClass('d-block');  
                $('#partSixBoard3').removeClass('d-none');
                $('#partSixBoard3').addClass('d-block'); 
                

                //Section 7 Fields                 
                $('#partSevenSwitch').removeClass('d-none');
                $('#partSevenSwitch').addClass('d-block');                
                $('#partSevenTitl').removeClass('d-none');
                $('#partSevenTitl').addClass('d-block');     

                $('#partSevenBoard1').removeClass('d-none');
                $('#partSevenBoard1').addClass('d-block');  
                $('#partSevenBoard2').removeClass('d-none');
                $('#partSevenBoard2').addClass('d-block');  
                $('#partSevenBoard3').removeClass('d-none');
                $('#partSevenBoard3').addClass('d-block'); 
                

                //Section 8 Fields                 
                /*$('#partEightSwitch').removeClass('d-none');
                $('#partEightSwitch').addClass('d-block');                
                $('#partEightTitl').removeClass('d-none');
                $('#partEightTitl').addClass('d-block');     

                $('#partEightBoard1').removeClass('d-none');
                $('#partEightBoard1').addClass('d-block');  
                $('#partEightBoard2').removeClass('d-none');
                $('#partEightBoard2').addClass('d-block');  
                $('#partEightBoard3').removeClass('d-none');
                $('#partEightBoard3').addClass('d-block');  
                $('#partEightBoard4').removeClass('d-none');
                $('#partEightBoard4').addClass('d-block');  
                $('#partEightBoard5').removeClass('d-none');
                $('#partEightBoard5').addClass('d-block');  
                $('#partEightBoard6').removeClass('d-none');
                $('#partEightBoard6').addClass('d-block');*/
                  
            }else{
                // Section 4                    
                $('#partFourSwitch').removeClass('d-block');
                $('#partFourSwitch').addClass('d-none');                
                $('#partFourTitl').removeClass('d-block');
                $('#partFourTitl').addClass('d-none'); 

                $('#sec_4_1').removeClass('d-block');
                $('#sec_4_1').addClass('d-none');                
                $('#sec_4_2').removeClass('d-block');
                $('#sec_4_2').addClass('d-none');                
                $('#sec_4_3').removeClass('d-block');
                $('#sec_4_3').addClass('d-none');                
                $('#sec_4_4').removeClass('d-block');
                $('#sec_4_4').addClass('d-none');                
                $('#sec_4_5').removeClass('d-block');
                $('#sec_4_5').addClass('d-none');               
                $('#sec_4_6').removeClass('d-block');
                $('#sec_4_6').addClass('d-none');               
                $('#sec_4_7').removeClass('d-block');
                $('#sec_4_7').addClass('d-none');               
                $('#sec_4_8').removeClass('d-block');
                $('#sec_4_8').addClass('d-none');             
                $('#sec_4_9').removeClass('d-block');
                $('#sec_4_9').addClass('d-none');                
                $('#sec_4_10').removeClass('d-block');
                $('#sec_4_10').addClass('d-none');                
                $('#sec_4_11').removeClass('d-block');
                $('#sec_4_11').addClass('d-none');               
                $('#sec_4_12').removeClass('d-block');
                $('#sec_4_12').addClass('d-none');               
                $('#sec_4_13').removeClass('d-block');
                $('#sec_4_13').addClass('d-none');
                

                //Section 5 Fields 
                $('#sec_5_1').removeClass('d-block');
                $('#sec_5_1').addClass('d-none');
                
                $('#sec_5_2').removeClass('d-block');
                $('#sec_5_2').addClass('d-none');

                //Section 6 Fields                 
                $('#partSixSwitch').removeClass('d-block');
                $('#partSixSwitch').addClass('d-none');                
                $('#partSixTitl').removeClass('d-block');
                $('#partSixTitl').addClass('d-none');                
                $('#partSixBoard1').removeClass('d-block');
                $('#partSixBoard1').addClass('d-none');                
                $('#partSixBoard2').removeClass('d-block');
                $('#partSixBoard2').addClass('d-none');                
                $('#partSixBoard3').removeClass('d-block');
                $('#partSixBoard3').addClass('d-none');

                //Section 7 Fields                 
                $('#partSevenSwitch').removeClass('d-block');
                $('#partSevenSwitch').addClass('d-none');                
                $('#partSevenTitl').removeClass('d-block');
                $('#partSevenTitl').addClass('d-none');                
                $('#partSevenBoard1').removeClass('d-block');
                $('#partSevenBoard1').addClass('d-none');                
                $('#partSevenBoard2').removeClass('d-block');
                $('#partSevenBoard2').addClass('d-none');                
                $('#partSevenBoard3').removeClass('d-block');
                $('#partSevenBoard3').addClass('d-none');

                //Section 8 Fields                 
                /*$('#partEightSwitch').removeClass('d-block');
                $('#partEightSwitch').addClass('d-none');                
                $('#partEightTitl').removeClass('d-block');
                $('#partEightTitl').addClass('d-none');                
                $('#partEightBoard1').removeClass('d-block');
                $('#partEightBoard1').addClass('d-none');                
                $('#partEightBoard2').removeClass('d-block');
                $('#partEightBoard2').addClass('d-none');                
                $('#partEightBoard3').removeClass('d-block');
                $('#partEightBoard3').addClass('d-none');               
                $('#partEightBoard4').removeClass('d-block');
                $('#partEightBoard4').addClass('d-none');               
                $('#partEightBoard5').removeClass('d-block');
                $('#partEightBoard5').addClass('d-none');               
                $('#partEightBoard6').removeClass('d-block');
                $('#partEightBoard6').addClass('d-none');*/


            }   

            console.log('current_tab: ' + $current_tab);
            if($current_tab == 'client'){
                $('#partOneBoard1').removeClass('d-block');
                $('#partOneBoard1').addClass('d-none');                
                $('#partOneBoard2').removeClass('d-block');
                $('#partOneBoard2').addClass('d-none');
                $('#partOneBoard3').removeClass('d-block');
                $('#partOneBoard3').addClass('d-none');
                $('#partOneBoard4').removeClass('d-block');
                $('#partOneBoard4').addClass('d-none');
                $('#partOneBoard5').removeClass('d-block');
                $('#partOneBoard5').addClass('d-none');
                
                $('#partThreeTitle').removeClass('d-block');
                $('#partThreeTitle').addClass('d-none');
                $('#partThreeSwitch').removeClass('d-block');
                $('#partThreeSwitch').addClass('d-none');
                
                $('#partThreeBoard1').removeClass('d-block');
                $('#partThreeBoard1').addClass('d-none');                
                $('#partThreeBoard2').removeClass('d-block');
                $('#partThreeBoard2').addClass('d-none');
                $('#partThreeBoard3').removeClass('d-block');
                $('#partThreeBoard3').addClass('d-none');
                $('#partThreeBoard4').removeClass('d-block');
                $('#partThreeBoard4').addClass('d-none');
                $('#partThreeBoard5').removeClass('d-block');
                $('#partThreeBoard5').addClass('d-none');
                $('#partThreeBoard6').removeClass('d-block');
                $('#partThreeBoard6').addClass('d-none');
                $('#partThreeBoard7').removeClass('d-block');
                $('#partThreeBoard7').addClass('d-none');
                $('#partThreeBoard8').removeClass('d-block');
                $('#partThreeBoard8').addClass('d-none');
                $('#partThreeBoard9').removeClass('d-block');
                $('#partThreeBoard9').addClass('d-none');
            }else{
                $('#partOneBoard1').removeClass('d-none');
                $('#partOneBoard1').addClass('d-block');                
                $('#partOneBoard2').removeClass('d-none');
                $('#partOneBoard2').addClass('d-block');
                $('#partOneBoard3').removeClass('d-none');
                $('#partOneBoard3').addClass('d-block');
                $('#partOneBoard4').removeClass('d-none');
                $('#partOneBoard4').addClass('d-block');
                $('#partOneBoard5').removeClass('d-none');
                $('#partOneBoard5').addClass('d-block');

                $('#partThreeTitle').removeClass('d-none');
                $('#partThreeTitle').addClass('d-block');
                $('#partThreeSwitch').removeClass('d-none');
                $('#partThreeSwitch').addClass('d-block');

                $('#partThreeBoard1').removeClass('d-none');
                $('#partThreeBoard1').addClass('d-block');                
                $('#partThreeBoard2').removeClass('d-none');
                $('#partThreeBoard2').addClass('d-block');
                $('#partThreeBoard3').removeClass('d-none');
                $('#partThreeBoard3').addClass('d-block');
                $('#partThreeBoard4').removeClass('d-none');
                $('#partThreeBoard4').addClass('d-block');
                $('#partThreeBoard5').removeClass('d-none');
                $('#partThreeBoard5').addClass('d-block');
                $('#partThreeBoard6').removeClass('d-none');
                $('#partThreeBoard6').addClass('d-block');
                $('#partThreeBoard7').removeClass('d-none');
                $('#partThreeBoard7').addClass('d-block');
                $('#partThreeBoard8').removeClass('d-none');
                $('#partThreeBoard8').addClass('d-block');
                $('#partThreeBoard9').removeClass('d-none');
                $('#partThreeBoard9').addClass('d-block');
            }

        }//end active tab

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
// Worker
function printTabledataF(sl){
    window.open("./users/print_users.php?user_id="+sl, "_blank");
}//end if 
function printTabledataB(sl){
    window.open("./users/print_undertaking.php?user_id="+sl, "_blank");
}//end if 
// Client
function printTabledataC(sl){
    window.open("./users/print_client.php?user_id="+sl, "_blank");
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
                $("#preview_adhar_card_img").html('<img src="users/uploads/'+$res1.adhar_card_img+'" width="200" height="150"><a href="javascript: void(0);" onClick="deleteAttachedImage(\'adhar_card_img\','+sl+')"><i class="fa fa-trash"></i></a>');
            }
            if($res1.adhar_card_back_img != ''){
                $("#preview_adhar_card_back_img").html('<img src="users/uploads/'+$res1.adhar_card_back_img+'"  width="200" height="150"><a href="javascript: void(0);" onClick="deleteAttachedImage(\'adhar_card_back_img\','+sl+')"><i class="fa fa-trash"></i></a>');
            }

			$('#pan_card').val($res1.pan_card); 
			//$('#pan_card_img').val($res1.pan_card_img);  
            if($res1.pan_card_img != ''){
                $("#preview_pan_card_img").html('<img src="users/uploads/'+$res1.pan_card_img+'"  width="200" height="150"><a href="javascript: void(0);" onClick="deleteAttachedImage(\'pan_card_img\','+sl+')"><i class="fa fa-trash"></i></a>');
            }

			$('#voter_id_card').val($res1.voter_id_card);  
            if($res1.voter_id_card_img != ''){
                $("#preview_voter_id_card_img").html('<img src="users/uploads/'+$res1.voter_id_card_img+'"  width="200" height="150"><a href="javascript: void(0);" onClick="deleteAttachedImage(\'voter_id_card_img\','+sl+')"><i class="fa fa-trash"></i></a>');
            }
            
            if($res1.voter_id_card_back_img != ''){
                $("#preview_voter_id_card_back_img").html('<img src="users/uploads/'+$res1.voter_id_card_back_img+'"  width="200" height="150"><a href="javascript: void(0);" onClick="deleteAttachedImage(\'voter_id_card_back_img\','+sl+')"><i class="fa fa-trash"></i></a>');
            }

			//$('#user_photo').val($res1.user_photo);  
            if($res1.user_photo != ''){
                $("#preview_user_photo").html('<img src="users/uploads/'+$res1.user_photo+'"  width="200" height="150"><a href="javascript: void(0);" onClick="deleteAttachedImage(\'user_photo\','+sl+')"><i class="fa fa-trash"></i></a>');
            }

			$('#wt_id').val($res1.wt_id); 
			$('#work_exp').val($res1.work_exp); 
			$('#earlier_work_city').val($res1.earlier_work_city); 
			$('#last_emplr_name').val($res1.last_emplr_name); 
			$('#sk_id').val($res1.sk_id); 
			$('#l_id').val($res1.l_id); 
			$('#nr_id').val($res1.nr_id); 
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
            
			$('#wh_id').val($res1.wh_id).trigger('change'); 
			$('#religion').val($res1.religion); 
			$('#nationality').val($res1.nationality); 
			$('#family_bg_info').val($res1.family_bg_info); 
        }        
    });//end ajax
}//end if 

function deleteAttachedImage(img_field_name, sl){
    if(confirm('Are you sure to delete the Image?')){
        console.log('img_field_name: ' + img_field_name + ' sl: '+ sl)

        $.ajax({
            type: "POST",
            url: "users/function.php",
            dataType: "json",
            data: { fn: "deleteAttachedImage", imgFieldName: img_field_name, userId: sl }
        })
        .done(function( res ) {
            if(res.status == true){
                $("#preview_"+img_field_name).html('');
            }else{
                alert('Error: ' + res.message)
            }        
        });//end ajax 
    }
}//end fun

$("#declaration").change(function(){
    $check_box_val = '';
    if($(this).is(":checked")){
        $check_box_val = '1';
    }else{
        $check_box_val = '0';
    }
    console.log('check_box_val: ' + $check_box_val);
    

    $serial_number = $('#serial_number').val(); 
    $.ajax({
        type: "POST",
        url: "users/function.php",
        dataType: "json",
        data: { fn: "saveFormData", field_id: 'declaration', field_val: $check_box_val, current_tab: $current_tab, serial_number: $serial_number }
    })
    .done(function( res ) {
        //console.log(JSON.stringify(res))
        if(res.status == true){    
            $serial_number = res.serial_number;
            $('#serial_number').val($serial_number); 
            //populateDataTable(); 
        }else{
            alert('Error: ' + res.error_message);
        }        
    });//end ajax  

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

// Invoice function
function onBillModal($user_id){
    $('#user_id').val($user_id);
    $('#invModalLong').modal('show');
    $("#paymentBoard").hide();
    $("#div_p_history1").hide(); 

    
}

$('#inv_month').on('change', function(){
    $inv_month = $('#inv_month').val();
    console.log('inv_month: ' + $inv_month);
    getUnPaidBills();

    $inv_ui1 = '';
    $inv_ui1 += '<div class="col-md-3 mb-2">';
        $inv_ui1 += '<input class="form-control form-control-sm" type="test" id="inv_id" name="inv_id" placeholder="INV ID" readonly>';
    $inv_ui1 += '</div>';
    $inv_ui1 += '<div class="col-md-3 mb-2">';
        $inv_ui1 += '<input class="form-control form-control-sm" type="test" id="from_date" name="from_date" placeholder="From Date" readonly>';
    $inv_ui1 += '</div>';
    $inv_ui1 += '<div class="col-md-3 mb-2">';
        $inv_ui1 += '<input class="form-control form-control-sm" type="test" id="to_date" name="to_date" placeholder="To Date" readonly>';
    $inv_ui1 += '</div>';
    $inv_ui1 += '<div class="col-md-3 mb-2">';
        $inv_ui1 += '<input class="form-control form-control-sm" type="test" id="worker_id" name="worker_id" placeholder="Worker" readonly>';
    $inv_ui1 += '</div>';
    $('#invoice_ui').html($inv_ui1);
    $('#normal_gst').val('1').trigger('change'); 
    $('#terms_condi').val('1').trigger('change');
})//end if

function getUnPaidBills(){
    $user_id = $('#user_id').val();
    $inv_month = $('#inv_month').val();

    $bill_id = 0;
    $bill_total = 0;
    $('#bill_id').val($bill_id);
    $('#bill_total').val($bill_total); 

    $.ajax({
        method: "POST",
        url: "users/function.php",
        data: { fn: "getUnPaidBills", user_id: $user_id, inv_month: $inv_month }
    })
    .done(function( res ) { 
        $res1 = JSON.parse(res);
        if($res1.status == true){            
            //Populate attendance list
            $bill_id = $res1.bill_id;
            $normal_gst = $res1.normal_gst;
            $terms_condi = $res1.terms_condi;
            $bill_total = $res1.bill_total; 

            $assign_maids = $res1.assign_maids; 
            $client_name = $assign_maids[0].client_name; 
            $('#invoice_ui_title').html('Monthly Bill of: ' + $client_name);

            if($assign_maids.length > 0){
                $inv_ui = '';
                $('#invoice_ui').html('');
                for($i = 0; $i < $assign_maids.length; $i++){
                    $inv_ui += '<div class="col-md-3 mb-2">';
                        $inv_ui += '<input class="form-control form-control-sm" type="text" id="inv_id" name="inv_id" placeholder="INV ID" value="'+$assign_maids[$i].inv_id+'" readonly>';
                    $inv_ui += '</div>';
                    $inv_ui += '<div class="col-md-3 mb-2">';
                        $inv_ui += '<input class="form-control form-control-sm" type="text" id="from_date" name="from_date" placeholder="From Date"  value="'+$assign_maids[$i].from_date+'" readonly>';
                    $inv_ui += '</div>';
                    $inv_ui += '<div class="col-md-3 mb-2">';
                        $inv_ui += '<input class="form-control form-control-sm" type="text" id="to_date" name="to_date" placeholder="To Date"  value="'+$assign_maids[$i].to_date+'" readonly>';
                    $inv_ui += '</div>';
                    $inv_ui += '<div class="col-md-3 mb-2">';
                        $inv_ui += '<input class="form-control form-control-sm" type="text" id="worker_id" name="worker_id" placeholder="Worker"  value="'+$assign_maids[$i].worker_name+'" readonly>';
                    $inv_ui += '</div>';
                    /*$inv_ui += '<div class="col-md-1 mb-2">';
                        $inv_ui += '<input type="checkbox" class="rowCheckbox">';
                    $inv_ui += '</div>';
                    $inv_ui += '<div class="col-md-1 mb-2">';
                        $inv_ui += '<input type="checkbox" class="rowCheckbox1">';
                    $inv_ui += '</div>';*/
                }//end if
                $('#invoice_ui').html($inv_ui);                
            }else{
                $('#invoice_ui').html('');

            }

            $('#bill_id').val($bill_id);
            $('#bill_total').val($bill_total);    
            if($normal_gst != ''){
                $('#normal_gst').val($normal_gst).trigger('change');  
            }           
            if($terms_condi != ''){ 
                $('#terms_condi').val($terms_condi).trigger('change');  
            }    
        }else{
            $inv_ui1 = '';
            $inv_ui1 += '<div class="col-md-3 mb-2">';
                $inv_ui1 += '<input class="form-control form-control-sm" type="test" id="inv_id" name="inv_id" placeholder="INV ID" readonly>';
            $inv_ui1 += '</div>';
            $inv_ui1 += '<div class="col-md-3 mb-2">';
                $inv_ui1 += '<input class="form-control form-control-sm" type="test" id="from_date" name="from_date" placeholder="From Date" readonly>';
            $inv_ui1 += '</div>';
            $inv_ui1 += '<div class="col-md-3 mb-2">';
                $inv_ui1 += '<input class="form-control form-control-sm" type="test" id="to_date" name="to_date" placeholder="To Date" readonly>';
            $inv_ui1 += '</div>';
            $inv_ui1 += '<div class="col-md-3 mb-2">';
                $inv_ui1 += '<input class="form-control form-control-sm" type="test" id="worker_id" name="worker_id" placeholder="Worker" readonly>';
            $inv_ui1 += '</div>';
            $('#invoice_ui').html($inv_ui1);
            $('#normal_gst').val('1').trigger('change'); 
            $('#terms_condi').val('1').trigger('change');
        }
    });//end ajax 
}//end if

$("#paymentSwitch").click(function(){
    $("#paymentBoard").toggle('slow');
    $("#div_p_history1").toggle('slow');
});

// Check All function
$(document).ready(function(){
    // When Select All is clicked
    $("#selectAll").click(function(){
        $(".rowCheckbox").prop("checked", $(this).prop("checked"));
    });

    // Optional: If all row checkboxes are checked, mark Select All checked
    $(".rowCheckbox").click(function(){
        if ($(".rowCheckbox:checked").length == $(".rowCheckbox").length) {
            $("#selectAll").prop("checked", true);
        } else {
            $("#selectAll").prop("checked", false);
        }
    });
});    

// Save Inv Data
$('#savePrint').on('click', function(){
    $user_id = $('#user_id').val();
    $bill_id = $('#bill_id').val();
    $inv_month = $('#inv_month').val();
    $normal_gst = $('#normal_gst').val();
    $terms_condi = $('#terms_condi').val();
    $bill_total = $('#bill_total').val();
    
    console.log('user_id: ' + $user_id + ' inv_month: ' + $inv_month);

    if(parseInt($user_id) > 0 && $inv_month != ''){
        if(parseInt($bill_total) > 0){
            $.ajax({
                type: "POST",
                url: "users/function.php",
                dataType: "json",
                data: { fn: "saveInvoiceData", user_id: $user_id, bill_id: $bill_id, inv_month: $inv_month, normal_gst: $normal_gst, terms_condi: $terms_condi, bill_total: $bill_total }
            })
            .done(function( res ) {
                //console.log(JSON.stringify(res))
                if(res.status == true){    
                    $bill_id = res.bill_id;
                    $('#bill_id').val($bill_id);
                }else{
                    alert('Error: ' + res.error_message);
                }        
            });//end ajax
        }else{
            alert('Bill amount should be greater than zero.');
        }//end if
    }else{
        alert('Please choose Month - Year* first');
    }//end if
});
