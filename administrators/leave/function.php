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

		$l_id = $_POST["l_id"];		
		$almari_name = $con->real_escape_string($_POST["almari_name"]);			
		$almari_status = $con->real_escape_string($_POST["almari_status"]);
		
		try {
			if($l_id > 0){
				$status = true;
				$sql = "UPDATE leave_request SET almari_name = '" .$almari_name. "', almari_status = '" .$almari_status. "' WHERE l_id = '" .$l_id. "' ";
				$result = $con->query($sql);
			}else{

				$sql = "SELECT * FROM leave_request WHERE almari_name = '" .$almari_name. "' ";
				$result = $con->query($sql);
		
				if ($result->num_rows > 0) {
					$status = false;
				}else{
					$status = true;
					$sql = "INSERT INTO leave_request (almari_name, almari_status) VALUES ('".$almari_name."', '".$almari_status."')";
					$result = $con->query($sql);
				}
			}
				
		} catch (PDOException $e) {
			die("Error occurred:" . $e->getMessage());
		}
		$return_result['status'] = $status;
		sleep(2);
		echo json_encode($return_result);
	}//Save function end	

	//function start
	if($fn == 'getTableData'){
		$return_array = array();
		$status = true;
		$mainData = array();
		$author_bio1 = '';
		$sql = "SELECT leave_request.l_id, leave_request.user_type, leave_request.user_id, leave_request.from_date, leave_request.to_date, leave_request.leave_subject, leave_request.leave_message, leave_request.lsm_id, leave_request.approved_by, leave_request.approve_date_time,
		user_type_master.name AS user_type_text,
		user_details.full_name,
		leave_stat_master.l_stat_name
		FROM leave_request
		LEFT OUTER JOIN user_type_master ON leave_request.user_type = user_type_master.user_type
		LEFT OUTER JOIN user_details ON leave_request.user_id = user_details.user_id
		LEFT OUTER JOIN leave_stat_master ON leave_request.lsm_id = leave_stat_master.lsm_id
		ORDER BY leave_request.l_id DESC";
		$result = $con->query($sql);

		if ($result->num_rows > 0) {
			$status = true;
			$slno = 1;
			while($row = $result->fetch_array()){
				$l_id = $row['l_id'];	
				$full_name = $row['full_name'];	
				$user_type_text = $row['user_type_text'];	
				$from_date = $row['from_date'];	
				$to_date = $row['to_date'];		
				$leave_subject = $row['leave_subject'];		
				$l_stat_name = $row['l_stat_name'];	
				

				$data[0] = $slno;
				$data[1] = $full_name.'('.$user_type_text.')';
				$data[2] = date('d-F-Y', strtotime($from_date));
				$data[3] = date('d-F-Y', strtotime($to_date));
				$data[4] = $leave_subject;
				$data[5] = $l_stat_name;
				$data[6] = "<a href='javascript: void(0)' data-l_id='.$l_id.'><i class='fa fa-edit' aria-hidden='true' onclick='editTableData(".$l_id.")'></i></a> <a href='javascript: void(0)' data-l_id='.$l_id.'> <i class='fa fa-trash' aria-hidden='true' onclick='deleteTableData(".$l_id.")'></i></a>";

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
		$l_id = $_POST['l_id'];

		$sql = "SELECT leave_request.l_id, leave_request.user_type, leave_request.user_id, leave_request.from_date, leave_request.to_date, leave_request.leave_subject, leave_request.leave_message, leave_request.lsm_id, leave_request.approved_by, leave_request.approve_date_time,
		user_type_master.name AS user_type_text,
		user_details.full_name,
		leave_stat_master.l_stat_name
		FROM leave_request
		LEFT OUTER JOIN user_type_master ON leave_request.user_type = user_type_master.user_type
		LEFT OUTER JOIN user_details ON leave_request.user_id = user_details.user_id
		LEFT OUTER JOIN leave_stat_master ON leave_request.lsm_id = leave_stat_master.lsm_id
		WHERE leave_request.l_id = '" .$l_id. "' ";
		//echo $sql;
		$result = $con->query($sql);

		if ($result->num_rows > 0) {
			$status = true;	
			$row = $result->fetch_array();
			
			$return_array['l_id'] = $row['l_id'];
			$return_array['user_type'] = $row['user_type'];
			$return_array['user_id'] = $row['user_id'];
			$return_array['from_date'] = $row['from_date'];
			$return_array['to_date'] = $row['to_date'];
			$return_array['leave_subject'] = $row['leave_subject'];
			$return_array['leave_message'] = $row['leave_message'];	
			$return_array['l_stat_name'] = $row['l_stat_name'];	
			$return_array['approved_by'] = $row['approved_by'];
			$return_array['approve_date_time'] = $row['approve_date_time'];	
			$return_array['full_name'] = $row['full_name'];	
			$return_array['user_type_text'] = $row['user_type_text'];

		} else {
			$status = false;
		}
		

		$return_array['status'] = $status;
    	echo json_encode($return_array);
	}//function end

	//Delete function
	if($fn == 'deleteTableData'){
		$return_result = array();
		$l_id = $_POST["l_id"];
		$status = true;	

		$sql = "DELETE FROM leave_request WHERE l_id = '".$l_id."'";
		$result = $con->query($sql);
		$return_result['status'] = $status;
		sleep(1);
		echo json_encode($return_result);
	}//end function deleteItem

	//Get Category name
	if($fn == 'getAllCategoryName'){
		$return_array = array();
		$status = true;
		$mainData = array();

		$sql = "SELECT * FROM leave_request WHERE almari_status = 'active' ORDER BY almari_name ASC";
		$result = $con->query($sql);

		if ($result->num_rows > 0) {
			$status = true;
			$slno = 1;
			while($row = $result->fetch_array()){
				$l_id = $row['l_id'];	
				$almari_name = $row['almari_name'];
				$data = new stdClass();

				$data->l_id = $l_id;
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

?>