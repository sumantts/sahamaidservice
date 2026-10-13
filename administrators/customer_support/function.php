<?php
	include('../assets/php/sql_conn.php');
	$fn = '';
    
	if(isset($_GET["fn"])){
	    $fn = $_GET["fn"];
	}

	

	// Update seen status
	if($fn == 'update_seen_status'){
		$return_result = array();
		$status = true;

		$cs_id = $_GET["cs_id"];	
		$read_unread = $_GET["read_unread"]; 
        $sql = "UPDATE customer_support SET read_unread = '" .$read_unread. "' WHERE cs_id = '" .$cs_id. "' ";
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

		$sql = "SELECT * FROM customer_support";
		$result = $mysqli->query($sql);

		if ($result->num_rows > 0) {
			$status = true;

			while($row = $result->fetch_array()){
				$cs_id = $row['cs_id'];			
				$ticket_number = $row['ticket_number'];		
				$name = $row['name'];	
				$phone = $row['phone'];	
				$address = $row['address'];	
				$message = $row['message'];	
				$ticket_log_date = $row['ticket_log_date'];	
				$read_unread = $row['read_unread'];
				
				$read_unread_stat = '';
				if($read_unread == '1'){
					$read_unread_stat = 'checked';
				}

				$toggle_button = '<div class="form-check form-switch"> <input class="form-check-input seen_cb" type="checkbox" role="switch" id="seen_cb_'.$cs_id.'"  data-id="'.$cs_id.'" '.$read_unread_stat.'> <label class="form-check-label" for="seen_cb_'.$cs_id.'" >Seen</label> </div>';

				$data[0] = $cs_id;
				$data[1] = $ticket_number;
				$data[2] = $name;
				$data[3] = $phone;
				$data[4] = $address;
				$data[5] = $message;
				$data[6] = date('d-F-Y h:i A', strtotime($ticket_log_date));
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