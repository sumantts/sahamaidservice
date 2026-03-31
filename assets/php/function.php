<?php
	include('../../administrators/assets/php/sql_conn.php');
	$fn = '';
	if(isset($_POST["fn"])){
	$fn = $_POST["fn"];
	}
	
	//Save Quote function
	if($fn == 'saveQuote'){
		$return_result = array();
		$quote_details = json_encode($_POST["quote_details"]);
		$status = true;	
        
        $sql = "INSERT INTO quote_request (quote_details) VALUES ('" .$quote_details. "')";
        $result = $mysqli->query($sql);
        $quotation_id = $mysqli->insert_id;

        if ($quotation_id > 0) {
            $status = true;
        } else {
            $status = false;
        }
        $mysqli->close();

		$return_result['status'] = $status; 
		echo json_encode($return_result);
	}//end function saveQuote
	
	//Save Review function
	if($fn == 'saveReview'){
		$return_result = array();
		$review_details = json_encode($_POST["review_details"]);
		$status = true;	
        
        $sql = "INSERT INTO cstomer_review (review_detail) VALUES ('" .$review_details. "')";
        $result = $mysqli->query($sql);
        $quotation_id = $mysqli->insert_id;

        if ($quotation_id > 0) {
            $status = true;
        } else {
            $status = false;
        }
        $mysqli->close();

		$return_result['status'] = $status; 
		echo json_encode($return_result);
	}//end function saveReview

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

	

	// Hours
	if($fn == 'configureHoursRequiredDd'){ 
		$return_array = array();
		$status = true;
		$mainData = array();
		
		$sql = "SELECT * FROM working_hour_master";
		$result = $con->query($sql);

		if ($result->num_rows > 0) {
			$status = true; 
			while($row = $result->fetch_array()){
				$data_obj = new stdClass();
				$data_obj->id = $row['wh_id'];
				$data_obj->name = $row['wh_name'];
				
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