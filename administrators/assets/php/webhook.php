<?php
    # Include Database Connection
    require_once __DIR__ . '/sql_conn.php';
    
    function sendWhatsAppMessage($to, $template_name, $parameters){
        $api_username = '1350182688181368';
        $apikey = '20fb1863-c6e8-11f1-afb3-02c8a5e042bd';

        $params = array();
        if(sizeof($parameters) > 0){
            for($i = 0; $i < sizeof($parameters); $i++){
                $text = (string) $parameters[$i];
                //echo 'text: '. $text;

                $param_obj = new stdClass();
                $param_obj->type = 'text';
                $param_obj->text = $text;

                array_push($params, $param_obj);
            }
        }//end if
        $params_en = json_encode($params);

        $post_fields = '{
            "messaging_product": "whatsapp",
            "recipient_type": "individual",
            "to": "'.$to.'",
            "type": "template",
            "template": {
                "language": {
                    "code": "en"
                },
                "name": "'.$template_name.'",
                "components": [
                    {
                        "type": "body",
                        "parameters": '.$params_en.'
                    }
                ]
            }
        }';

        //echo 'post_fields: '.$post_fields;


        $curl = curl_init();
    
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://partnersv1.pinbot.ai/v3/'.$api_username.'/messages',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => $post_fields,
        CURLOPT_HTTPHEADER => array(
            'apikey: '.$apikey,
            'Content-Type: application/json'
        ),
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);
        return $response;
    }//end if

    $sl_array = ["0️⃣", "1️⃣", "2️⃣", "3️⃣", "4️⃣", "5️⃣", "6️⃣", "7️⃣", "8️⃣", "9️⃣", "🔟", "1️⃣1️⃣", "1️⃣2️⃣", "1️⃣3️⃣", "1️⃣4️⃣", "1️⃣5️⃣", "1️⃣6️⃣", "1️⃣7️⃣", "1️⃣8️⃣", "1️⃣9️⃣", "2️⃣0️⃣", "2️⃣1️⃣", "2️⃣2️⃣", "2️⃣3️⃣", "2️⃣4️⃣", "2️⃣5️⃣", "2️⃣6️⃣", "2️⃣7️⃣", "2️⃣8️⃣", "2️⃣9️⃣", "3️⃣0️⃣"];

    // 2. RECEIVING INBOUND MESSAGES (Executed whenever a user messages your number)
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $message_text = '';
        $response_msg = '';
        $whatsapp_response = '';
        $parameters = array(); // For WhatsApp
        $call_api = false;

        // Read the raw JSON payload from the incoming request
        $raw_input = file_get_contents('php://input');
        $data = json_decode($raw_input, true);
    
        // Optional: Log the payload for debugging/inspection
        //file_put_contents('webhook_log.txt', $raw_input . PHP_EOL, FILE_APPEND);
    
        // Extract message data safely from Meta's payload structure
        if (isset($data['entry'][0]['changes'][0]['value']['messages'][0])) {
            $message_obj = $data['entry'][0]['changes'][0]['value']['messages'][0];
            
            $from_number = $message_obj['from']; // User's WhatsApp ID/Phone Number
            $to = '+'.$from_number;
            $phone_number = substr((string) $from_number, 2);
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
            $result2 = mysqli_query($con, $find_sql2);

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

            
            $find_sql = "SELECT * FROM user_details WHERE phone_number = '" . $phone_number . "'";
            $result = mysqli_query($con, $find_sql);

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
                $context_data->phone_number = $phone_number;
                $context_data->email_id = $email_id;
                $context_data->first_message = '';
                $context_data->area_location_id = ''; // Location ID
                $context_data->area_location_name = '';
                $context_data->area_location_page_no = '';
                $context_data->area_location_slno = '';
                $context_data->building_id = ''; //Building ID
                $context_data->building_name = '';
                $context_data->building_name_page_no = '';
                $context_data->building_slno = ''; 
                $context_data->service_id = ''; //Service ID
                $context_data->service_name = '';
                $context_data->service_name_page_no = ''; 
                $context_data->service_slno = '';
                $context_data->service_rate_per_hour = '';
                $context_data->booking_date_f = ''; //Booking Date
                $context_data->booking_date_t = '';
                $context_data->from_time = '';
                $context_data->to_time = '';
                $context_data->confirm_time = '';
                $context_data->total_hours = '';
                $context_data->total_amount = '';
                $context_data->bill_type = '1'; // 1=gst 2=nonGST
                $context_data->cgst_percent = '9';
                $context_data->cgst_amount = '';
                $context_data->sgst_percent = '9';
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
                $context_data->order_channel_name = 'whatsapp';
                $context_data->paid_date = '';
                $context_data->payment_mode = 'whatsapp payment';
                $context_data->transaction_id = '';
                $context_data->review_comment = '';
                $context_data->rating_number = '';
                $context_data->area_locations = array();
                $context_data->buildings = array();
                $context_data->services = array();
                $context_data->available_workers = array();
                $context_data->proceed_to_pay = '';
                $context_data->booking_id = '';
            }//end context if

            # Exit Comment
            $do_exit = false;
            if(strtolower($message_text) == 'exit'){
                $do_exit = true;
                $response_msg .= 'Your session has been terminated. Thank you for using our service.';
                $context_data = new stdClass(); // Reset context data 
                
                $update_sql = "DELETE FROM whatsapp_context WHERE phone_number = '" . $from_number . "'";
                mysqli_query($con, $update_sql);

                # WhatsApp
                $template_name = 'exit_message';
                $parameters = array();
                $whatsapp_response = sendWhatsAppMessage($to, $template_name, $parameters);
            }//end if
            
            if($do_exit == false){
                # Receive Form Input
                $booking_date_invalid = false;
                $from_time_invalid = false;
                $to_time_invalid = false;

                if($context_data->first_message == ''){
                    if(strtolower($message_text) == 'exit'){
                        $response_msg .= 'Your session has been terminated. Thank you for using our service.';
                        $context_data = new stdClass(); // Reset context data
                        $update_sql = "DELETE FROM whatsapp_context WHERE phone_number = '" . $from_number . "'";
                        mysqli_query($con, $update_sql);

                        # WhatsApp
                        $template_name = 'exit_message';
                        $parameters = array();
                        $whatsapp_response = sendWhatsAppMessage($to, $template_name, $parameters);
                    }else{
                        $context_data->first_message = $message_text;
                        if($context_data->full_name == ''){
                            $response_msg .= 'Hi, Welcome to our Saha Enterprise - Quick Service Booking. Please enter your name. Enter \'Exit\' to terminate this session.'. "\n";
                            
                            # WhatsApp
                            $template_name = 'welcome_without_name';
                            $parameters = array();
                            $whatsapp_response = sendWhatsAppMessage($to, $template_name, $parameters);
                        }else{
                            $response_msg .= 'Hi, '.$context_data->full_name.', Welcome to our Saha Enterprise - Quick Service Booking. Enter \'Exit\' to terminate this session.'."\n";

                            # WhatsApp
                            $template_name = 'welcome_with_name';
                            $parameters = array();
                            array_push($parameters, $context_data->full_name);
                            $whatsapp_response = sendWhatsAppMessage($to, $template_name, $parameters);
                        }
                    }
                }else if($context_data->full_name == ''){
                    $context_data->full_name = $message_text;

                    # If new then insert the user details in the database
                    if($user_id == 0){
                        $full_name = $context_data->full_name;
                        $username = str_replace(' ', '', strtolower($context_data->full_name));
                        $password = bin2hex(random_bytes(4)); // Generate a random password
                        $email_id = $username . '@sahaenterprise.in'; // Create a dummy email
                        $user_type = '4'; // Set user type as customer
                        $phone_number = substr((string)$context_data->phone_number, 2);

                        $insert_sql = "INSERT INTO user_details (user_type, full_name, email_id, phone_number) VALUES ('" . $user_type . "', '" . $full_name . "', '" . $email_id . "', '" . $phone_number . "')";
                        mysqli_query($con, $insert_sql);
                        $user_id = mysqli_insert_id($con);
                        $context_data->user_id = $user_id;

                        $context_data->available_workers = array();
                        $update_sql = "UPDATE whatsapp_context SET user_id = '" . $user_id . "',  full_name = '" . $full_name . "' WHERE id = '" . $id . "'";
                        mysqli_query($con, $update_sql);

                        $response_msg .= 'Thank you, ' . $context_data->full_name . '. Your details have been saved.';
                    }
                }else if($context_data->area_location_id == ''){
                    if(!is_numeric($message_text)){
                        $response_msg .= 'Invalid input. Please enter a valid serial number corresponding to your preferred area location.';

                        # WhatsApp
                        $template_name = 'invalid_area_location_id';
                        $parameters = array();
                        $whatsapp_response = sendWhatsAppMessage($to, $template_name, $parameters);
                    }else{
                        $area_locations = $context_data->area_locations;
                        $area_location_index = (int)$message_text - 1; // Convert to zero-based index
                        if($area_location_index >= 0 && $area_location_index < count($area_locations)){
                            $selected_area = $area_locations[$area_location_index];
                            $context_data->area_location_slno = $area_location_index + 1; // Store the serial number (1-based index)
                            $context_data->area_location_id = $selected_area->sa_id;
                            $context_data->area_location_name = $selected_area->area_location;
                            $response_msg .= 'Your selected area location has been successfully set to: ' . $selected_area->area_location . '.';

                            # WhatsApp
                            /*$template_name = 'valid_area_location_id';
                            $parameters = array();
                            $param1 = $selected_area->area_location;
                            array_push($parameters, $param1);
                            $whatsapp_response = sendWhatsAppMessage($to, $template_name, $parameters);*/

                        }else{
                            $response_msg .= 'Invalid input. Please enter a valid serial number corresponding to your preferred area location.';

                            # WhatsApp
                            $template_name = 'invalid_area_location_id';
                            $parameters = array();
                            $whatsapp_response = sendWhatsAppMessage($to, $template_name, $parameters);
                        }
                    }
                }else if($context_data->building_id == ''){
                    if(!is_numeric($message_text)){
                        $response_msg .= 'Invalid input. Please enter a valid serial number for your building.';
                        
                        # WhatsApp
                        $template_name = 'invalid_building_id';
                        $parameters = array();
                        $whatsapp_response = sendWhatsAppMessage($to, $template_name, $parameters);
                    }else{
                        $buildings = $context_data->buildings;
                        $building_index = (int)$message_text - 1; // Convert to zero-based index
                        if($building_index >= 0 && $building_index < count($buildings)){
                            $selected_building = $buildings[$building_index];
                            $context_data->building_id = $selected_building->sa_id;
                            $context_data->building_name = $selected_building->building_name;
                            $context_data->building_slno = $building_index + 1; // Store the serial number (1-based index)
                            $response_msg .= 'Your selected building has been successfully set to: ' . $selected_building->building_name . '.';

                            # WhatsApp
                            /*$template_name = 'valid_building_id';
                            $parameters = array();
                            $param1 = $selected_building->building_name;
                            array_push($parameters, $param1);
                            $whatsapp_response = sendWhatsAppMessage($to, $template_name, $parameters);*/

                        }else{
                            $response_msg .= 'Invalid input. Please enter a valid serial number for your building.';
                        
                            # WhatsApp
                            $template_name = 'invalid_building_id';
                            $parameters = array();
                            $whatsapp_response = sendWhatsAppMessage($to, $template_name, $parameters);
                        }
                    }
                }else if($context_data->service_id == ''){
                    $services = $context_data->services;
                    $service_index = (int)$message_text - 1; // Convert to zero-based index
                    if($service_index >= 0 && $service_index < count($services)){
                        #check first time or not
                        $first_order = true;
                        $select_sql = "SELECT * FROM schedule_log WHERE client_mobile = '" .$phone_number. "' ";
                        $result2 = mysqli_query($con, $select_sql);
                        if(mysqli_num_rows($result2) > 0){ 
                            $first_order = false;
                        }

                        $selected_service = $services[$service_index];
                        $context_data->service_id = $selected_service->src_id;
                        $context_data->service_name = $selected_service->service_name;
                        $context_data->service_slno = $service_index + 1; // Store the serial number (1-based index)

                        if($first_order == true){
                            $context_data->service_rate_per_hour = $selected_service->rate_first;
                        }else{
                            $context_data->service_rate_per_hour = $selected_service->rate_normal;
                        }
                        $response_msg .= 'Service has been set to: ' . $selected_service->service_name . '.';

                        # WhatsApp
                        /*$template_name = 'valid_service_id';
                        $parameters = array();
                        $param1 = $selected_service->service_name;
                        array_push($parameters, $param1);
                        $whatsapp_response = sendWhatsAppMessage($to, $template_name, $parameters);*/

                    }else{
                        $response_msg .= 'Invalid input. Please enter a valid serial number for your service.';
                        
                        # WhatsApp
                        $template_name = 'invalid_service_id';
                        $parameters = array();
                        $whatsapp_response = sendWhatsAppMessage($to, $template_name, $parameters);
                    }
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
                        $context_data->confirm_time = $message_text;
                        $from_date = date('Y-m-d', strtotime(str_replace('/', '-', $context_data->booking_date_f)));
                        $to_date = date('Y-m-d', strtotime(str_replace('/', '-', $context_data->booking_date_t)));
                        $from_time = $context_data->from_time;
                        $to_time = $context_data->to_time;

                        $available_workers = array();
                        $sql = "SELECT * FROM user_details WHERE user_type = '5' AND quick_service = '1' ";
                        $result = $con->query($sql);

                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_array()){
                                $data_obj = new stdClass();
                                $data_obj->user_id = $row['user_id'];
                                $data_obj->full_name = $row['full_name']; 
                                $data_obj->phone_number = $row['phone_number']; 
                                
                                array_push($available_workers, $data_obj);
                            }//end while

                            if(sizeof($available_workers) > 0){
                                $context_data->available_workers = $available_workers;
                                $worker = $available_workers[0];
                                $context_data->worker_id = $worker->user_id;
                                $context_data->worker_name = $worker->full_name;
                                $context_data->worker_mobile = $worker->phone_number;
                                $response_msg .= 'Worker assigned: ' . $worker->full_name . '. Mobile: ' . $worker->phone_number. "\n";

                                # WhatsApp
                                /*$template_name = 'available_worker_name';
                                $parameters = array();
                                $param1 = $worker->full_name;
                                $param2 = $worker->phone_number;
                                array_push($parameters, $param1);
                                array_push($parameters, $param2);
                                $whatsapp_response = sendWhatsAppMessage($to, $template_name, $parameters);*/

                            }else{
                                $context_data->confirm_time = '';
                                $context_data->booking_date_f = '';
                                $context_data->booking_date_t = '';
                                $context_data->from_time = '';
                                $context_data->to_time = '';

                                $context_data->available_workers = array();
                                $response_msg .= 'No available workers for the selected time slot. Please try a different time.'; 
                        
                                # WhatsApp
                                $template_name = 'no_available_workers';
                                $parameters = array();
                                $whatsapp_response = sendWhatsAppMessage($to, $template_name, $parameters);                           		
                            }                        
                        }//end if 

                        ## Calculate total hour
                        $from_datetime = strtotime($from_date . ' ' . $from_time);
                        $to_datetime = strtotime($to_date . ' ' . $to_time);
                        $total_hours = round(($to_datetime - $from_datetime) / 3600, 2);
                        $context_data->total_hours = $total_hours;

                        ## Tax Calculation GST mandatory
                        $bill_type = $context_data->bill_type;
                        $cgst_percent = $context_data->cgst_percent;
                        $sgst_percent = $context_data->sgst_percent;
                        $cgst_amount = 0;
                        $sgst_amount = 0;
                        $service_rate_per_hour = $context_data->service_rate_per_hour;

                        # GST Calculation
                        $cgst_amount = ($total_hours * $service_rate_per_hour) * ($cgst_percent / 100);
                        $sgst_amount = ($total_hours * $service_rate_per_hour) * ($sgst_percent / 100);
                        $context_data->cgst_amount = $cgst_amount;
                        $context_data->sgst_amount = $sgst_amount;

                        $total_amount = ($total_hours * $service_rate_per_hour);
                        $total_amount_with_tax = $total_amount + $cgst_amount + $sgst_amount;

                        $context_data->total_amount = $total_amount;
                        $context_data->total_amount_with_tax = $total_amount_with_tax;

                    }else if($message_text == '0'){
                        $context_data->booking_date_f = '';
                        $context_data->from_time = '';
                        $context_data->booking_date_t = '';
                        $context_data->to_time = '';
                    }else{
                        $response_msg .= 'Invalid input. Please enter 1 to proceed or 0 to re-enter the start and end date/time.';
                        
                        # WhatsApp
                        $template_name = 'reenter_date_time';
                        $parameters = array();
                        $whatsapp_response = sendWhatsAppMessage($to, $template_name, $parameters);  
                    }
                }else if($context_data->proceed_to_pay == ''){
                    if($message_text == '1'){
                        $context_data->proceed_to_pay = $message_text;

                        $client_id = $context_data->user_id;
                        $client_name = $context_data->full_name;
                        $client_mobile = $context_data->phone_number;
                        $area_location_id = $context_data->area_location_id;
                        $area_location_name = $context_data->area_location_name;
                        $building_id = $context_data->building_id;
                        $building_name = $context_data->building_name;
                        $service_id = $context_data->service_id;
                        $service_name = $context_data->service_name;
                        $service_rate_per_hour = $context_data->service_rate_per_hour;
                        $booking_date_f = $context_data->booking_date_f;
                        $booking_date_t = $context_data->booking_date_t;
                        $from_time = $context_data->from_time;
                        $to_time = $context_data->to_time;
                        $total_hours = $context_data->total_hours;
                        $total_amount = $context_data->total_amount;
                        $bill_type = $context_data->bill_type;
                        $cgst_percent = $context_data->cgst_percent;
                        $cgst_amount = $context_data->cgst_amount;
                        $sgst_percent = $context_data->sgst_percent;
                        $sgst_amount = $context_data->sgst_amount;
                        $total_amount_with_tax = $context_data->total_amount_with_tax;
                        $amount_paid = $context_data->amount_paid;
                        $amount_due = 0;
                        $worker_id = $context_data->worker_id;
                        $worker_name = $context_data->worker_name;
                        $worker_mobile = $context_data->worker_mobile;
                        $order_status = '1';
                        $bill_status_name = 'Pending';
                        $order_placed_date = date('Y-m-d');
                        $order_placed_time = date('H:i:s');
                        $order_placed_by = $context_data->user_id;
                        $order_placed_by_name = $context_data->full_name;
                        $order_channel_name = $context_data->order_channel_name;
                        $paid_date = date('Y-m-d');
                        $payment_mode = $context_data->payment_mode;
                        $transaction_id = $context_data->transaction_id;

                        


                        $sql = "INSERT INTO schedule_log (client_id, client_name, client_mobile, area_location_id, area_location_name, building_id, building_name, service_id, service_name, service_rate_per_hour, booking_date_f, booking_date_t, from_time, to_time, total_hours, total_amount, bill_type, cgst_percent, cgst_amount, sgst_percent, sgst_amount, total_amount_with_tax, amount_paid, amount_due, worker_id, worker_name, worker_mobile, bill_status, bill_status_name, order_placed_date, order_placed_time, order_placed_by, order_placed_by_name, order_channel_name, paid_date, payment_mode, transaction_id) VALUES ('" .$client_id. "', '" .$client_name."', '" .$client_mobile."', '" .$area_location_id."', '" .$area_location_name."', '" .$building_id."', '" .$building_name."', '" .$service_id."', '" .$service_name."', '" .$service_rate_per_hour."', '" .$booking_date_f."', '" .$booking_date_t."', '" .$from_time."', '" .$to_time."', '" .$total_hours."', '" .$total_amount."', '" .$bill_type."', '" .$cgst_percent."', '" .$cgst_amount."', '" .$sgst_percent."', '" .$sgst_amount."', '" .$total_amount_with_tax."', '" .$amount_paid."', '" .$amount_due."', '" .$worker_id."', '" .$worker_name."', '" .$worker_mobile."', '" .$order_status."', '" .$bill_status_name."', '" .$order_placed_date."', '" .$order_placed_time. "', '" .$order_placed_by. "', '" .$order_placed_by_name. "', '" .$order_channel_name. "', '" .$paid_date. "', '" .$payment_mode. "', '" .$transaction_id. "')";
                        $result = $con->query($sql);
                        $booking_insert_id = mysqli_insert_id($con);
                        $booking_id = str_pad($booking_insert_id, 4, '0', STR_PAD_LEFT);
                        $context_data->booking_id = $booking_id;

                        $response_msg .= 'Your booking has been confirmed successfully! Your Booking ID is: #'.$booking_id.'. Thank you for booking with us!';

                        # WhatsApp
                        $template_name = 'booking_confirmed_successfully';
                        $parameters = array();
                        $param1 = $booking_id; 
                        array_push($parameters, $param1); 
                        $whatsapp_response = sendWhatsAppMessage($to, $template_name, $parameters);

                    }
                }else{}

                ## Check Form Validation and show message
                if($context_data->full_name == ''){
                    $response_msg .= 'Please enter your name';

                    # WhatsApp
                    $template_name = 'enter_name';
                    $parameters = array();
                    $whatsapp_response = sendWhatsAppMessage($to, $template_name, $parameters);
                }else if($context_data->area_location_id == ''){
                    # Fetch area location name from database
                    $area_locations = array();
                    $area_locations = $context_data->area_locations;

                    if(sizeof($area_locations) == 0){
                        $sql_area = "SELECT * FROM service_area WHERE parent_sa_id = '0' AND sa_status = '1'";
                        $result_area = mysqli_query($con, $sql_area);
                        if(mysqli_num_rows($result_area) > 0){
                            while($row_area = mysqli_fetch_array($result_area)){
                                $sa_id = $row_area['sa_id'];
                                $area_location = $row_area['area_location'];
                                $pincode = $row_area['pincode'];
                                $street_name = $row_area['street_name'];
                                $landmark = $row_area['landmark'];

                                $area_location_obj = new stdClass();
                                $area_location_obj->sa_id = $sa_id;
                                $area_location_obj->area_location = $area_location;
                                $area_location_obj->pincode = $pincode; 
                                $area_location_obj->street_name = $street_name;
                                $area_location_obj->landmark = $landmark;

                                array_push($area_locations, $area_location_obj);
                            }
                        }
                        $context_data->area_locations = $area_locations;
                    }//end if

                    $service_area_list = '';
                    if(sizeof($area_locations) > 0){
                        $response_msg .= 'Our service is available in the following areas: '. "\n";
                        $sl = 1;
                        foreach($area_locations as $area){
                            $response_msg .= $sl_array[$sl] . ' ' . $area->area_location . '(Pin: ' . $area->pincode . ')'. "\n";
                            $service_area_list .= $sl_array[$sl] . ' ' . $area->area_location . '(Pin: ' . $area->pincode . ') ';
                            $sl++;
                        }
                        // Remove the trailing comma and space
                        $response_msg = rtrim($response_msg, ', ');
                    }
                    $response_msg .= 'Please enter serial number of your area location from the above list.';

                    # WhatsApp
                    $template_name = 'service_area_location';
                    $parameters = array();
                    array_push($parameters, $service_area_list);
                    $whatsapp_response = sendWhatsAppMessage($to, $template_name, $parameters);

                }else if($context_data->building_id == ''){
                    # Fetch Building name from database based on location
                    $area_location_id = $context_data->area_location_id;
                    $buildings = array();
                    $buildings = $context_data->buildings;

                    if(sizeof($buildings) == 0){
                        $sql_area = "SELECT * FROM service_area WHERE parent_sa_id = '" . $area_location_id . "' AND sa_status = '1'";
                        $result_area = mysqli_query($con, $sql_area);
                        if(mysqli_num_rows($result_area) > 0){
                            while($row_area = mysqli_fetch_array($result_area)){
                                $sa_id = $row_area['sa_id'];
                                $area_location = $row_area['area_location'];
                                $pincode = $row_area['pincode'];
                                $street_name = $row_area['street_name'];
                                $landmark = $row_area['landmark'];
                                $building_name = $row_area['building_name'];

                                $building_obj = new stdClass();
                                $building_obj->sa_id = $sa_id;
                                $building_obj->area_location = $area_location;
                                $building_obj->pincode = $pincode;
                                $building_obj->street_name = $street_name;
                                $building_obj->landmark = $landmark;
                                $building_obj->building_name = $building_name;
                                $building_obj->street_name = $street_name;
                                $building_obj->landmark = $landmark;

                                array_push($buildings, $building_obj);
                            }
                        }
                        $context_data->buildings = $buildings;
                    }//end if

                    $available_building = '';
                    if(sizeof($buildings) > 0){
                        $response_msg .= 'Our service is available in the following buildings: '. "\n";
                        $sl = 1;
                        foreach($buildings as $building){
                            $response_msg .= $sl_array[$sl] . ' ' . $building->building_name . ''. "\n";
                            $available_building .= $sl_array[$sl] . ' ' . $building->building_name . ' ';
                            $sl++;
                        }
                        // Remove the trailing comma and space
                        $response_msg = rtrim($response_msg, ', ');
                    }

                    $response_msg .= 'Please enter serial number of your building from the above list.';

                    # WhatsApp
                    $template_name = 'service_available_building';
                    $parameters = array();
                    array_push($parameters, $available_building);
                    $whatsapp_response = sendWhatsAppMessage($to, $template_name, $parameters);
                }else if($context_data->service_id == ''){
                    # fetch Service name from database based on location and building
                    $area_location_id = $context_data->area_location_id;
                    $building_id = $context_data->building_id;
                    $services = $context_data->services;
                    
                    if(sizeof($services) == 0){
                        $sql = "SELECT service_rate_chart.src_id, service_rate_chart.qs_id, service_rate_chart.qs_id, service_rate_chart.sa_id, service_rate_chart.sa_id_child, service_rate_chart.rate_first, service_rate_chart.rate_normal, quick_services.service_name, quick_services.svc_included, quick_services.svc_not_included FROM service_rate_chart JOIN quick_services ON service_rate_chart.qs_id = quick_services.qs_id WHERE service_rate_chart.sa_id = '" . $area_location_id . "' AND service_rate_chart.sa_id_child = '" . $building_id . "' AND quick_services.svc_status = '1' ";
                        $result = $con->query($sql);

                        if ($result->num_rows > 0) {
                            $status = true; 
                            while($row = $result->fetch_array()){
                                $service = new stdClass();
                                $service->src_id = $row['src_id'];
                                $service->qs_id = $row['qs_id'];
                                $service->rate_first = $row['rate_first']; 
                                $service->rate_normal = $row['rate_normal']; 
                                $service->service_name = $row['service_name']; 
                                $service->svc_included = json_decode($row['svc_included']); 
                                $service->svc_not_included = json_decode($row['svc_not_included']);
                                
                                array_push($services, $service);
                            }
                        }
                    }//end if              
                    
                    if(sizeof($services) > 0){
                        $available_services_list = '';
                        $context_data->services = $services;
                        $response_msg .= 'Available services are: '. "\n";
                        $sl = 1;
                        foreach($services as $service){
                            $response_msg .= $sl_array[$sl] . ' ' . $service->service_name . ''. "\n";
                            $available_services_list .= $sl_array[$sl] . ' ' . $service->service_name . ' ';
                            $sl++;
                        }

                        $response_msg .= 'Please select a service from the list above.';

                        # WhatsApp
                        $template_name = 'available_services';
                        $parameters = array();
                        array_push($parameters, $available_services_list);
                        $whatsapp_response = sendWhatsAppMessage($to, $template_name, $parameters);
                        
                    }else{
                        $response_msg .= 'No services available.';
                    }
                }else if($context_data->booking_date_f == ''){
                    if($booking_date_invalid){
                        $response_msg .= 'The date entered is invalid. Please provide a valid date in DD/MM/YYYY format to proceed.';

                        # WhatsApp
                        $template_name = 'invalid_date';
                        $parameters = array();
                        $whatsapp_response = sendWhatsAppMessage($to, $template_name, $parameters);
                    }else{
                        $response_msg .= 'Please enter your preferred Start Date to proceed with this quick service. Kindly use the **DD/MM/YYYY** format. Type Exit to end this session.';

                        # WhatsApp
                        $template_name = 'enter_start_date';
                        $parameters = array();
                        $whatsapp_response = sendWhatsAppMessage($to, $template_name, $parameters);
                    }
                }else if($context_data->from_time == ''){
                    if($from_time_invalid){
                        $response_msg .= 'The time entered is invalid. Please provide a valid start time in 24-hour HH:MM format (00:00 to 23:59).';

                        # WhatsApp
                        $template_name = 'valid_start_time';
                        $parameters = array();
                        $whatsapp_response = sendWhatsAppMessage($to, $template_name, $parameters);
                    }else{
                        $response_msg .= 'Please enter your preferred Start Time in 24-hour (HH:MM) format. Examples: - 07:30 AM → Enter 07:30 - 07:30 PM → Enter 19:30. Type Exit to terminate this session.';
                        
                        # WhatsApp
                        $template_name = 'valid_start_time_explaination';
                        $parameters = array();
                        $whatsapp_response = sendWhatsAppMessage($to, $template_name, $parameters);
                    }
                }else if($context_data->booking_date_t == ''){
                    if($booking_date_invalid){
                        $response_msg .= 'The date entered is invalid. Please provide a valid date in DD/MM/YYYY format to proceed.';

                        # WhatsApp
                        $template_name = 'invalid_date';
                        $parameters = array();
                        $whatsapp_response = sendWhatsAppMessage($to, $template_name, $parameters);
                    }else{
                        $response_msg .= 'Please provide the End Date for your requested quick service. Ensure the date is entered in DD/MM/YYYY format. Type Exit to terminate this session.';

                        # WhatsApp
                        $template_name = 'invalid_to_date_explanation';
                        $parameters = array();
                        $whatsapp_response = sendWhatsAppMessage($to, $template_name, $parameters);
                    }
                }else if($context_data->to_time == ''){
                    if($to_time_invalid){
                        $response_msg .= 'The end time entered is invalid. Please provide a valid end time in 24-hour (HH:MM) format, between 00:00 and 23:59';
                        
                        # WhatsApp
                        $template_name = 'valid_end_time';
                        $parameters = array();
                        $whatsapp_response = sendWhatsAppMessage($to, $template_name, $parameters);
                    }else{
                        $response_msg .= 'Please enter your preferred **End Time** in 24-hour (HH:MM) format. Examples: - 07:30 AM → Enter 07:30 - 07:30 PM → Enter 19:30 Type Exit to terminate this session.';
                        
                        # WhatsApp
                        $template_name = 'valid_end_time_explanation';
                        $parameters = array();
                        $whatsapp_response = sendWhatsAppMessage($to, $template_name, $parameters);
                    }
                }else if($context_data->confirm_time == ''){
                    $response_msg .= 'Your Service start and date time is as followes: From '.$context_data->booking_date_f.' '.date('h:m A', strtotime($context_data->from_time)).' to '.$context_data->booking_date_t.' '.date('h:m A', strtotime($context_data->to_time)).'. Please enter 1 to proceed to next step. Enter \'Exit\' to terminate this session.';                    

                    # WhatsApp
                    $template_name = 'confirm_date_time';
                    $parameters = array();
                    $param1 = $context_data->booking_date_f;
                    $param2 = $context_data->from_time; //date('h:m A', strtotime($context_data->from_time));
                    $param3 = $context_data->booking_date_t;
                    $param4 = $context_data->to_time; //date('h:m A', strtotime($context_data->to_time));

                    array_push($parameters, $param1);
                    array_push($parameters, $param2);
                    array_push($parameters, $param3);
                    array_push($parameters, $param4);
                    $whatsapp_response = sendWhatsAppMessage($to, $template_name, $parameters);
                }else if($context_data->proceed_to_pay == ''){
                    $response_msg .= 'Payment is required to confirm your booking. Enter 1 to proceed with the payment, or type **Exit** to cancel the booking.';
                        
                    # WhatsApp
                    $template_name = 'proceed_to_pay';
                    $parameters = array();
                    $param1 = $context_data->area_location_name; // Service Location
                    $param2 = $context_data->building_name; // Building Name
                    $param3 = $context_data->service_name; // Service Name
                    $param4 = (string) $context_data->total_hours; // Total Hours
                    $param5 = (string) $context_data->total_amount; // Service Charge
                    $param6 = (string) $context_data->cgst_amount; // CGST
                    $param7 = (string) $context_data->sgst_amount; //SGST 
                    $param8 = (string) $context_data->total_amount_with_tax; // Total Payable Amount
                    $param9 = $context_data->worker_name; // Worker Name
                    $param10 = (string) $context_data->worker_mobile; // Worker Mobile

                    array_push($parameters, $param1);
                    array_push($parameters, $param2);
                    array_push($parameters, $param3);
                    array_push($parameters, $param4);
                    array_push($parameters, $param5);
                    array_push($parameters, $param6);
                    array_push($parameters, $param7);
                    array_push($parameters, $param8);
                    array_push($parameters, $param9);
                    array_push($parameters, $param10);

                    $whatsapp_response = sendWhatsAppMessage($to, $template_name, $parameters);
                }else{}


                ### Call API as per needs
                if($context_data->confirm_time == '1' && $call_api == true){ 
                    

                }//end call api

                #### Update the context data in the database
                $context_data_json = json_encode($context_data);
                if($id == 0){
                    $insert_sql = "INSERT INTO whatsapp_context (user_id, full_name, phone_number, context_data) VALUES ('" . $user_id . "', '" . $full_name . "', '" . $from_number . "', '" . $context_data_json . "')";
                    mysqli_query($con, $insert_sql);
                }else{
                    $update_sql = "UPDATE whatsapp_context SET context_data = '" . $context_data_json . "' WHERE id = '" . $id . "'";
                    mysqli_query($con, $update_sql);
                }
            }//emnd do_exit check
        }//end message object check
    
        // Always reply with a 200 OK status immediately to acknowledge receipt to Meta
        http_response_code(200);
        echo $response_msg;
        echo $whatsapp_response;
        
    }

    
?>