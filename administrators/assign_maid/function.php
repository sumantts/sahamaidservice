<?php
	include('../assets/php/sql_conn.php');
	$fn = '';
    
	if(isset($_GET["fn"])){
	    $fn = $_GET["fn"];
	}else if(isset($_POST["fn"])){
	    $fn = $_POST["fn"];
	}

	//Save function start
	if($fn == 'saveFormData'){
		$return_result = array();
		$status = true;
		 
		$assign_id = $_POST['assign_id'];
		$client_id = $_POST['client_id'];
		$rcvabl_amount = $_POST['rcvabl_amount']; 
		$worker_id = $_POST['worker_id'];
		$exp_salary = $_POST['exp_salary'];

		$from_date = $_POST['from_date'];
		$to_date = $_POST['to_date'];
		$from_time = $_POST['from_time']; 
		$to_time = $_POST['to_time']; 

		$sess_user_id = $_SESSION["user_id"];

		try {
			if($assign_id > 0){
				/*$status = true;
				$sql = "UPDATE assign_maid SET user_type = '" .$user_type. "', user_id = '" .$user_id. "', from_date = '" .$from_date. "', to_date = '" .$to_date. "', leave_subject = '" .$leave_subject. "', leave_message = '" .$leave_message. "', lsm_id = '" .$lsm_id. "' WHERE assign_id = '" .$assign_id. "' ";
				$result = $con->query($sql);*/
			}else{				
				$status = true;
				$sql = "INSERT INTO assign_maid (client_id, rcvabl_amount, worker_id, exp_salary, from_date, to_date, from_time, to_time, assign_by) VALUES ('".$client_id."', '".$rcvabl_amount."', '".$worker_id."', '".$exp_salary."', '".$from_date."', '".$to_date."', '".$from_time."', '".$to_time."', '".$sess_user_id."') ";
				$result = $con->query($sql);
			}
				
		} catch (PDOException $e) {
			die("Error occurred:" . $e->getMessage());
		}
		$return_result['status'] = $status;
		
		echo json_encode($return_result);
	}//Save function end	

	//function start
	if($fn == 'getTableData'){
		$return_array = array();
		$status = true;
		$mainData = array();
		$author_bio1 = '';
		$sess_user_type = $_SESSION["user_type"];
		$sess_user_id = $_SESSION["user_id"];

		$where_condition = "WHERE assign_maid.assign_id > '0' ";
		if($sess_user_type > 3){
			$where_condition = " AND assign_maid.assign_by = '" .$sess_user_id. "' ";
		}

		$sql = "SELECT assign_maid.assign_id, assign_maid.client_id, assign_maid.rcvabl_amount, assign_maid.worker_id, assign_maid.exp_salary, assign_maid.from_date, assign_maid.to_date, assign_maid.from_time, assign_maid.to_time, assign_maid.payment_history, assign_maid.assign_by, assign_maid.asssign_time, assign_maid.bill_status,
		user_details.full_name,
		bill_status_master.bill_status_name
		FROM assign_maid 
		LEFT OUTER JOIN user_details ON assign_maid.client_id = user_details.user_id 
		LEFT OUTER JOIN bill_status_master ON assign_maid.bill_status = bill_status_master.bs_id 
		$where_condition
		ORDER BY assign_maid.assign_id DESC";

		$result = $con->query($sql);

		if ($result->num_rows > 0) {
			$status = true;
			$slno = 1;
			while($row = $result->fetch_array()){
				$assign_id = $row['assign_id'];					
		 
				$full_name = $row['full_name'];
				$client_id = $row['client_id'];
				$rcvabl_amount = $row['rcvabl_amount']; 
				$worker_id = $row['worker_id'];
				$exp_salary = $row['exp_salary'];

				$from_date = $row['from_date'];
				$to_date = $row['to_date'];
				$from_time = $row['from_time']; 
				$to_time = $row['to_time'];	
				$bill_status_name = $row['bill_status_name'];
				// $bill_status_text = '';
				// if($bill_status == '0'){
				// 	$bill_status_text = 'Pending';
				// }else if($bill_status == '1'){
				// 	$bill_status_text = 'Paid';
				// }else{
				// 	$bill_status_text = 'Due';
				// }


				$data[0] = $slno;
				$data[1] = 'INV_'.str_pad($assign_id, 4, "0", STR_PAD_LEFT);
				$data[2] = $full_name;
				$data[3] = $rcvabl_amount;
				$data[4] = $worker_id;
				$data[5] = $exp_salary;
				$data[6] = date('d-F Y', strtotime($from_date));
				$data[7] = date('d-F Y', strtotime($to_date));
				$data[8] = date('h:i A', strtotime($from_time)).' To '.date('h:i A', strtotime($to_time));
				$data[9] = $bill_status_name;
				$data[10] = "<a href='javascript: void(0)' data-assign_id='.$assign_id.'><i class='fa fa-eye' aria-hidden='true' onclick='editTableData(".$assign_id.")'></i></a>  <a href='javascript: void(0)' data-assign_id='.$assign_id.'><i class='fa fa-calendar' aria-hidden='true' onclick='viewAttendanceData(".$assign_id.")'></i></a>  <a href='javascript: void(0)' data-assign_id='.$assign_id.'><i class='fa fa-trash' aria-hidden='true' onclick='deleteTableData(".$assign_id.")'></i></a>"; 
				array_push($mainData, $data);
				$slno++;
			}
		} else {
			$status = false;
		}
		//$con->close();

		$return_array['data'] = $mainData;
    	echo json_encode($return_array);
	}//function end	

	//function start
	if($fn == 'getFormEditData'){
		$return_array = array();
		$status = true;
		$mainData = array();
		$assign_id = $_POST['assign_id'];

		$sql = "SELECT assign_maid.assign_id, assign_maid.client_id, assign_maid.rcvabl_amount, assign_maid.worker_id, assign_maid.exp_salary, assign_maid.from_date, assign_maid.to_date, assign_maid.from_time, assign_maid.to_time, assign_maid.payment_history, assign_maid.assign_by, assign_maid.asssign_time, assign_maid.bill_status,
		user_details.full_name
		FROM assign_maid 
		LEFT OUTER JOIN user_details ON assign_maid.client_id = user_details.user_id 
		WHERE assign_maid.assign_id = '" .$assign_id. "' "; 
		//echo $sql;
		$result = $con->query($sql);

		if ($result->num_rows > 0) {
			$status = true;	
			$row = $result->fetch_array();
			
			$return_array['assign_id'] = $row['assign_id'];
			$return_array['assign_id'] = $row['assign_id'];					
		
			$return_array['full_name'] = $row['full_name'];
			$return_array['client_id'] = $row['client_id'];
			$return_array['rcvabl_amount'] = $row['rcvabl_amount']; 
			$return_array['worker_id'] = $row['worker_id'];
			$return_array['exp_salary'] = $row['exp_salary'];

			$return_array['from_date'] = $row['from_date'];
			$return_array['to_date'] = $row['to_date'];
			$return_array['from_time'] = $row['from_time']; 
			$return_array['to_time'] = $row['to_time'];	
			$return_array['bill_status'] = $row['bill_status'];

		} else {
			$status = false;
		}
		

		$return_array['status'] = $status;
    	echo json_encode($return_array);
	}//function end

	//Delete function
	if($fn == 'deleteTableData'){
		$return_result = array();
		$assign_id = $_POST["assign_id"];
		$status = true;	

		$sql = "DELETE FROM assign_maid WHERE assign_id = '".$assign_id."'";
		$result = $con->query($sql);
		$return_result['status'] = $status; 
		echo json_encode($return_result);
	}//end function deleteItem

	//Get Category name
	if($fn == 'getAllCategoryName'){
		$return_array = array();
		$status = true;
		$mainData = array();

		$sql = "SELECT * FROM assign_maid WHERE almari_status = 'active' ORDER BY almari_name ASC";
		$result = $con->query($sql);

		if ($result->num_rows > 0) {
			$status = true;
			$slno = 1;
			while($row = $result->fetch_array()){
				$assign_id = $row['assign_id'];	
				$almari_name = $row['almari_name'];
				$data = new stdClass();

				$data->assign_id = $assign_id;
				$data->almari_name = $almari_name;
				
				array_push($mainData, $data);
				$slno++;
			}
		} else {
			$status = false;
		}
		//$con->close();

		$return_array['status'] = $status;
		$return_array['data'] = $mainData;
    	echo json_encode($return_array);
	}//function end	

	//Get Leave Status
	if($fn == 'configureLeaveStatDD'){
		$return_array = array();
		$status = true;
		$mainData = array();

		$sql = "SELECT * FROM leave_stat_master";
		$result = $con->query($sql);

		if ($result->num_rows > 0) {
			$status = true;
			$slno = 1;
			while($row = $result->fetch_array()){
				$lsm_id = $row['lsm_id'];	
				$l_stat_name = $row['l_stat_name'];	
				$data = new stdClass();

				$data->lsm_id = $lsm_id;
				$data->l_stat_name = $l_stat_name;
				
				array_push($mainData, $data);
				$slno++;
			}
		} else {
			$status = false;
		}
		//$con->close();

		$return_array['status'] = $status;
		$return_array['data'] = $mainData;
    	echo json_encode($return_array);
	}//function end	

	//Get Leave Status
	if($fn == 'saveReceiveAmount'){
		$return_array = array();
		$status = false;
		$payment_history = array();
		$rcvabl_amount = 0;

		$paid_amount = $_POST['paid_amount'];
		$payment_mode = $_POST['payment_mode'];
		$transaction_id = $_POST['transaction_id'];
		$assign_id = $_POST['assign_id'];

		$sql = "SELECT * FROM assign_maid WHERE assign_id = '" .$assign_id. "' ";
		$result = $con->query($sql);

		if ($result->num_rows > 0) {
			$row = $result->fetch_array(); 
			$rcvabl_amount = $row['rcvabl_amount'];
			if($row['payment_history'] != ''){
				$payment_history = json_decode($row['payment_history']);	
			}
		}
		$payment_data = new stdClass();
		$payment_data->paid_amount = $paid_amount;
		$payment_data->payment_mode = $payment_mode;
		$payment_data->transaction_id = $transaction_id;
		$payment_data->received_at = date('Y-m-d H:i:s');
		$payment_data->received_at_f = date('d-F Y h:i A');
		array_push($payment_history, $payment_data);

		$payment_history1 = json_encode($payment_history);
		$sql = "UPDATE assign_maid SET payment_history = '" .$payment_history1. "' WHERE assign_id = '" .$assign_id. "' ";
		$result = $con->query($sql);

		if(sizeof($payment_history) > 0){
			$status = true;
		}
		$return_array['status'] = $status;
		$return_array['payment_history'] = $payment_history;		
		$return_array['rcvabl_amount'] = $rcvabl_amount;
    	echo json_encode($return_array);
	}//function end		

	//function start
	if($fn == 'getAttendance'){
		$return_array = array();
		$atten_data = array();
		$status = true;		
		$error_message = 'Attendance found';	 
		$from_date = '';
		$to_date = '';
		$full_name = '';

		$assign_id = $_POST['assign_id']; 

		$sql = "SELECT assign_maid.assign_id, assign_maid.client_id, assign_maid.rcvabl_amount, assign_maid.worker_id, assign_maid.exp_salary, assign_maid.from_date, assign_maid.to_date, assign_maid.from_time, assign_maid.to_time, assign_maid.payment_history, assign_maid.assign_by, assign_maid.asssign_time, assign_maid.bill_status, assign_maid.atten_data,
		user_details.full_name
		FROM assign_maid 
		LEFT OUTER JOIN user_details ON assign_maid.worker_id = user_details.user_id 
		WHERE assign_maid.assign_id = '" .$assign_id. "' "; 

		$result = $con->query($sql);

		if ($result->num_rows > 0) {
			$row = $result->fetch_array(); 
			$from_date = $row['from_date'];
			$to_date = $row['to_date'];
			$full_name = $row['full_name'];
			
			if($row['atten_data'] != ''){
				$atten_data = json_decode($row['atten_data']); 
			}
		}

		if(sizeof($atten_data) == 0){
			$current = strtotime($from_date);
			$endDate = strtotime($to_date);
			$slno = 1;
			while ($current <= $endDate) {
				//echo date("Y-m-d", $current) . "<br>";
				$atten_data_obj = new stdClass();
				$atten_data_obj->slno = $slno;
				$atten_data_obj->atten_date = date('d-m-Y', $current);
				$atten_data_obj->pre_abs_lev = '';
				$atten_data_obj->atten_note = '';

				array_push($atten_data, $atten_data_obj);
				$current = strtotime("+1 day", $current);
				$slno++;
			}

			// update attendance data
			$atten_data1 = json_encode($atten_data);
			$sql = "UPDATE assign_maid SET atten_data = '" .$atten_data1. "' WHERE assign_id = '" .$assign_id. "' ";
			$result = $con->query($sql);
		}//end if		

		$return_array['status'] = $status;
		$return_array['atten_data'] = $atten_data; 
		$return_array['from_date'] = $from_date; 
		$return_array['to_date'] = $to_date; 
		$return_array['full_name'] = $full_name; 
		
    	echo json_encode($return_array);
	}//function end	 

	

	//Save function start
	if($fn == 'updateAttendance'){
		$return_result = array();
		$atten_data = array();
		$status = true;

		$serial_no = $_POST["serial_no"];	
		$pre_abs_lev = $_POST["pre_abs_lev"];
		$atten_note = $_POST["atten_note"];	
		$assign_id = $_POST["assign_id"];	
		
		
		try {
			$sql = "SELECT * FROM assign_maid WHERE assign_id = '" .$assign_id. "' ";
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
				$sql2 = "UPDATE assign_maid SET atten_data = '" .$atten_data_en. "' WHERE assign_id = '" .$assign_id. "' ";
				$result2 = $mysqli->query($sql2);
			} 		
			
		} catch (PDOException $e) {
			die("Error occurred:" . $e->getMessage());
		}
		$return_result['status'] = $status; 

		echo json_encode($return_result);
	}//Save function end

	// Bill Status
	if($fn == 'configureBillStatusDd'){
		$return_array = array();
		$status = true;
		$mainData = array();
		
		$sql = "SELECT * FROM bill_status_master";
		$result = $con->query($sql);

		if ($result->num_rows > 0) {
			$status = true; 
			while($row = $result->fetch_array()){
				$data_obj = new stdClass();
				$data_obj->bs_id = $row['bs_id'];
				$data_obj->bill_status_name = $row['bill_status_name']; 
				
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