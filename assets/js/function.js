
//alert('ok');
$('#sendMessage').click(function(){
    console.log('function connected...');
    $('#quote_error_msg').html('');
    $('#quote_error_msg').hide();  
    $('.sent-message').hide();  

    $name = $('#your_name').val();
    $phone_number = $('#phone_number').val();
    $email = $('#email_id').val();
    $address = $('#address').val();
    $message = $('#message').val();
    console.log('name: '+$name)
    if($name == ''){
        $('#your_name').focus();
        $msg = 'Please enter your name';
        $('#quote_error_msg').html($msg);
        $('#quote_error_msg').show();
    }else if($phone_number == ''){
        $('#phone_number').focus();
        $msg = 'Please enter phone number';
        $('#quote_error_msg').html($msg);
        $('#quote_error_msg').show();
    }else if($address == ''){
        $('#address').focus();
        $msg = 'Please enter address';
        $('#quote_error_msg').html($msg);
        $('#quote_error_msg').show();
    }else if($message == ''){
        $('#message').focus();
        $msg = 'Please write message';
        $('#quote_error_msg').html($msg);
        $('#quote_error_msg').show();
    }else{
        $('.loading').show();
        console.log('call ajax function');
        $quote_details = {
            name: $name,
            phone_number: $phone_number,
            email: $email,
            address: $address,
            message: $message
        }
        console.log($quote_details)
        console.log(JSON.stringify($quote_details))

        $.ajax({
            method: "POST",
            url: "assets/php/function.php",
            data: { fn: "saveQuote", quote_details: $quote_details }
        })
        .done(function( res ) {
            console.log(res);
            $res1 = JSON.parse(res);

            if($res1.status == true){
                $('.loading').hide();
                console.log('after save do Success steps');
                $('#your_name').val('');
                $('#phone_number').val('');
                $('#email_id').val('');
                $('#address').val('');
                $('#message').val('');
                $('.sent-message').show();
            }else{
                console.log('after save do Failed steps');
            }
        });//end ajax

    }
});

$('#sendReview').click(function(){
    console.log('function connected...');
    $('#quote_error_msg1').html('');
    $('#quote_error_msg1').hide();  
    $('.sent-message').hide();  

    $name = $('#name').val();
    $email = $('#email').val();
    $address = $('#address').val();
    $message = $('#message').val();
    
    if($name == ''){
        $('#name').focus();
        $msg = 'Please enter your name';
        $('#quote_error_msg1').html($msg);
        $('#quote_error_msg1').show();
    }else if($email == ''){
        $('#email').focus();
        $msg = 'Please enter email id';
        $('#quote_error_msg1').html($msg);
        $('#quote_error_msg1').show();
    }else if($address == ''){
        $('#address').focus();
        $msg = 'Please enter address';
        $('#quote_error_msg1').html($msg);
        $('#quote_error_msg1').show();
    }else if($message == ''){
        $('#message').focus();
        $msg = 'Please write message';
        $('#quote_error_msg1').html($msg);
        $('#quote_error_msg1').show();
    }else{
        $('.loading').show();
        console.log('call ajax function');
        $review_details = {
            name: $name,
            email: $email,
            address: $address,
            message: $message
        }
        console.log($review_details)
        console.log(JSON.stringify($review_details))

        $.ajax({
            method: "POST",
            url: "assets/php/function.php",
            data: { fn: "saveReview", review_details: $review_details }
        })
        .done(function( res ) {
            console.log(res);
            $res1 = JSON.parse(res);

            if($res1.status == true){
                $('.loading').hide();
                console.log('after save do Success steps');
                $('#name').val('');
                $('#email').val('');
                $('#address').val('');
                $('#message').val('');
                $('.sent-message').show();
            }else{
                console.log('after save do Failed steps');
            }
        });//end ajax

    }
});