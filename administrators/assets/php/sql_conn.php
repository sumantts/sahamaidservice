<?php
	$host = 'localhost';
	$username = 'root';
	$password = '';
	$dbname = 'dbmpowersms';
	
	/*$host = 'localhost';
	$username = 'srlmmjvw_mpower';
	$password = '&E2h8h%{jymk';
	$dbname = 'srlmmjvw_dbmpowersms';*/
	
	session_start();
	
	/*echo "connected...";
	
	try {
		$pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
		$sql = "CALL usp_validateuser('admin','bagnan')";
		$q = $pdo->query($sql);
		$q->setFetchMode(PDO::FETCH_ASSOC);
	} catch (PDOException $e) {
		die("Error occurred:" . $e->getMessage());
	}
		
	while ($r = $q->fetch()): 
		echo $r['SocietyNm'];
	endwhile;*/

	
    $p_name = 'Bagnan Mahila Bikash';
	// $logo = 'logo.jpg';
	// $ico = 'logo-mahila.ico';

	$logo = 'logo.png';
	$ico = 'favicon.ico';
	

	
	
		 
?>
