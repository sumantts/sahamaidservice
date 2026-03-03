
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
    setTimeout(function(){
            //$current_tab = 'admin';
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



