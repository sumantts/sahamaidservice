<?php
	include('../assets/php/sql_conn.php');
    $target_dir = "uploads/";

	if(!is_dir($target_dir)){
		mkdir($target_dir);
	}

	$file = $_FILES['image']['name'];
	$tmp  = $_FILES['image']['tmp_name'];
	$extension = pathinfo($file, PATHINFO_EXTENSION);
	$field_name = $_POST['field_name'];
	$serial_number = $_POST['serial_number'];
	$sess_user_id = $_SESSION["user_id"];

	$newname = time().".".$extension;
	$path = $target_dir.$newname;

	if(move_uploaded_file($tmp,$path)){
		echo $newname;			
		$sql1 = "UPDATE user_details SET $field_name = '" .$newname. "', updated_by = '" .$sess_user_id. "' WHERE user_id = '".$serial_number."'";
		$result1 = $con->query($sql1);

	}
	else{
		echo "Upload Failed";
	}
?>