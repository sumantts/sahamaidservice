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

		$sa_id = $_POST["sa_id"];	
		$area_location = $_POST["area_location"];
		$pincode = $_POST["pincode"];
		$street_name = $_POST["street_name"];
		$landmark = $_POST["landmark"];
		$building_name_arr = json_decode($_POST["building_name_arr"]); 
		$sa_status = $_POST['sa_status'];
		
		try {
			if($sa_id > 0){
				$sql = "UPDATE service_area SET area_location = '" .$area_location. "', pincode = '" .$pincode. "', street_name = '" .$street_name. "', landmark = '" .$landmark. "', sa_status = '" .$sa_status. "' WHERE sa_id = '" .$sa_id. "' ";
				$result = $mysqli->query($sql);
			}else{
				$sql = "INSERT INTO service_area (area_location, pincode, street_name, landmark, sa_status) VALUES ('" .$area_location. "', '" .$pincode. "', '" .$street_name. "', '" .$landmark. "', '" .$sa_status. "')";
				$result = $mysqli->query($sql);

				$insert_id = $mysqli->insert_id;
				if($insert_id > 0){
					$sa_id = $insert_id;
					$status = true;
				}else{
					$status = false;
				}		
			}	
			
			if($sa_id > 0){
				if(sizeof($building_name_arr) > 0){
					for($i = 0; $i < sizeof($building_name_arr); $i++){
						$building_name = $building_name_arr[$i]->name;
						$obj_id = $building_name_arr[$i]->obj_id;
						if($building_name != ''){
							$check_sql = "SELECT sa_id FROM service_area WHERE obj_id = '" . $mysqli->real_escape_string($obj_id) . "' LIMIT 1";
							$check_result = $mysqli->query($check_sql);
							if($check_result && $check_result->num_rows == 0){
								$sql = "INSERT INTO service_area (parent_sa_id, building_name, obj_id) VALUES ('" .$sa_id. "', '" .$building_name. "', '" .$obj_id. "')";
								$result = $mysqli->query($sql);
							}
						}
					}

				}
			}
		} catch (PDOException $e) {
			die("Error occurred:" . $e->getMessage());
		}

		$return_result['status'] = $status;
		$return_result['sa_id'] = $sa_id;
		
		echo json_encode($return_result);
	}//Save function end	

	//function start
	if($fn == 'getServices'){
		$return_array = array();
		$status = true;
		$mainData = array();
		

		$sql = "SELECT * FROM service_area WHERE parent_sa_id = 0 ORDER BY area_location ASC";
		$result = $mysqli->query($sql);

		if ($result->num_rows > 0) {
			$status = true;
			$slno = 1;
			while($row = $result->fetch_array()){
				$sa_id = $row['sa_id'];			
				$parent_sa_id = $row['parent_sa_id'];			
				$area_location = $row['area_location'];		
				$pincode = $row['pincode'];
				$street_name = $row['street_name'];
				$landmark = $row['landmark'];
				$building_name = '';
				$building_sql = "SELECT building_name FROM service_area WHERE parent_sa_id = " . (int) $sa_id . " ORDER BY building_name ASC";
				$building_result = $mysqli->query($building_sql);
				if ($building_result) {
					$building_names = array();
					$building_slno = 1;
					while ($building_row = $building_result->fetch_assoc()) {
						$building_names[] = '<strong>' . $building_slno . '.</strong> ' . htmlspecialchars($building_row['building_name'], ENT_QUOTES, 'UTF-8');
						$building_slno++;
					}
					$building_name = implode('<br>', $building_names);
				}
				$sa_status = $row['sa_status'];
				
				
				$sa_status_stat = '';
				$status_text = 'Inactive';
				if($sa_status == '1'){
					$sa_status_stat = 'checked';
					$status_text = 'Active';
				}

				$toggle_button = '<div class="form-check form-switch"> <input class="form-check-input sa_status" type="checkbox" role="switch" id="sa_status_'.$sa_id.'"  data-id="'.$sa_id.'" '.$sa_status_stat.'> <label class="form-check-label" for="sa_status_'.$sa_id.'" >'.$status_text.'</label> </div>';
				
				$data[0] = $slno;
				$data[1] = $area_location;
				$data[2] = $pincode;
				$data[3] = $street_name;
				$data[4] = $landmark;
				$data[5] = $building_name;
				$data[6] = $toggle_button;
				$data[7] = "<a href='javascript: void(0);' onclick='editService(".$sa_id.")'><i class='fa fa-edit' aria-hidden='true'></i></a> <a href='javascript: void(0);' onclick='deleteServiceArea(".$sa_id.")'><i class='fa fa-trash' aria-hidden='true'></i></a>";

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
	if($fn == 'getServiceAreaData'){
		$return_array = array();
		$status = true;
		$mainData = array();
		$sa_id = $_POST['sa_id'];
		$building_names = array(); 
		$sa_status = 1;
		$area_location = '';
		$pincode = '';
		$street_name = '';
		$landmark = '';


		$sql = "SELECT * FROM service_area WHERE sa_id = '" .$sa_id. "'";
		$result = $mysqli->query($sql);

		if ($result->num_rows > 0) {
			$status = true;	
			$row = $result->fetch_array();
			$sa_id = $row['sa_id'];			
			$area_location = $row['area_location'];					
			$pincode = $row['pincode'];				
			$street_name = $row['street_name'];				
			$landmark = $row['landmark'];				
			$sa_status = $row['sa_status']; 

			$building_sql = "SELECT obj_id, building_name FROM service_area WHERE parent_sa_id = " . (int) $sa_id . " ORDER BY building_name ASC";
			$building_result = $mysqli->query($building_sql);
			$building_names = array();
			if ($building_result) {
				while ($building_row = $building_result->fetch_assoc()) {
					$building_names[] = array(
						'obj_id' => $building_row['obj_id'],
						'name' => $building_row['building_name']
					);
				}
			}
		} else {
			$status = false;
		}
		$mysqli->close();

		$return_array['area_location'] = $area_location;
		$return_array['pincode'] = $pincode;
		$return_array['street_name'] = $street_name;
		$return_array['landmark'] = $landmark;
		$return_array['building_names'] = $building_names; 
		$return_array['sa_status'] = $sa_status;
		$return_array['status'] = $status;
    	echo json_encode($return_array);
	}//function end

	//Delete function
	if($fn == 'deleteServiceArea'){
		$return_result = array();
		$sa_id = $_POST["sa_id"];
		$status = true;	

		$sql = "DELETE FROM service_area WHERE sa_id = '".$sa_id."'";
		$result = $mysqli->query($sql);
		$return_result['status'] = $status;
		
		echo json_encode($return_result);
	}//end function deleteItem

	
	if($fn == 'deleteBuildingName'){
		$return_result = array();
		$obj_id = $_POST["obj_id"];
		$status = true;	

		$sql = "DELETE FROM service_area WHERE obj_id = '".$obj_id."'";
		$result = $mysqli->query($sql);
		$return_result['status'] = $status;
		
		echo json_encode($return_result);
	}//end function deleteItem


	// Update seen status
	if($fn == 'update_active_status'){
		$return_result = array();
		$status = true;

		$sa_id = $_GET["sa_id"];	
		$sa_status = $_GET["sa_status"]; 
        $sql = "UPDATE service_area SET sa_status = '" .$sa_status. "' WHERE sa_id = '" .$sa_id. "' ";
        $result = $mysqli->query($sql);
		
		$return_result['status'] = $status; 
		echo json_encode($return_result);
	}//end	

?>