<?php
	include('../assets/php/sql_conn.php');
	$fn = '';
    
	if(isset($_GET["fn"])){
	    $fn = $_GET["fn"];
	}
    
	if(isset($_POST["fn"])){
	    $fn = $_POST["fn"];
	}
	
	
	
	//save Form Data
	if($fn == 'saveFormData'){
		$return_array = array();
		$status = true;
		$error_message = ''; 
		$sess_user_type = $_SESSION["user_type"];
		$sess_user_id = $_SESSION["user_id"];


		$field_id = $_POST['field_id']; 
		$field_val = $_POST['field_val'];  
		$current_tab = $_POST['current_tab'];  
		$serial_number = $_POST['serial_number']; 

		$user_type = 0;
		if($current_tab == 'admin'){
			$user_type = 1;
		}else if($current_tab == 'manager'){
			$user_type = 2;
		}else if($current_tab == 'employee'){
			$user_type = 3;
		}else if($current_tab == 'client'){
			$user_type = 4;
		}else if($current_tab == 'worker'){
			$user_type = 5;
		}else{}

		if($serial_number > 0){			
			$sql = "SELECT * FROM user_details WHERE $field_id = '".$field_val."' AND user_id != '" .$serial_number. "' ";
			$result = $con->query($sql);

			if ($result->num_rows > 0) {
				$status = false;
				if($field_id == 'email_id'){
					$error_message = 'Email ID already exists';
				}else if($field_id == 'phone_number'){
					$error_message = 'Phone number already exists';
				}else if($field_id == 'adhar_card'){
					$error_message = 'Aadhar number already exists';
				}else if($field_id == 'pan_card'){
					$error_message = 'PAN number already exists';
				}else if($field_id == 'voter_id_card'){
					$error_message = 'Voter ID already exists';
				}
			} else {
				$sql1 = "UPDATE user_details SET $field_id = '" .$field_val. "', updated_by = '" .$sess_user_id. "' WHERE user_id = '".$serial_number."'";
				$result1 = $con->query($sql1);
				$error_message = 'Data updated successfully';
			}
		}else{
			if($field_id == 'email_id' || $field_id == 'phone_number' || $field_id == 'adhar_card' || $field_id == 'pan_card' || $field_id == 'voter_id_card'){
				$sql = "SELECT * FROM user_details WHERE $field_id = '".$field_val."'";
				$result = $con->query($sql);

				if ($result->num_rows > 0) {
					$status = false;
					if($field_id == 'email_id'){
						$error_message = 'Email ID already exists';
					}else if($field_id == 'phone_number'){
						$error_message = 'Phone number already exists';
					}else if($field_id == 'adhar_card'){
						$error_message = 'Aadhar number already exists';
					}else if($field_id == 'pan_card'){
						$error_message = 'PAN number already exists';
					}else if($field_id == 'voter_id_card'){
						$error_message = 'Voter ID already exists';
					}
				} else {
					$status = true;
					$sql2 = "INSERT INTO user_details ($field_id, user_type, added_by, inserted_by) VALUES ('" .$field_val. "', '" .$user_type. "', '" .$sess_user_id. "', '" .$sess_user_id. "')";
					$result2 = $con->query($sql2);
					$serial_number = $con->insert_id;
					$error_message = 'Data inserted successfully';
				}
			}else{				
				$status = true;
				$sql3 = "INSERT INTO user_details ($field_id, user_type, added_by, inserted_by) VALUES ('" .$field_val. "', '" .$user_type. "', '" .$sess_user_id. "', '" .$sess_user_id. "')";
				$result3 = $con->query($sql3);
				$serial_number = $con->insert_id;
				$error_message = 'Data inserted successfully';
			}
		}
		$con->close();	


		$return_array['status'] = $status;  
		$return_array['error_message'] = $error_message; 
		$return_array['serial_number'] = $serial_number; 
    	echo json_encode($return_array);
	}//function end	
	
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


	

	// Gender
	if($fn == 'configureGenderDd'){ 
		$return_array = array();
		$status = true;
		$mainData = array();
		
		$sql = "SELECT * FROM gender_master";
		$result = $con->query($sql);

		if ($result->num_rows > 0) {
			$status = true; 
			while($row = $result->fetch_array()){
				$data_obj = new stdClass();
				$data_obj->g_id = $row['g_id'];
				$data_obj->gender_name = $row['gender_name'];
				
				array_push($mainData, $data_obj);
			}
		}else{
			$status = false;			
		}

		$return_array['status'] = $status;
		$return_array['data'] = $mainData;
    	echo json_encode($return_array);
	}//function end

	// Marital Status
	if($fn == 'configureMaritalStatusDd'){ 
		$return_array = array();
		$status = true;
		$mainData = array();
		
		$sql = "SELECT * FROM marital_status_master";
		$result = $con->query($sql);

		if ($result->num_rows > 0) {
			$status = true; 
			while($row = $result->fetch_array()){
				$data_obj = new stdClass();
				$data_obj->m_id = $row['m_id'];
				$data_obj->m_status_name = $row['m_status_name'];
				
				array_push($mainData, $data_obj);
			}
		}else{
			$status = false;			
		}

		$return_array['status'] = $status;
		$return_array['data'] = $mainData;
    	echo json_encode($return_array);
	}//function end 
	
	// Country
	if($fn == 'configureCountrysDd'){ 
		$return_array = array();
		$status = true;
		$mainData = array();
		
		$sql = "SELECT * FROM countries ORDER BY name ASC";
		$result = $con->query($sql);

		if ($result->num_rows > 0) {
			$status = true; 
			while($row = $result->fetch_array()){
				$data_obj = new stdClass();
				$data_obj->id = $row['id'];
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
	
	// State
	if($fn == 'configureStatesDd'){ 
		$country_id = $_POST["country_id"];

		$return_array = array();
		$status = true;
		$mainData = array();
		
		$sql = "SELECT * FROM states WHERE country_id = '" .$country_id. "' ORDER BY name ASC";
		$result = $con->query($sql);

		if ($result->num_rows > 0) {
			$status = true; 
			while($row = $result->fetch_array()){
				$data_obj = new stdClass();
				$data_obj->id = $row['id'];
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
	
	// City
	if($fn == 'configureCityDd'){ 
		$state_id = $_POST["state_id"];

		$return_array = array();
		$status = true;
		$mainData = array();
		
		$sql = "SELECT * FROM cities WHERE state_id = '" .$state_id. "' ORDER BY city ASC";
		$result = $con->query($sql);

		if ($result->num_rows > 0) {
			$status = true; 
			while($row = $result->fetch_array()){
				$data_obj = new stdClass();
				$data_obj->id = $row['id'];
				$data_obj->name = $row['city'];
				
				array_push($mainData, $data_obj);
			}
		}else{
			$status = false;			
		}

		$return_array['status'] = $status;
		$return_array['data'] = $mainData;
    	echo json_encode($return_array);
	}//function end

	
	// Work type
	if($fn == 'configureWorkTypeDd'){ 
		$return_array = array();
		$status = true;
		$mainData = array();
		
		$sql = "SELECT * FROM work_type ORDER BY type_name ASC";
		$result = $con->query($sql);

		if ($result->num_rows > 0) {
			$status = true; 
			while($row = $result->fetch_array()){
				$data_obj = new stdClass();
				$data_obj->id = $row['wt_id'];
				$data_obj->name = $row['type_name'];
				
				array_push($mainData, $data_obj);
			}
		}else{
			$status = false;			
		}

		$return_array['status'] = $status;
		$return_array['data'] = $mainData;
    	echo json_encode($return_array);
	}//function end

	
	// Skills
	if($fn == 'configureSkillsDd'){ 
		$return_array = array();
		$status = true;
		$mainData = array();
		
		$sql = "SELECT * FROM skills_master ORDER BY skill_name ASC";
		$result = $con->query($sql);

		if ($result->num_rows > 0) {
			$status = true; 
			while($row = $result->fetch_array()){
				$data_obj = new stdClass();
				$data_obj->id = $row['sk_id'];
				$data_obj->name = $row['skill_name'];
				
				array_push($mainData, $data_obj);
			}
		}else{
			$status = false;			
		}

		$return_array['status'] = $status;
		$return_array['data'] = $mainData;
    	echo json_encode($return_array);
	}//function end

	
	// Language
	if($fn == 'configureLanguagesKnownDd'){ 
		$return_array = array();
		$status = true;
		$mainData = array();
		
		$sql = "SELECT * FROM language_master ORDER BY language_name ASC";
		$result = $con->query($sql);

		if ($result->num_rows > 0) {
			$status = true; 
			while($row = $result->fetch_array()){
				$data_obj = new stdClass();
				$data_obj->id = $row['l_id'];
				$data_obj->name = $row['language_name'];
				
				array_push($mainData, $data_obj);
			}
		}else{
			$status = false;			
		}

		$return_array['status'] = $status;
		$return_array['data'] = $mainData;
    	echo json_encode($return_array);
	}//function end
	
	// Stay Type
	if($fn == 'configureStayTypeDd'){ 
		$return_array = array();
		$status = true;
		$mainData = array();
		
		$sql = "SELECT * FROM stay_type";
		$result = $con->query($sql);

		if ($result->num_rows > 0) {
			$status = true; 
			while($row = $result->fetch_array()){
				$data_obj = new stdClass();
				$data_obj->id = $row['st_id'];
				$data_obj->name = $row['st_type_name'];
				
				array_push($mainData, $data_obj);
			}
		}else{
			$status = false;			
		}

		$return_array['status'] = $status;
		$return_array['data'] = $mainData;
    	echo json_encode($return_array);
	}//function end
	
	// Weekly Off Required
	if($fn == 'configureWeeklyOffDd'){ 
		$return_array = array();
		$status = true;
		$mainData = array();
		
		$sql = "SELECT * FROM weekly_off";
		$result = $con->query($sql);

		if ($result->num_rows > 0) {
			$status = true; 
			while($row = $result->fetch_array()){
				$data_obj = new stdClass();
				$data_obj->id = $row['wf_id'];
				$data_obj->name = $row['wf_name'];
				
				array_push($mainData, $data_obj);
			}
		}else{
			$status = false;			
		}

		$return_array['status'] = $status;
		$return_array['data'] = $mainData;
    	echo json_encode($return_array);
	}//function end
	
	// Weekly Off Required
	if($fn == 'configureMajorIllnessDd'){ 
		$return_array = array();
		$status = true;
		$mainData = array();
		
		$sql = "SELECT * FROM illness_master";
		$result = $con->query($sql);

		if ($result->num_rows > 0) {
			$status = true; 
			while($row = $result->fetch_array()){
				$data_obj = new stdClass();
				$data_obj->id = $row['il_id'];
				$data_obj->name = $row['illness_name'];
				
				array_push($mainData, $data_obj);
			}
		}else{
			$status = false;			
		}

		$return_array['status'] = $status;
		$return_array['data'] = $mainData;
    	echo json_encode($return_array);
	}//function end
	
	// Weekly Off Required
	if($fn == 'configurePoliceVerificationDd'){ 
		$return_array = array();
		$status = true;
		$mainData = array();
		
		$sql = "SELECT * FROM police_verification";
		$result = $con->query($sql);

		if ($result->num_rows > 0) {
			$status = true; 
			while($row = $result->fetch_array()){
				$data_obj = new stdClass();
				$data_obj->id = $row['pv_id'];
				$data_obj->name = $row['pv_name'];
				
				array_push($mainData, $data_obj);
			}
		}else{
			$status = false;			
		}

		$return_array['status'] = $status;
		$return_array['data'] = $mainData;
    	echo json_encode($return_array);
	}//function end
	
	// Any Criminal Case History?
	if($fn == 'configureCriminalHistoryDd'){ 
		$return_array = array();
		$status = true;
		$mainData = array();
		
		$sql = "SELECT * FROM crime_history";
		$result = $con->query($sql);

		if ($result->num_rows > 0) {
			$status = true; 
			while($row = $result->fetch_array()){
				$data_obj = new stdClass();
				$data_obj->id = $row['ch_id'];
				$data_obj->name = $row['ch_name'];
				
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