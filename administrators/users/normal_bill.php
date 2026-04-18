<?php 
	include('../assets/php/sql_conn.php');	
    include('print_bill_ctrl.php');	
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Invoice</title>

<style>
    @page {
        size: A4;
        margin: 10mm;
    }

    body {
        font-family: Arial, sans-serif;
        background: #ccc;
    }

    .page {
        width: 210mm;
        min-height: 297mm;
        margin: auto;
        background: #fff;
        padding: 10mm;
        box-sizing: border-box;
    }

    .invoice-box {
        border: 2px solid #000;
        padding: 10px;
    }

    h1 {
        text-align: center;
        margin: 0;
        font-size: 28px;
        letter-spacing: 1px;
    }

    h2 {
        text-align: center;
        margin: 5px 0 10px;
        font-size: 16px;
        border-top: 1px solid #000;
        padding-top: 5px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        font-size: 13px;
    }

    td, th {
        border: 1px solid #000;
        padding: 6px;
        vertical-align: top;
    }

    .no-border {
        border: none !important;
    }

    .right {
        text-align: right;
    }

    .bold {
        font-weight: bold;
    }

    .section {
        margin-top: 5px;
    }

    .signature {
        height: 90px;
        text-align: center;
    }

    .small {
        font-size: 12px;
    }


    /* Terms section */
    .terms {
        margin-top: 10px;
        border: 2px solid #000;
        padding: 10px;
    }

    .terms h3 {
        text-align: center;
        margin: 0 0 10px;
        font-size: 16px;
        text-decoration: underline;
    }

    .terms ol {
        padding-left: 18px;
        margin: 0;
    }

    .terms li {
        margin-bottom: 6px;
        font-size: 12px;
    }

    .declaration {
        margin-top: 10px;
    }

</style>
</head>

<body>

<div class="page">
<div class="invoice-box">

    <!-- Header -->
    <h1>SAHA ENTERPRISE</h1>
    <h2>INVOICE</h2>

    <!-- Top Section -->
    <table>
        <tr>
            <td width="60%">
                <b>SAHA ENTERPRISE</b><br>
                NCC park, west burikhali, near bauria station<br>
                Dist - Howrah (711310)<br>
                state : West Bengal<br>
                Contact : kundan Saha (7003662260)<br>
                Email : kundansahaenterprise@gmail.com<br>
                www.sahamaidservice.com
            </td>

            <td width="40%">
                <table>
                    <tr>
                        <td class="bold">Invoice no:-</td>
                        <td><?=$bill_id?></td>
                    </tr>
                    <tr>
                        <td class="bold">Date:-</td>
                        <td><?=date('d-F-Y')?></td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr>
            <td>
                Client Name - <?=$client_name?><br>
                Address - <?=$client_address?><br>
                Contact - <?=$client_phone?><br>
                State - <?=$client_state?>
            </td>
            <td></td>
        </tr>
    </table>

    <!-- Particulars -->
    <table class="section">
        <tr class="bold">
            <td width="70%">Particulars</td>
            <td width="30%" class="right">Amount</td>
        </tr>
        <?php
            if(sizeof($assign_maids) > 0){
                for($i = 0; $i < sizeof($assign_maids); $i++){
        ?>
        <tr>
            <td class="bold">Payments of Worker(s) -</td>
            <td class="right bold"><?=$assign_maids[$i]->rcvabl_amount?>/-</td>
        </tr>
        <?php } } ?>

        <!-- If there is holiday --
        <tr>
            <td class="bold">2 Holiday</td>
            <td class="right bold">1,200/-</td>
        </tr>
        If there is holiday -->

        <!-- If previous month due available <tr>
            <td class="bold">Previous Month Due (February)</td>
            <td class="right bold">800/-</td>
        </tr> -->

        <?php
            if(sizeof($assign_maids) > 0){ 
                for($i = 0; $i < sizeof($assign_maids); $i++){
        ?>
        <tr>
            <td>
                Name :- <?=$assign_maids[$i]->worker_name?><br>
                Skill :- <?=$assign_maids[$i]->skills_text?><br>
                Hours :- <?=$assign_maids[$i]->wh_name?><br>
                Salary per month :- <?=$assign_maids[$i]->rcvabl_amount?>/-<br>
                Working Month : <?=date('F Y', strtotime($inv_month))?>
            </td>
            <td></td>
        </tr>
        <?php } } ?>

        <tr>
            <td class="small bold">
                Amount chargeable (in word):- <?=numberToWords($bill_total)?>
            </td>
            <td class="right bold"><?=number_format($bill_total, 2)?>/-</td>
        </tr>
    </table>

    <!-- Bank & Signature -->
    <table class="section">
        <tr>
            <td width="65%">
                <b>Company's Bank Detail</b><br>
                A/C Holder Name : Kundan Kumar Saha<br>
                Bank Name : State Bank of India<br>
                A/C : 33378961528<br>
                IFSC code : SBIN0001295<br>
                Phone pay : 8906161591<br>
                Google pay : 8906161591 & UPI ID 8906161591@ybl
            </td>

            <td width="35%" class="signature">
                E & O E<br><br><br>
                Authorized Signatory
            </td>
        </tr>
    </table>

</div>

<!-- TERMS & CONDITIONS -->
<div class="terms">

    <h3>TERMS & CONDITIONS</h3>

    <!-- 1=Kolkata 2=Out of state 3=Part Time -->
        <?php if($terms_condi == '1'){ ?>
        <ol class="terms-list">
            <li>The client will check the bags, purse or any other things that the maid carrying, before the maid enter the home and the maid leaves the home.</li>

            <li>The client shall pay a one-time consultancy/service charge of ₹1000 to the agency at the time of placement. This fee is strictly non-refundable and non-adjustable under any circumstances.</li>

            <li>Four time food and accommodation provided by parties.</li>

            <li>A 30-minutes rest break must be given to the maid at noon.</li>

            <li>The client is responsible for providing the maid with basic hygienic products, including soap, shampoo, oil, etc. These items should supplied monthly or as required.</li>

            <li>As per our policy, maids are entitled to two days off paid leave per month. Any additional leave taken by the maid will result in a salary deduction. However, if the leaves is granted by the client, the payment for those days will be the client’s responsibility.</li>

            <li>It is hereby agreed that any staff introduced or deployed by the Company shall remain under the Company's placement rights. The Client shall not directly hire, re-employ, or engage any such staff, either during or after the service period, without prior written consent from the Company.</li>

            <li>Any violation of this clause shall be treated as a breach of contract, and the Company reserves the right to initiate appropriate legal proceedings under applicable laws, including claims for damages, compensation, and injunctive relief.</li>

            <li>In case either the maid or the client is not satisfied with the work, behavior, or feels unsafe or uncomfortable in any manner, both parties reserve the right to discontinue the service. The maid may leave the job, and the client may terminate the maid's services at their discretion. However, the client shall be liable to pay the maid for the number of days she has worked. All pending dues must be cleared at the time of termination, and delayed payments will not be acceptable.</li>

            <li>The client must be pay the fixed consultancy charge annually. The maid's salary may be increased by 12% to 18% each year, depending on the nature and continuity of the service. Any such changes will be communicated to the client in advance.</li>

            <li>If the maid asks for his/her salary in advance, it is entirely the client decision to give him/her an advance salary. In case the maid leaves and you have paid excess salary to him/her, SAHA MAID SERVICE & ENTERPRISE will not be responsible to retrieve/refund the same.</li>

            <li>If the maid leaves the job without informing and client also does not inform the centre, then the centre will not be responsible.</li>

            <li>By signing below, the client agrees to all terms and conditions.</li>
        </ol>
        <?php } ?>
        
        <?php if($terms_condi == '2'){ ?>
        <ol class="terms-list">
            <li>The client will check the bags, purse or any other things that the maid carrying, before the maid enter the home and the maid leaves the home. </li>

            <li>The one-time consultancy/service charge payable to the agency shall be equivalent to one month’s salary of the maid. This amount is strictly non-refundable and non-adjustable under any circumstances. </li>

            <li>Four time food and accommodation provided by parties</li>

            <li>A 90-minutes rest break must be given to the maid at noon. </li>

            <li>The client is responsible for providing the maid with basic hygienic products, including soap, shampoo, oil, etc. These items should  supplied monthly or as required. </li>

            <li>As per our policy, maids are entitled to two days off paid leave per month. Any additional leave taken by the maid will result in a  salary dedication. However, if the lives is granted by the client, the payment for those days will be the client's responsibility</li>

            <li>It is hereby agreed that any staff introduced or deployed by the Company shall remain under the Company’s placement rights. The Client   shall not directly hire, re-employ, or engage any such staff, either during or after the service period, without prior written consent from  the Company. </li>

            <li>Any violation of this clause shall be treated as a breach of contract, and the Company reserves the right to initiate appropriate legal proceedings under applicable laws, including claims for damages, compensation, and injunctive relief. </li>

            <li>In case either the maid or the client is not satisfied with the work, behavior, or feels unsafe or uncomfortable in any manner, both parties reserve the right to discontinue the service. The maid may leave the job, and the client may terminate the maid’s services at their discretion. However, the client shall be liable to pay the maid for the number of days she has worked. All pending dues must be cleared at the time of termination, and delayed payments will not be acceptable.  </li>

            <li>The client must be pay the fixed consultancy charge annually. The maid's salary may be increased by 12% to 18% each year,depanding on the nature and continuity of the service. Any such changes will be communicated to the client in advance. </li>

            <li>If the maid asks for his/her salary in advance, it is entirely the client decision to give him/her an advance salary. In case the maid leaves and you have paid excess salary to him/her, SAHA MAID SERVICE & ENTERPRISE will not be responsible to retrieve/refund the same. </li>

            <li>If the maid leaves the job without informing and client also does not inform the centre, then the centre will not be responsible. </li>

            <li>By signing below, the client agrees to all terms and conditions. </li>
        </ol>
        <?php } ?>
        
        <?php if($terms_condi == '3'){ ?>
        <ol class="terms-list">
            <li>The client will check the bags, purse or any other things that the maid carrying, before the maid enter the home and the maid leaves the home. </li>

            <li>The one-time consultancy/service charge payable to the agency shall be equivalent to one month’s salary of the maid. This amount is strictly non-refundable and non-adjustable under any circumstances</li>

            <li>Four time food and accommodation provided by parties.</li>

            <li>A 90-minutes rest break must be given to the maid at noon. </li>

            <li>The client is responsible for providing the maid with basic hygienic products, including soap, shampoo, oil, etc. These items should supplied monthly or as required. </li>

            <li>As per our policy, maids are entitled to two days off paid leave per month. Any additional leave taken by the maid will result in a salary dedication. However, if the lives is granted by the client, the payment for those days will be the client's responsibility </li>

            <li>It is hereby agreed that any staff introduced or deployed by the Company shall remain under the Company’s placement rights. The Client shall not directly hire, re-employ, or engage any such staff, either during or after the service period, without prior written consent from the Company. </li>

            <li>Any violation of this clause shall be treated as a breach of contract, and the Company reserves the right to initiate appropriate legal proceedings under applicable laws, including claims for damages, compensation, and injunctive relief. </li>

            <li>In case either the maid or the client is not satisfied with the work, behavior, or feels unsafe or uncomfortable in any manner, both parties reserve the right to discontinue the service. The maid may leave the job, and the client may terminate the maid’s services at their discretion. However, the client shall be liable to pay the maid for the number of days she has worked. All pending dues must be cleared at the time of termination, and delayed payments will not be acceptable. </li>

            <li>The client must be pay the fixed consultancy charge annually. The maid's salary may be increased by 12% to 18% each year,depanding on the nature and continuity of the service. Any such changes will be communicated to the client in advance. </li>

            <li>If the maid asks for his/her salary in advance, it is entirely the client decision to give him/her an advance salary. In case the maid leaves and you have paid excess salary to him/her, SAHA MAID SERVICE & ENTERPRISE will not be responsible to retrieve/refund the same. </li>

            <li>If the maid leaves the job without informing and client also does not inform the centre, then the centre will not be responsible. </li>

            <li>By signing below, the client agrees to all terms and conditions. </li>
        </ol>
        <?php } ?>

    <!-- DECLARATION -->
    <div class="declaration">
        <h3>DECLARATION</h3>

        I have read and understood all the above terms and conditions and agree to them.<br><br>

        Client Name: ___________________________<br>
        Mobile No.: ___________________________<br>
        Address: ___________________________<br><br>

        Client Signature: ___________________________  
        <span style="float:right;">DATE: ____________</span><br><br>

        <div style="text-align:right;">
            Authorized Signatory
        </div>
    </div>

</div>

</div>

</body>
</html>