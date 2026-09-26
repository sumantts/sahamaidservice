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
				$sql = "UPDATE quick_services SET service_name = '" .$serviceName. "', svc_included = '" .$scv_inc_arr. "', svc_not_included = '" .$scv_notinc_arr. "'  WHERE qs_id = '" .$qs_id. "' ";
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
		$format_service_names = function($services_json){
			$services = json_decode($services_json, true);
			if(!is_array($services)){
				return '';
			}

			$names = array();
			foreach($services as $service){
				if(isset($service['name'])){
					$names[] = htmlspecialchars((string)$service['name'], ENT_QUOTES, 'UTF-8');
				}
			}

			return implode('<br>', $names);
		};

		$sql = "SELECT * FROM quick_services ORDER BY service_name ASC";
		$result = $mysqli->query($sql);

		if ($result->num_rows > 0) {
			$status = true;
			$slno = 1;
			while($row = $result->fetch_array()){
				$qs_id = $row['qs_id'];			
				$service_name = $row['service_name'];		
				$svc_included = $format_service_names($row['svc_included']);
				$svc_not_included = $format_service_names($row['svc_not_included']);
				$svc_status = $row['svc_status'];
				
				$data[0] = $slno;
				$data[1] = $service_name;
				$data[2] = $svc_included;
				$data[3] = $svc_not_included;
				$data[4] = "<a href='javascript: void(0);' onclick='editService(".$qs_id.")'><i class='fa fa-edit' aria-hidden='true'></i></a> <a href='javascript: void(0);' onclick='deleteService(".$qs_id.")'><i class='fa fa-trash' aria-hidden='true'></i></a>";

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
		$svc_included = array();
		$svc_not_included = array();

		$sql = "SELECT * FROM quick_services WHERE qs_id = '" .$qs_id. "'";
		$result = $mysqli->query($sql);

		if ($result->num_rows > 0) {
			$status = true;	
			$row = $result->fetch_array();
			$qs_id = $row['qs_id'];			
			$service_name = $row['service_name'];

			if($row['svc_included'] != ''){
				$svc_included = json_decode($row['svc_included'], true);
			}
			if($row['svc_not_included'] != ''){
				$svc_not_included = json_decode($row['svc_not_included'], true);
			}
		} else {
			$status = false;
		}
		$mysqli->close();

		$return_array['service_name'] = $service_name;
		$return_array['svc_included'] = $svc_included;
		$return_array['svc_not_included'] = $svc_not_included;
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
		
		echo json_encode($return_result);
	}//end function deleteItem

?>