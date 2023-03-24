<?php
	//include('sql_conn.php');
	$fn = '';
    
	if(isset($_POST["fn"])){
	    $fn = $_POST["fn"];
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
?>