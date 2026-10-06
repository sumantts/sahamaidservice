<?php 
if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"] == ''){
    header("location:?p=signin");
}
include('common/head.php'); 
?>
<script type="text/javascript">   

</script>
<style>
    table td {
        word-break: break-word;
        vertical-align: top;
        white-space: normal !important;
    }

    .service-items-scroll {
        max-height: 185px;
        overflow-y: auto;
    }
</style>

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
                        <h5> <?=$title?> Table</h5>
                        <div class="card-header-right d-none">
                            <div class="btn-group card-option">
                                <button type="button" class="btn dropdown-toggle btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="feather icon-more-horizontal"></i>
                                </button>
                                <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                                    <li><a href="#!" data-toggle="modal" data-target="#exampleModalLong"><i class="feather icon-file-plus"></i> add new</a> </li> 
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-success alert-dismissible fade show" role="alert" style="display: none;" id="orgFormAlert">
							<strong>Success!</strong> Your Data Deleted successfully.
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>
                        <div class="alert alert-success alert-dismissible fade show" role="alert" style="display: none;" id="orgFormAlert1">
							<strong>Success!</strong> Your Service saved successfully.
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>
                        <button type="button" class="btn btn-primary mb-2 float-right" data-toggle="modal" data-target="#exampleModalLong" id="addNewBtn">Add New</button>

                        
                        <div class="table-responsive">
                            <table id="example" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Sl.No.</th>
                                        <th>Service Name</th>
                                        <th>Service Included</th>
                                        <th>Service Not Included</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Sl.No.</th>
                                        <th>Service Name</th>
                                        <th>Service Included</th>
                                        <th>Service Not Included</th>
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
                            <form class="needs-validation" novalidate>
                                <div class="form-row">
                                    <div class="col-md-8 mb-3">
                                        <label for="serviceName" class="text-danger">Service Name*</label>
                                        <input type="text" class="form-control" id="serviceName" value="" required >
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>                                    
                                        <div class="invalid-feedback">
                                            Please provide Service Name.
                                        </div>
                                    </div> 
                                    <div class="col-md-4 mb-3">
                                        <label for="serviceName" class="text-danger">Status*</label>
                                        <select class="form-control" id="svc_status" name="svc_status" required>
                                            <option value="1">Active</option> 
                                            <option value="2">Inactive</option> 
                                        </select>
                                    </div> 
                                    
                                    <!-- Service Included Start -->
                                    <div class="col-md-12 mb-3">
                                        <div class="row">
                                            <div class="col-md-10 mb-3">
                                                <label for="scv_inc" class="text-danger">Service Included*</label>
                                                <input type="text" class="form-control" id="scv_inc" value="" required >
                                            </div> 
                                            <div class="col-md-2 mb-3">
                                                <label for="scv_inc">&nbsp;</label>
                                                <button type="button" class="btn btn-secondary mt-4" id="scv_inc_btn">Add</button>
                                            </div>
                                        </div> 
                                    </div> 

                                    <!-- Service Included -->
                                    <div class="col-md-12 mb-3">
                                        <div class="table-responsive service-items-scroll">
                                            <table class="table table-sm" id="includedServicesTable">
                                                <thead>
                                                    <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Service Included</th>
                                                    <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th colspan="3">Add new service included</th>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- Service Included -->

                                    <!-- Not Inclided Start -->
                                    <div class="col-md-12 mb-3">
                                        <div class="row">
                                            <div class="col-md-10 mb-3">
                                                <label for="svc_notinc" class="text-danger">Service Not Included*</label>
                                                <input type="text" class="form-control" id="svc_notinc" value="" required >
                                            </div> 
                                            <div class="col-md-2 mb-3">
                                                <label for="serviceName">&nbsp;</label>
                                                <button type="button" class="btn btn-secondary mt-4" id="svc_notinc_btn">Add</button>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Service Not Included -->
                                    <div class="col-md-12 mb-3">
                                        <div class="table-responsive service-items-scroll">
                                            
                                            <table class="table table-sm" id="notIncludedServicesTable">
                                                <thead>
                                                    <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Service Not Included</th>
                                                    <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th colspan="3">Add new service not included</th>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- Service Not Included -->

                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" id="qs_id" value="0">
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
    
    <script src="quick_services/function.js?d=<?php echo time(); ?>"></script>