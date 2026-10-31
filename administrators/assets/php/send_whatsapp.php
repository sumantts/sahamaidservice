<?php
    $curl = curl_init();
    
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://partnersv1.pinbot.ai/v3/1350182688181368/messages',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS =>'{
        "messaging_product": "whatsapp",
        "recipient_type": "individual",
        "to": "+919733935161",
        "type": "template",
        "template": {
            "language": {
                "code": "en"
            },
            "name": "welcome_with_name",
            "components": [
                {
                    "type": "body",
                    "parameters": [
                        {
                            "type": "text",
                            "text": "Suman"
                        }
                    ]
                }
            ]
        }
    }',
      CURLOPT_HTTPHEADER => array(
        'apikey: 20fb1863-c6e8-11f1-afb3-02c8a5e042bd',
        'Content-Type: application/json'
      ),
    ));
    
    $response = curl_exec($curl);
    
    curl_close($curl);
    echo $response;
    
    // {"code":100,"status":"failed","message":"Authentication Failed"}
    
    // {"error":{"message":"(#132001) Template name does not exist in the translation","type":"OAuthException","code":132001,"error_data":{"messaging_product":"whatsapp","details":"template name (welcome_to_saha_enterprise) does not exist in en"},"fbtrace_id":"AoAvTKI-2ZFHH5TQJLH_8-l"}}
    

    
?>