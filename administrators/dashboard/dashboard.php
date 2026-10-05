<?php 
include('common/head.php');

if (empty($_SESSION["user_id"])) {
    header("Location: ?p=signin");
    //exit;
}
//include('../assets/php/sql_conn.php');

$current_date = date('Y-m-d');

$current_working_workers = 0;
$free_active_workers = 0;
$current_engaged_clients = 0;

$sql = "SELECT COUNT(DISTINCT worker_id) AS total_working FROM assign_maid WHERE worker_id > 0 AND from_date <= '$current_date' AND to_date >= '$current_date'";
$result = $con->query($sql);
if ($result && $row = $result->fetch_assoc()) {
    $current_working_workers = (int) $row['total_working'];
}

$sql = "SELECT COUNT(DISTINCT client_id) AS total_clients FROM assign_maid WHERE client_id > 0 AND from_date <= '$current_date' AND to_date >= '$current_date'";
$result = $con->query($sql);
if ($result && $row = $result->fetch_assoc()) {
    $current_engaged_clients = (int) $row['total_clients'];
}

$sql = "SELECT COUNT(*) AS total_free FROM user_details WHERE user_type = 5";
$sql .= " AND user_id NOT IN (SELECT DISTINCT worker_id FROM assign_maid WHERE worker_id > 0 AND from_date <= '$current_date' AND to_date >= '$current_date')";
$result = $con->query($sql);
if ($result && $row = $result->fetch_assoc()) {
    $free_active_workers = (int) $row['total_free'];
}

// Query for clients with due amounts
$clients = array();
$client_dues = array();
$sql = "SELECT 
    user_id, full_name, phone_number 
FROM user_details
WHERE user_type = 4";

$result = $con->query($sql);
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $user_id = $row['user_id'];
        $full_name = $row['full_name'];
        $phone_number = $row['phone_number'];

        $client = new stdClass();
        $client->user_id = $user_id;
        $client->full_name = $full_name;
        $client->phone_number = $phone_number;
        $sub_tot_receivable = 0;
        $sub_tot_received = 0;
        $client->sub_tot_receivable = $sub_tot_receivable;
        $client->sub_tot_received = $sub_tot_received;

        $clients[] = $client;

    } //end while
} //end if


if(sizeof($clients) > 0){
    for($i = 0; $i < sizeof($clients); $i++){
        $user_id = $clients[$i]->user_id;
        $full_name = $clients[$i]->full_name;
        $sub_tot_receivable = 0;
        $sub_tot_received = 0; 

        //echo "Processing client: $full_name (ID: $user_id)\n"; // Debugging line
        
        $sql = "SELECT * FROM bill_details WHERE client_id = '" .$user_id. "'";
        $result = $con->query($sql);

        $bill_id = 0;
        if ($result->num_rows > 0) {
            $row = $result->fetch_array(); 
            $bill_id = $row['bill_id'];
            $normal_gst = $row['normal_gst'];
            $gst_percentage = $row['gst_percentage'];
            $terms_condi = $row['terms_condi'];
            $bank_id = $row['bank_id'];
            $bill_total = $row['bill_total']; 
            $sub_tot_receivable = $sub_tot_receivable + $bill_total;
        }

        // if($sub_tot_receivable > 0){
        //     echo 'sub_tot_receivable: ' . $sub_tot_receivable;
        //     exit();
        // }

        # Get Payments  
        if($bill_id > 0){
            $sql4 = "SELECT * FROM bill_payment_details WHERE bill_id = '" .$bill_id. "' ";
            $result4 = $con->query($sql4);

            if ($result4->num_rows > 0) {
                while($row4 = $result4->fetch_array()){
                    $payment = new stdClass();
                    $payment->paid_amount = $row4['paid_amount'];
                    $payment->payment_mode = $row4['payment_mode'];
                    $payment->transaction_id = $row4['transaction_id'];
                    $payment->pay_date = date('d-F-Y h:i A', strtotime($row4['pay_date'])); 
                    
                    # Total amount paid for this Bill 
                    $sub_tot_received = $sub_tot_received + $row4['paid_amount'];
                    //array_push($payments, $payment);
                }//end while
            }//end if

            # Total paid till date
            /*$sql5 = "SELECT SUM(paid_amount) AS total_paid_till_date FROM bill_payment_details WHERE client_id = '" .$user_id. "' ";
            $result5 = $con->query($sql5);

            if ($result5->num_rows > 0) {
                $row5 = $result5->fetch_array();
                $total_paid_till_date = $row5['total_paid_till_date'];
            }*/
        }//end if

        
        $clients[$i]->sub_tot_received = $sub_tot_received;
        $clients[$i]->sub_tot_receivable = $sub_tot_receivable;

    }//end for
}//end for

//echo json_encode($clients);

// Query for upcoming maid assignments
$upcoming_assignments = array();
$sql = "SELECT 
    assign_maid.assign_id,
    c.full_name AS client_name,
    w.full_name AS maid_name,
    assign_maid.from_date,
    assign_maid.from_time,
    assign_maid.to_date,
    assign_maid.to_time
FROM assign_maid
LEFT JOIN user_details c ON assign_maid.client_id = c.user_id
LEFT JOIN user_details w ON assign_maid.worker_id = w.user_id
WHERE assign_maid.from_date >= '$current_date'
ORDER BY assign_maid.from_date ASC, assign_maid.from_time ASC";
$result = $con->query($sql);
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $row['invoice_id'] = 'INV_'.str_pad($row['assign_id'], 4, '0', STR_PAD_LEFT);
        $upcoming_assignments[] = $row;
    }
}





// Graph data

# Get month wise bill sent data for the current year
$month_wise_bill_total = array_fill(1, 12, 0);
$bill_sent_array = ["0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0"];
$bill_collection_array = ["0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0", "0"];


for($i = 0; $i < 12; $i++){
    $bill_sent_array[$i] = "0";

    $month = $i + 1; // Month number (1-12)
    $month = ($month < 10) ? '0' . $month : (string) $month;

    $inv_month_year = date('Y') . '-' . $month; // Format: YYYY-MM
   
   $sql = "SELECT SUM(bill_total) AS total_bill FROM `bill_details` WHERE `inv_month` = '" . $inv_month_year . "'";
    $result = $con->query($sql);
    $row = $result->fetch_array();
    $total_bill = $row['total_bill'] ?? 0; // Use null coalescing operator to handle null values
    $bill_sent_array[$i] = (int) $total_bill;

    $first_day_of_month = date('Y-m-01', strtotime($inv_month_year . '-01')); // Get the first day of the month
    $first_day_of_month1 = $first_day_of_month . ' 00:00:00'; // Append time to the first day of the month
    $last_day_of_month = date('Y-m-t', strtotime($inv_month_year . '-01')); // Get the last day of the month
    $last_day_of_month1 = $last_day_of_month . ' 23:59:59'; // Append time to the last day of the month

    $sql2 = "SELECT SUM(paid_amount) AS total_paid FROM `bill_payment_details` WHERE `pay_date` BETWEEN '" . $first_day_of_month1 . "' AND '" . $last_day_of_month1 . "'";
    $result2 = $con->query($sql2);
    $row2 = $result2->fetch_array();
    $total_paid = $row2['total_paid'] ?? 0; // Use null coalescing operator to handle null values
    $bill_collection_array[$i] = (int) $total_paid;

}

//echo json_encode($bill_sent_array);


 ?>

<body class="">
	<!-- [ Pre-loader ] start -->
	<div class="loader-bg">
		<div class="loader-track">
			<div class="loader-fill"></div>
		</div>
	</div>
	<!-- [ Pre-loader ] End -->
	<!-- [ navigation menu ] start -->	
	<?php include('common/nav.php'); ?>
	<!-- [ navigation menu ] end -->

	<!-- [ Header ] start -->
	<?php include('common/top_bar.php'); ?>
	<!-- [ Header ] end -->
	
<!-- Highcharts -->
<script src="https://code.highcharts.com/highcharts.js"></script>

<!-- Highcharts Exporting / Menu -->
<script src="https://code.highcharts.com/modules/exporting.js"></script>	

<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10"><?=$title?></h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!"><?=$title?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-md-4">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-body">
                        <h6 class="card-title">Total Current Working Workers</h6>
                        <h3 class="card-text"><?= $current_working_workers ?></h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body">
                        <h6 class="card-title">Total Free Active Workers</h6>
                        <h3 class="card-text"><?= $free_active_workers ?></h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-body">
                        <h6 class="card-title">Total Currently Engaged Clients</h6>
                        <h3 class="card-text"><?= $current_engaged_clients ?></h3>
                    </div>
                </div>
            </div>
        </div>




        <div class="row"> 
            <div class="col-sm-12">
                <div class="card">

                    <div class="card-header">
                        <h5>Bill Sent & Collection</h5>
                         
                    </div>
                    <div class="card-body">
                        <div class="chart-container">
                            <div id="productionChart"></div>
                        </div>
                    </div>
                </div>
            </div> 
        </div> 



        
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Client List with Due Amounts</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Client Name</th>
                                        <th>Total Bill Amount</th>
                                        <th>Total Paid Amount</th>
                                        <th>Total Due Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (sizeof($clients) > 0){
                                        $total_bill_sum = 0;
                                        $total_paid_sum = 0;
                                        $total_due_sum = 0;
                                        
                                        for($j = 0; $j < sizeof($clients); $j++){ 
                                            if($clients[$j]->sub_tot_receivable > $clients[$j]->sub_tot_received){
                                            $due_amount = $clients[$j]->sub_tot_receivable - $clients[$j]->sub_tot_received;
                                            $total_due_sum += $due_amount;
                                            
                                            $total_bill_sum += $clients[$j]->sub_tot_receivable;
                                            $total_paid_sum += $clients[$j]->sub_tot_received;
                                        ?>
                                            <tr>
                                                <td><?= htmlspecialchars($clients[$j]->full_name). ' ('. htmlspecialchars($clients[$j]->phone_number).')' ?></td>
                                                <td>₹<?= number_format($clients[$j]->sub_tot_receivable, 2) ?></td>
                                                <td>₹<?= number_format($clients[$j]->sub_tot_received, 2) ?></td>
                                                <td>₹<?= number_format($due_amount, 2) ?></td>
                                            </tr>
                                        <?php 
                                        }
                                        }
                                        ?>
                                        <tr class="table-info">
                                            <td><strong>Subtotal</strong></td>
                                            <td><strong>₹<?= number_format($total_bill_sum, 2) ?></strong></td>
                                            <td><strong>₹<?= number_format($total_paid_sum, 2) ?></strong></td>
                                            <td><strong>₹<?= number_format($total_due_sum, 2) ?></strong></td>
                                        </tr>
                                    <?php }else{ ?>
                                        <tr>
                                            <td colspan="4" class="text-center">No clients with due amounts found.</td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Upcoming Maid Assignments</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Invoice ID</th>
                                        <th>Client Name</th>
                                        <th>Maid Name</th>
                                        <th>Start Date</th>
                                        <th>Start Time</th>
                                        <th>End Date</th>
                                        <th>End Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (count($upcoming_assignments) > 0): ?>
                                        <?php foreach ($upcoming_assignments as $assignment): ?>
                                            <tr>
                                                <td><?= htmlspecialchars($assignment['invoice_id']) ?></td>
                                                <td><?= htmlspecialchars($assignment['client_name']) ?></td>
                                                <td><?= htmlspecialchars($assignment['maid_name']) ?></td>
                                                <td><?= date('d-F-Y', strtotime($assignment['from_date'])) ?></td>
                                                <td><?= htmlspecialchars($assignment['from_time']) ?></td>
                                                <td><?= date('d-F-Y', strtotime($assignment['to_date'])) ?></td>
                                                <td><?= htmlspecialchars($assignment['to_time']) ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="6" class="text-center">No upcoming maid assignments found.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- <div class="row"> 
            <div class="col-sm-12">
                <div class="card">

                    <div class="card-header">
                        <h5>Hello card</h5>
                        <div class="card-header-right">
                            <div class="btn-group card-option">
                                <button type="button" class="btn dropdown-toggle btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="feather icon-more-horizontal"></i>
                                </button>
                                <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                                    <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> maximize</span><span style="display:none"><i class="feather icon-minimize"></i> Restore</span></a></li>
                                    <li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i> collapse</span><span style="display:none"><i class="feather icon-plus"></i> expand</span></a></li>
                                    <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i> reload</a></li>
                                    <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i> remove</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                            aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
                            officia deserunt mollit anim id est laborum."
                        </p>


                    </div>
                </div>
            </div> 
        </div>  -->

    </div>
</div>
<!-- [ Main Content ] end -->
	<?php include('common/footer.php'); ?>