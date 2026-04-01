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

		$almari_id = $_POST["almari_id"];		
		$almari_name = $mysqli->real_escape_string($_POST["almari_name"]);			
		$almari_status = $mysqli->real_escape_string($_POST["almari_status"]);
		
		try {
			if($almari_id > 0){
				$status = true;
				$sql = "UPDATE almari_master SET almari_name = '" .$almari_name. "', almari_status = '" .$almari_status. "' WHERE almari_id = '" .$almari_id. "' ";
				$result = $mysqli->query($sql);
			}else{

				$sql = "SELECT * FROM almari_master WHERE almari_name = '" .$almari_name. "' ";
				$result = $mysqli->query($sql);
		
				if ($result->num_rows > 0) {
					$status = false;
				}else{
					$status = true;
					$sql = "INSERT INTO almari_master (almari_name, almari_status) VALUES ('".$almari_name."', '".$almari_status."')";
					$result = $mysqli->query($sql);
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
		$sql = "SELECT * FROM almari_master ORDER BY almari_name";
		$result = $mysqli->query($sql);

		if ($result->num_rows > 0) {
			$status = true;
			$slno = 1;
			while($row = $result->fetch_array()){
				$almari_id = $row['almari_id'];		
				$almari_name = $row['almari_name'];		
				$almari_status = $row['almari_status'];	

				$data[0] = $slno;
				$data[1] = $almari_name;
				$data[2] =  ($almari_status == 1)? 'Active' : 'Inactive';
				$data[3] = "<a href='javascript: void(0)' data-almari_id='.$almari_id.'><i class='fa fa-edit' aria-hidden='true' onclick='editTableData(".$almari_id.")'></i></a> <a href='javascript: void(0)' data-almari_id='.$almari_id.'> <i class='fa fa-trash' aria-hidden='true' onclick='deleteTableData(".$almari_id.")'></i></a>";

				array_push($mainData, $data);
				$slno++;
			}
		} else {
			$status = false;
		}
		//$mysqli->close();

		$return_array['data'] = $mainData;
    	echo json_encode($return_array);
	}//function end	

	//function start
	if($fn == 'getFormEditData'){
		$return_array = array();
		$status = true;
		$mainData = array();
		$almari_id = $_POST['almari_id'];

		$sql = "SELECT * FROM almari_master WHERE almari_id = '" .$almari_id. "' ";
		$result = $mysqli->query($sql);

		if ($result->num_rows > 0) {
			$status = true;	
			$row = $result->fetch_array();
			
			$almari_id = $row['almari_id'];		
			$almari_name = $row['almari_name'];		
			$almari_status = $row['almari_status'];	
		} else {
			$status = false;
		}
		//$mysqli->close();
			
		$return_array['almari_id'] = $almari_id;
		$return_array['almari_name'] = $almari_name;
		$return_array['almari_status'] = $almari_status;

		$return_array['status'] = $status;
    	echo json_encode($return_array);
	}//function end

	//Delete function
	if($fn == 'deleteTableData'){
		$return_result = array();
		$almari_id = $_POST["almari_id"];
		$status = true;	

		$sql = "DELETE FROM almari_master WHERE almari_id = '".$almari_id."'";
		$result = $mysqli->query($sql);
		$return_result['status'] = $status;
		sleep(1);
		echo json_encode($return_result);
	}//end function deleteItem

	//Get Category name
	if($fn == 'getAllCategoryName'){
		$return_array = array();
		$status = true;
		$mainData = array();

		$sql = "SELECT * FROM almari_master WHERE almari_status = 'active' ORDER BY almari_name ASC";
		$result = $mysqli->query($sql);

		if ($result->num_rows > 0) {
			$status = true;
			$slno = 1;
			while($row = $result->fetch_array()){
				$almari_id = $row['almari_id'];	
				$almari_name = $row['almari_name'];
				$data = new stdClass();

				$data->almari_id = $almari_id;
				$data->almari_name = $almari_name;
				
				array_push($mainData, $data);
				$slno++;
			}
		} else {
			$status = false;
		}
		//$mysqli->close();

		$return_array['status'] = $status;
		$return_array['data'] = $mainData;
    	echo json_encode($return_array);
	}//function end	

	//Get Authors name
	if($fn == 'getAllAuthorsyName'){
		$return_array = array();
		$status = true;
		$mainData = array();

		$sql = "SELECT * FROM author_details WHERE author_status = 'active' ORDER BY author_name ASC";
		$result = $mysqli->query($sql);

		if ($result->num_rows > 0) {
			$status = true;
			$slno = 1;
			while($row = $result->fetch_array()){
				$author_id = $row['author_id'];	
				$author_name = $row['author_name'];	
				$data = new stdClass();

				$data->author_id = $author_id;
				$data->author_name = $author_name;
				
				array_push($mainData, $data);
				$slno++;
			}
		} else {
			$status = false;
		}
		//$mysqli->close();

		$return_array['status'] = $status;
		$return_array['data'] = $mainData;
    	echo json_encode($return_array);
	}//function end	

?>