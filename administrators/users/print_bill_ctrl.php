<?php
    $bill_id = '';
    $client_id = '';

    $client_name = '';
    $client_address = '';
	$client_phone = '';
	$client_state = '';
    $inv_month = '';
    $assign_maids = array();
    $total_rcvabl_amount = 0;
    $tax_cgst = 0;
    $tax_sgst = 0;
    $bill_total = 0;
	$innv_no = 0;
	$gst_percentage = 0;
	$terms_condi = 0;	
	$wh_name = '';

	# Get skill function
	function getSkillList($mysqli, $ids){
		$skills_text = '';		
		$query = "SELECT * FROM skills_master WHERE sk_id IN ($ids)";
		$result = $mysqli->query($query);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_array()){
				$skill_name = $row['skill_name'];
				$skills_text .= $skill_name.', ';
			}
		}
		
		if($skills_text != ''){
			$skills_text = substr($skills_text, 0, -2);
		}

		return $skills_text;
	}//end if

	# Number to word
	function numberToWords($number) {
		$no = floor($number);
		$decimal = round($number - $no, 2) * 100;

		$words = array(
			0 => '', 1 => 'One', 2 => 'Two', 3 => 'Three', 4 => 'Four',
			5 => 'Five', 6 => 'Six', 7 => 'Seven', 8 => 'Eight', 9 => 'Nine',
			10 => 'Ten', 11 => 'Eleven', 12 => 'Twelve', 13 => 'Thirteen',
			14 => 'Fourteen', 15 => 'Fifteen', 16 => 'Sixteen',
			17 => 'Seventeen', 18 => 'Eighteen', 19 => 'Nineteen',
			20 => 'Twenty', 30 => 'Thirty', 40 => 'Forty',
			50 => 'Fifty', 60 => 'Sixty', 70 => 'Seventy',
			80 => 'Eighty', 90 => 'Ninety'
		);

		$digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');

		$str = array();
		$i = 0;

		while ($no > 0) {
			if ($i == 0) {
				$divider = 1000;
			} else {
				$divider = 100;
			}

			$number_part = $no % $divider;
			$no = floor($no / $divider);

			if ($number_part) {
				$plural = (($number_part > 9) && count($str)) ? '' : '';
				$hundred = (count($str) == 1 && $str[0]) ? ' and ' : '';

				if ($number_part < 21) {
					$str[] = $words[$number_part] . " " . $digits[$i];
				} else {
					$str[] = $words[floor($number_part / 10) * 10]
						. " " . $words[$number_part % 10]
						. " " . $digits[$i];
				}
			} else {
				$str[] = null;
			}
			$i++;
		}

		$result = implode(' ', array_reverse($str));

		$points = '';
		if ($decimal > 0) {
			$points = " and " . $words[$decimal / 10 * 10] . " " . $words[$decimal % 10] . " Paise";
		}

		return trim($result) . " Rupees" . $points . " Only";
	}
	
    if(isset($_GET['bill_id'])){
        $client_id = $_GET['client_id'];
        $bill_id = $_GET['bill_id'];

        # Get Client Info  
		$sql = "SELECT user_details.full_name, user_details.address, user_details.phone_number, 
		states.name AS state_name
		FROM user_details 
		LEFT OUTER JOIN states ON user_details.state_id = states.id
		WHERE user_details.user_id = '" .$client_id. "' ";
		$result = $con->query($sql);
		if ($result->num_rows > 0) {
			$row = $result->fetch_array(); 
			$client_name = $row['full_name'];           
			$client_address = $row['address'];             		          
			$client_phone = $row['phone_number']; 			            		          
			$client_state = $row['state_name']; 
		}//end if    

        # Get Bill Info
		$sql = "SELECT * FROM bill_details WHERE bill_id = '" .$bill_id. "' ";
		$result = $con->query($sql);

		if ($result->num_rows > 0) {
			$row = $result->fetch_array();  
			$inv_month = $row['inv_month']; 
			$tax_cgst = $row['tax_cgst']; 
			$tax_sgst = $row['tax_sgst']; 
			$bill_total = $row['bill_total'];           
			$gst_percentage = $row['gst_percentage'];             
			$terms_condi = $row['terms_condi']; 
		}


        # Get Invoice Info
        $from_date1 = $inv_month.'-01';
		$to_date1 = $inv_month.'-31';
        $sql = "SELECT assign_maid.assign_id, assign_maid.client_id, assign_maid.rcvabl_amount, assign_maid.worker_id, assign_maid.exp_salary, assign_maid.from_date, assign_maid.to_date, assign_maid.from_time, assign_maid.to_time, assign_maid.payment_history, assign_maid.assign_by, assign_maid.asssign_time, assign_maid.bill_status, assign_maid.hsn_code, assign_maid.atten_data,
		user_details.full_name
		FROM assign_maid 
		LEFT OUTER JOIN user_details ON assign_maid.client_id = user_details.user_id 
		WHERE assign_maid.client_id = '" .$client_id. "' AND from_date >= '" .$from_date1. "' AND to_date <= '" .$to_date1. "' "; 

		//echo $sql;
		$result = $con->query($sql);

		if ($result->num_rows > 0) {
			$status = true;	
			while($row = $result->fetch_array()){		
				$assign_maid = new stdClass();	
				$assign_id = $row['assign_id'];
				$assign_maid->assign_id = $row['assign_id'];					
			
				$assign_maid->client_name = $row['full_name'];
				$assign_maid->client_id = $row['client_id'];
				$assign_maid->rcvabl_amount = $row['rcvabl_amount']; 
				$assign_maid->worker_id = $row['worker_id'];
				$assign_maid->exp_salary = $row['exp_salary'];

				$assign_maid->from_date = date('d-F-Y', strtotime($row['from_date']));
				$assign_maid->to_date = date('d-F-Y', strtotime($row['to_date']));
				$assign_maid->from_time = $row['from_time']; 
				$assign_maid->to_time = $row['to_time'];	
				$assign_maid->bill_status = $row['bill_status'];
				$assign_maid->hsn_code = $row['hsn_code'];
				$assign_maid->inv_id = 'INV_'.str_pad($assign_id, 4, "0", STR_PAD_LEFT);
								  
				

				// Worker Name
				$worker_id = $row['worker_id'];
				$worker_name = '';
				if($worker_id != ''){
					$sql3 = "SELECT user_details.full_name, user_details.sk_id, 
					working_hour_master.wh_name
					FROM user_details 
					LEFT OUTER JOIN working_hour_master ON user_details.wh_id = working_hour_master.wh_id
					WHERE user_id = '" .$worker_id. "' ";
					$result3 = $con->query($sql3);

					if ($result3->num_rows > 0) { 
						$row3 = $result3->fetch_array();
						$worker_name = $row3['full_name'];	 
						$wh_name = $row3['wh_name'];	
						$sk_id = array();      
						if($row3['sk_id'] != ''){
							$sk_id = json_decode($row3['sk_id']);
						}
					}
				}//end if
				$assign_maid->worker_name = $worker_name;
				$assign_maid->wh_name = $wh_name;
				
				$total_rcvabl_amount = $total_rcvabl_amount + $row['rcvabl_amount'];

                # Attendance calculation
                $present_days = 0;
                if($row['atten_data'] != ''){
                    $atten_data = json_decode($row['atten_data']);

                    if(sizeof($atten_data)){
                        for($i = 0; $i < sizeof($atten_data); $i++){
                            if($atten_data[$i]->pre_abs_lev == '1'){
                                $present_days++;
                            }
                        }
                    }
                }
				$assign_maid->present_days = $present_days;

				# Skills 
				$skills_text = '';  
				$assign_maid->skills_text = $skills_text;
				if(sizeof($sk_id) > 0){
					$ids = implode(',', $sk_id);
					$skills_text = getSkillList($mysqli, $ids); 
					$assign_maid->skills_text = $skills_text;
				} 

				array_push($assign_maids, $assign_maid);
			}
		}
        
        
    }//end if
?>