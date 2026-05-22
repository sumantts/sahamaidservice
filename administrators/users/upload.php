<?php
	include('../assets/php/sql_conn.php');
    $target_dir = "uploads/";

	if(!is_dir($target_dir)){
		mkdir($target_dir, 0755, true);
	}

	$field_name = $_POST['field_name'];
	$serial_number = $_POST['serial_number'];
	$sess_user_id = isset($_SESSION["user_id"]) ? $_SESSION["user_id"] : 0;

	$allowed_extensions = array('jpg','jpeg','png','gif');
	$uploaded_names = array();

	if(isset($_FILES['image'])){
		$files = $_FILES['image'];
		if(is_array($files['name'])){
			for($i = 0; $i < count($files['name']); $i++){
				if($files['error'][$i] === UPLOAD_ERR_OK){
					$original = $files['name'][$i];
					$extension = strtolower(pathinfo($original, PATHINFO_EXTENSION));
					if(in_array($extension, $allowed_extensions)){
						$newname = time() . '_' . ($i + 1) . '.' . $extension;
						$path = $target_dir . $newname;
						if(move_uploaded_file($files['tmp_name'][$i], $path)){
							$uploaded_names[] = $newname;
						}
					}
				}
			}
		} else {
			if($files['error'] === UPLOAD_ERR_OK){
				$original = $files['name'];
				$extension = strtolower(pathinfo($original, PATHINFO_EXTENSION));
				if(in_array($extension, $allowed_extensions)){
					$newname = time().'.'.$extension;
					$path = $target_dir.$newname;
					if(move_uploaded_file($files['tmp_name'],$path)){
						$uploaded_names[] = $newname;
					}
				}
			}
		}
	}

	if(count($uploaded_names) > 0){
		$encoded = implode(',', $uploaded_names);

		if($field_name === 'misce_doc'){
			$existing = '';
			$sql0 = "SELECT misce_doc FROM user_details WHERE user_id = '" . $serial_number . "'";
			$result0 = $con->query($sql0);
			if($result0 && $result0->num_rows > 0){
				$row0 = $result0->fetch_assoc();
				$existing = trim($row0['misce_doc']);
			}
			$field_val = $existing !== '' ? $existing . ',' . $encoded : $encoded;
		} else {
			$field_val = $uploaded_names[0];
		}

		$sql1 = "UPDATE user_details SET $field_name = '" . $con->real_escape_string($field_val) . "', updated_by = '" .$sess_user_id. "' WHERE user_id = '".$serial_number."'";
		$result1 = $con->query($sql1);

		echo $encoded;
	} else {
		echo "Upload Failed";
	}
?>