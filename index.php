<?php
	
	if(isset($_GET["p"])){
		$p = $_GET["p"];
	}else{
		$p = '';
	}

	switch($p){
		case 'home':
    $title = "Home";
		include('pages/home.php');
		break;

		case 'about':
    $title = "Signup";
		include('pages/about.php');
		break;

		case 'services':
    $title = "Services";
		include('pages/services.php');
		break;

		case 'portfolio':
    $title = "Portfolio";
		include('pages/portfolio.php');
		break;

		case 'customer-review':
    $title = "Customer Review";
		include('pages/customer-review.php');
		break;

		case 'write-review':
    $title = "Write Review";
		include('pages/write_review.php');
		break;
						
		default:
		include('pages/home.php');
	}
    

?>