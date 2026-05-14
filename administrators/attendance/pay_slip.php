<?php 
	include('../assets/php/sql_conn.php');	
    include('pay_slip_ctrl.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Invoice Print</title>
<!-- Favicon icon -->
<link rel="icon" href="../assets/images/<?=$ico?>" type="image/x-icon">

<style>

    @page {
        size: A4;
        margin: 10mm;
    }

    body{
        font-family: Arial, sans-serif;
        background:#f5f5f5;
        margin:0;
        padding:20px;
    }

    .invoice-container{
        width: 210mm;
        min-height: 297mm;
        background:#fff;
        margin:auto;
        border:2px solid #000;
        box-sizing:border-box;
    }

    .company-title{
        text-align:center;
        font-size:48px;
        font-weight:bold;
        padding:15px 10px;
        border-bottom:2px solid #000;
    }

    .invoice-title{
        text-align:center;
        font-size:30px;
        font-weight:bold;
        border-bottom:2px solid #000;
        padding:8px;
    }

    table{
        width:100%;
        border-collapse:collapse;
    }

    td, th{
        border:1px solid #000;
        padding:8px;
        vertical-align:top;
        font-size:18px;
    }

    .no-border{
        border:none !important;
    }

    .company-info{
        width:58%;
    }

    .invoice-info{
        width:42%;
    }

    .particular-title{
        font-weight:bold;
        text-align:center;
        font-size:22px;
    }

    .amount-column{
        width:22%;
        text-align:center;
        font-weight:bold;
    }

    .bold{
        font-weight:bold;
    }

    .service-details{
        height:180px;
        line-height:1.8;
    }

    .amount-words{
        font-size:15px;
        font-weight:bold;
    }

    .footer-section{
        height:190px;
    }

    .bank-details{
        line-height:1.8;
        font-size:16px;
        font-weight:bold;
    }

    .signature-section{
        text-align:center;
        vertical-align:bottom;
        position:relative;
    }

    .signature{
        width:180px;
        margin-top:20px;
    }

    .stamp{
        width:140px;
        position:absolute;
        top:45px;
        left:50%;
        transform:translateX(-50%);
        opacity:0.4;
    }

    .auth-text{
        margin-top:120px;
        font-weight:bold;
    }

    @media print{

        body{
            background:#fff;
            padding:0;
        }

        .invoice-container{
            border:2px solid #000;
            width:100%;
            min-height:auto;
        }

    }

</style>
</head>

<body>

<div class="invoice-container">

    <!-- Company Name -->
    <div class="company-title">
        SAHA ENTERPRISE
    </div>

    <!-- Invoice Title -->
    <div class="invoice-title">
        INVOICE
    </div>

    <!-- Header Details -->
    <table>

        <tr>

            <td class="company-info">

                <div class="bold">SAHA ENTERPRISE</div>

                NCC park, west burikhali, near bauria station<br>
                Dist - Howrah (711310)<br>
                State : West Bengal<br>
                Contact : kundan Saha (7003662260)<br>
                Email : <u>Kundansahaenterprise@gmail.com</u><br>
                <span class="bold">www.sahamaidservice.com</span>

                <br><br>

                Client Name – <?php echo htmlspecialchars($client_name ?: 'Rahul Mitra'); ?><br>
                Address – <?php echo htmlspecialchars($client_address ?: '401, Victoria Apartment, Kadamtala'); ?><br>
                Contact – <?php echo htmlspecialchars($client_contact ?: '9731517926'); ?><br>
                State - <?php echo htmlspecialchars($client_state ?: 'West Bengal'); ?>

            </td>

            <td class="invoice-info" style="padding:0;">

                <table>
                    <tr>
                        <td class="bold">Invoice no:-<?=$atten_id?></td>
                        <td class="bold">Date:- <?=date('d.m.Y', strtotime($assignWhereDate))?></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="height:240px;"></td>
                    </tr>
                </table>

            </td>

        </tr>

        <!-- Particular Header -->
        <tr>

            <td class="particular-title">
                Particulars
            </td>

            <td class="particular-title">
                Amount
            </td>

        </tr>

        <!-- Payment Row -->
        <tr>

            <td class="bold">
                Payment of maid
            </td>

            <td class="amount-column">
                <?php echo number_format($exp_salary, 2); ?>/-
            </td>

        </tr>

        <!-- Medical Purpose -->
        <?php if($total_absent > 0){ ?> 
        <tr>
            <td class="bold">
                Absent Deduction (<?php echo $total_absent; ?> days)
            </td>
            <td class="amount-column">
                <?php echo number_format($deduction_amount, 2); ?>/-
            </td>
        </tr>
        <?php } ?>

        <!-- Service Details -->
        <tr>

            <td class="service-details">

                Name :- <?php echo $full_name; ?><br>
                Skill :- <?php echo $skills_text; ?><br>
                Hours :- <?php echo $wh_name; ?><br>
                Salary per month :- <?php echo number_format($exp_salary, 2); ?>/-

            </td>

            <td></td>

        </tr>

        <!-- Amount in words -->
        <tr>

            <td class="amount-words">
                Amount chargeable (in word):- <?php echo numberToWords($amount_chargeable); ?>
            </td>

            <td class="amount-column">
                <?php echo number_format($amount_chargeable, 2); ?>/-
            </td>

        </tr>

        <!-- Footer -->
        <tr>

            <td class="footer-section">

                <div class="bank-details">

                    Company's Bank Detail<br>

                    A/C Holder Name : Kundan Kumar Saha<br>

                    Bank Name :- State Bank of India<br>

                    A/C: 33378961528<br>

                    IFSC code : SBIN0001295<br>

                    Phone pay -8906161591<br>

                    Google pay -8906161591 & UPI ID 8906161591@ybl

                </div>

            </td>

            <td class="signature-section">

                <div style="margin-top:20px; font-weight:bold;">
                    E & O E
                </div>

                <!-- Stamp Image -->
                <!-- Replace with your image -->
                <!--
                <img src="stamp.png" class="stamp">
                -->

                <!-- Signature Image -->
                <!-- Replace with your image -->
                <!--
                <img src="signature.png" class="signature">
                -->

                <div class="auth-text">
                    Authorized Signatory
                </div>

            </td>

        </tr>

    </table>

</div>

</body>
</html>