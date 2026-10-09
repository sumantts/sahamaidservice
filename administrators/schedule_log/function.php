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
		 
		$log_id = $_POST['log_id'];
		$client_id = $_POST['client_id'];
		$client_name = $_POST['client_name'];
		$client_mobile = $_POST['client_mobile'];
		$area_location_id = $_POST['area_location_id'];
		$area_location_name = $_POST['area_location_name'];
		$building_id = $_POST['building_id'];
		$building_name = $_POST['building_name'];
		$service_id = $_POST['service_id'];
		$service_name = $_POST['service_name'];
		$service_rate_per_hour = $_POST['service_rate_per_hour'];
		$booking_date_f = $_POST['booking_date_f'];
		$booking_date_t = $_POST['booking_date_t'];
		$from_time = $_POST['from_time'];
		$to_time = $_POST['to_time'];
		$total_hours = $_POST['total_hours'];
		$total_amount = $_POST['total_amount'];
		$bill_type = $_POST['bill_type'];
		$bill_type_name = $_POST['bill_type_name'];
		$cgst_percent = $_POST['cgst_percent'];
		$cgst_amount = $_POST['cgst_amount'];
		$sgst_percent = $_POST['sgst_percent'];
		$sgst_amount = $_POST['sgst_amount'];
		$total_amount_with_tax = $_POST['total_amount_with_tax'];
		$amount_paid = $_POST['amount_paid'];
		$amount_due = $_POST['amount_due'];
		$worker_id = $_POST['worker_id'];
		$worker_name = $_POST['worker_name'];
		$worker_mobile = $_POST['worker_mobile'];
		$order_status = $_POST['order_status'];
		$order_placed_date = $_POST['order_placed_date'];
		$order_placed_time = $_POST['order_placed_time'];
		$order_placed_by = $_POST['order_placed_by'];
		$order_placed_by_name = $_POST['order_placed_by_name'];
		$order_channel_name = $_POST['order_channel_name'];
		if($_POST['payment_history'] != ''){
			$payment_history = json_encode($_POST['payment_history']);  
		}
		if($_POST['order_status_history'] != ''){  
			$order_status_history = json_encode($_POST['order_status_history']);
		}

		

		$sess_user_id = $_SESSION["user_id"];
		$order_placed_by = $sess_user_id;
		$order_placed_by_name = $_SESSION["full_name"];

		if($client_id == ''){
			$user_type = '4';
			$sql = "INSERT INTO user_details (user_type, added_by, full_name, phone_number) VALUES('" .$user_type. "', '" .$sess_user_id. "', '" .$client_name. "', '" .$client_mobile. "')";
			$result = $con->query($sql);
			$insert_id = $con->insert_id; 
			$client_id = $insert_id;
		}

		try {
			if($log_id > 0){
				$status = true;
				$sql = "UPDATE assign_maid SET holiday_count = '" .$holiday_count. "', rcvabl_amount = '" .$rcvabl_amount. "', cal_ty_id = '" .$cal_ty_id. "', otcc = '" .$otcc. "', ticket_fare = '" .$ticket_fare. "', food_cost = '" .$food_cost. "', tr_jc = '" .$tr_jc. "' WHERE assign_id = '" .$assign_id. "' ";
				$result = $con->query($sql);
			}else{				
				$status = true;
				$sql = "INSERT INTO schedule_log (client_id, client_name, client_mobile, area_location_id, area_location_name, building_id, building_name, service_id, service_name, service_rate_per_hour, booking_date_f, booking_date_t, from_time, to_time, total_hours, total_amount, bill_type, cgst_percent, cgst_amount, sgst_percent, sgst_amount, total_amount_with_tax, amount_paid, amount_due, worker_id, worker_name, worker_mobile, bill_status, order_placed_date, order_placed_time, order_placed_by, order_placed_by_name, order_channel_name) VALUES ('" .$client_id. "', '" .$client_name."', '" .$client_mobile."', '" .$area_location_id."', '" .$area_location_name."', '" .$building_id."', '" .$building_name."', '" .$service_id."', '" .$service_name."', '" .$service_rate_per_hour."', '" .$booking_date_f."', '" .$booking_date_t."', '" .$from_time."', '" .$to_time."', '" .$total_hours."', '" .$total_amount."', '" .$bill_type."', '" .$cgst_percent."', '" .$cgst_amount."', '" .$sgst_percent."', '" .$sgst_amount."', '" .$total_amount_with_tax."', '" .$amount_paid."', '" .$amount_due."', '" .$worker_id."', '" .$worker_name."', '" .$worker_mobile."', '" .$order_status."', '" .$order_placed_date."', '" .$order_placed_time."', '" .$order_placed_by."', '" .$order_placed_by_name."', '" .$order_channel_name."') ";
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

		$sql = "SELECT * FROM schedule_log ORDER BY log_id DESC";

		$result = $con->query($sql);

		if ($result->num_rows > 0) {
			$status = true;
			$slno = 1;
			while($row = $result->fetch_array()){
				
			$log_id = $row['log_id'];
			$client_id = $row['client_id'];
			$client_name = $row['client_name'];
			$client_mobile = $row['client_mobile'];
			$area_location_id = $row['area_location_id'];
			$area_location_name = $row['area_location_name'];
			$building_id = $row['building_id'];
			$building_name = $row['building_name'];
			$service_id = $row['service_id'];
			$service_name = $row['service_name'];
			$service_rate_per_hour = $row['service_rate_per_hour'];
			$booking_date_f = $row['booking_date_f'];
			$booking_date_t = $row['booking_date_t'];
			$from_time = $row['from_time'];
			$to_time = $row['to_time'];
			$total_hours = $row['total_hours'];
			$total_amount = $row['total_amount'];
			$bill_type = $row['bill_type'];
			//$bill_type_name = $row['bill_type_name'];
			$cgst_percent = $row['cgst_percent'];
			$cgst_amount = $row['cgst_amount'];
			$sgst_percent = $row['sgst_percent'];
			$sgst_amount = $row['sgst_amount'];
			$total_amount_with_tax = $row['total_amount_with_tax'];
			$amount_paid = $row['amount_paid'];
			$amount_due = $row['amount_due'];
			$worker_id = $row['worker_id'];
			$worker_name = $row['worker_name'];
			$worker_mobile = $row['worker_mobile'];
			$bill_status = $row['bill_status'];
			$order_placed_date = $row['order_placed_date'];
			$order_placed_time = $row['order_placed_time'];
			$order_placed_by = $row['order_placed_by'];
			$order_placed_by_name = $row['order_placed_by_name'];
			$order_channel_name = $row['order_channel_name'];
			if($row['payment_history'] != ''){
				$payment_history = json_decode($row['payment_history']);  
			}
			if($row['order_status_history'] != ''){  
				$order_status_history = json_decode($row['order_status_history']);
			}


				$data[0] = $slno;
				$data[1] = 'INV_'.str_pad($log_id, 4, "0", STR_PAD_LEFT);
				$data[2] = $client_name;
				$data[3] = $total_amount;
				$data[4] = $client_mobile;
				$data[5] = $area_location_name;
				$data[6] = $building_name;
				$data[7] = $service_name;
				$data[8] = date('d-F Y', strtotime($booking_date_f)).' To '.date('d-F Y', strtotime($booking_date_t));
				$data[9] = date('h:i A', strtotime($from_time)).' To '.date('h:i A', strtotime($to_time));;
				$data[10] = '';
				$data[11] = '';
				$data[12] = '';
				$data[13] = '';
				//$data[14] = "<a href='javascript: void(0)' data-log_id='.$log_id.'><i class='fa fa-pencil' aria-hidden='true' onclick='editTableData(".$log_id.")'></i></a>  <a href='javascript: void(0)' data-log_id='.$log_id.'><i class='fa fa-calendar' aria-hidden='true' onclick='viewAttendanceData(".$log_id.")'></i></a>  <a href='javascript: void(0)' data-log_id='.$log_id.'><i class='fa fa-trash' aria-hidden='true' onclick='deleteTableData(".$log_id.")'></i></a>"; 
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

		$sql = "SELECT assign_maid.assign_id, assign_maid.client_id, assign_maid.rcvabl_amount, assign_maid.worker_id, assign_maid.exp_salary, assign_maid.from_date, assign_maid.to_date, assign_maid.from_time, assign_maid.to_time, assign_maid.payment_history, assign_maid.assign_by, assign_maid.asssign_time, assign_maid.bill_status, assign_maid.hsn_code, assign_maid.wt_id, assign_maid.holiday_count, assign_maid.cal_ty_id, assign_maid.otcc, assign_maid.ticket_fare, assign_maid.food_cost, assign_maid.tr_jc,
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
			$return_array['hsn_code'] = $row['hsn_code'];
			$return_array['wt_id'] = $row['wt_id'];
			$return_array['holiday_count'] = $row['holiday_count'];
			$return_array['cal_ty_id'] = $row['cal_ty_id'];

			$return_array['otcc'] = $row['otcc'];
			$return_array['ticket_fare'] = $row['ticket_fare'];
			$return_array['food_cost'] = $row['food_cost'];
			$return_array['tr_jc'] = $row['tr_jc'];
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

	// Calculation Type
	if($fn == 'configureCalculationTypeeDd'){
		$return_array = array();
		$status = true;
		$mainData = array();
		
		$sql = "SELECT * FROM calculation_type";
		$result = $con->query($sql);

		if ($result->num_rows > 0) {
			$status = true; 
			while($row = $result->fetch_array()){
				$data_obj = new stdClass();
				$data_obj->cal_ty_id = $row['cal_ty_id'];
				$data_obj->cal_ty_name = $row['cal_ty_name']; 
				
				array_push($mainData, $data_obj);
			}
		}else{
			$status = false;			
		}

		$return_array['status'] = $status;
		$return_array['data'] = $mainData;
    	echo json_encode($return_array);
	}//function end

	// Get building name based on area/location
	if($fn == 'configureBuildingDd'){
		$return_array = array();
		$status = true;
		$mainData = array();
		$area_location_id = $_POST['area_location_id'];
		
		$sql = "SELECT * FROM service_area WHERE parent_sa_id = '" . $area_location_id . "'";
		$result = $con->query($sql);

		if ($result->num_rows > 0) {
			$status = true; 
			while($row = $result->fetch_array()){
				$data_obj = new stdClass();
				$data_obj->sa_id_child = $row['sa_id'];
				$data_obj->name = $row['building_name']; 
				
				array_push($mainData, $data_obj);
			}
		}else{
			$status = false;			
		}

		$return_array['status'] = $status;
		$return_array['data'] = $mainData;
		echo json_encode($return_array);
	}//function end

	// Get service name based on building
	if($fn == 'configureServiceDd'){
		$return_array = array();
		$status = true;
		$mainData = array();
		$area_location_id = $_POST['area_location_id'];
		$building_id = $_POST['building_id'];
		
		$sql = "SELECT service_rate_chart.src_id, service_rate_chart.qs_id, service_rate_chart.qs_id, service_rate_chart.sa_id, service_rate_chart.sa_id_child, service_rate_chart.rate_first, service_rate_chart.rate_normal, quick_services.service_name, quick_services.svc_included, quick_services.svc_not_included FROM service_rate_chart JOIN quick_services ON service_rate_chart.qs_id = quick_services.qs_id WHERE service_rate_chart.sa_id = '" . $area_location_id . "' AND service_rate_chart.sa_id_child = '" . $building_id . "' AND quick_services.svc_status = '1' ";

		$result = $con->query($sql);

		if ($result->num_rows > 0) {
			$status = true; 
			while($row = $result->fetch_array()){
				$data_obj = new stdClass();
				$data_obj->src_id = $row['src_id'];
				$data_obj->qs_id = $row['qs_id'];
				$data_obj->rate_first = $row['rate_first']; 
				$data_obj->rate_normal = $row['rate_normal']; 
				$data_obj->service_name = $row['service_name']; 
				$data_obj->svc_included = json_decode($row['svc_included']); 
				$data_obj->svc_not_included = json_decode($row['svc_not_included']);
				
				array_push($mainData, $data_obj);
			}
		}else{
			$status = false;			
		}

		$return_array['status'] = $status;
		$return_array['data'] = $mainData;
		echo json_encode($return_array);
	}//function end

	# Exporting rows from "quick_service_status" table
	if($fn == 'configureQuickServiceStatusDd'){
		$return_array = array();
		$status = true;
		$mainData = array();
		// $area_location_id = $_POST['area_location_id'];
		
		$sql = "SELECT * FROM quick_service_status ORDER BY status_name ASC";
		$result = $con->query($sql);

		if ($result->num_rows > 0) {
			$status = true; 
			while($row = $result->fetch_array()){
				$data_obj = new stdClass();
				$data_obj->id = $row['qss_id'];
				$data_obj->name = $row['status_name']; 
				
				array_push($mainData, $data_obj);
			}
		}else{
			$status = false;			
		}

		$return_array['status'] = $status;
		$return_array['data'] = $mainData;
		echo json_encode($return_array);
	}//function end

	// Get client name based on mobile number
	if($fn == 'getClientNameByMobile'){
		$return_array = array();
		$status = true;
		$mainData = array();
		$mobile_no = $_POST['mobile_no'];
		
		$sql = "SELECT * FROM user_details WHERE phone_number = '" . $mobile_no . "' AND user_type = '4' ";
		$result = $con->query($sql);

		if ($result->num_rows > 0) {
			$status = true; 
			while($row = $result->fetch_array()){
				$data_obj = new stdClass();
				$data_obj->user_id = $row['user_id'];
				$data_obj->full_name = $row['full_name']; 
				
				array_push($mainData, $data_obj);
			}
		}else{
			$status = false;			
		}

		$return_array['status'] = $status;
		$return_array['data'] = $mainData;
		echo json_encode($return_array);
	}//function end

	// Get availabel worker for Quick service based on date & time
	if($fn == 'getAvailableWorkerForQuickService'){
		$return_array = array();
		$status = true;
		$mainData = array();
		$from_date = $_POST['from_date'];
		$to_date = $_POST['to_date'];
		$from_time = $_POST['from_time'];
		$to_time = $_POST['to_time'];
		
		$sql = "SELECT * FROM user_details WHERE user_type = '5' AND quick_service = '1' ";
		$result = $con->query($sql);

		if ($result->num_rows > 0) {
			while($row = $result->fetch_array()){
				$data_obj = new stdClass();
				$data_obj->user_id = $row['user_id'];
				$data_obj->full_name = $row['full_name']; 
				$data_obj->phone_number = $row['phone_number']; 
				
				array_push($mainData, $data_obj);
			}
			if(sizeof($mainData) > 0){
				$status = true; 
			}else{
				$status = false;			
			}
			
		}else{
			$status = false;			
		}

		$return_array['status'] = $status;
		$return_array['data'] = $mainData;
		echo json_encode($return_array);
	}//function end

	
?>