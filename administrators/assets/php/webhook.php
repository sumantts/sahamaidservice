<?php
    echo "Webhook Connected";
    
    function dump_webhook_response($response) {
        $filename = 'webhook_response.txt';
        $filepath = $_SERVER['DOCUMENT_ROOT'] . '/' . $filename;
        if (!file_exists($filepath)) {
            touch($filepath); 
        }
        $text = json_encode($response)."\n";
        $handle = fopen($filepath, 'a');
        if ($handle) {
            fwrite($handle, $text); 
            fclose($handle);        
        } else {
            echo "Could not open the file.";
        }
    }
    
    
    

    // 1. WEBHOOK VERIFICATION (Executed once when setting up the webhook in Meta Dashboard)
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        // This token must match the exact string you enter in the "Verify Token" field in Meta
        $verify_token = "YOUR_CUSTOM_VERIFY_TOKEN"; 
    
        $mode = $_GET['hub_mode'] ?? '';
        $token = $_GET['hub_verify_token'] ?? '';
        $challenge = $_GET['hub_challenge'] ?? '';
    
        if ($mode === 'subscribe' && $token === $verify_token) {
            // Respond with the challenge to verify ownership
            http_response_code(200);
            dump_webhook_response($challenge);
            exit;
        } else {
            http_response_code(403);
            dump_webhook_response("Verification failed");
            exit;
        }
    }
    
    // 2. RECEIVING INBOUND MESSAGES (Executed whenever a user messages your number)
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
                
                // --- INSERT YOUR BUSINESS LOGIC HERE ---
                // e.g., Save to database, trigger a reply, update a CRM ticket, etc.
                
            }
            dump_webhook_response($message_obj);
        }
    
        // Always reply with a 200 OK status immediately to acknowledge receipt to Meta
        http_response_code(200);
        echo "EVENT_RECEIVED";
        exit;
    }

    
?>