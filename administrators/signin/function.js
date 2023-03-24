$('#Signin').click(function(){
    $('#signin_spinner').show();
    $('#signin_spinner_text').show();
    $('#signin_text').hide();
    

    setTimeout(function(){
        //$('.toast-5s').toast('show')

        $.ajax({
            method: "POST",
            url: "signin/function.php",
            data: { fn: "doLogin", username: '1', password: '1' }
        })
        .done(function( res ) {
            console.log(res);
            $res1 = JSON.parse(res);
            if($res1.status == true){
                if(parseInt($res1.UsrId) > 0){
                $('#signin_spinner').hide();
                $('#signin_spinner_text').hide();
                $('#signin_text').show();
                window.location.href = '?p=dashboard';

                //var url_string1 = localStorage.getItem("last_stay");
                //if(url_string1 != null){
                    //window.location.href = url_string1;
                //}else{						
                    // window.location.href = '?p=dashboard';
                //}
                }else{
                    //alert($res1.message);
                    //$('#error_text').html('Wrong username or password');
                }
            }else{
                //alert($res1.message);
                //$('#error_text').html('Wrong username or password');
            }
        });//end ajax

        //window.location = '?p=dashboard';
    }, 2500)
    
})

//Loading screen
$body = $("body");
$(document).on({
    ajaxStart: function() { $body.addClass("loading"); },
    ajaxStop: function() { $body.removeClass("loading"); }    
});