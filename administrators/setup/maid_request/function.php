<?php
	include('../../assets/php/sql_conn.php');
	$fn = '';
    
	if(isset($_GET["fn"])){
	    $fn = $_GET["fn"];
	}

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

				$quote_details1 = json_decode($quote_details);
				$name = $quote_details1->name;
				$phone_number = $quote_details1->phone_number;
				$email = $quote_details1->email;
				$address = $quote_details1->address;
				$message = $quote_details1->message;
				
				$data[0] = $quote_id;
				$data[1] = $name."<br>".$phone_number;
				$data[2] = 'Email: '.$email."<br>Address: ".$address;
				$data[3] = $message;

				array_push($mainData, $data);

			}
		} else {
			$status = false;
		}
		$mysqli->close();

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