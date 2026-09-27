<?php
	include('../assets/php/sql_conn.php');
	$fn = '';
    
	if(isset($_GET["fn"])){
	    $fn = $_GET["fn"];
	}else if(isset($_POST["fn"])){
	    $fn = $_POST["fn"];
	}

	//Save function start
	if($fn == 'updateAttendance'){
		$return_result = array();
		$atten_data = array();
		$status = true;

		$serial_no = $_POST["serial_no"];	
		$pre_abs_lev = $_POST["pre_abs_lev"];
		$atten_note = $_POST["atten_note"];	
		$user_id = $_POST["user_id"];		
		$month_date = $_POST["month_date"];			
		$atten_id = $_POST["atten_id"];
		
		try {
			$sql = "SELECT * FROM attendance_register WHERE user_id = '" .$user_id. "' AND month_date = '" .$month_date. "' ";
			$result = $mysqli->query($sql);

			if ($result->num_rows > 0) {
				$row = $result->fetch_array();
				$atten_data = json_decode($row['atten_data']);

				if(sizeof($atten_data) > 0){
					for($i = 0; $i < sizeof($atten_data); $i++){
						if($atten_data[$i]->slno == $serial_no){
							$atten_data[$i]->pre_abs_lev = $pre_abs_lev;
							$atten_data[$i]->atten_note = $atten_note;
						}
					}
				}

				$atten_data_en = json_encode($atten_data); 
				$sql2 = "UPDATE attendance_register SET atten_data = '" .$atten_data_en. "' WHERE user_id = '" .$user_id. "' AND month_date = '" .$month_date. "' ";
				$result2 = $mysqli->query($sql2);
			} 		
			
		} catch (PDOException $e) {
			die("Error occurred:" . $e->getMessage());
		}
		$return_result['status'] = $status; 
		$return_result['atten_id'] = $atten_id; 

		echo json_encode($return_result);
	}//Save function end	

	//function start
	if($fn == 'getRateChartData'){
		$return_array = array();
		$services = array();
		$status = true;		
		$error_message = 'Attendance found';	
		$atten_id = 0;	

		$qs_id = $_POST['qs_id'];  
		$sa_id = $_POST['sa_id']; 
		
		
		$sql = "SELECT * FROM service_area WHERE parent_sa_id = '" .$sa_id. "' ORDER BY building_name ASC";
		$result = $mysqli->query($sql);

		if ($result->num_rows > 0) {
			while($row = $result->fetch_array()){
				$sa_id_child = $row['sa_id'];
				$building_name = $row['building_name']; 
				$rate_first_value = 0;
				$rate_normal_value = 0;

				$services_obj = new stdClass();
				$services_obj->sa_id_child = $sa_id_child;
				$services_obj->building_name = $building_name;
				$services_obj->rate_first_value = $rate_first_value;
				$services_obj->rate_normal_value = $rate_normal_value;
				array_push($services, $services_obj);
			}
		} 

		if(sizeof($services) > 0){
			$status = true;
			for($i = 0; $i < sizeof($services); $i++){
				$sa_id_child = $services[$i]->sa_id_child;

				$sql2 = "SELECT * FROM service_rate_chart WHERE qs_id = '" .$qs_id. "' AND sa_id = '" .$sa_id. "' AND sa_id_child = '" .$sa_id_child. "' ";
				$result2 = $mysqli->query($sql2);

				if ($result2->num_rows > 0) {
					$row2 = $result2->fetch_array();
					$rate_first_value = $row2['rate_first'];
					$rate_normal_value = $row2['rate_normal'];

					$services[$i]->rate_first_value = $rate_first_value;
					$services[$i]->rate_normal_value = $rate_normal_value;
				}
			}
		}else{
			$status = false;
			$error_message = 'No service area found';
		}

		$return_array['status'] = $status;
		$return_array['services'] = $services; 
		
    	echo json_encode($return_array);
	}//function end	 

	
	// Lead or Confirm 
	if($fn == 'configureQuickServicesDd'){ 
		$return_array = array();
		$status = true;
		$mainData = array(); 

		$sql = "SELECT * FROM quick_services WHERE svc_status = '1' ORDER BY service_name ASC";		 
		$result = $con->query($sql);

		if ($result->num_rows > 0) {
			$status = true; 
			while($row = $result->fetch_array()){
				$data_obj = new stdClass();
				$data_obj->id = $row['qs_id'];
				$data_obj->name = $row['service_name'];
				
				array_push($mainData, $data_obj);
			}
		}else{
			$status = false;			
		}

		$return_array['status'] = $status;
		$return_array['data'] = $mainData;
    	echo json_encode($return_array);
	}//function end

	// Service Area
	if($fn == 'configureServiceAreaDd'){ 
		$return_array = array();
		$status = true;
		$mainData = array(); 

		$sql = "SELECT * FROM service_area WHERE parent_sa_id = '0' AND sa_status = '1' ORDER BY area_location ASC";		 
		$result = $con->query($sql);

		if ($result->num_rows > 0) {
			$status = true; 
			while($row = $result->fetch_array()){
				$data_obj = new stdClass();
				$data_obj->id = $row['sa_id'];
				$data_obj->name = $row['area_location'];
				
				array_push($mainData, $data_obj);
			}
		}else{
			$status = false;			
		}

		$return_array['status'] = $status;
		$return_array['data'] = $mainData;
    	echo json_encode($return_array);
	}//function end

	
	// Users
	if($fn == 'configureUsersDd'){ 
		$user_type = $_POST["user_type"];

		$return_array = array();
		$status = true;
		$mainData = array();
		
		$sql = "SELECT * FROM user_details WHERE user_type = '" .$user_type. "' ORDER BY full_name ASC";
		$result = $con->query($sql);

		if ($result->num_rows > 0) {
			$status = true; 
			while($row = $result->fetch_array()){
				if($row['full_name'] != ''){
					$data_obj = new stdClass();
					$data_obj->id = $row['user_id'];
					$data_obj->name = $row['full_name'];
					$data_obj->exp_salary = $row['exp_salary'];
					array_push($mainData, $data_obj);
				}
			}
		}else{
			$status = false;			
		}

		$return_array['status'] = $status;
		$return_array['data'] = $mainData;
    	echo json_encode($return_array);
	}//function end

	// Save Multiple Rate
	if($fn == 'saveMultipleRate'){
		$return_result = array();
		$status = true;
		$error_message = '';
		
		$qs_id = $_POST["qs_id"];
		$sa_id = $_POST["sa_id"];
		$rateChartData = json_decode($_POST["rateChartData"], true);
		
		
		try {
			if($qs_id != '' && $sa_id != ''){
				if(sizeof($rateChartData) > 0){
					for($i = 0; $i < sizeof($rateChartData); $i++){
						$sa_id_child = $rateChartData[$i]['sa_id_child'];
						$rate_first = $rateChartData[$i]['rate_first'];
						$rate_normal = $rateChartData[$i]['rate_normal'];

						//echo "QS ID: " .$qs_id. ", SA ID: " .$sa_id. ", SA ID Child: " .$sa_id_child. ", Rate First: " .$rate_first. ", Rate Normal: " .$rate_normal. "<br>";


						$sql = "SELECT * FROM service_rate_chart WHERE qs_id = '" .$qs_id. "' AND sa_id = '" .$sa_id. "' AND sa_id_child = '" .$sa_id_child. "' ";
						$result = $mysqli->query($sql);

						if ($result->num_rows > 0) {
							// update row
							$sql3 = "UPDATE service_rate_chart SET rate_first = '" .$rate_first. "', rate_normal = '" .$rate_normal. "' WHERE qs_id = '" .$qs_id. "' AND sa_id = '" .$sa_id. "' AND sa_id_child = '" .$sa_id_child. "' ";
							$result3 = $mysqli->query($sql3);
						} else {
							// insert row
							$sql2 = "INSERT INTO service_rate_chart (qs_id, sa_id, sa_id_child, rate_first, rate_normal) VALUES ('" .$qs_id. "', '" .$sa_id. "', '" .$sa_id_child. "', '" .$rate_first. "', '" .$rate_normal. "') ";
							$result2 = $mysqli->query($sql2);
						}
						
					}
				}
			}else{
				$status = false;
				$error_message = 'Please select Quick Service and Service Area';
			}
			
		} catch (PDOException $e) {
			die("Error occurred:" . $e->getMessage());
			$status = false;
			$error_message = 'Error occurred while saving the data';
		}

		$return_result['status'] = $status;
		$return_result['error_message'] = $error_message;
		echo json_encode($return_result);
	}

?>