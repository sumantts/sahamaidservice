<?php
	include('../assets/php/sql_conn.php');
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
	if($fn == 'getuserDetails'){
		$current_tab = $_GET['current_tab'];
		$sess_user_id = $_SESSION["user_id"];
		$sess_user_type = $_SESSION["user_type"];

		$return_array = array();
		$status = true;
		$mainData = array();

		$where_condition = 'WHERE user_id > 0';

		if($current_tab == 'admin'){
			$user_type1 = 1;
			$where_condition .= ' AND user_type = '.$user_type1;
		}else if($current_tab == 'manager'){
			$user_type1 = 2;
			$where_condition .= ' AND user_type = '.$user_type1;
		}else if($current_tab == 'employee'){
			$user_type1 = 3;
			$where_condition .= ' AND user_type = '.$user_type1;
		}else if($current_tab == 'client'){
			$user_type1 = 4;
			$where_condition .= ' AND user_type = '.$user_type1;
		}else if($current_tab == 'worker'){
			$user_type1 = 5;
			$where_condition .= ' AND user_type = '.$user_type1;
		}else{
		}

		if($sess_user_type == '1'){
		}else if($sess_user_type == '2'){
			$where_condition .= ' AND inserted_by = '.$sess_user_id;			
		}else if($sess_user_type == '3'){
			$where_condition .= ' AND inserted_by = '.$sess_user_id;			
		}else if($sess_user_type == '4'){			
		}else if($sess_user_type == '5'){			
		}else{}

		$sql = "SELECT * FROM user_details $where_condition ORDER BY full_name ASC";
		//echo $sql;

		$result = $mysqli->query($sql);

		if ($result->num_rows > 0) {
			$status = true;
			$sl = 1;	
			while($row = $result->fetch_array()){
				$user_id = $row['user_id'];
				$username = $row['username'];
				$password = $row['password'];
				$user_type = $row['user_type'];
				$added_by = $row['added_by'];
				$full_name = $row['full_name'];
				$email_id = $row['email_id'];
				$phone_number = $row['phone_number'];
				$date_of_birth = $row['date_of_birth'];
				$address = $row['address'];
				$pincode = $row['pincode'];
				$adhar_card = $row['adhar_card'];
				$adhar_card_img = $row['adhar_card_img'];
				$pan_card = $row['pan_card'];
				$pan_card_img = $row['pan_card_img'];
				$voter_id_card = $row['voter_id_card'];
				$voter_id_card_img = $row['voter_id_card_img'];
				$bank_details = $row['bank_details'];
				$bank_details_img = $row['bank_details_img'];
				$highest_edu = $row['highest_edu'];
				$inserted_by = $row['inserted_by'];
				$updated_by = $row['updated_by'];
				$insert_date = $row['insert_date'];
				$update_date = $row['insert_date'];
				
				$action_button = "<i class='fa fa-edit' aria-hidden='true' onclick='editTableData(".$user_id.")'></i> <i class='fa fa-trash' aria-hidden='true' onclick='deleteTableData(".$user_id.")'></i>";

				$data[0] = $sl;
				$data[1] = $full_name;
				$data[2] = $email_id;
				$data[3] = $phone_number;
				$data[4] = $adhar_card;
				$data[5] = $pan_card;
				$data[6] = $voter_id_card;
				$data[7] = $pincode;
				$data[8] = $action_button;

				array_push($mainData, $data);
				$sl++;

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