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
	if($fn == 'getAttendance'){
		$return_array = array();
		$atten_data = array();
		$status = true;		
		$error_message = 'Attendance found';	
		$atten_id = 0;	

		$user_type = $_POST['user_type'];  
		$user_id = $_POST['user_id'];   
		$month_date = $_POST['month_date'];
		$month_date_str = explode("-", $month_date);

		$month = $month_date_str[1];//3;  // March
		$year = $month_date_str[0];//2026;
		// Get total days in month
		$totalDays = cal_days_in_month(CAL_GREGORIAN, $month, $year);
		$dates = [];
		for ($day = 1; $day <= $totalDays; $day++) {
			$date = date("Y-m-d", strtotime("$year-$month-$day"));
			$dates[] = $date;
		}
		
		$sql = "SELECT * FROM attendance_register WHERE user_id = '" .$user_id. "' AND month_date = '" .$month_date. "' ";
		$result = $mysqli->query($sql);

		if ($result->num_rows > 0) {
			$row = $result->fetch_array();
			$atten_data = json_decode($row['atten_data']);
			$atten_id = $row['atten_id'];
		}else{
			if(sizeof($dates) > 0){
				$slno = 1;
				for($i = 0; $i < sizeof($dates); $i++){
					$atten_data_obj = new stdClass();
					$atten_data_obj->slno = $slno;
					$atten_data_obj->atten_date = date('d-m-Y', strtotime($dates[$i]));
					$atten_data_obj->pre_abs_lev = '';
					$atten_data_obj->atten_note = '';

					array_push($atten_data, $atten_data_obj);
					$slno++;
				}
			}//end if

			// Insert for the first time
			$atten_data_en = json_encode($atten_data); 
			$sql3 = "INSERT INTO attendance_register (user_id, month_date, atten_data) VALUES ('" .$user_id. "', '" .$month_date. "', '" .$atten_data_en. "') ";
			$result3 = $mysqli->query($sql3);	
			$atten_id = $mysqli->insert_id;
		}
		$mysqli->close();
		

		$return_array['status'] = $status;
		$return_array['atten_data'] = $atten_data;
		$return_array['atten_id'] = $atten_id;
		
    	echo json_encode($return_array);
	}//function end	 

	
	// Lead or Confirm 
	if($fn == 'configureUserTypeDd'){ 
		$return_array = array();
		$status = true;
		$mainData = array();
		
		$sess_user_type = $_SESSION["user_type"];

		if($sess_user_type == 1){
			$sql = "SELECT * FROM user_type_master WHERE user_type != '4'";
		}
		
		if($sess_user_type >= 2){
			$sql = "SELECT * FROM user_type_master WHERE user_type >= '" .$sess_user_type. "' AND user_type != '4' ";
		}
		$result = $con->query($sql);

		if ($result->num_rows > 0) {
			$status = true; 
			while($row = $result->fetch_array()){
				$data_obj = new stdClass();
				$data_obj->id = $row['user_type'];
				$data_obj->name = $row['name'];
				
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
				$data_obj = new stdClass();
				$data_obj->id = $row['user_id'];
				$data_obj->name = $row['full_name'];
				
				array_push($mainData, $data_obj);
			}
		}else{
			$status = false;			
		}

		$return_array['status'] = $status;
		$return_array['data'] = $mainData;
    	echo json_encode($return_array);
	}//function end

?>