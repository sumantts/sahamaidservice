<?php 
	include('../assets/php/sql_conn.php');	
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title><?=$title?></title>

<style>
    body {
        font-family: Arial, sans-serif;
        margin: 20px;
    }

    .container {
        width: 800px;
        margin: auto;
        border: 1px solid #000;
        padding: 15px;

        /* Watermark */
        background-image: url('../assets/images/1logo.png');
        background-repeat: no-repeat;
        background-position: center;
        background-size: 300px; /* adjust size */
        background-opacity: 0.06;
    }

    /* Better way for opacity (important) */
    .container::before {
        content: "";
        position: absolute;
        width: 800px;
        height: 100%;
        background: url('../assets/images/logo.png') no-repeat center;
        background-size: 60%;
        opacity: 0.06; /* watermark lightness */
        z-index: 0;
    }

    /* Keep content above watermark */
    .container * {
        position: relative;
        z-index: 1;
    }
    .container {
        position: relative;
        overflow: hidden;
    }

    h2, h3 {
        text-align: center;
        margin: 5px 0;
    }

    .header {
        text-align: center;
        font-size: 13px;
    }
    
    .top-header {
        display: grid;
        grid-template-columns: 1fr 3fr 1fr;
        align-items: center;
    }

    /* Logo styling */
    .logo-box {
        display: flex;
        align-items: center;
        justify-content: flex-start;
    }

    .logo-box img {
        width: 120px;   /* adjust size */
        height: auto;
    }

    /* Center content */
    .company-info {
        text-align: center;
    }

    /* Photo box */
    .photo-box {
        justify-self: end;
        width: 100px;
        height: 120px;
        border: 1px solid #000;
        text-align: center;
        line-height: 120px;
        font-size: 12px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }

    table, td, th {
        border: 1px solid #000;
    }

    td {
        padding: 6px;
        font-size: 13px;
    }

    .label {
        width: 30%;
        font-weight: bold;
    }

    .checkbox {
        margin-right: 10px;
    }

    .section-title {
        text-align: center;
        font-weight: bold;
        margin-top: 10px;
    }

    @media print {
        body {
            margin: 0;
        }
    }
</style>
</head>

<body>

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
    $user_photo = 'no_images.png';

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

        }else{            
            $status = false;
        }//end if

        # Worktype
        $work_types_text = ''; 
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

<div class="container">

    <div class="top-header">

        <!-- LEFT: LOGO -->
        <div class="logo-box">
            <img src="../assets/images/logo.png" alt="Logo">
        </div>

        <!-- CENTER: COMPANY INFO -->
        <div class="company-info">
            <h2>SAHA MAID SERVICE AND ENTERPRISE</h2>
            <div class="header">
                Registration No - 2621 Company<br>
                Pan No - AFYES5433H<br>
                Service Area - Howrah, Kolkata, Delhi, Chennai, Bangalore, Hyderabad, Mumbai (Pan India)<br>
                Email ID - 24x7@sahamaidservice.com<br>
                Website - www.sahamaidservice.com<br>
                Phone No - 7003662260 / 8906165191
            </div>
            <h3>Personal Information Full Details of Candidate</h3>
        </div>

        <!-- RIGHT: PHOTO -->
        <div class="photo-box"><img src="uploads/<?=$user_photo?>" width="100%" height="100%"></div>

    </div>

    <table>
        <tr>
            <td class="label">Name:</td>
            <td><?=$full_name?></td>
        </tr>
        <tr>
            <td class="label">Father’s / Husband’s Name:</td>
            <td><?=$fat_hus_name?></td>
        </tr>
        <tr>
            <td class="label">Date of Birth:</td>
            <td><?=$date_of_birth?></td>
        </tr>
        <tr>
            <td class="label">Gender:</td>
            <td><?=$gender_name?></td>
        </tr>
        <tr>
            <td class="label">Marital Status:</td>
            <td><?=$m_status_name?></td>
        </tr>
        <tr>
            <td class="label">Permanent Address (Native Place):</td>
            <td><?=$address?></td>
        </tr>
        <tr>
            <td class="label">Pin:</td>
            <td><?=$pincode?></td>
        </tr>
    </table>

    <table>
        <tr>
            <th class="label">Work</th>
            <th>Work Details</th>
        </tr>
        <tr>
            <td class="label"></td>
            <td><?=$work_types_text?></td>
        </tr>
    </table>

    <table>
        <tr>
            <td class="label">Total Work Experience(in Years):</td>
            <td class="label"><?=$work_exp?></td>
            <td>Qualification:</td>
            <td class="label"><?=$highest_edu?></td>
        </tr>
        <tr>
            <td class="label">Family Background with Information:</td>
            <td class="label"><?=$family_bg_info?></td>
            <td>Religion:</td>
            <td class="label"><?=$religion?></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>Nationality:</td>
            <td><?=$nationality?></td>
        </tr>
    </table>

    <table>
        <tr>
            <td class="label">Language Known:</td>
            <td><?=$languages_text?></td>
        </tr>

        <tr>
            <td class="label">Applied Post For(Skills):</td>
            <td><?=$skills_text?></td>
        </tr>

        <tr>
            <td class="label">Nurses:</td>
            <td><?=$nurs_text?></td>
        </tr>

        <tr>
            <td class="label">Working Hours in a day:</td>
            <td><?=$wh_name?></td>
        </tr>

        <tr>
            <td class="label">Documents Details:</td>
            <td><?=$doc_attached?></td>
        </tr>

        <tr>
            <td class="label">Aadhar Card Number:</td>
            <td><?=$adhar_card?></td>
        </tr>

        <tr>
            <td class="label">Remarks:</td>
            <td style="height:50px;"></td>
        </tr>
    </table>

</div>
<script>
    window.print();
</script>
</body>
</html>