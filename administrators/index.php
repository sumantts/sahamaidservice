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
		case 'organisation':
			$title = "Organisation";
			include('setup/organisation/organisation.php');		
		break;
		
		case 'deposit':
			$title = "Deposit";
			include('setup/product/deposit/deposit.php');		
		break;
						
		default:
		include('signin/signin.php');
	}
    

?>