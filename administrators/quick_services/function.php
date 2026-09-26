<?php
	include('../assets/php/sql_conn.php');
	$fn = '';
    
	if(isset($_GET["fn"])){
	    $fn = $_GET["fn"];
	}else if(isset($_POST["fn"])){
	    $fn = $_POST["fn"];
	}

	//Save function start
	if($fn == 'saveServices'){
		$return_result = array();
		$status = true;

		$qs_id = $_POST["qs_id"];	
		$serviceName = $_POST["serviceName"];
		$scv_inc_arr = $_POST["scv_inc_arr"];	
		$scv_notinc_arr = $_POST["scv_notinc_arr"]; 
		
		try {
			if($qs_id > 0){
				$status = true;$sql = "UPDATE quick_services SET service_name = '" .$serviceName. "', svc_included = '" .$scv_inc_arr. "', svc_not_included = '" .$scv_notinc_arr. "',  WHERE qs_id = '" .$qs_id. "' ";
				$result = $mysqli->query($sql);
			}else{
				$sql = "INSERT INTO quick_services (service_name, svc_included, svc_not_included) VALUES ('" .$serviceName. "', '" .$scv_inc_arr. "', '" .$scv_notinc_arr. "')";
				$result = $mysqli->query($sql);

				$insert_id = $mysqli->insert_id;
				if($insert_id > 0){
					$qs_id = $insert_id;
					$status = true;
				}else{
					$status = false;
				}		
			}	
		} catch (PDOException $e) {
			die("Error occurred:" . $e->getMessage());
		}

		$return_result['status'] = $status;
		$return_result['qs_id'] = $qs_id;
		
		echo json_encode($return_result);
	}//Save function end	

	//function start
	if($fn == 'getServices'){
		$return_array = array();
		$status = true;
		$mainData = array();

		$sql = "SELECT * FROM quick_services ORDER BY service_name ASC";
		$result = $mysqli->query($sql);

		if ($result->num_rows > 0) {
			$status = true;
			$slno = 1;
			while($row = $result->fetch_array()){
				$qs_id = $row['qs_id'];			
				$service_name = $row['service_name'];		
				$svc_included = json_decode($row['svc_included']);
				$svc_not_included = json_decode($row['svc_not_included']);
				$svc_status = $row['svc_status'];
				
				$data[0] = $slno;
				$data[1] = $service_name;
				$data[2] = $svc_included;
				$data[3] = $svc_not_included;
				$data[4] = "<i class='fa fa-edit' aria-hidden='true' onclick='editService(".$qs_id.")'></i> <i class='fa fa-trash' aria-hidden='true' onclick='deleteService(".$qs_id.")'></i>";

				array_push($mainData, $data);
				$slno++;
			}
		} else {
			$status = false;
		}
		$mysqli->close();

		$return_array['data'] = $mainData;
    	echo json_encode($return_array);
	}//function end	

	//function start
	if($fn == 'getServiceData'){
		$return_array = array();
		$status = true;
		$mainData = array();
		$qs_id = $_POST['qs_id'];

		$sql = "SELECT * FROM quick_services WHERE qs_id = '" .$qs_id. "'";
		$result = $mysqli->query($sql);

		if ($result->num_rows > 0) {
			$status = true;	
			$row = $result->fetch_array();
			$qs_id = $row['qs_id'];			
			$name = $row['name'];		
			$description = $row['description'];		
			if($row['services_photo'] != ''){
				$services_photo = $row['services_photo'];	
			}else{
				$services_photo = '';
			}
		} else {
			$status = false;
		}
		$mysqli->close();

		$return_array['name'] = $name;
		$return_array['description'] = $description;
		$return_array['services_photo'] = $services_photo;
		$return_array['status'] = $status;
    	echo json_encode($return_array);
	}//function end

	//Delete function
	if($fn == 'deleteService'){
		$return_result = array();
		$qs_id = $_POST["qs_id"];
		$status = true;	

		$sql = "DELETE FROM quick_services WHERE qs_id = '".$qs_id."'";
		$result = $mysqli->query($sql);
		$return_result['status'] = $status;
		sleep(1);
		echo json_encode($return_result);
	}//end function deleteItem

?>