 

/*$('#submitForm').on('click', function(){
    console.log('Validated..');
    $user_type = $('#user_type').val();  
    $user_id = $('#user_id').val();   
    $month_date = $('#month_date').val();  

    console.log('month_date: ' + $month_date);
    
    $('#submitForm_spinner').show();
    $('#submitForm_spinner_text').show();
    $('#submitForm_text').hide();

    $.ajax({
        type: "POST",
        url: "attendance/function.php",
        dataType: "json",
        data: { fn: "getAttendance", user_type: $user_type, user_id: $user_id, month_date: $month_date }
    })
    .done(function( res ) {
        $res1 = JSON.parse(res);
        JSON.stringify($res1);
        

    });//end ajax 
    
    return false;
});*/
 //end fun

 $('#submitForm').click(function(){
    $('#submitForm_spinner').show();
    $('#submitForm_spinner_text').show();
    $('#submitForm_text').hide();


    // Hide CSV Download button
    $('#csvDownloadDiv').removeClass('d-block');
    $('#csvDownloadDiv').addClass('d-none');
    
    $user_type = $('#user_type').val();  
    $user_id = $('#user_id').val();   
    $month_date = $('#month_date').val();  

    console.log('month_date: ' + $month_date); 
    $service_id = $('#service_id').val();
    $servicesPhoto = localStorage.getItem('image');

    $.ajax({
        method: "POST",
        url: "attendance/function.php",
        data: { fn: "getAttendance", user_type: $user_type, user_id: $user_id, month_date: $month_date }
    })
    .done(function( res ) {
        //console.log(res);
        $res1 = JSON.parse(res);
        if($res1.status == true){            
            //Populate attendance list
            $atten_data = $res1.atten_data;
            $atten_id = $res1.atten_id;
            $('#atten_id').val($atten_id);
            
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
                            $attendance_ui += '<option value="">Present/Absent/Leave</option>'; 
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
                            if($pre_abs_lev == '2'){
                                $attendance_ui += '<option value="3" selected>Leave</option>'; 
                            }else{
                                $attendance_ui += '<option value="3">Leave</option>'; 
                            }
                        $attendance_ui += '</select>';
                    $attendance_ui += '</div>';
                    $attendance_ui += '<div class="col-md-6 mb-2">';
                        $attendance_ui += '<input class="form-control form-control-sm" placeholder="Note" type="text" id="atten_note_'+$slno+'" name="atten_note_'+$slno+'" value="'+$atten_note+'" onblur="updateAttendance('+$slno+')">';
                    $attendance_ui += '</div>';
                }//end for
                $('#attendance_ui').html($attendance_ui);

                // Active CSV Download button
                $('#csvDownloadDiv').removeClass('d-none');
                $('#csvDownloadDiv').addClass('d-block');

            }//end if attendance

        }
    });//end ajax 
})

$('#csvDownload').on('click', function(){
    $atten_id = $('#atten_id').val();
    window.open("./attendance/attendance_csv.php?atten_id="+$atten_id, "_blank");
})

// Update Attendance
function updateAttendance(slno){
    console.log('slno:: ' + slno)

    $pre_abs_lev = $('#pre_abs_lev_'+slno).val();
    $atten_note = $('#atten_note_'+slno).val(); 
    $user_id = $('#user_id').val();   
    $month_date = $('#month_date').val();     
    $atten_id = $('#atten_id').val(); 
    
    $.ajax({
        method: "POST",
        url: "attendance/function.php",
        data: { fn: "updateAttendance", serial_no: slno, pre_abs_lev: $pre_abs_lev, atten_note: $atten_note, user_id: $user_id, month_date: $month_date, atten_id: $atten_id }
    })
    .done(function( res ) {
        $res1 = JSON.parse(res); 
        if($res1.status == true){ 
            $atten_id = $res1.atten_id;  
            $('#atten_id').val($atten_id);
            $('#orgFormAlert1').css("display", "block");
            $('.toast-right').toast('show');
        }        
    });//end ajax

}//end if


//Category 
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


// State
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
    //populateDataTable();
    configureUserTypeDd();
});
