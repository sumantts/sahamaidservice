<?php
    $target_dir = "uploads/";

	if(!is_dir($target_dir)){
		mkdir($target_dir);
	}

	$file = $_FILES['image']['name'];
	$tmp  = $_FILES['image']['tmp_name'];

	$newname = time()."_".$file;

	$path = $target_dir.$newname;

	if(move_uploaded_file($tmp,$path)){
		echo $newname;
	}
	else{
		echo "Upload Failed";
	}
?>