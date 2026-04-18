<?php 
	include('../assets/php/sql_conn.php');	
    include('print_bill_ctrl.php');	
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Tax Invoice</title>

<style>
    @page {
        size: A4;
        margin: 10mm;
    }

    body {
        font-family: Arial, sans-serif;
        font-size: 12px;
        margin: 0;
    }

    .invoice-box {
        width: 100%;
        border: 2px solid #000;
        padding: 10px;
        box-sizing: border-box;
    }

    .center {
        text-align: center;
        font-weight: bold;
        font-size: 18px;
        border-bottom: 2px solid #000;
        padding-bottom: 5px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    td, th {
        border: 1px solid #000;
        padding: 5px;
        vertical-align: top;
    }

    .no-border {
        border: none !important;
    }

    .small {
        font-size: 11px;
    }

    .right {
        text-align: right;
    }

    .bold {
        font-weight: bold;
    }

    .section-title {
        font-weight: bold;
        margin-bottom: 5px;
    }

    .signature {
        height: 80px;
    }

    .footer {
        text-align: center;
        margin-top: 10px;
        font-size: 11px;
    }
    




    .terms-box {
        margin-top: 10px;
        border-top: 2px solid #000;
        padding-top: 8px;
        font-size: 11px;
    }

    .terms-title {
        text-align: center;
        font-weight: bold;
        margin-bottom: 8px;
    }

    .terms-list {
        padding-left: 15px;
    }

    .terms-list li {
        margin-bottom: 6px;
        text-align: justify;
    }

    .declaration {
        margin-top: 10px;
    }

    .declaration-title {
        text-align: center;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .declaration p {
        margin: 5px 0;
    }

    .declaration-table {
        width: 100%;
        margin-top: 10px;
    }

    .declaration-table td {
        border: none;
        padding: 5px 0;
    }

    .signature-area {
        margin-top: 20px;
        width: 100%;
    }

    .signature-area td {
        border: none;
    }

    .right-sign {
        text-align: right;
    }
</style>
</head>

<body>

<div class="invoice-box">

    <div class="center">Tax Invoice</div>

    <!-- Header Section -->
    <table>
        <tr>
            <td width="50%">
                <b>SAHA ENTERPRISE</b><br>
                Santoshpur, Bauria, Howrah West Bengal, 711310<br>
                GSTIN/UIN: 19AEYFS5433H1ZA<br>
                State Name : West Bengal, Code : 19
            </td>

            <td width="50%">
                <table>
                    <tr>
                        <td>Invoice No.</td>
                        <td><?=$bill_id?></td>
                        <td>Dated</td>
                        <td><?=date('d-F-Y')?></td>
                    </tr>
                    <tr>
                        <td>Delivery Note</td>
                        <td></td>
                        <td>Mode/Terms of Payment</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Reference No. & Date</td>
                        <td></td>
                        <td>Other References</td>
                        <td></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <!-- Buyer -->
    <table>
        <tr>
            <td width="50%">
                Buyer (Bill to)<br>
                <b><?=$client_name?></b><br>
                <?=$client_address?><br> 
                GSTIN/UIN: 
            </td>

            <td width="50%">
                <table>
                    <tr>
                        <td>Buyer's Order No.</td>
                        <td></td>
                        <td>Dated</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Dispatch Doc No.</td>
                        <td></td>
                        <td>Delivery Note Date</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Dispatched through</td>
                        <td></td>
                        <td>Destination</td>
                        <td></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <!-- Product Table -->
    <table>
        <tr class="bold">
            <td width="5%">Sl No.</td>
            <td>Description of Goods</td>
            <td width="10%">HSN/SAC</td>
            <td width="10%">Amount</td>
        </tr>

        <?php
            if(sizeof($assign_maids) > 0){
                $sl = 1;
                for($i = 0; $i < sizeof($assign_maids); $i++){
        ?>
        <tr>
            <td><?=$sl?></td>
            <td><?=$assign_maids[$i]->worker_name?> @ working days_<?=$assign_maids[$i]->present_days?> days</td>
            <td><?=$assign_maids[$i]->hsn_code?></td>
            <td class="right"><?=$assign_maids[$i]->rcvabl_amount?></td>
        </tr>
        <?php 
        $sl++;
            } 
                
        }else{
        ?>
            <tr>
                <td colspan="4">No work details available</td> 
            </tr>
        <?php } ?>

        <tr>
            <td colspan="3" class="right">CGST</td>
            <td class="right"><?=$tax_cgst?></td>
        </tr>

        <tr>
            <td colspan="3" class="right">SGST</td>
            <td class="right"><?=$tax_sgst?></td>
        </tr>

        <tr class="bold">
            <td colspan="3" class="right">Total</td>
            <td class="right"><?=$bill_total?></td>
        </tr>
    </table>

    <!-- Tax Summary -->
    <table>
        <tr class="bold">
            <td>HSN/SAC</td>
            <td>Taxable Value</td>
            <td>CGST</td>
            <td>SGST</td>
            <td>Total Tax</td>
        </tr>
        <?php
            if(sizeof($assign_maids) > 0){ 
                for($i = 0; $i < sizeof($assign_maids); $i++){
                    $cgst_val = 0;
                    $sgst_val = 0;
                    $tax_total = 0;
                    $rcvabl_amount = $assign_maids[$i]->rcvabl_amount;
                    $cgst_val = ($rcvabl_amount * $gst_percentage) / 100;
                    $sgst_val = ($rcvabl_amount * $gst_percentage) / 100;
                    $tax_total = ($cgst_val + $sgst_val);
        ?>
        <tr>
            <td><?=$assign_maids[$i]->hsn_code?></td>
            <td class="right"><?=$rcvabl_amount?></td>
            <td class="right"><?=number_format($cgst_val, 2)?></td>
            <td class="right"><?=number_format($sgst_val, 2)?></td>
            <td class="right"><?=number_format($tax_total, 2)?></td>
        </tr>
        <?php } } ?>
    </table>

    <!-- Bank Details -->
    <table>
        <tr>
            <td width="50%">
                Company's PAN: AEYFS5433H Declaration<br><br>
                We declare that this invoice shows the actual price of the goods described and that all particulars are true and correct.
            </td>

            <td width="50%">
                <b>Company's Bank Details</b><br>
                Bank Name: State Bank of India<br>
                A/c No.: 41873277474<br>
                Branch & IFSC: Bauria & SBIN0001295
            </td>
        </tr>

        <tr>
            <td></td>
            <td class="signature">
                for SAHA ENTERPRISE<br><br>
                Authorised Signatory
            </td>
        </tr>
    </table>

    
    <div class="terms-box">

        <div class="terms-title">TERMS & CONDITIONS</div>

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

        <!-- Declaration -->
        <div class="declaration">
            <div class="declaration-title">DECLARATION</div>

            <p>I have read and understood all the above term and conditions and agree to them.</p>

            <table class="declaration-table">
                <tr>
                    <td>Client Name: ____________________</td>
                    <td>Mobile No.: ____________________</td>
                </tr>
                <tr>
                    <td>Address: ________________________________</td>
                    <td></td>
                </tr>
            </table>

            <!-- Signature -->
            <table class="signature-area">
                <tr>
                    <td>Client Signature: ________________________</td>
                    <td class="right-sign">
                        DATE: ___________<br><br>
                        Authorised Signatory
                    </td>
                </tr>
            </table>

        </div>

    </div>




    <div class="footer">
        This is a Computer Generated Invoice
    </div>

</div>

</body>
</html>