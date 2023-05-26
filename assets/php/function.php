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
		sleep(2);
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
		sleep(2);
		echo json_encode($return_result);
	}//end function saveReview

    ?>