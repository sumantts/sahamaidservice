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
				
		if($field_id == 'date_of_birth'){
			$field_val = date('Y-m-d', strtotime($_POST['field_val']));
		}
		if($field_id == 'sk_id' || $field_id == 'l_id' || $field_id == 'wt_id' || $field_id == 'nr_id'){
			$field_val = json_encode($_POST['field_val']);
		}

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
			if($field_id == 'email_id' || $field_id == 'phone_number' || $field_id == 'adhar_card' || $field_id == 'pan_card' || $field_id == 'voter_id_card' || $field_id == 'username'){	
				$sql = "SELECT * FROM user_details WHERE $field_id = '".$field_val."' AND user_id != '" .$serial_number. "' ";
				$result = $con->query($sql);

				if ($result->num_rows > 0) {
					$status = false;
				} else {
					$sql1 = "UPDATE user_details SET $field_id = '" .$field_val. "', updated_by = '" .$sess_user_id. "' WHERE user_id = '".$serial_number."'";
					$result1 = $con->query($sql1);
					$error_message = 'Data updated successfully';
				}
			}else{				
				$sql1 = "UPDATE user_details SET $field_id = '" .$field_val. "', updated_by = '" .$sess_user_id. "' WHERE user_id = '".$serial_number."'";
				$result1 = $con->query($sql1);
				$error_message = 'Data updated successfully';	
			}
		}else{
			if($field_id == 'email_id' || $field_id == 'phone_number' || $field_id == 'adhar_card' || $field_id == 'pan_card' || $field_id == 'voter_id_card' || $field_id == 'username'){
				$sql = "SELECT * FROM user_details WHERE $field_id = '".$field_val."' AND user_id != '" .$serial_number. "' ";
				$result = $con->query($sql);

				if ($result->num_rows > 0) {
					$status = false;
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

		if($status == false){
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
			}else if($field_id == 'username'){
				$error_message = 'Username already exists';
			}else{}
		}
		
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
		$action_button = '';

		$where_condition = 'WHERE user_details.user_id > 0';

		if($current_tab == 'admin'){
			$user_type1 = 1;
			$where_condition .= ' AND user_details.user_type = '.$user_type1;
		}else if($current_tab == 'manager'){
			$user_type1 = 2;
			$where_condition .= ' AND user_details.user_type = '.$user_type1;
		}else if($current_tab == 'employee'){
			$user_type1 = 3;
			$where_condition .= ' AND user_details.user_type = '.$user_type1;
		}else if($current_tab == 'client'){
			$user_type1 = 4;
			$where_condition .= ' AND user_details.user_type = '.$user_type1;
		}else if($current_tab == 'worker'){
			$user_type1 = 5;
			$where_condition .= ' AND user_details.user_type = '.$user_type1;
		}else{
		}

		if($sess_user_type == '1'){
		}else if($sess_user_type == '2'){
			//$where_condition .= ' AND inserted_by = '.$sess_user_id;			
		}else if($sess_user_type == '3'){
			//$where_condition .= ' AND inserted_by = '.$sess_user_id;			
		}else if($sess_user_type == '4'){			
		}else if($sess_user_type == '5'){			
		}else{}

		function getSkillList($mysqli, $ids){
			$skills_text = '';		
			$query = "SELECT * FROM skills_master WHERE sk_id IN ($ids)";
			$result = $mysqli->query($query);
			if ($result->num_rows > 0) {
				while($row = $result->fetch_array()){
					$skill_name = $row['skill_name'];
					$skills_text .= $skill_name.', ';
				}
			}
			
			if($skills_text != ''){
				$skills_text = substr($skills_text, 0, -2);
			}

			return $skills_text;
		}//end if

		$sql = "SELECT user_details.user_id, user_details.username, user_details.password, user_details.user_type, user_details.added_by, user_details.full_name, user_details.fat_hus_name, user_details.email_id, user_details.phone_number, user_details.alt_phone_number, user_details.m_id, user_details.date_of_birth, user_details.gender, user_details.address, user_details.curr_address, user_details.city_id, user_details.state_id, user_details.country_id, user_details.pincode, user_details.adhar_card, user_details.adhar_card_img, user_details.adhar_card_back_img, user_details.pan_card, user_details.pan_card_img, user_details.voter_id_card, user_details.voter_id_card_img, user_details.voter_id_card_back_img, user_details.user_photo, user_details.wt_id, user_details.work_exp, user_details.earlier_work_city, user_details.last_emplr_name, user_details.sk_id, user_details.nr_id, user_details.l_id, user_details.work_loc, user_details.st_id, user_details.exp_salary, user_details.available_from, user_details.wf_id, user_details.il_id, user_details.pv_id, user_details.ch_id, user_details.emg_cont_person, user_details.relation, user_details.emg_cont_number, user_details.bank_details, user_details.bank_details_img, user_details.highest_edu, user_details.declaration, user_details.lc_id, user_details.wh_id, user_details.religion, user_details.nationality, user_details.family_bg_info, user_details.inserted_by, user_details.updated_by, user_details.insert_date, user_details.update_date, 
        gender_master.gender_name,
        marital_status_master.m_status_name,
        working_hour_master.wh_name,
		states.name AS state_name,
		cities.city AS city_name
        FROM user_details 
        LEFT OUTER JOIN gender_master ON user_details.gender = gender_master.g_id 
        LEFT OUTER JOIN marital_status_master ON user_details.m_id = marital_status_master.m_id 
        LEFT OUTER JOIN working_hour_master ON user_details.wh_id = working_hour_master.wh_id
        LEFT OUTER JOIN states ON user_details.state_id = states.id
        LEFT OUTER JOIN cities ON user_details.city_id = cities.id
		$where_condition 
		ORDER BY user_details.full_name ASC";
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
				$adhar_card_back_img = $row['adhar_card_back_img'];
				$pan_card = $row['pan_card'];
				$pan_card_img = $row['pan_card_img'];
				$voter_id_card = $row['voter_id_card'];
				$voter_id_card_img = $row['voter_id_card_img'];
				$voter_id_card_back_img = $row['voter_id_card_back_img'];
				$bank_details = $row['bank_details'];
				$bank_details_img = $row['bank_details_img'];
				$highest_edu = $row['highest_edu'];
				$inserted_by = $row['inserted_by'];
				$updated_by = $row['updated_by'];
				$insert_date = $row['insert_date'];
				$user_photo = $row['user_photo'];
				$lc_id = $row['lc_id'];
				$state_name = $row['state_name'];
				$city_name = $row['city_name'];   
				$sk_id = array();      
				if($row['sk_id'] != ''){
					$sk_id = json_decode($row['sk_id']);
				}
				$user_img = '';
				if($user_photo == ''){
					$user_img = '<img src="users/uploads/no_images.png" width="75">';
				}else{
					$user_img = '<img src="users/uploads/'.$user_photo.'" width="75">';
				}  
				
				//$action_button = "<i class='fa fa-edit' aria-hidden='true' onclick='editTableData(".$user_id.")'></i> <i class='fa fa-trash' aria-hidden='true' onclick='deleteTableData(".$user_id.")'></i>";
				$action_button = '';
				$action_button .= '<a href="#!" data-toggle="modal" data-target="#exampleModalLong" class="action-icon" onClick="editTabledata('.$user_id.')"> <i class="fa fa-edit"></i></a>';
				$action_button .= '<a href="javascript: void(0);" class="action-icon" onClick="deleteTabledata('.$user_id.')"> <i class="fa fa-trash"></i></a>';

				# For Worker
				if($current_tab == 'worker'){
					$action_button .= '<br><a href="javascript: void(0);" class="action-icon" onClick="printTabledataF('.$user_id.')"><i class="fa fa-print"></i></a>';
					$action_button .= '<a href="javascript: void(0);" class="action-icon" onClick="printTabledataB('.$user_id.')"> <i class="fa fa-print"></i></a>';
				}

				# For Client
				if($current_tab == 'client'){
					$action_button .= ' <a href="javascript: void(0);" class="action-icon" onClick="printTabledataC('.$user_id.')"><i class="fa fa-print"></i></a>';
					$action_button .= ' <a href="javascript: void(0);" class="action-icon" onClick="onBillModal('.$user_id.')"><i class="fa fa-money-bill"></i></a>';
				}

				$lead_conf = '';
				if($current_tab == 'client' || $current_tab == 'worker'){	
					if($lc_id > 0){
						$sql_21 = "SELECT * FROM lead_confirm_master WHERE lc_id = '" .$lc_id. "' ";
						$result_21 = $mysqli->query($sql_21);
						if ($result_21->num_rows > 0) {
							$row_21 = $result_21->fetch_array();
							$lead_conf = $row_21['name'];
						}
					}
				} 

				# Skills 
				$skills_text = '';
				if($current_tab == 'worker'){
					if(sizeof($sk_id) > 0){
						$ids = implode(',', $sk_id);
						$skills_text = getSkillList($mysqli, $ids);
					} 
				}

				// $data[0] = $sl;
				// $data[1] = $full_name;
				// $data[2] = $email_id;
				// $data[3] = $phone_number;
				// $data[4] = $adhar_card;
				// $data[5] = $pan_card;
				// $data[6] = $voter_id_card;
				// $data[7] = $state_name;
				// $data[8] = $city_name;
				// $data[9] = $pincode;
				// if($current_tab == 'client'){
				// 	$data[10] = $lead_conf;
				// 	$data[11] = $user_img;
				// 	$data[12] = $action_button;				
				// }

				// if($current_tab == 'worker'){
				// 	$data[10] = $skills_text;
				// 	$data[11] = $lead_conf;
				// 	$data[12] = $user_img;
				// 	$data[13] = $action_button;
				// }
				
				// if($current_tab != 'client' && $current_tab != 'worker'){
				// 	$data[10] = $user_img;
				// 	$data[11] = $action_button;
				// }

				//Client
				if($current_tab == 'client'){
					$data[0] = $sl;
					$data[1] = $full_name;
					$data[2] = $email_id;
					$data[3] = $phone_number;
					$data[4] = $state_name;
					$data[5] = $city_name;
					$data[6] = $pincode;
					$data[7] = $lead_conf;
					$data[8] = $user_img;
					$data[9] = $action_button;	
				}else if($current_tab == 'worker'){
					$data[0] = $sl;
					$data[1] = $full_name;
					$data[2] = $email_id;
					$data[3] = $phone_number;
					$data[4] = $adhar_card;
					$data[5] = $pan_card;
					$data[6] = $voter_id_card;
					$data[7] = $state_name;
					$data[8] = $city_name;
					$data[9] = $pincode;
					$data[10] = $skills_text;
					$data[11] = $lead_conf;
					$data[12] = $user_img;
					$data[13] = $action_button;
				}else{
					$data[0] = $sl;
					$data[1] = $full_name;
					$data[2] = $email_id;
					$data[3] = $phone_number;
					$data[4] = $adhar_card;
					$data[5] = $pan_card;
					$data[6] = $voter_id_card;
					$data[7] = $state_name;
					$data[8] = $city_name;
					$data[9] = $pincode;
					$data[10] = $user_img;
					$data[11] = $action_button;
				}//end if


				array_push($mainData, $data);
				$sl++;

			}
		} else {
			$status = false;
		}
		$mysqli->close();
		
		$return_array['data'] = $mainData;
		$return_array['data'] = $mainData;
    	echo json_encode($return_array);
	}//function end

	
			
	//Get Table Data
	if($fn == 'editTabledata'){
		$return_array = array();
		$status = true; 
		$serial_no = $_POST['serial_no'];		
		
		$sql = "SELECT * FROM user_details WHERE user_id = '" .$serial_no. "' ";
		$result = $con->query($sql);
		if ($result->num_rows > 0) {
			$row = $result->fetch_array();
			$return_array['user_id'] = $row['user_id'];
			$return_array['username'] = $row['username']; 
			$return_array['password'] = $row['password']; 
			$return_array['user_type'] = $row['user_type']; 
			$return_array['added_by'] = $row['added_by']; 
			$return_array['full_name'] = $row['full_name']; 
			$return_array['fat_hus_name'] = $row['fat_hus_name']; 
			$return_array['email_id'] = $row['email_id']; 
			$return_array['phone_number'] = $row['phone_number']; 
			$return_array['alt_phone_number'] = $row['alt_phone_number']; 
			$return_array['m_id'] = $row['m_id']; 
			$return_array['date_of_birth'] = $row['date_of_birth']; 
			$return_array['gender'] = $row['gender']; 
			$return_array['address'] = $row['address']; 
			$return_array['curr_address'] = $row['curr_address']; 
			$return_array['city_id'] = $row['city_id']; 
			$return_array['state_id'] = $row['state_id']; 
			$return_array['country_id'] = $row['country_id']; 
			$return_array['pincode'] = $row['pincode']; 
			$return_array['adhar_card'] = $row['adhar_card']; 
			$return_array['adhar_card_img'] = $row['adhar_card_img']; 
			$return_array['adhar_card_back_img'] = $row['adhar_card_back_img']; 
			$return_array['pan_card'] = $row['pan_card']; 
			$return_array['pan_card_img'] = $row['pan_card_img']; 
			$return_array['voter_id_card'] = $row['voter_id_card']; 
			$return_array['voter_id_card_img'] = $row['voter_id_card_img']; 
			$return_array['voter_id_card_back_img'] = $row['voter_id_card_back_img'];
			$return_array['user_photo'] = $row['user_photo']; 
			$return_array['wt_id'] = json_decode($row['wt_id']); 
			$return_array['work_exp'] = $row['work_exp']; 
			$return_array['earlier_work_city'] = $row['earlier_work_city']; 
			$return_array['last_emplr_name'] = $row['last_emplr_name']; 
			$return_array['sk_id'] = json_decode($row['sk_id']); 
			$return_array['l_id'] = json_decode($row['l_id']); 
			$return_array['nr_id'] = json_decode($row['nr_id']); 
			$return_array['work_loc'] = $row['work_loc']; 
			$return_array['st_id'] = $row['st_id']; 
			$return_array['exp_salary'] = $row['exp_salary']; 
			$return_array['available_from'] = $row['available_from']; 
			$return_array['wf_id'] = $row['wf_id']; 
			$return_array['il_id'] = $row['il_id']; 
			$return_array['pv_id'] = $row['pv_id']; 
			$return_array['ch_id'] = $row['ch_id']; 
			$return_array['emg_cont_person'] = $row['emg_cont_person']; 
			$return_array['relation'] = $row['relation']; 
			$return_array['emg_cont_number'] = $row['emg_cont_number']; 
			$return_array['bank_details'] = $row['bank_details']; 
			$return_array['bank_details_img'] = $row['bank_details_img']; 
			$return_array['highest_edu'] = $row['highest_edu']; 
			$return_array['declaration'] = $row['declaration']; 
			$return_array['inserted_by'] = $row['inserted_by']; 
			$return_array['updated_by'] = $row['updated_by']; 
			$return_array['insert_date'] = $row['insert_date']; 
			$return_array['update_date'] = $row['update_date'];	 
			$return_array['lc_id'] = $row['lc_id'];			
			 
			$return_array['wh_id'] = $row['wh_id'];			 
			$return_array['religion'] = $row['religion'];			 
			$return_array['nationality'] = $row['nationality'];			 
			$return_array['family_bg_info'] = $row['family_bg_info'];			
		}else{
			$status = true; 
		}

		$return_array['status'] = $status;		
    	echo json_encode($return_array);
	}//function end
			
	//Delete Table Data
	if($fn == 'deleteTabledata'){
		$return_array = array();
		$status = true; 
		$serial_no = $_POST['serial_no']; 
		
		$sql = "DELETE FROM user_details WHERE user_id = '" .$serial_no. "' ";
		$result = $con->query($sql); 

		$return_array['status'] = $status; 
    	echo json_encode($return_array);
	}//function end

	
			
	//Delete attached photo
	if($fn == 'deleteAttachedImage'){
		$return_array = array();
		$status = true; 
		$message = '';
		$imgFieldName = $_POST['imgFieldName']; 
		$userId = $_POST['userId'];

		$sql = "SELECT $imgFieldName FROM user_details WHERE user_id = '" .$userId. "' ";
		$result = $mysqli->query($sql);
		if ($result->num_rows > 0) {
			$row = $result->fetch_array();
			$image_name = $row[$imgFieldName];	

			$file = "uploads/$image_name";
			if (file_exists($file)) {
				if (unlink($file)) {
					$message = "File deleted successfully.";
					$status = true; 
					$field_val = '';

					$sql1 = "UPDATE user_details SET $imgFieldName = '" .$field_val. "' WHERE user_id = '".$userId."'";
					$result1 = $con->query($sql1);
				} else {
					$message = "Error deleting file.";
					$status = false; 
				}
			} else {
				$message = "File does not exist.";
				$status = false; 
			}

		}//end if

		$return_array['status'] = $status; 
		$return_array['message'] = $message; 
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

	// Working Hours
	if($fn == 'configureWorkingHoursDd'){ 
		$return_array = array();
		$status = true;
		$mainData = array();
		
		$sql = "SELECT * FROM working_hour_master ORDER BY wh_name ASC";
		$result = $con->query($sql);

		if ($result->num_rows > 0) {
			$status = true; 
			while($row = $result->fetch_array()){
				$data_obj = new stdClass();
				$data_obj->wh_id = $row['wh_id'];
				$data_obj->wh_name = $row['wh_name'];
				
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

	
	// Nurses
	if($fn == 'configureNursesDd'){ 
		$return_array = array();
		$status = true;
		$mainData = array();
		
		$sql = "SELECT * FROM nurses_master ORDER BY nr_name ASC";
		$result = $con->query($sql);

		if ($result->num_rows > 0) {
			$status = true; 
			while($row = $result->fetch_array()){
				$data_obj = new stdClass();
				$data_obj->id = $row['nr_id'];
				$data_obj->name = $row['nr_name'];
				
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

	// Lead or Confirm 
	if($fn == 'configureLeadConfirmDD'){ 
		$return_array = array();
		$status = true;
		$mainData = array();
		
		$sql = "SELECT * FROM lead_confirm_master";
		$result = $con->query($sql);

		if ($result->num_rows > 0) {
			$status = true; 
			while($row = $result->fetch_array()){
				$data_obj = new stdClass();
				$data_obj->id = $row['lc_id'];
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

	# getUnPaidBills 
	if($fn == 'getUnPaidBills'){ 
		$user_id = $_POST['user_id'];
		$inv_month = $_POST['inv_month'];
		$return_array = array();
		$assign_maids = array();
		$status = true;
		$bill_id = 0;

		$from_date1 = $inv_month.'-01';
		$to_date1 = $inv_month.'-31';
		$bill_status = '1';
		$total_rcvabl_amount = 0;

		$sql = "SELECT assign_maid.assign_id, assign_maid.client_id, assign_maid.rcvabl_amount, assign_maid.worker_id, assign_maid.exp_salary, assign_maid.from_date, assign_maid.to_date, assign_maid.from_time, assign_maid.to_time, assign_maid.payment_history, assign_maid.assign_by, assign_maid.asssign_time, assign_maid.bill_status, assign_maid.hsn_code,
		user_details.full_name
		FROM assign_maid 
		LEFT OUTER JOIN user_details ON assign_maid.client_id = user_details.user_id 
		WHERE assign_maid.client_id = '" .$user_id. "' AND from_date >= '" .$from_date1. "' AND to_date <= '" .$to_date1. "' AND bill_status = '" .$bill_status. "' "; 

		//echo $sql;
		$result = $con->query($sql);

		if ($result->num_rows > 0) {
			$status = true;	
			while($row = $result->fetch_array()){		
				$assign_maid = new stdClass();	
				$assign_id = $row['assign_id'];
				$assign_maid->assign_id = $row['assign_id'];					
			
				$assign_maid->client_name = $row['full_name'];
				$assign_maid->client_id = $row['client_id'];
				$assign_maid->rcvabl_amount = $row['rcvabl_amount']; 
				$assign_maid->worker_id = $row['worker_id'];
				$assign_maid->exp_salary = $row['exp_salary'];

				$assign_maid->from_date = date('d-F-Y', strtotime($row['from_date']));
				$assign_maid->to_date = date('d-F-Y', strtotime($row['to_date']));
				$assign_maid->from_time = $row['from_time']; 
				$assign_maid->to_time = $row['to_time'];	
				$assign_maid->bill_status = $row['bill_status'];
				$assign_maid->hsn_code = $row['hsn_code'];
				$assign_maid->inv_id = 'INV_'.str_pad($assign_id, 4, "0", STR_PAD_LEFT);

				// Worker Name
				$worker_id = $row['worker_id'];
				$worker_name = '';
				if($worker_id != ''){
					$sql3 = "SELECT * FROM user_details WHERE user_id = '" .$worker_id. "' ";
					$result3 = $con->query($sql3);

					if ($result3->num_rows > 0) { 
						$row3 = $result3->fetch_array();
						$worker_name = $row3['full_name'];	
					}
				}//end if
				$assign_maid->worker_name = $worker_name;
				
				$total_rcvabl_amount = $total_rcvabl_amount + $row['rcvabl_amount'];

				array_push($assign_maids, $assign_maid);
			}
		} else {
			$status = false;
		}		
		
		# Bill Info
		$normal_gst = '';
		$terms_condi = '';
		$bill_total = 0;
		$gst_percentage = 0;

		$sql = "SELECT * FROM bill_details WHERE client_id = '" .$user_id. "' AND inv_month = '" .$inv_month. "' ";
		$result = $con->query($sql);

		if ($result->num_rows > 0) {
			$row = $result->fetch_array(); 
			$bill_id = $row['bill_id'];
			$normal_gst = $row['normal_gst'];
			$gst_percentage = $row['gst_percentage'];
			$terms_condi = $row['terms_condi'];
			$bill_total = $row['bill_total']; 
		}

		$return_array['status'] = $status;
		$return_array['bill_id'] = $bill_id;
		$return_array['normal_gst'] = $normal_gst;
		$return_array['gst_percentage'] = $gst_percentage;
		$return_array['terms_condi'] = $terms_condi;
		$return_array['bill_total'] = $bill_total;
		$return_array['assign_maids'] = $assign_maids;
		$return_array['total_rcvabl_amount'] = $total_rcvabl_amount;
    	echo json_encode($return_array);
	}//function end

	//save Invoice Data
	if($fn == 'saveInvoiceData'){
		$return_result = array();
		$status = true;

		$user_id = $_POST['user_id'];
		$bill_id = $_POST['bill_id'];
		$inv_month = $_POST['inv_month'];
		$normal_gst = $_POST['normal_gst'];
		$gst_percentage = $_POST['gst_percentage'];
		$terms_condi = $_POST['terms_condi'];  
		$bill_total = $_POST['bill_total'];
		$sess_user_id = $_SESSION["user_id"];

		if($bill_id > 0){ 
			$sql1 = "UPDATE bill_details SET inv_month = '" .$inv_month. "', normal_gst = '" .$normal_gst. "', gst_percentage = '" .$gst_percentage. "', terms_condi = '" .$terms_condi. "', bill_total = '" .$bill_total. "', bill_updated_by = '" .$sess_user_id. "' WHERE bill_id = '" .$bill_id. "' ";
			$result1 = $con->query($sql1);
		}else{	 
			$sql2 = "INSERT INTO bill_details (client_id, inv_month, normal_gst, gst_percentage, terms_condi, bill_total, bill_created_by) VALUES ('".$user_id."', '".$inv_month."', '".$normal_gst."', '".$gst_percentage."', '".$terms_condi."', '".$bill_total."', '".$sess_user_id."')";
			$result2 = $con->query($sql2);
			$bill_id = $con->insert_id;
		} 
		$return_result['status'] = $status;
		$return_result['bill_id'] = $bill_id;
		
		echo json_encode($return_result);
	}//Save function end

	# savePaymentData 
	if($fn == 'savePaymentData'){
		$return_result = array();
		$status = true;
		$error_message = '';

		$user_id = $_POST['user_id'];
		$bill_id = $_POST['bill_id'];
		$inv_month = $_POST['inv_month'];

		$paid_amount = $_POST['paid_amount'];
		$transaction_id = $_POST['transaction_id'];
		$payment_mode = $_POST['payment_mode']; 

		$payment_received_by = $_SESSION["user_id"];
			 
		$sql2 = "INSERT INTO bill_payment_details (bill_id, client_id, paid_amount, payment_mode, payment_received_by) VALUES ('".$bill_id."', '".$user_id."', '".$paid_amount."', '".$payment_mode."', '".$payment_received_by."')";
		$result2 = $con->query($sql2); 
		
		$return_result['status'] = $status;	
		$return_result['error_message'] = $error_message;	
		
		echo json_encode($return_result);
	}//Save function end

?>