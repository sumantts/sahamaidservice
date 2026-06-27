<?php
	include('../assets/php/sql_conn.php');
	$fn = '';
    
	if(isset($_GET["fn"])){
	    $fn = $_GET["fn"];
	}else if(isset($_POST["fn"])){
	    $fn = $_POST["fn"];
	}	
	
	//save Form Data
	if($fn == 'saveFormData'){
		$return_array = array();
		$status = true;
		$error_message = '';

		$br_id = $_POST['br_id'];  
		$br_name = $_POST['br_name']; 
		//$login_id = $_SESSION['login_id'];

		$status = 1;

		if($br_id > 0){
			$sql1 = "UPDATE branches SET br_name = '" .$br_name. "' WHERE br_id = '".$br_id."'";
			$result1 = $con->query($sql1);
			$error_message = 'Data updated successfully';
		}else{
			$sql = "SELECT * FROM branches WHERE br_name = '".$br_name."'";
			$result = $con->query($sql);

			if ($result->num_rows > 0) {
				$status = false;
				$error_message = 'Branch name already exists';
			} else {
				$status = true;
				
				$sql2 = "INSERT INTO branches (br_name) VALUES ('".$br_name."')";
				$result2 = $con->query($sql2);
				$error_message = 'Data inserted successfully';
			}
		}
		$con->close();	


		$return_array['status'] = $status;  
		$return_array['error_message'] = $error_message; 
    	echo json_encode($return_array);
	}//function end	

	//function start
	if($fn == 'getTableData'){
		$return_array = array();
		$status = true;
		$mainData = array();
		//$login_id = $_SESSION['login_id'];

		$sql = "SELECT * FROM branches ORDER BY br_name ASC";
		$result = $con->query($sql);

		if ($result->num_rows > 0) {
			$status = true;
			$slno = 1;

			while($row = $result->fetch_array()){
				$br_id = $row['br_id'];
				//$login_id = $row['login_id'];
				$br_name = $row['br_name']; 
				//$created_at = $row['created_at']; 
				

				if($br_id != ''){
					$action_html = '';
					$action_html .= '<a data-bs-toggle="offcanvas" href="#theme-settings-offcanvas" class="action-icon" onClick="editTabledata('.$br_id.')"> <i class="fa fa-edit"></i></a>';
					$action_html .= '<a href="javascript: void(0);" class="action-icon" onClick="deleteTabledata('.$br_id.')"> <i class="fa fa-trash"></i></a>'; 
						
					$data[0] = $slno; 
					$data[1] = $br_name;  	
					$data[2] = $action_html;				
					array_push($mainData, $data);
					$slno++;
				}
			}
		}

		$return_array['data'] = $mainData;
    	echo json_encode($return_array);
	}//function end	
			
	//Get Table Data
	if($fn == 'editTabledata'){
		$return_array = array();
		$status = true; 
		$br_id = $_POST['br_id'];
		$br_name = ''; 
		
		$sql = "SELECT * FROM branches WHERE br_id = '" .$br_id. "' ";
		$result = $con->query($sql);
		if ($result->num_rows > 0) {
			$row = $result->fetch_array();
			$br_id = $row['br_id']; 
			$br_name = $row['br_name']; 
		}

		$return_array['status'] = $status;
		$return_array['br_id'] = $br_id;
		$return_array['br_name'] = $br_name;
		
    	echo json_encode($return_array);
	}//function end
			
	//Delete Table Data
	if($fn == 'deleteTabledata'){
		$return_array = array();
		$status = true; 
		$br_id = $_POST['br_id']; 
		
		$sql = "DELETE FROM branches WHERE br_id = '" .$br_id. "' ";
		$result = $con->query($sql); 

		$return_array['status'] = $status; 
    	echo json_encode($return_array);
	}//function end
	

	// Company dropdown
	if($fn == 'populateCompanyDD'){
	    //$login_id = $_SESSION['login_id'];
		$return_array = array();
		$status = true;
		$mainData = array();
		
		$sql = "SELECT * FROM branches WHERE login_id = '".$login_id."'";
		$result = $con->query($sql);

		if ($result->num_rows > 0) {
			$status = true;
			$slno = 1;

			while($row = $result->fetch_array()){
				$br_id = $row['br_id']; 
				$br_name = $row['br_name'];
				$last_selected = $row['last_selected'];

				$data_obj = new stdClass();
				$data_obj->br_id = $br_id; 
				$data_obj->br_name = $br_name;
				$data_obj->last_selected = $last_selected;
				array_push($mainData, $data_obj);
			}
		}

		$return_array['status'] = $status;
		$return_array['data'] = $mainData;
    	echo json_encode($return_array);
	}//function end

	//populateAcYearDD
	if($fn == 'populateAcYearDD'){
	    //$login_id = $_SESSION['login_id'];
		$return_array = array();
		$status = true;
		$mainData = array();
		
		$sql = "SELECT * FROM accounting_year_master ORDER BY ac_year DESC";
		$result = $con->query($sql);

		if ($result->num_rows > 0) {
			$status = true;
			$slno = 1;

			while($row = $result->fetch_array()){
				$ac_year = $row['ac_year']; 
				$ac_year_name = $row['ac_year_name'];
				$from_date = $row['from_date'];
				$to_date = $row['to_date'];
				$last_selected = $row['last_selected'];

				$data_obj = new stdClass();
				$data_obj->ac_year = $ac_year; 
				$data_obj->ac_year_name = $ac_year_name;
				$data_obj->from_date = $from_date;
				$data_obj->to_date = $to_date;
				$data_obj->last_selected = $last_selected;
				array_push($mainData, $data_obj);
			}
		}

		$return_array['status'] = $status;
		$return_array['data'] = $mainData;
    	echo json_encode($return_array);
	}//function end
			
	//Get Table Data
	if($fn == 'updateSelectedCompany'){
		$return_array = array();
		$status = true; 
	    //$login_id = $_SESSION['login_id'];
		$br_id = $_POST['br_id_key'];
		$_SESSION["br_id"] = $br_id;
		
		$last_selected_zero = 0;
		$sql1 = "UPDATE branches SET last_selected = '" .$last_selected_zero. "' WHERE login_id = '".$login_id."'";
		$result1 = $con->query($sql1);

		$last_selected_one = 1;
		$sql2 = "UPDATE branches SET last_selected = '" .$last_selected_one. "' WHERE login_id = '".$login_id."' AND br_id = '" .$br_id. "' ";
		$result2 = $con->query($sql2);

		$return_array['status'] = $status;
		
    	echo json_encode($return_array);
	}//function end
			
	//Get Table Data
	if($fn == 'updateSelectedAcYr'){
		$return_array = array();
		$status = true; 
		
		
		$ac_year_id = $_POST['ac_year_id'];
		
		$last_selected_zero = 0;
		$sql1 = "UPDATE accounting_year_master SET last_selected = '0' WHERE last_selected = '1'";
		$result1 = $con->query($sql1);

		$last_selected_one = 1;
		$sql2 = "UPDATE accounting_year_master SET last_selected = '" .$last_selected_one. "' WHERE ac_year = '".$ac_year_id."' ";
		$result2 = $con->query($sql2);

		
		
		$sql = "SELECT * FROM accounting_year_master WHERE ac_year = '".$ac_year_id."' ";
		$result = $con->query($sql);

		if ($result->num_rows > 0) {
			$row = $result->fetch_array();
			$ac_year = $row['ac_year']; 
			$ac_year_name = $row['ac_year_name'];
			$from_date = $row['from_date'];
			$to_date = $row['to_date'];
			$last_selected = $row['last_selected'];

			$_SESSION["ac_year"] = $ac_year;
			$_SESSION["ac_year_name"] = $ac_year_name;
			$_SESSION["from_date"] = $from_date;
			$_SESSION["to_date"] = $to_date;
			$_SESSION["last_selected"] = $last_selected;			
		}

		$return_array['status'] = $status;
		
    	echo json_encode($return_array);
	}//function end

?>