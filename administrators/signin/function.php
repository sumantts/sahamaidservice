<?php
	//include('sql_conn.php');
	$fn = '';
	if(isset($_POST["fn"])){
	$fn = $_POST["fn"];
	}
	
	//Login function
	if($fn == 'doLogin'){
		$return_result = array();
		$param1 = $_POST["username"];
		$param2 = $_POST["password"];
		$status = true;
		
		//$v = "'".$param1."','".$param2."'";		
		
		try {
            /****
			$pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
			//$sql = "CALL usp_validateuser('bghosh','bagnan@123')";
			$sql = 'CALL usp_validateuser('.$v.')';
			$q = $pdo->query($sql);
			$q->setFetchMode(PDO::FETCH_ASSOC);
			$r = $q->fetch();
			$return_result['r'] = $r;
			
			$UsrId = $r["UsrId"];
			$RlId = $r["RlId"];
			
			$_SESSION["SocietyId"] = $r["SocietyId"];//institute id
			$_SESSION["SocietyNm"] = $r["SocietyNm"];
			$_SESSION["UsrId"] = $UsrId;
			$_SESSION["UsrNm"] = $r["UsrNm"];
			$_SESSION["RlId"] = $RlId;
			
			//LogIn Entry
			$App_SesId = session_id();
			$string = exec('getmac');
			$Mac_Id = substr($string, 0, 17); 
			$ip = $_SERVER['REMOTE_ADDR'];
			
			$pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
			$v = "'".$UsrId."','".$RlId."','".$App_SesId."','".$Mac_Id."','".$ip."',@return";
			$sql = 'CALL usp_UserLogIn('.$v.')';
			$q = $pdo->query($sql);
			$q->setFetchMode(PDO::FETCH_ASSOC);
			$r = $q->fetch();
			
			$q1 = $pdo->query('SELECT @return');
			$q1->setFetchMode(PDO::FETCH_ASSOC);
			$r1 = $q1->fetch();
			if($r1["@return"] > 0){
				$Ret_DbSesId = $r1["@return"];
			}			
			$_SESSION["Ret_DbSesId"] = $Ret_DbSesId;
			$_SESSION["App_SesId"] = $App_SesId;
			$return_result['Ret_DbSesId'] = $Ret_DbSesId;
			$return_result['App_SesId'] = $App_SesId;
			****/
            $return_result["UsrId"] = 1;
		} catch (PDOException $e) {
			die("Error occurred:" . $e->getMessage());
		}
		$return_result['status'] = $status;
		sleep(2);
		echo json_encode($return_result);
	}//end function doLogin

    ?>