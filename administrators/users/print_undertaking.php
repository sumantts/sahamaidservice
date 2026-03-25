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
            <span class="line"></span>
        </div>

        <div class="row">
            <span class="label">Date :</span>
            <span class="line"></span>
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
                <p style="border-bottom:1px solid #000; width:200px;">&nbsp;</p>
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
            <p>Family Details/Personal Details :</p>
            <p>Source for this Job :</p>
            <p>Personal Phone Number :</p>
            <p>Contact Number of any Family member / Friend with name :</p>
        </div>

    </div>

</div>

</body>
</html>