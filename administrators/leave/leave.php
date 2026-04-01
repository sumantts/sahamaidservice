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
							<strong>Success!</strong> Your Data saved successfully.
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>
                        <button type="button" class="btn btn-primary mb-2 float-right" id="onMyModal">Request a Leave</button>
                        
                        <div class="table-responsive">
                            <table id="example" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Sl.No.</th>
                                        <th>User (Type)</th>
                                        <th>From Date</th>
                                        <th>To Date</th>
                                        <th>Subject</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Sl.No.</th>
                                        <th>User (Type)</th>
                                        <th>From Date</th>
                                        <th>To Date</th>
                                        <th>Subject</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>                       

                    </div>
                </div>
            </div>

            <!-- Modal start -->
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
                                    <div class="col-md-3 mb-3">
                                        <label for="full_name">User Name</label>
                                        <input type="text" class="form-control" name="full_name" id="full_name" readonly> 
                                    </div>                                    
                                    <div class="col-md-3 mb-3">
                                        <label for="user_type_text">User Type</label>
                                        <input type="text" class="form-control" name="user_type_text" id="user_type_text" readonly> 
                                    </div>                                    
                                    <div class="col-md-3 mb-3">
                                        <label for="from_date">From Date</label>
                                        <input type="date" class="form-control" name="from_date" id="from_date" readonly> 
                                    </div>                                   
                                    <div class="col-md-3 mb-3">
                                        <label for="to_date">To Date</label>
                                        <input type="date" class="form-control" name="to_date" id="to_date" readonly> 
                                    </div> 
                                </div> 
                                <div class="form-row">                                    
                                    <div class="col-md-12 mb-3">
                                        <label for="leave_subject">Subject</label>
                                        <input type="text" class="form-control" name="leave_subject" id="leave_subject" readonly> 
                                    </div> 
                                </div> 
                                <div class="form-row">                                    
                                    <div class="col-md-12 mb-3">
                                        <label for="leave_message">Message</label>
                                        <textarea class="form-control" name="leave_message" id="leave_message" readonly></textarea>
                                    </div>
                                </div> 
                                <?php if($sess_user_type == '1' || $sess_user_type == '2' || $sess_user_type == '2'){?>
                                <div class="form-row"> 
                                    <div class="col-md-4 mb-3">
                                        <label for="lsm_id">Leave Status</label>
                                        <select class="form-control" name="lsm_id" id="lsm_id">
                                        </select>
                                        <input type="hidden" name="l_id" id="l_id" value="0">
                                    </div> 
                                </div>
                                <?php } ?> 
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="$('#exampleModalLong').modal('hide')">Close</button>
                            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                            <button class="btn  btn-primary" type="button" id="submitForm">
                                <span class="spinner-border spinner-border-sm" role="status" style="display: none;" id="submitForm_spinner"></span>
                                <span class="load-text" style="display: none;" id="submitForm_spinner_text">Loading...</span>
                                <span class="btn-text" id="submitForm_text">Save</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal end -->

            <!-- [ sample-page ] end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- [ Main Content ] end -->
	<?php include('common/footer.php'); ?>
    
    <script src="leave/function.js?d=<?=date('YmdHis')?>"></script>