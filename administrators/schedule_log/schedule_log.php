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
							<strong>Success!</strong> Log Saved Successfully.
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>
                        <button type="button" class="btn btn-primary mb-2 float-right" id="onMyModal">New Log</button>
                        
                        <div class="table-responsive">
                            <table id="example" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Sl.No.</th>
                                        <th>Client Name</th>
                                        <th>Client Phone</th>
                                        <th>Area / Location</th>
                                        <th>Building Name</th>
                                        <th>Service Name</th>
                                        <th>Booking Date</th>
                                        <th>From Time - To Time</th>
                                        <th>Worker Name</th>
                                        <th>Worker Phone</th>
                                        <th>Bill Amount</th>
                                        <th>Paid Amount</th>
                                        <th>Due Amount</th>
                                        <th>Service Status</th> 
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Sl.No.</th>
                                        <th>Client Name</th>
                                        <th>Client Phone</th>
                                        <th>Area / Location</th>
                                        <th>Building Name</th>
                                        <th>Service Name</th>
                                        <th>Booking Date</th>
                                        <th>From Time - To Time</th>
                                        <th>Worker Name</th>
                                        <th>Worker Phone</th>
                                        <th>Bill Amount</th>
                                        <th>Paid Amount</th>
                                        <th>Due Amount</th>
                                        <th>Service Status</th> 
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
                                    <div class="col-md-4 mb-2">
                                        <label for="client_mobile" class="text-danger">Client Phone*</label>
                                        <input type="text" class="form-control" name="client_mobile" id="client_mobile"> 
                                    </div> 
                                    <div class="col-md-4 mb-2">
                                        <label for="client_name" class="text-danger">Client Name*</label>
                                        <input type="hidden" class="form-control" name="client_id" id="client_id">
                                        <input type="text" class="form-control" name="client_name" id="client_name"> 
                                    </div>  
                                    <div class="col-md-4 mb-2">
                                        <label for="order_placed_date" class="text-danger">Order Placed on*</label> 
                                        <input type="date" class="form-control" name="order_placed_date" id="order_placed_date" value="<?=date('Y-m-d')?>"> 
                                    </div> 
                                </div> 

                                <div class="form-row"> 
                                    <div class="col-md-4 mb-2">
                                        <label for="area_location_id" class="text-danger">Area / Location*</label>
                                        <select class="form-control" id="area_location_id" name="area_location_id">
                                            <option value="0">Select</option> 
                                        </select>
                                    </div> 
                                    
                                    <div class="col-md-4 mb-2">
                                        <label for="building_id" class="text-danger">Building Name*</label>
                                        <select class="form-control" id="building_id" name="building_id">
                                            <option value="0">Select</option> 
                                        </select>
                                    </div> 
                                    
                                    <div class="col-md-4 mb-2">
                                        <label for="service_id" class="text-danger">Service Name*</label>
                                        <select class="form-control" id="service_id" name="service_id">
                                            <option value="0">Select</option> 
                                        </select> 
                                    </div>  
                                    
                                </div>
                                <div  class="form-row">        
                                    <div class="col-md-3 mb-2">
                                        <label for="booking_date_f" class="text-danger">From Date*</label>
                                        <input type="date" class="form-control" name="booking_date_f" id="booking_date_f"> 
                                    </div>                                   
                                    <div class="col-md-3 mb-2">
                                        <label for="from_time" class="text-danger">From Time*</label>
                                        <input type="time" class="form-control" name="from_time" id="from_time"> 
                                    </div>              
                                    <div class="col-md-3 mb-2">
                                        <label for="booking_date_t" class="text-danger">To Date*</label>
                                        <input type="date" class="form-control" name="booking_date_t" id="booking_date_t"> 
                                    </div>                                
                                    <div class="col-md-3 mb-2">
                                        <label for="to_time" class="text-danger">To Time*</label>
                                        <input type="time" class="form-control" name="to_time" id="to_time"> 
                                    </div>                                 
                                    <div class="col-md-3 mb-2">
                                        <label for="total_hours">Total Time(Hours)</label>
                                        <input type="text" class="form-control" name="total_hours" id="total_hours" readonly> 
                                    </div>                                
                                    <div class="col-md-3 mb-2">
                                        <label for="rate_first">First Time Rate</label>
                                        <input type="text" class="form-control" name="rate_first" id="rate_first" readonly> 
                                    </div>                                
                                    <div class="col-md-3 mb-2">
                                        <label for="rate_normal">Normal Rate</label>
                                        <input type="text" class="form-control" name="rate_normal" id="rate_normal" readonly> 
                                    </div>                               
                                    <div class="col-md-3 mb-2">
                                        <label for="rate_normal">Effective Rate</label>
                                        <input type="text" class="form-control" name="service_rate_per_hour" id="service_rate_per_hour" readonly> 
                                    </div> 
                                </div>

                                <div class="form-row">    
                                    <div class="col-md-4 mb-2">
                                        <label for="worker_id" class="text-danger">Worker*</label>
                                        <select class="form-control" id="worker_id" name="worker_id">
                                            <option value="0">Select</option> 
                                        </select>
                                    </div> 
                                    
                                    <div class="col-md-4 mb-2">
                                        <label for="bill_type">Bill Type</label>
                                        <select class="form-control" name="bill_type" id="bill_type">
                                            <option value="0">Select (GST/NonGST)</option> 
                                            <option value="1">GST</option> 
                                            <option value="2">NonGST</option> 
                                        </select>
                                    </div>
                                    
                                    <div class="col-md-2 mb-2">
                                        <label for="cgst_percent">CGST %</label>
                                        <input type="text" class="form-control" name="cgst_percent" id="cgst_percent"> 
                                    </div> 
                                     <div class="col-md-2 mb-2">
                                        <label for="sgst_percent">SGST %</label>
                                        <input type="text" class="form-control" name="sgst_percent" id="sgst_percent"> 
                                    </div>      
                                </div>
                                
                                <div class="form-row">                                 
                                    <div class="col-md-4 mb-2">
                                        <label for="total_amount_with_tax" class="text-danger">Service Charge*</label>
                                        <input type="text" class="form-control" name="total_amount_with_tax" id="total_amount_with_tax" readonly> 
                                    </div> 
                                    <div class="col-md-4 mb-2">
                                        <label for="bill_status" class="text-danger">Service Status*</label>
                                        <select class="form-control" id="bill_status" name="bill_status">
                                            <option value="0">Select</option> 
                                        </select>
                                    </div> 
                                </div>
                                

                                <!-- Start payment receive section -->
                                <a href="javascript: void(0);" id="paymentSwitch" class="float-right d-block">Payment &#8645;</a>
                                <br>
                                <hr> 
                                <div class="form-row " id="paymentBoard">  
                                    <div class="col-md-2 mb-2" id="div_paid_amount1">
                                        <label for="paid_amount" class="text-danger">Amount*</label>
                                        <input type="text" class="form-control form-control-sm" name="paid_amount" id="paid_amount"> 
                                    </div>   
                                    <div class="col-md-2 mb-2" id="div_paid_date">
                                        <label for="paid_date" class="text-danger">Date*</label>
                                        <input type="date" class="form-control form-control-sm" name="paid_date" id="paid_date"> 
                                    </div>  
                                    <div class="col-md-2 mb-2" id="div_payment_mode1">       
                                        <label for="payment_mode">Payment Mode</label>                                 
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="payment_mode">
                                            <label class="custom-control-label" for="payment_mode">Cash/UPI</label>
                                        </div>
                                    </div> 
                                    <div class="col-md-4 mb-2" id="div_transaction_id1">
                                        <label for="transaction_id">Transaction ID</label>
                                        <input type="text" class="form-control form-control-sm" name="transaction_id" id="transaction_id"> 
                                    </div>
                                    <div class="col-md-2 mt-4" id="div_rcv_btn1">
                                        <label for="rcv_btn">&nbsp;</label>
                                        <button type="button" class="btn btn-primary btn-sm" id="receivePayment">Received</button> 
                                    </div>
                                </div>
                                <div class="form-row " id="div_p_history1">
                                    <h5>Payment Receive History</h5>
                                    <div class="col-md-12">Please choose Month - Year first then payment histry will be available here.</div>
                                    <!-- <div class="col-md-12"> Amount: Rs. 1500/- Received by Cash on 02-Apr-2026 </div>
                                    <div class="col-md-12"> Amount: Rs. 500/- Received by UPI on 03-Apr-2026 </div> -->
                                </div>
                                <!-- End payment section -->
                                
                            </form>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="log_id" id="log_id" value="0">
                            
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
    
    <script src="schedule_log/function.js?d=<?=date('YmdHis')?>"></script>