<?php
	include('../../assets/php/sql_conn.php');
	$fn = '';
    
	if(isset($_GET["fn"])){
	    $fn = $_GET["fn"];
	}

	

	// Update seen status
	if($fn == 'update_seen_status'){
		$return_result = array();
		$status = true;

		$quote_id = $_GET["quote_id"];	
		$read_unread = $_GET["read_unread"]; 
        $sql = "UPDATE quote_request SET read_unread = '" .$read_unread. "' WHERE quote_id = '" .$quote_id. "' ";
        $result = $mysqli->query($sql);
		
		$return_result['status'] = $status; 
		echo json_encode($return_result);
	}//end	

	//saveOrganisation function start
	if($fn == 'saveOrganisation'){
		$return_result = array();
		$status = true;

		$firstName = $_POST["firstName"];	
		
		try {
			$return_result["firstName"] = $firstName;
		} catch (PDOException $e) {
			die("Error occurred:" . $e->getMessage());
		}
		$return_result['status'] = $status;
		sleep(2);
		echo json_encode($return_result);
	}//saveOrganisation function end	

	//function start
	if($fn == 'getQuoteRequest'){
		$return_array = array();
		$status = true;
		$mainData = array();

		$sql = "SELECT * FROM quote_request";
		$result = $mysqli->query($sql);

		if ($result->num_rows > 0) {
			$status = true;

			while($row = $result->fetch_array()){
				$quote_id = $row['quote_id'];			
				$quote_details = $row['quote_details'];		
				$created_on = $row['created_on'];	
				$read_unread = $row['read_unread'];

				$quote_details1 = json_decode($quote_details);
				$name = $quote_details1->name;
				$phone_number = $quote_details1->phone_number;
				$email = $quote_details1->email;
				$address = $quote_details1->address;
				$message = $quote_details1->message;
				
				$required_skills1 = '';
				$required_hourse1 = '';

				if(isset($quote_details1->required_skills)){
					$required_skills = $quote_details1->required_skills;
					$required_skills1 = implode(",", $required_skills);
					$required_hourse = $quote_details1->required_hourse;
					$required_hourse1 = implode(",", $required_hourse);
				}
				
				$read_unread_stat = '';
				if($read_unread == '1'){
					$read_unread_stat = 'checked';
				}

				$toggle_button = '<div class="form-check form-switch"> <input class="form-check-input seen_cb" type="checkbox" role="switch" id="seen_cb_'.$quote_id.'"  data-id="'.$quote_id.'" '.$read_unread_stat.'> <label class="form-check-label" for="seen_cb_'.$quote_id.'" >Seen</label> </div>';

				$data[0] = $quote_id;
				$data[1] = $name."<br>".$phone_number;
				$data[2] = "Address: $address <br>Email: $email";
				$data[3] = $required_skills1;
				$data[4] = $required_hourse1;
				$data[5] = $message;
				$data[6] = date('d-F-Y h:i A', strtotime($created_on));
				$data[7] = $toggle_button;

				array_push($mainData, $data);

			}
		} else {
			$status = false;
		}
		//$mysqli->close();

		/*$mainData = array();
		for($i = 0; $i < 1000; $i++){
			$data[0] = $i;
			$data[1] = 'Employee Name '.$i;
			$data[2] = 'User Name '.$i;
			$data[3] = 'Password '.$i;
			$data[4] = 'Group '.$i;
			$data[5] = 'Validity '.$i;

			array_push($mainData, $data);
		}*/
		$return_array['data'] = $mainData;
		$return_array['data'] = $mainData;
    	echo json_encode($return_array);
	}//function end
?>