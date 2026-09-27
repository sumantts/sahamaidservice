 

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
        url: "service_rate_chart/function.php",
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

    // Hide Pay Slip Download button
    $('#paySlipDownloadDiv').removeClass('d-block');
    $('#paySlipDownloadDiv').addClass('d-none'); 

    $('#rate_chart_ui_div').removeClass('d-none');
    $('#rate_chart_ui_div').addClass('d-block');

    $qs_id = $('#qs_id').val();
    $sa_id = $('#sa_id').val(); 

    $.ajax({
        method: "POST",
        url: "service_rate_chart/function.php",
        data: { fn: "getRateChartData", qs_id: $qs_id, sa_id: $sa_id }
    })
    .done(function( res ) {
        //console.log(res);
        $res1 = JSON.parse(res);
        var $tableBody = $('#rate_chart_table tbody').empty();
        if($res1.status == true){            
            //Populate list
            $services = $res1.services;
            
            
            if($services.length > 0){
                for($i = 0; $i < $services.length; $i++){
                    $sa_id_child = $services[$i].sa_id_child;
                    $building_name = $services[$i].building_name;
                    $rate_first_value = $services[$i].rate_first_value;
                    $rate_normal_value = $services[$i].rate_normal_value;

                    var service = $services[$i];
                    var $row = $('<tr>');
                    $('<th>', { scope: 'row', text: $i + 1 }).appendTo($row);
                    var $buildingCell = $('<td>').text($building_name);
                    $('<input>', {
                        type: 'hidden',
                        id: 'sa_id_child_' + $sa_id_child,
                        name: 'sa_id_child[]',
                        value: $sa_id_child
                    }).appendTo($buildingCell);
                    $buildingCell.appendTo($row);
                    
                    $('<td>').append($('<input>', {
                        type: 'text',
                        class: 'form-control form-control-sm',
                        id: 'rate_first_' + $sa_id_child,
                        value: $rate_first_value
                    })).appendTo($row);

                    $('<td>').append($('<input>', {
                        type: 'text',
                        class: 'form-control form-control-sm',
                        id: 'rate_normal_' + $sa_id_child,
                        value: $rate_normal_value
                    })).appendTo($row);
                    $tableBody.append($row);
                }//end for

                // Active CSV Download button
                /*$('#csvDownloadDiv').removeClass('d-none');
                $('#csvDownloadDiv').addClass('d-block');*/

                // Active Pay Slip Download button
                /*$('#paySlipDownloadDiv').removeClass('d-none');
                $('#paySlipDownloadDiv').addClass('d-block');*/

            }//end if attendance

        }
    });//end ajax 
})

$('#csvDownload').on('click', function(){
    $atten_id = $('#atten_id').val();
    window.open("./attendance/attendance_csv.php?atten_id="+$atten_id, "_blank");
})

$('#paySlipDownload').on('click', function(){
    $atten_id = $('#atten_id').val();
    window.open("./attendance/pay_slip.php?atten_id="+$atten_id, "_blank");
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
        url: "service_rate_chart/function.php",
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


// Quick Services 
function configureQuickServicesDd(){
    $.ajax({
        method: "POST",
        url: "service_rate_chart/function.php",
        data: { fn: "configureQuickServicesDd" }
    })
    .done(function( res ) {
        $res1 = JSON.parse(res); 
        if($res1.status == true){
            $rows = $res1.data;

            if($rows.length > 0){
                $('#qs_id').html('');
                $html = "<option value=''>Select</option>";
                for($i = 0; $i < $rows.length; $i++){ 
                    $html += "<option value='"+$rows[$i].id+"'>"+$rows[$i].name+"</option>";   
                                    
                }//end for                
                $('#qs_id').html($html);
            }else{
                $('#qs_id').html('');
                $html = "<option value=''>Select</option>";
                $('#qs_id').html($html);
            }//end if
        }        
    });//end ajax
}//end 

// service area 
function configureServiceAreaDd(){
    $.ajax({
        method: "POST",
        url: "service_rate_chart/function.php",
        data: { fn: "configureServiceAreaDd" }
    })
    .done(function( res ) {
        $res1 = JSON.parse(res); 
        if($res1.status == true){
            $rows = $res1.data;

            if($rows.length > 0){
                $('#sa_id').html('');
                $html = "<option value=''>Select</option>";
                for($i = 0; $i < $rows.length; $i++){ 
                    $html += "<option value='"+$rows[$i].id+"'>"+$rows[$i].name+"</option>";   
                                    
                }//end for                
                $('#sa_id').html($html);
            }else{
                $('#sa_id').html('');
                $html = "<option value=''>Select</option>";
                $('#sa_id').html($html);
            }//end if
        }        
    });//end ajax
}//end 
 


// User
function configureUsersDd(){
    $user_type = $('#user_type').val();
    if(parseInt($user_type) > 0){
        $.ajax({
            method: "POST",
            url: "service_rate_chart/function.php",
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



$('#sa_id').on('change', function () {
    var selectedValue = parseInt($(this).val(), 10);
    var selectedText = $(this).find('option:selected').text().trim();
    var showRateFields = selectedText === 'All' && selectedValue > 0;
    var showSubmitButton = selectedText !== 'All' && selectedValue > 0;

    $('#all_over_rate_first_div, #all_over_rate_normal_div, #saveRate')
        .toggleClass('d-none', !showRateFields);
    $('#submitForm').first().toggleClass('d-none', !showSubmitButton);

    if (selectedText === 'Select' || selectedText === 'All') {
        $('#rate_chart_ui_div').removeClass('d-block').addClass('d-none');
    }
});

saveMultipleRate

// Save Multiple Rate
$('#saveMultipleRate').on('click', function () {
    var sa_id_child_values = [];
    var rate_first_values = [];
    var rate_normal_values = [];
    
});

$(document).ready(function () {
    //populateDataTable();
    configureQuickServicesDd();
    configureServiceAreaDd();
});
