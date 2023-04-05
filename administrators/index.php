<?php
	include('assets/php/sql_conn.php');	
	
	if(isset($_GET["p"])){
		$p = $_GET["p"];
	}else{
		$p = '';
	}
	
	if(isset($_GET["gr"])){
		$gr = $_GET["gr"];
	}else{
		$gr = '';
	}

	switch($p){
		case 'signin':
        $title = "Signin";
		include('signin/signin.php');
		break;

		case 'signup':
        $title = "Signup";
		include('signup/signup.php');
		break;
		
		case 'dashboard':
		$title = "Dashboard";
		include('dashboard/dashboard.php');		
		break;

		//SETUP		
		case 'maid_request':
			$title = "Maid Request";
			include('setup/maid_request/maid_request.php');		
		break;
		
		case 'services':
			$title = "Services";
			include('setup/services/services.php');		
		break;
						
		default:
		include('signin/signin.php');
	}
    

?>