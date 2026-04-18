

<?php
    $user_id = '';
    if(isset($_GET['user_id'])){
        $user_id = $_GET['user_id'];
    }
    $status = true;
    $username = '';
    $full_name = '';      
    $fat_hus_name = '';
    $date_of_birth = '';
    $gender_name = '';
    $m_status_name = '';
    $address = '';
    $pincode = '';
    $wt_id = '';
    $work_exp = '';        
    $highest_edu = '';        
    $family_bg_info = '';        
    $religion = '';
    $nationality = '';
    $l_id = '';
    $wt_id = '';
    $sk_id = '';
    $nr_id = '';
    $wh_name = '';
    $adhar_card = '';
    $doc_attached = '';
    $phone_number = ''; 
    $user_photo = 'no_images.png';

    $adhar_card_img = '';
    $adhar_card_back_img = '';
    $voter_id_card_img = '';
    $voter_id_card_back_img = '';
    $pan_card_img = '';


    if($user_id != ''){
        $sql = "SELECT user_details.user_id, user_details.username, user_details.password, user_details.user_type, user_details.added_by, user_details.full_name, user_details.fat_hus_name, user_details.email_id, user_details.phone_number, user_details.alt_phone_number, user_details.m_id, user_details.date_of_birth, user_details.gender, user_details.address, user_details.curr_address, user_details.city_id, user_details.state_id, user_details.country_id, user_details.pincode, user_details.adhar_card, user_details.adhar_card_img, user_details.adhar_card_back_img, user_details.pan_card, user_details.pan_card_img, user_details.voter_id_card, user_details.voter_id_card_img, user_details.voter_id_card_back_img, user_details.user_photo, user_details.wt_id, user_details.work_exp, user_details.earlier_work_city, user_details.last_emplr_name, user_details.sk_id, user_details.nr_id, user_details.l_id, user_details.work_loc, user_details.st_id, user_details.exp_salary, user_details.available_from, user_details.wf_id, user_details.il_id, user_details.pv_id, user_details.ch_id, user_details.emg_cont_person, user_details.relation, user_details.emg_cont_number, user_details.bank_details, user_details.bank_details_img, user_details.highest_edu, user_details.declaration, user_details.lc_id, user_details.wh_id, user_details.religion, user_details.nationality, user_details.family_bg_info, user_details.inserted_by, user_details.updated_by, user_details.insert_date, user_details.update_date, 
        gender_master.gender_name,
        marital_status_master.m_status_name,
        working_hour_master.wh_name
        FROM user_details 
        LEFT OUTER JOIN gender_master ON user_details.gender = gender_master.g_id 
        LEFT OUTER JOIN marital_status_master ON user_details.m_id = marital_status_master.m_id 
        LEFT OUTER JOIN working_hour_master ON user_details.wh_id = working_hour_master.wh_id
        WHERE user_details.user_id = '" .$user_id. "' ";
        //echo $sql;
        $result = $mysqli->query($sql);
        if ($result->num_rows > 0) {
            $status = true;
            $sl = 1;	
            $row = $result->fetch_array();
            $username = $row['username'];        
            $full_name = $row['full_name'];        
            $fat_hus_name = $row['fat_hus_name'];        
            $date_of_birth = date('d-m-Y', strtotime($row['date_of_birth']));         
            $gender_name = $row['gender_name'];         
            $m_status_name = $row['m_status_name'];        
            $address = $row['address'];         
            $pincode = $row['pincode'];        
            if($row['wt_id'] != ''){
                $wt_id = json_decode($row['wt_id']);
            }            
            if($row['l_id'] != ''){
                $l_id = json_decode($row['l_id']);
            }            
            if($row['sk_id'] != ''){
                $sk_id = json_decode($row['sk_id']);
            }             
            if($row['nr_id'] != ''){
                $nr_id = json_decode($row['nr_id']);
            }                    
            if($row['user_photo'] != ''){
                $user_photo = $row['user_photo'];
            } 
            $work_exp = $row['work_exp'];         
            $highest_edu = $row['highest_edu'];        
            $family_bg_info = $row['family_bg_info'];        
            $religion = $row['religion'];         
            $nationality = $row['nationality'];         
            $wh_name = $row['wh_name'];          
            $adhar_card = $row['adhar_card'];           
            $phone_number = $row['phone_number'];

            if($row['adhar_card_img'] != ''){
                $doc_attached .= 'Aadhar Card, ';
            }
            if($row['voter_id_card_img'] != ''){
                $doc_attached .= 'Voter Card, ';
            }
            if($row['pan_card_img'] != ''){
                $doc_attached .= 'Pan Card, ';
            }
            if($doc_attached != ''){
                $doc_attached = substr($doc_attached, 0, -2);
            }            

            if($row['adhar_card_img'] != ''){
                $adhar_card_img = $row['adhar_card_img'];
            }
            if($row['adhar_card_back_img'] != ''){
                $adhar_card_back_img = $row['adhar_card_back_img'];
            }
            if($row['voter_id_card_img'] != ''){
                $voter_id_card_img = $row['voter_id_card_img'];
            }
            if($row['voter_id_card_back_img'] != ''){
                $voter_id_card_back_img = $row['voter_id_card_back_img'];
            }
            if($row['pan_card_img'] != ''){
                $pan_card_img = $row['pan_card_img'];
            }

        }else{            
            $status = false;
        }//end if

        # Worktype
        $work_types_text = ''; 
        //echo $wt_id;
        if($wt_id != ''){
            // Convert array to comma-separated string
            $ids = implode(',', $wt_id);
            $query = "SELECT * FROM work_type WHERE wt_id IN ($ids)";
            $result = $mysqli->query($query);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_array()){
                    $type_name = $row['type_name'];
                    $work_types_text .= $type_name.', ';
                }
            }
        }//end if
        if($work_types_text != ''){
            $work_types_text = substr($work_types_text, 0, -2);
        }

        # Language 
        $languages_text = ''; 
        if($l_id != ''){
            // Convert array to comma-separated string
            $ids = implode(',', $l_id);
            $query = "SELECT * FROM language_master WHERE l_id IN ($ids)";
            $result = $mysqli->query($query);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_array()){
                    $language_name = $row['language_name'];
                    $languages_text .= $language_name.', ';
                }
            }
        }//end if
        if($languages_text != ''){
            $languages_text = substr($languages_text, 0, -2);
        }

        # Skills 
        $skills_text = ''; 
        if($sk_id != ''){
            // Convert array to comma-separated string
            $ids = implode(',', $sk_id);
            $query = "SELECT * FROM skills_master WHERE sk_id IN ($ids)";
            $result = $mysqli->query($query);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_array()){
                    $skill_name = $row['skill_name'];
                    $skills_text .= $skill_name.', ';
                }
            }
        }//end if
        if($skills_text != ''){
            $skills_text = substr($skills_text, 0, -2);
        }

        # Nurses 
        $nurs_text = ''; 
        if($nr_id != ''){
            // Convert array to comma-separated string
            $ids = implode(',', $nr_id);
            $query = "SELECT * FROM nurses_master WHERE nr_id IN ($ids)";
            $result = $mysqli->query($query);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_array()){
                    $nr_name = $row['nr_name'];
                    $nurs_text .= $nr_name.', ';
                }
            }
        }//end if
        if($nurs_text != ''){
            $nurs_text = substr($nurs_text, 0, -2);
        }
    }//end if
?>