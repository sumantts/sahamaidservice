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
        margin: 0;
        padding: 0;
        background: #fff;
    }

    .page {
        width: 210mm;
        min-height: 297mm;
        margin: auto;
        padding: 30px;
        border: 2px solid #000;
        box-sizing: border-box;
        position: relative;
        overflow: hidden;
    }

    /* WATERMARK */
    .watermark {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        opacity: 0.06;
        width: 60%;
        z-index: 0;
    }

    .content {
        position: relative;
        z-index: 1;
    }

    .header {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }

    .logo {
        width: 120px;
    }

    .title {
        text-align: center;
        font-weight: bold;
        font-size: 20px;
        text-decoration: underline;
        flex: 1;
        margin-right: 120px;
    }

    .row {
        margin: 10px 0;
    }

    .label {
        display: inline-block;
        width: 100px;
    }

    .line {
        display: inline-block;
        border-bottom: 1px solid #000;
        width: 500px;
        height: 18px;
    }

    ul {
        margin-top: 10px;
    }

    ul li {
        margin-bottom: 8px;
    }

    .signature-section {
        margin-top: 40px;
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
    }

    .sign-box {
        width: 50%;
    }

    .fingerprints {
        text-align: center;
    }

    .fp-boxes {
        display: flex;
        gap: 10px;
        justify-content: center;
        margin-top: 10px;
    }

    .fp {
        width: 50px;
        height: 50px;
        border: 1px solid #000;
    }

    .bottom-fields {
        margin-top: 30px;
    }

    .bottom-fields p {
        margin: 8px 0;
        border-bottom: 1px solid #000;
        padding-bottom: 3px;
    }

    @media print {
        body {
            margin: 0;
        }

        .page {
            border: 2px solid #000;
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
    $phone_number = '';        
    $fat_hus_name = '';

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
            $work_exp = $row['work_exp'];         
            $highest_edu = $row['highest_edu'];        
            $family_bg_info = $row['family_bg_info'];        
            $religion = $row['religion'];         
            $nationality = $row['nationality'];         
            $wh_name = $row['wh_name'];          
            $adhar_card = $row['adhar_card'];          
            $phone_number = $row['phone_number'];          
            $fat_hus_name = $row['fat_hus_name']; 

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

<div class="page">

    <!-- WATERMARK -->
    <img src="../assets/images/logo.png" class="watermark">

    <div class="content">

        <div class="header">
            <img src="../assets/images/logo.png" class="logo">
            <div class="title">UNDERTAKING FROM THE MAID</div>
        </div>

        <div class="row">
            <span class="label">Name :</span>
            <span class="line"><?=$full_name?></span>
        </div>

        <div class="row">
            <span class="label">Date :</span>
            <span class="line"><?=date('d-F-Y')?></span>
        </div>

        <div class="row">
            <span class="label">Location :</span>
            <span class="line"></span>
        </div>

        <p>This is to certify that,</p>

        <ul>
            <li>I have not been forced to work by Saha Maid Service and Enterprise and I have agreed to do this job on free.</li>
            <li>I have been explained in details with the type of work, which I have to do, and I have also agreed to do that.</li>
            <li>I have been explained with the salary structure.</li>
            <li>I have been explained with the leave structure.</li>
            <li>It is absolutely true that the documents submitted by me are not fake.</li>
            <li>I have never done any crime in my life.</li>
            <li>In case there is any sort of problem from the clients end, I will inform Saha Maid Service and Enterprise immediately.</li>
            <li>I will not blame Saha Maid Service and Enterprise for anything, as well as they will not be responsible for anything.</li>
            <li>If I will leave the work before seven days then the salary will not be paid.</li>
        </ul>

        <div class="signature-section">

            <div class="sign-box">
                <p style="border-bottom:1px solid #000; width:200px;"><?=$full_name?></p>
                <p>Name</p>

                <p style="border-bottom:1px solid #000; width:200px; margin-top:30px;">&nbsp;</p>
                <p>Signature</p>
            </div>

            <div class="fingerprints">
                <p><b>Finger Prints</b></p>
                <div class="fp-boxes">
                    <div class="fp"></div>
                    <div class="fp"></div>
                    <div class="fp"></div>
                    <div class="fp"></div>
                    <div class="fp"></div>
                </div>
            </div>

        </div>

        <div class="bottom-fields">
            <p>Family Details/Personal Details: <?=$family_bg_info?></p>
            <p>Source for this Job:</p>
            <p>Personal Phone Number: <?=$phone_number?></p>
            <p>Contact Number of any Family member / Friend with name: <?=$fat_hus_name?></p>
        </div>

    </div>

</div>

</body>
</html>