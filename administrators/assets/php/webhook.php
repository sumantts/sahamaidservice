<?php
    include('sql_conn.php');
    
    // 2. RECEIVING INBOUND MESSAGES (Executed whenever a user messages your number)
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $message_text = '';
        $response_msg = '';

        // Read the raw JSON payload from the incoming request
        $raw_input = file_get_contents('php://input');
        $data = json_decode($raw_input, true);
    
        // Optional: Log the payload for debugging/inspection
        file_put_contents('webhook_log.txt', $raw_input . PHP_EOL, FILE_APPEND);
    
        // Extract message data safely from Meta's payload structure
        if (isset($data['entry'][0]['changes'][0]['value']['messages'][0])) {
            $message_obj = $data['entry'][0]['changes'][0]['value']['messages'][0];
            
            $from_number = $message_obj['from']; // User's WhatsApp ID/Phone Number
            $message_id = $message_obj['id'];   // Unique message ID (use for Idempotency checking)
            $timestamp = $message_obj['timestamp'];
            $type = $message_obj['type'];        // text, image, document, etc.
    
            // Handle text messages
            if ($type === 'text') {
                $message_text = $message_obj['text']['body'];
            }
            
            # Initialize Variables
            $id = 0;
            $user_id = 0;
            $full_name = '';
            $email_id = '';
            $context_data = new stdClass();

            # check the number is exists or not
            $find_sql2 = "SELECT * FROM whatsapp_context WHERE phone_number = '" . $from_number . "'";
            $result2 = mysqli_query($conn, $find_sql2);

            if(mysqli_num_rows($result2) > 0){
                // Number exists, update context
                $row2 = mysqli_fetch_array($result2);
                $id = $row2['id'];
                $user_id = $row2['user_id'];
                $full_name = $row2['full_name'];
                $temp_data = $row2['temp_data'];
                if($row2['context_data'] != ''){
                    $context_data = json_decode($row2['context_data']);
                }
            }

            
            $find_sql = "SELECT * FROM user_details WHERE phone_number = '" . $from_number . "'";
            $result = mysqli_query($conn, $find_sql);

            if(mysqli_num_rows($result) > 0){
                // Number exists, update context
                $row = mysqli_fetch_array($result);
                $user_id = $row['user_id'];
                $full_name = $row['full_name'];
                $email_id = $row['email_id'];
            }
            
            if($id == 0){
                # Create context data for new user
                $context_data->user_id = $user_id;
                $context_data->full_name = $full_name;
                $context_data->phone_number = $from_number;
                $context_data->email_id = $email_id;
                $context_data->first_message = '';
                $context_data->area_location_id = ''; // Location ID
                $context_data->area_location_name = '';
                $context_data->area_location_page_no = '';
                $context_data->building_id = ''; //Building ID
                $context_data->building_name = '';
                $context_data->building_name_page_no = '';
                $context_data->service_id = ''; //Service ID
                $context_data->service_name = '';
                $context_data->service_name_page_no = '';
                $context_data->service_rate_per_hour = '';
                $context_data->booking_date_f = ''; //Booking Date
                $context_data->booking_date_t = '';
                $context_data->from_time = '';
                $context_data->to_time = '';
                $context_data->confirm_time = '';
                $context_data->total_hours = '';
                $context_data->total_amount = '';
                $context_data->bill_type = ''; // 1=gst 2=nonGST
                $context_data->cgst_percent = '';
                $context_data->cgst_amount = '';
                $context_data->sgst_percent = '';
                $context_data->sgst_amount = '';
                $context_data->total_amount_with_tax = '';
                $context_data->amount_paid = '';
                $context_data->worker_id = '';
                $context_data->worker_name = '';
                $context_data->worker_mobile = '';
                $context_data->bill_status = '';
                $context_data->bill_status_name = '';
                $context_data->order_placed_date = '';
                $context_data->order_placed_time = '';
                $context_data->order_channel_name = '';
                $context_data->paid_date = '';
                $context_data->payment_mode = '';
                $context_data->transaction_id = '';
                $context_data->review_comment = '';
                $context_data->rating_number = '';
            }//end context if
            
            # Receive Form Input
            $booking_date_invalid = false;
            $from_time_invalid = false;
            if($context_data->first_message == ''){
                $context_data->first_message = $message_text;
            }else if($context_data->full_name == ''){
                $context_data->full_name = $message_text;
            }else if($context_data->area_location_id == ''){
                $context_data->area_location_id = $message_text;
            }else if($context_data->building_id == ''){
                $context_data->building_id = $message_text;
            }else if($context_data->service_id == ''){
                $context_data->service_id = $message_text;
            }else if($context_data->booking_date_f == ''){
                $booking_date_input = trim($message_text);
                if(preg_match('/^\d{2}\/\d{2}\/\d{4}$/', $booking_date_input) === 1){
                    $date_parts = explode('/', $booking_date_input);
                    if(checkdate((int)$date_parts[1], (int)$date_parts[0], (int)$date_parts[2])){
                        $context_data->booking_date_f = $booking_date_input;
                    }else{
                        $booking_date_invalid = true;
                    }
                }else{
                    $booking_date_invalid = $booking_date_input != '';
                }
            }else if($context_data->from_time == ''){
                $from_time_input = trim($message_text);
                if(preg_match('/^(?:[01]\d|2[0-3]):[0-5]\d$/', $from_time_input) === 1){
                    $context_data->from_time = $from_time_input;
                }else{
                    $from_time_invalid = $from_time_input != '';
                }
            }else if($context_data->booking_date_t == ''){
                $booking_date_input = trim($message_text);
                if(preg_match('/^\d{2}\/\d{2}\/\d{4}$/', $booking_date_input) === 1){
                    $date_parts = explode('/', $booking_date_input);
                    if(checkdate((int)$date_parts[1], (int)$date_parts[0], (int)$date_parts[2])){
                        $context_data->booking_date_t = $booking_date_input;
                    }else{
                        $booking_date_invalid = true;
                    }
                }else{
                    $booking_date_invalid = $booking_date_input != '';
                }
            }else if($context_data->to_time == ''){
                $to_time_input = trim($message_text);
                if(preg_match('/^(?:[01]\d|2[0-3]):[0-5]\d$/', $to_time_input) === 1){
                    $context_data->to_time = $to_time_input;
                }else{
                    $to_time_invalid = $to_time_input != '';
                }
            }else if($context_data->confirm_time == ''){
                if($message_text == '1'){
                    $context_data->confirm_time = '1';
                }else if($message_text == '0'){
                    $context_data->booking_date_f = '';
                    $context_data->from_time = '';
                    $context_data->booking_date_t = '';
                    $context_data->to_time = '';
                }else{
                    $response_msg .= 'Invalid input. Please enter 1 to proceed or 0 to re-enter the start and end date/time.';
                }
            }else{}

            ## Check Form Validation and show message
            if($context_data->full_name == ''){
                $response_msg .= 'Please enter your name';
            }else if($context_data->area_location_id == ''){
                $response_msg .= 'Please enter your area location';
            }else if($context_data->building_id == ''){
                $response_msg .= 'Please enter your building name';
            }else if($context_data->service_id == ''){
                $response_msg .= 'Please enter your service name';
            }else if($context_data->booking_date_f == ''){
                if($booking_date_invalid){
                    $response_msg .= 'Invalid date. Please enter a valid date in DD/MM/YYYY format.';
                }else{
                    $response_msg .= 'Please enter Start Date you want to get this  quick service. Please enter the date in DD/MM/YYYY format. Enter \'Exit\' to terminate this session.';
                }
            }else if($context_data->from_time == ''){
                if($from_time_invalid){
                    $response_msg .= 'Invalid time. Please enter the start time in 24-hour HH:MM format, from 00:00 to 23:59.';
                }else{
                    $response_msg .= 'Please enter the start time in 24 Hrs time format. Example: If you want to get the service from 07:30 AM then enter the start time as 07:30 or if you want to get the service at 07:30 PM then enter 19:30. Enter \'Exit\' to terminate this session.';
                }
            }else if($context_data->booking_date_t == ''){
                if($booking_date_invalid){
                    $response_msg .= 'Invalid date. Please enter a valid date in DD/MM/YYYY format.';
                }else{
                    $response_msg .= 'Please enter the End Date of this Quick Service. Please enter the date in DD/MM/YYYY format. Enter \'Exit\' to terminate this session.';
                }
            }else if($context_data->to_time == ''){
                if($to_time_invalid){
                    $response_msg .= 'Invalid time. Please enter the end time in 24-hour HH:MM format, from 00:00 to 23:59.';
                }else{
                    $response_msg .= 'Please enter the end time in 24 Hrs time format. Example: If you want to get the service until 07:30 AM then enter the end time as 07:30 or if you want to get the service until 07:30 PM then enter 19:30. Enter \'Exit\' to terminate this session.';
                }
            }else if($context_data->confirm_time == ''){
                $response_msg .= 'Your Service start and date time is as followes: From '.date('d/m/Y', strtotime($context_data->booking_date_f)).' '.date('h:m A', strtotime($context_data->from_time)).' to '.date('d/m/Y', strtotime($context_data->booking_date_t)).' '.date('h:m A', strtotime($context_data->to_time)).'. Please enter 1 to proceed to next step. Enter 0 to re enter the start date time and end date time. Enter \'Exit\' to terminate this session.';
            }else{}


            ### Call API as per needs

            
        }//end message object check
    
        // Always reply with a 200 OK status immediately to acknowledge receipt to Meta
        http_response_code(200);
        echo $response_msg;
        
    }

    
?>