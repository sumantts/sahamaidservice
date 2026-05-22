<?php

    $total_present = 0;
    $total_half_present = 0;
    $total_absent = 0;
    $total_leave = 0;
    $full_name = '';
    $month_date_txt = '';
	$skills_text = '';
    $wh_name = '';
    $exp_salary = '';
    $amount_chargeable = 0; // Expected Salary - Deduction Amount
    $deduction_amount = 0; // Expected Salary / 30 * Total Absent Days
    $client_name = '';
    $client_address = '';
    $client_contact = '';
    $client_state = '';
    $atten_id = '';
    $present_amount = 0;
    $hduty_amount = 0;
    $total_working_days = 0;

    

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

    function numberToWords($number) {
        $number = trim($number);
        if ($number === '' || !is_numeric($number)) {
            return '';
        }

        $number = round((float)$number, 2);
        $integerPart = floor($number);
        $fractionPart = (int) round(($number - $integerPart) * 100);

        $result = $integerPart === 0 ? 'zero' : numberToWordsRaw($integerPart);

        if ($fractionPart > 0) {
            $result .= ' and ' . numberToWordsRaw($fractionPart) . ' paise';
        }

        return ucfirst(trim($result)) . ' only';
    }

    function numberToWordsRaw($number) {
        $number = (int) $number;

        $words = array(
            0 => 'zero',
            1 => 'one',
            2 => 'two',
            3 => 'three',
            4 => 'four',
            5 => 'five',
            6 => 'six',
            7 => 'seven',
            8 => 'eight',
            9 => 'nine',
            10 => 'ten',
            11 => 'eleven',
            12 => 'twelve',
            13 => 'thirteen',
            14 => 'fourteen',
            15 => 'fifteen',
            16 => 'sixteen',
            17 => 'seventeen',
            18 => 'eighteen',
            19 => 'nineteen',
            20 => 'twenty',
            30 => 'thirty',
            40 => 'forty',
            50 => 'fifty',
            60 => 'sixty',
            70 => 'seventy',
            80 => 'eighty',
            90 => 'ninety'
        );

        $scales = array(
            10000000 => 'crore',
            100000 => 'lakh',
            1000 => 'thousand',
            100 => 'hundred'
        );

        $result = '';

        foreach ($scales as $scale => $scaleName) {
            if ($number >= $scale) {
                $scaleValue = floor($number / $scale);
                $number %= $scale;
                $result .= numberToWordsRaw($scaleValue) . ' ' . $scaleName . ' ';
            }
        }

        if ($number > 0) {
            if ($number < 21) {
                $result .= $words[$number] . ' ';
            } else {
                $tens = ((int)($number / 10)) * 10;
                $units = $number % 10;
                $result .= $words[$tens] . ' ';
                if ($units) {
                    $result .= $words[$units] . ' ';
                }
            }
        }

        $result = trim($result);
        return preg_replace('/\s+/', ' ', $result);
    }

    
	if(isset($_GET['atten_id'])){ 
		$atten_id = $_GET['atten_id'];	

		//Get Attendance Data
		$sql = "SELECT * FROM attendance_register WHERE atten_id = '" .$atten_id. "'";
		$result = $mysqli->query($sql);

		if ($result->num_rows > 0) {
			$row = $result->fetch_array();
			$atten_data = json_decode($row['atten_data']);
			$user_id = $row['user_id'];
			$month_date_txt = date('M_Y', strtotime($row['month_date']));
		
		
	
            $assignWhereDate = $mysqli->real_escape_string($row['month_date']);
            $assignUserId = $mysqli->real_escape_string($user_id);

            $from_date = date('Y-m-01', strtotime($assignWhereDate));
            $to_date = date('Y-m-t', strtotime($assignWhereDate));

            $assignSql = "SELECT assign_maid.assign_id, assign_maid.worker_id, assign_maid.client_id, assign_maid.from_date, assign_maid.to_date, 
            user_details.full_name, user_details.address, user_details.phone_number,
            states.name AS client_state
            FROM assign_maid 
            LEFT OUTER JOIN user_details ON assign_maid.client_id = user_details.user_id 
            LEFT OUTER JOIN states ON user_details.state_id = states.id
            WHERE assign_maid.worker_id = '$assignUserId' AND assign_maid.from_date >= '$from_date' AND assign_maid.to_date <= '$to_date'";

            $assignResult = $mysqli->query($assignSql);
            if ($assignResult && $assignResult->num_rows > 0) {
                $assignRow = $assignResult->fetch_assoc();
                $client_name = isset($assignRow['full_name']) ? $assignRow['full_name'] : '';
                $client_address = isset($assignRow['address']) ? $assignRow['address'] : '';
                $client_contact = isset($assignRow['phone_number']) ? $assignRow['phone_number'] : '';
                $client_state = isset($assignRow['client_state']) ? $assignRow['client_state'] : '';
            }

		//Get User Data
			$sql3 = "SELECT user_details.user_id, user_details.username, user_details.password, user_details.user_type, user_details.added_by, user_details.full_name, user_details.fat_hus_name, user_details.email_id, user_details.phone_number, user_details.alt_phone_number, user_details.m_id, user_details.date_of_birth, user_details.gender, user_details.address, user_details.curr_address, user_details.city_id, user_details.state_id, user_details.country_id, user_details.pincode, user_details.adhar_card, user_details.adhar_card_img, user_details.adhar_card_back_img, user_details.pan_card, user_details.pan_card_img, user_details.voter_id_card, user_details.voter_id_card_img, user_details.voter_id_card_back_img, user_details.user_photo, user_details.wt_id, user_details.work_exp, user_details.earlier_work_city, user_details.last_emplr_name, user_details.sk_id, user_details.nr_id, user_details.l_id, user_details.work_loc, user_details.st_id, user_details.exp_salary, user_details.available_from, user_details.wf_id, user_details.il_id, user_details.pv_id, user_details.ch_id, user_details.emg_cont_person, user_details.relation, user_details.emg_cont_number, user_details.bank_details, user_details.bank_details_img, user_details.highest_edu, user_details.declaration, user_details.lc_id, user_details.wh_id, user_details.religion, user_details.nationality, user_details.family_bg_info, user_details.inserted_by, user_details.updated_by, user_details.insert_date, user_details.update_date, 
            gender_master.gender_name,
            marital_status_master.m_status_name,
            working_hour_master.wh_name,
            states.name AS state_name,
            cities.city AS city_name
            FROM user_details 
            LEFT OUTER JOIN gender_master ON user_details.gender = gender_master.g_id 
            LEFT OUTER JOIN marital_status_master ON user_details.m_id = marital_status_master.m_id 
            LEFT OUTER JOIN working_hour_master ON user_details.wh_id = working_hour_master.wh_id
            LEFT OUTER JOIN states ON user_details.state_id = states.id
            LEFT OUTER JOIN cities ON user_details.city_id = cities.id WHERE user_details.user_id = '" .$user_id. "'";

			$result3 = $mysqli->query($sql3);

			if ($result3->num_rows > 0) {
				$row3 = $result3->fetch_array();
				$full_name = $row3['full_name'];
				$sk_id = json_decode($row3['sk_id']);

                # Skills 
				$skills_text = '';                
                if(sizeof($sk_id) > 0){
                    $ids = implode(',', $sk_id);
                    $skills_text = getSkillList($mysqli, $ids);
                }   
                
                $wh_name = $row3['wh_name'];
                $exp_salary = $row3['exp_salary'];

			}

			$csv_fileName = 'attendance_report_'.$full_name.'_'.$month_date_txt.'.csv';

            $total_working_days = sizeof($atten_data);
			if(sizeof($atten_data) > 0){
				for($i = 0; $i < sizeof($atten_data); $i++){	
					$atten_date = date('d-F-Y', strtotime($atten_data[$i]->atten_date));	
					$pre_abs_lev = $atten_data[$i]->pre_abs_lev;	
					$atten_note = $atten_data[$i]->atten_note;
                    
					if($pre_abs_lev == '1'){ 
                        $total_present++;
					}else if($pre_abs_lev == '2'){ 
                        $total_half_present++;
					}else if($pre_abs_lev == '3'){ 
                        $total_absent++;
					}else if($pre_abs_lev == '4'){ 
                        $total_leave++;
					}else{  
                        $total_absent++;
					} 
				}
			}

            $effective_day = $total_present + ($total_half_present / 2);
            $present_amount = ($exp_salary / 30) * $total_present;
            $hduty_amount = ($exp_salary / 30) * ($total_half_present / 2);
            $deduction_amount = $exp_salary - ($present_amount + $hduty_amount);
            $amount_chargeable = $exp_salary - $deduction_amount;



		}//end if
	}//end if
?>