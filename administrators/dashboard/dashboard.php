<?php 
if(!$_SESSION["user_id"]){
    header("location:?p=signin");
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
$client_dues = array();
$sql = "SELECT 
    user_details.full_name,
    COALESCE(SUM(bill_details.bill_total), 0) AS total_bill,
    COALESCE(SUM(bill_payment_details.paid_amount), 0) AS total_paid,
    (COALESCE(SUM(bill_details.bill_total), 0) - COALESCE(SUM(bill_payment_details.paid_amount), 0)) AS due_amount
FROM user_details 
LEFT JOIN bill_details ON user_details.user_id = bill_details.client_id 
LEFT JOIN bill_payment_details ON user_details.user_id = bill_payment_details.client_id 
WHERE user_details.user_type = 4 
GROUP BY user_details.user_id, user_details.full_name 
HAVING due_amount > 0 
ORDER BY due_amount DESC";
$result = $con->query($sql);
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $client_dues[] = $row;
    }
}

// Calculate totals
$total_bill_sum = 0;
$total_paid_sum = 0;
$total_due_sum = 0;
foreach ($client_dues as $client) {
    $total_bill_sum += $client['total_bill'];
    $total_paid_sum += $client['total_paid'];
    $total_due_sum += $client['due_amount'];
}

include('common/head.php'); ?>

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
                                    <?php if (count($client_dues) > 0): ?>
                                        <?php foreach ($client_dues as $client): ?>
                                            <tr>
                                                <td><?= htmlspecialchars($client['full_name']) ?></td>
                                                <td>₹<?= number_format($client['total_bill'], 2) ?></td>
                                                <td>₹<?= number_format($client['total_paid'], 2) ?></td>
                                                <td>₹<?= number_format($client['due_amount'], 2) ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                        <tr class="table-info">
                                            <td><strong>Subtotal</strong></td>
                                            <td><strong>₹<?= number_format($total_bill_sum, 2) ?></strong></td>
                                            <td><strong>₹<?= number_format($total_paid_sum, 2) ?></strong></td>
                                            <td><strong>₹<?= number_format($total_due_sum, 2) ?></strong></td>
                                        </tr>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="4" class="text-center">No clients with due amounts found.</td>
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