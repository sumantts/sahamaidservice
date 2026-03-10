
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

$('#myForm').on('submit', function(){
    console.log('Validated..'); 
    /***
    $serial_no = $('#serial_no').val(); 
    $parent_c_id = $('#parent_c_id').val();  
    $category_name = $('#category_name').val();  

    
    $nature = $('#nature').val();  
    $part_of_plbs = $('#part_of_plbs').val();  
    $opening_balance = $('#opening_balance').val();  

    $('#message_text').html('');
    $('#message_text').removeClass('d-block');
    $('#message_text').addClass('d-none');

    $.ajax({
        type: "POST",
        url: "category/function.php",
        dataType: "json",
        data: { fn: "saveFormData", serial_no: $serial_no, category_name: $category_name, parent_c_id: $parent_c_id, nature: $nature, part_of_plbs: $part_of_plbs, opening_balance: $opening_balance }
    })
    .done(function( res ) {
        //$res1 = JSON.parse(res);
        if(res.status == true){    
            $('#serial_no').val('');
            $('#myForm').trigger('reset');
            $('#theme-settings-offcanvas').offcanvas('hide'); 
            populateDataTable();
            configureParentCategoryDd();
        } 
        //alert(res.error_message);
        $('#message_text').html(res.error_message);
        $('#message_text').removeClass('d-none');
        $('#message_text').addClass('d-block');
    });//end ajax 
    *****/
    return false;
}) //end fun

$('#cancelForm').on('click', function(){
    $('#myForm').trigger('reset');
    populateDataTable(); 
})

/******
function validateForm(){
    $firstName = $('#firstName').val().replace(/^\s+|\s+$/gm,'');
    $lastName = $('#lastName').val().replace(/^\s+|\s+$/gm,'');
    $status = true;

    if($firstName == ''){
        $status = false;
        $('#firstName').removeClass('is-valid');
        $('#firstName').addClass('is-invalid');
    }else{
        $status = true;
        $('#firstName').removeClass('is-invalid');
        $('#firstName').addClass('is-valid');
    }

    if($lastName == ''){
        $status = false;
        $('#lastName').removeClass('is-valid');
        $('#lastName').addClass('is-invalid');
    }else{
        $status = true;
        $('#lastName').removeClass('is-invalid');
        $('#lastName').addClass('is-valid');
    }

    console.log('firstName: '+$firstName);

    $('#submitForm_spinner').hide();
    $('#submitForm_spinner_text').hide();
    $('#submitForm_text').show();

    return $status;
}//en validate form

function clearForm(){
    $('#firstName').val('');
    $('#firstName').removeClass('is-valid');
    $('#firstName').removeClass('is-invalid');

    $('#lastName').val('');
    $('#lastName').removeClass('is-valid');
    $('#lastName').removeClass('is-invalid');

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
                url: "users/function.php",
                data: { fn: "saveOrganisation", firstName: $firstName }
            })
            .done(function( res ) {
                console.log(res);
                $res1 = JSON.parse(res);
                if($res1.status == true){
                    $('#orgFormAlert').css("display", "block");
                    $('.toast-right').toast('show');
                    //$('#liveToast').toast('show');
                    clearForm();
                }else{
                    
                }
            });//end ajax
        }

    }, 500)    
})
*****/

$('#addNewBtn').on('click', function(){
    console.log('opening with modal: ' + $current_tab);
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
        }

    });
});



