<?php 
if(!$_SESSION["user_id"]){
    header("location:?p=signin");
}
include('common/head.php'); 
$sess_user_type = $_SESSION["user_type"];
if($sess_user_type == 4){
    header("location:?p=signin");
}

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
                        <h5> <?=$title?> Register</h5>
                        <div class="card-header-right">
                            <div class="btn-group card-option">
                                <button type="button" class="btn dropdown-toggle btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="feather icon-more-horizontal"></i>
                                </button>
                                <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                                    <li><a href="#!" data-toggle="modal" data-target="#exampleModalLong"><i class="feather icon-file-plus"></i> add new</a> </li>
                                    <!-- <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> maximize</span><span style="display:none"><i class="feather icon-minimize"></i> Restore</span></a></li>
                                    <li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i> collapse</span><span style="display:none"><i class="feather icon-plus"></i> expand</span></a></li>
                                    <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i> reload</a></li>
                                    <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i> remove</a></li> -->
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Start first card body -->
                    <div class="card-body">
                        <div class="alert alert-success alert-dismissible fade show" role="alert" style="display: none;" id="orgFormAlert">
							<strong>Success!</strong> Your Data Deleted successfully.
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>
                        <div class="alert alert-success alert-dismissible fade show" role="alert" style="display: none;" id="orgFormAlert1">
							<strong>Success!</strong> Attendance Updated.
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>
                                             
                        
                        <form method="POST" action="#" name="myForm" name="myForm">
                            <div class="form-row"> 
                                <div class="col-md-3 mb-2">
                                    <label for="user_type" class="form-label text-danger">User Type*</label>
                                    <select class="form-control" id="user_type" name="user_type" required>
                                        <option value="">Select</option> 
                                    </select>
                                </div>
                                
                                <div class="col-md-3 mb-2">
                                    <label for="user_id" class="form-label text-danger">User*</label>
                                    <select class="form-control" id="user_id" name="user_id" required>
                                        <option value="">Select</option> 
                                    </select>
                                </div>  

                                <div class="col-md-2 mb-2">
                                    <label for="month_date" class="form-label text-danger">Select Month*</label>
                                    <input class="form-control" type="month" id="month_date" name="month_date" required>
                                </div>

                                <div class="col-md-1 mt-4">
                                    <input type="hidden" name="atten_id" id="atten_id" value="0">
                                    <button type="button" class="btn btn-primary" id="submitForm">Show</button> 
                                </div> 

                                <div class="col-md-2 mt-4 d-none" id="csvDownloadDiv">
                                    <button type="button" class="btn btn-primary" id="csvDownload">CSV Download</button> 
                                </div> 
                            </div>
                        </form>
                        
                    </div>
                    <!-- End first card body -->

                    <!-- start second card body -->
                    <div class="card-body">
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
                    <!-- end second card body -->

                </div>
            </div>

            <!-- Modal start -->
            <div id="exampleModalLong" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle"><?=$title?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate>
                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label for="serviceName">Service Name*</label>
                                        <input type="text" class="form-control" id="serviceName" placeholder="Service Name" value="" required >
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>                                    
                                        <div class="invalid-feedback">
                                            Please provide Service Name.
                                        </div>
                                    </div> 
                                    
                                    <div class="col-md-12 mb-3">
                                        <label for="serviceDescription">Service Description*</label>
                                        <!-- <input type="text" class="form-control" id="serviceDescription" placeholder="Group Description" value="" required> -->
                                        <textarea class="form-control" id="serviceDescription" value="" required></textarea>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>                                    
                                        <div class="invalid-feedback">
                                            Please provide Service Description.
                                        </div>
                                    </div> 
                                    
                                    <div class="col-md-12 mb-3">
                                        <input type="file" accept="image/*" class="custom-file-input" id="servicesPhoto" aria-describedby="servicesPhoto"  onchange="savePhoto()">
                                        <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                        <small id="servicesPhotoError" class="form-text text-danger"> </small>
                                        <img src="" id="image" width="100">
                                    </div> 

                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" id="service_id" value="0">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                            <button class="btn  btn-primary" type="button" id="submitForm">
                                <span class="spinner-border spinner-border-sm" role="status" style="display: none;" id="submitForm_spinner"></span>
                                <span class="load-text" style="display: none;" id="submitForm_spinner_text">Loading...</span>
                                <span class="btn-text" id="submitForm_text">Save Changes</span>
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
    
    <script src="attendance/function.js?d=<?=date('YmdHis')?>"></script>