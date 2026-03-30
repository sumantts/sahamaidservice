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
            <h3>Personal Information Full Details of Client</h3>
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
            <td class="label">Permanent Address (Native Place):</td>
            <td><?=$address?></td>
        </tr>
        <tr>
            <td class="label">Pin:</td>
            <td><?=$pincode?></td>
        </tr>
    </table>
    

</div>
<script>
    //window.print();
</script>
</body>
</html>