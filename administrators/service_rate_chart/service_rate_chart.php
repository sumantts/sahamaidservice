<?php 
if(!isset($_SESSION["user_id"])){
    header("location:?p=signin");
}

include('common/head.php'); 

if(!isset($_SESSION["user_type"])){
    header("location:?p=signin");
}else{
    $sess_user_type = $_SESSION["user_type"];
    if($sess_user_type == 4){
        header("location:?p=signin");
    }
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
                                    <label for="qs_id" class="form-label text-danger">Quick Services*</label>
                                    <select class="form-control" id="qs_id" name="qs_id" required>
                                        <option value="">Select</option> 
                                    </select>
                                </div>
                                
                                <div class="col-md-3 mb-2">
                                    <label for="sa_id" class="form-label text-danger">Service Area*</label>
                                    <select class="form-control" id="sa_id" name="sa_id" required>
                                        <option value="">Select</option> 
                                    </select>
                                </div>  

                                <div class="col-md-2 mb-2 d-none" id="all_over_rate_first_div">
                                    <label for="all_over_rate_first" class="form-label text-danger">1st time rate*</label>
                                    <input class="form-control" type="number" id="all_over_rate_first" name="all_over_rate_first" >
                                </div> 

                                <div class="col-md-2 mb-2 d-none" id="all_over_rate_normal_div">
                                    <label for="all_over_rate_normal" class="form-label text-danger">Normal Rate *</label>
                                    <input class="form-control" type="number" id="all_over_rate_normal" name="all_over_rate_normal" >
                                </div>

                                <div class="col-md-2 mt-4">
                                    <input type="hidden" name="atten_id" id="atten_id" value="0">
                                    <button type="button" class="btn btn-primary d-none" id="submitForm">Show</button> 
                                    <button type="button" class="btn btn-primary d-none" id="saveRate">Save</button> 
                                </div> 

                                <div class="col-md-2 mt-4 d-none" id="csvDownloadDiv">
                                    <button type="button" class="btn btn-primary" id="csvDownload">CSV Download</button> 
                                </div>  

                                <div class="col-md-2 mt-4 d-none" id="paySlipDownloadDiv">
                                    <button type="button" class="btn btn-primary" id="paySlipDownload">Pay Slip</button> 
                                </div>
                            </div>
                        </form>
                        
                    </div>
                    <!-- End first card body -->

                    <!-- start second card body -->
                    <div class="card-body d-none" id="rate_chart_ui_div">
                        <h5>Rate Chart for the service: <span id="serviceName"></span></h5>
                        <div class="form-row" id="rate_chart_ui">
                            <table class="table table-sm" id="rate_chart_table">
                                <thead>
                                    <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Building Name</th>
                                    <th scope="col">First Order Rate (per hour)</th>
                                    <th scope="col">Normal Rate (per hour)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- <tr>
                                        <th>1</th>
                                        <td>Bengal Intelligent Park</td>
                                        <td><input type="text" class="form-control form-control-sm" value="100"></td>
                                        <td><input type="text" class="form-control form-control-sm" value="150"></td>
                                    </tr>
                                    <tr>
                                        <th>2</th>
                                        <td>Bengal Intelligent Park New</td>
                                        <td><input type="text" class="form-control form-control-sm" value="120"></td>
                                        <td><input type="text" class="form-control form-control-sm" value="180"></td>
                                    </tr>  -->
                                </tbody>
                            </table>
                        
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
    
    <script src="service_rate_chart/function.js?d=<?=date('YmdHis')?>"></script>