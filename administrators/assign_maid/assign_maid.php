<?php

if(!$_SESSION["user_id"]){
    header("location:?p=signin");
}
include('common/head.php'); 
$sess_user_type = $_SESSION["user_type"];
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
                            <li class="breadcrumb-item"><a href="#!"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!"><?=$title?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ sample-table ] start -->
            <div class="col-sm-12">
                <div class="card">

                    <div class="card-header">
                        <h5> <?=$title?> </h5>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-success alert-dismissible fade show" role="alert" style="display: none;" id="orgFormAlert">
							<strong>Success!</strong> Your Data Deleted successfully.
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>
                        <div class="alert alert-success alert-dismissible fade show" role="alert" style="display: none;" id="orgFormAlert1">
							<strong>Success!</strong> Maid Assigned successfully.
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>
                        <button type="button" class="btn btn-primary mb-2 float-right" id="onMyModal">New Assign</button>
                        
                        <div class="table-responsive">
                            <table id="example" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Sl.No.</th>
                                        <th>Inv. ID</th>
                                        <th>Client</th>
                                        <th>Receivable Amount</th>
                                        <th>Worker</th>
                                        <th>Worker Salary</th>
                                        <th>From Date</th>
                                        <th>To Date</th>
                                        <th>From Time - To Time</th>
                                        <th>Bill Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Sl.No.</th>
                                        <th>Inv. ID</th>
                                        <th>Client</th>
                                        <th>Receivable Amount</th>
                                        <th>Worker</th>
                                        <th>Worker Salary</th>
                                        <th>From Date</th>
                                        <th>To Date</th>
                                        <th>From Time - To Time</th>
                                        <th>Bill Status</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>                       

                    </div>
                </div>
            </div>

            <!-- Modal 1 start -->
            <div id="exampleModalLong" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle"><?=$title?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="$('#exampleModalLong').modal('hide')"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate id="myForm" name="myForm">
                                <div class="form-row"> 
                                    <div class="col-md-3 mb-2">
                                        <label for="client_id" class="text-danger">Client*</label>
                                        <select class="form-control" id="client_id" name="client_id">
                                            <option value="0">Select</option> 
                                        </select>
                                    </div> 
                                    <div class="col-md-3 mb-2">
                                        <label for="rcvabl_amount" class="text-danger">Receivable Amount*</label>
                                        <input type="text" class="form-control" name="rcvabl_amount" id="rcvabl_amount"> 
                                    </div> 
                                    
                                    <div class="col-md-3 mb-2">
                                        <label for="worker_id" class="text-danger">Worker*</label>
                                        <select class="form-control" id="worker_id" name="worker_id">
                                            <option value="0">Select</option> 
                                        </select>
                                    </div>                                    
                                    <div class="col-md-3 mb-2">
                                        <label for="exp_salary" class="text-danger">Worker Salary*</label>
                                        <input type="text" class="form-control" name="exp_salary" id="exp_salary" readonly> 
                                    </div>
                                </div>
                                <div class="form-row">                                                                  
                                    <div class="col-md-3 mb-2">
                                        <label for="from_date" class="text-danger">From Date*</label>
                                        <input type="date" class="form-control" name="from_date" id="from_date"> 
                                    </div>                                   
                                    <div class="col-md-3 mb-2">
                                        <label for="to_date" class="text-danger">To Date*</label>
                                        <input type="date" class="form-control" name="to_date" id="to_date"> 
                                    </div>                                   
                                    <div class="col-md-3 mb-2">
                                        <label for="from_time" class="text-danger">From Time*</label>
                                        <input type="time" class="form-control" name="from_time" id="from_time"> 
                                    </div>                                   
                                    <div class="col-md-3 mb-2">
                                        <label for="to_time" class="text-danger">To Time*</label>
                                        <input type="time" class="form-control" name="to_time" id="to_time"> 
                                    </div> 
                                    <div class="col-md-3 mb-2">
                                        <label for="bill_status" class="text-danger">Bill Status*</label>
                                        <select class="form-control" id="bill_status" name="bill_status">
                                            <option value="0">Select</option> 
                                        </select>
                                    </div>  
                                    <div class="col-md-3 mb-2">
                                        <label for="hsn_code">HSN Code</label>
                                        <input type="text" class="form-control" name="hsn_code" id="hsn_code"> 
                                    </div>  
                                </div>
                                 
                                <!-- <div class="form-row">  
                                    <div class="col-md-3 mb-2 d-none" id="div_paid_amount">
                                        <label for="paid_amount" class="text-danger">Amount*</label>
                                        <input type="text" class="form-control" name="paid_amount" id="paid_amount"> 
                                    </div>  
                                    <div class="col-md-2 mb-2 d-none" id="div_payment_mode">       
                                        <label for="payment_mode">Payment Mode</label>                                 
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="payment_mode">
                                            <label class="custom-control-label" for="payment_mode">Cash/UPI</label>
                                        </div>
                                    </div> 
                                    <div class="col-md-3 mb-2 d-none" id="div_transaction_id">
                                        <label for="transaction_id">Transaction ID</label>
                                        <input type="text" class="form-control" name="transaction_id" id="transaction_id"> 
                                    </div>
                                    <div class="col-md-3 mt-4 d-none" id="div_rcv_btn">
                                        <label for="rcv_btn">&nbsp;</label>
                                        <button type="button" class="btn btn-primary btn-sm">Received</button> 
                                    </div>
                                </div>
                                <div class="form-row d-none" id="div_p_history">
                                    <h5>Payment Receive History</h5>
                                    <div class="col-md-12"> Amount: Rs. 1500/- Received by Cash on 02-Apr-2026 </div>
                                    <div class="col-md-12"> Amount: Rs. 500/- Received by UPI on 03-Apr-2026 </div>
                                </div> -->
                                
                            </form>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="assign_id" id="assign_id" value="0">
                            
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="$('#exampleModalLong').modal('hide')">Close</button>
                            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                            <button class="btn  btn-primary d-block" type="button" id="submitForm">
                                <span class="spinner-border spinner-border-sm" role="status" style="display: none;" id="submitForm_spinner"></span>
                                <span class="load-text" style="display: none;" id="submitForm_spinner_text">Loading...</span>
                                <span class="btn-text" id="submitForm_text">Save</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal 1 end -->

            <!-- Modal Attendance start -->
            <div id="attenModalLong" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="attenModalLongTitle" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="attenModalLongTitle"><?=$title?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="$('#attenModalLong').modal('hide')"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-row" id="attendance_ui">
                                <!-- <div class="col-md-3 mb-2">
                                    <input class="form-control form-control-sm" type="date" id="atten_date_1" name="atten_date_1">
                                </div>
                                <div class="col-md-3 mb-2"> 
                                    <select class="form-control form-control-sm" id="pre_abs_lev_1" name="pre_abs_lev_1">
                                        <option value="">Present/Absent/Leave</option> 
                                    </select>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <input class="form-control form-control-sm" placeholder="Note" type="text" id="atten_note_1" name="atten_note_1">
                                </div> -->
                            </div>
                        </div>
                        <div class="modal-footer">
                            <!-- <input type="hidden" name="assign_id" id="assign_id" value="0"> -->
                            
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="$('#attenModalLong').modal('hide')">Close</button>
                            <!-- <button type="button" class="btn btn-primary">Save changes</button>
                            <button class="btn  btn-primary d-block" type="button" id="submitForm">
                                <span class="spinner-border spinner-border-sm" role="status" style="display: none;" id="submitForm_spinner"></span>
                                <span class="load-text" style="display: none;" id="submitForm_spinner_text">Loading...</span>
                                <span class="btn-text" id="submitForm_text">Save</span>
                            </button> -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Attendance end -->

            <!-- [ sample-page ] end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- [ Main Content ] end -->
	<?php include('common/footer.php'); ?>
    
    <script src="assign_maid/function.js?d=<?=date('YmdHis')?>"></script>