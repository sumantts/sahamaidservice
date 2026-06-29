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
	$bank_information = '';
	$bank_name = '';

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
	

	function digitToinWordConverter($number){
		$no = floor($number);
		$point = round($number - $no, 2) * 100;
		$hundred = null;
		$digits_1 = strlen($no);
		$i = 0;
		$str = array();
		$words = array('0' => '', '1' => 'one', '2' => 'two',
			'3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
			'7' => 'seven', '8' => 'eight', '9' => 'nine',
			'10' => 'ten', '11' => 'eleven', '12' => 'twelve',
			'13' => 'thirteen', '14' => 'fourteen',
			'15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
			'18' => 'eighteen', '19' =>'nineteen', '20' => 'twenty',
			'30' => 'thirty', '40' => 'forty', '50' => 'fifty',
			'60' => 'sixty', '70' => 'seventy',
			'80' => 'eighty', '90' => 'ninety');
		$digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
		while ($i < $digits_1) {
			$divider = ($i == 2) ? 10 : 100;
			$number = floor($no % $divider);
			$no = floor($no / $divider);
			$i += ($divider == 10) ? 1 : 2;
			if ($number) {
				$plural = (($counter = count($str)) && $number > 9) ? 's' : null;
				$hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
				$str [] = ($number < 21) ? $words[$number] .
					" " . $digits[$counter] . $plural . " " . $hundred
					:
					$words[floor($number / 10) * 10]
					. " " . $words[$number % 10] . " "
					. $digits[$counter] . $plural . " " . $hundred;
			} else $str[] = null;
		}
		$str = array_reverse($str);
		$result = implode('', $str);
		$points = ($point) ?
			"." . $words[$point / 10] . " " . 
				$words[$point = $point % 10] : '';
		return $result . "Rupees  Only.";
		
	}//end fun
	
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
			$bank_id = $row['bank_id'];
			$bank_name = '';
			if($bank_id > 0){
				$sql2 = "SELECT * FROM bank_details WHERE bank_id = '" .$bank_id. "' ";
				$result2 = $con->query($sql2);
				if ($result2->num_rows > 0) {
					$row2 = $result2->fetch_array();  
					$bank_name = $row2['bank_name']; 
					$bank_information = $row2['bank_information'];
				}//end if
			}
		}


        # Get Invoice Info
        $from_date1 = $inv_month.'-01';
		$to_date1 = date('Y-m-t', strtotime($from_date1));//$inv_month.'-31';
        $sql = "SELECT assign_maid.assign_id, assign_maid.client_id, assign_maid.rcvabl_amount, assign_maid.worker_id, assign_maid.exp_salary, assign_maid.from_date, assign_maid.to_date, assign_maid.from_time, assign_maid.to_time, assign_maid.payment_history, assign_maid.assign_by, assign_maid.asssign_time, assign_maid.bill_status, assign_maid.hsn_code, assign_maid.atten_data, assign_maid.wt_id, assign_maid.two_days_leave,
		user_details.full_name, 
		work_type.type_name
		FROM assign_maid 
		LEFT OUTER JOIN user_details ON assign_maid.client_id = user_details.user_id 
		LEFT OUTER JOIN work_type ON assign_maid.wt_id = work_type.wt_id
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
				//$assign_maid->rcvabl_amount = $row['rcvabl_amount']; 
				$assign_maid->worker_id = $row['worker_id'];
				$assign_maid->exp_salary = $row['exp_salary'];
				$assign_maid->type_name = $row['type_name'];

				$assign_maid->from_date = date('d-F-Y', strtotime($row['from_date']));
				$assign_maid->to_date = date('d-F-Y', strtotime($row['to_date']));
				$assign_maid->from_time = $row['from_time']; 
				$assign_maid->to_time = $row['to_time'];	
				$assign_maid->bill_status = $row['bill_status'];
				$assign_maid->hsn_code = $row['hsn_code'];
				$assign_maid->two_days_leave = $row['two_days_leave'];
				$assign_maid->inv_id = 'INV_'.str_pad($assign_id, 4, "0", STR_PAD_LEFT);
				
				$two_days_extra_amount = 0;				  
				if($row['two_days_leave'] == '1'){
					$two_days_extra_amount1 = 2 * ($row['rcvabl_amount']/30);	
					$two_days_extra_amount = round($two_days_extra_amount1);
				}else{
					$two_days_extra_amount = 0;
				}
				$assign_maid->two_days_extra_amount = $two_days_extra_amount;

				// Days count
				$from_date = $row['from_date'];
				$to_date = $row['to_date'];
				$days_count = (strtotime($to_date) - strtotime($from_date)) / (60 * 60 * 24) + 1;
				$assign_maid->days_count = $days_count;
				$rcvabl_amount = $row['rcvabl_amount']; 
				$daily_amount = $rcvabl_amount / 30;
				$assign_maid->daily_amount = round($daily_amount);
				$calculated_receivable_amount = round($daily_amount * $days_count);
				$assign_maid->calculated_receivable_amount = $calculated_receivable_amount;
				$assign_maid->rcvabl_amount = $calculated_receivable_amount + $two_days_extra_amount;

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
				
				$total_rcvabl_amount = $total_rcvabl_amount + $calculated_receivable_amount;

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