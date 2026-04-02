<?php 
	include('../assets/php/sql_conn.php');	
    include('print_ctrl.php');	
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title><?=$title?></title>
<!-- Favicon icon -->
<link rel="icon" href="../assets/images/<?=$ico?>" type="image/x-icon">

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


    /* A4 page setup */
.doc-page {
    width: 794px;              /* exact A4 width */
    height: 1123px;            /* exact A4 height */
    margin: auto;
    
    display: flex;
    flex-direction: column;
    justify-content: center;   /* vertical center */
    align-items: center;       /* horizontal center */
    
    text-align: center;
}

/* Page break for print */
.page-break {
    page-break-before: always;
}

/* Full A4 document page */
.doc-page {
    width: 800px;
    margin: auto;
    text-align: center;
}

/* Title */
 
/* Image container */ 

/* Image fit */ 


    /* Title */
    .doc-page h2 {
        margin-bottom: 20px;
    }

    /* Image container */
    .doc-box {
        width: 90%;
        height: 85%;
        
        display: flex;
        justify-content: center;
        align-items: center;
    }

    /* Image */
    .doc-box img {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
        border: 1px solid #000;
    }
</style>
</head>

<body>

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

    <?php if($adhar_card_img != ''){?>
    <!-- PAGE BREAK -->
    <div class="page-break"></div>

    <!-- AADHAR CARD PAGE -->
    <div class="doc-page">
        <h2>Document: Aadhaar Card</h2>
        <div class="doc-box">
            <img src="uploads/<?=$adhar_card_img?>" alt="Aadhaar Card Front">
        </div>
    </div>
    <?php } ?>

    <?php if($adhar_card_back_img != ''){?>
    <!-- PAGE BREAK -->
    <div class="page-break"></div>

    <!-- AADHAR CARD PAGE -->
    <div class="doc-page">
        <h2>Document: Aadhaar Card (Back Side)</h2>
        <div class="doc-box">
            <img src="uploads/<?=$adhar_card_back_img?>" alt="Aadhaar Card Back">
        </div>
    </div>
    <?php } ?>

    <?php if($voter_id_card_img != ''){?>
    <!-- PAGE BREAK -->
    <div class="page-break"></div>

    <!-- VOTER ID PAGE -->
    <div class="doc-page">
        <h2>Document: Voter ID Card</h2>
        <div class="doc-box">
            <img src="uploads/<?=$voter_id_card_img?>" alt="Voter ID Front">
        </div>
    </div>
    <?php } ?>

    <?php if($voter_id_card_back_img != ''){?>
    <!-- PAGE BREAK -->
    <div class="page-break"></div>

    <!-- VOTER ID PAGE -->
    <div class="doc-page">
        <h2>Document: Voter ID Card (Back Side)</h2>
        <div class="doc-box">
            <img src="uploads/<?=$voter_id_card_back_img?>" alt="Voter ID Back">
        </div>
    </div>
    <?php } ?>

    <?php if($pan_card_img != ''){?>
    <!-- PAGE BREAK -->
    <div class="page-break"></div>

    <!-- PAN ID PAGE -->
    <div class="doc-page">
        <h2>Document: PAN ID Card</h2>
        <div class="doc-box">
            <img src="uploads/<?=$pan_card_img?>" alt="Voter ID">
        </div>
    </div>
    <?php } ?>

</div>
<script>
    window.print();
</script>
</body>
</html>