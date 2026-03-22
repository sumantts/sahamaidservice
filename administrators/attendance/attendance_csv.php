<?php
	include '../assets/php/sql_conn.php';

	$csv_export1 = "";	
	$csv_export = '';	

	$csv_export .= "Date," ;
	$csv_export .= "Status,";
	$csv_export .= "Note,";	
	$csv_export .= "\n";
	
	
	if(isset($_GET['atten_id'])){ 
		$atten_id = $_GET['atten_id'];
		
		$csv_fileName = 'attendance_report_'.date('M_Y').'.csv';
		
		//Get Attendance Data
		$sql = "SELECT * FROM attendance_register WHERE atten_id = '" .$atten_id. "'";
		$result = $mysqli->query($sql);

		if ($result->num_rows > 0) {
			$row = $result->fetch_array();
			$atten_data = json_decode($row['atten_data']);
			$user_id = $row['user_id'];
			$month_date_txt = date('M_Y', strtotime($row['month_date']));
		
		
			//Get User Data
			$sql3 = "SELECT * FROM user_details WHERE user_id = '" .$user_id. "'";
			$result3 = $mysqli->query($sql3);

			if ($result3->num_rows > 0) {
				$row3 = $result3->fetch_array();
				$full_name = $row3['full_name'];
			}

			$csv_fileName = 'attendance_report_'.$full_name.'_'.$month_date_txt.'.csv';

			if(sizeof($atten_data) > 0){
				for($i = 0; $i < sizeof($atten_data); $i++){	
					$atten_date = date('d-F-Y', strtotime($atten_data[$i]->atten_date));	
					$pre_abs_lev = $atten_data[$i]->pre_abs_lev;	
					$atten_note = $atten_data[$i]->atten_note;
					$pre_abs_lev_txt = ''; 
					if($pre_abs_lev == '1'){
						$pre_abs_lev_txt = 'Present'; 
					}else if($pre_abs_lev == '2'){
						$pre_abs_lev_txt = 'Absent'; 
					}else if($pre_abs_lev == '3'){
						$pre_abs_lev_txt = 'Leave'; 
					}else{
						$pre_abs_lev_txt = ''; 
					}

					$csv_export1 .= "$atten_date,";
					$csv_export1 .= "$pre_abs_lev_txt,";
					$csv_export1 .= "$atten_note,";
					$csv_export1 .= "\n";
				}
			}
		}//end if
		

			/*$csv_export1 .= ",";
			$csv_export1 .= ",";
			$csv_export1 .= ",";
			$csv_export1 .= "Subtotal,";
			$csv_export1 .= "$sub_tot_paid_amount,";
			$csv_export1 .= "$sub_tot_due_amount,";
			$csv_export1 .= "$sub_tot_order_amount,";
			$csv_export1 .= "\n";*/

	}
	$csv_export .= $csv_export1;
	header("Content-type: text/x-csv");
	header("Content-Disposition: attachment; filename=".$csv_fileName."");
	echo($csv_export);

?>