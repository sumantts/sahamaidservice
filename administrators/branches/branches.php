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
         
        <h5 class="mt-0 font-16 fw-bold mb-3">All the(*) Fields are Required</h5>
            <div class="row">
                <div class="col-12">  
                    <div class="card">
                        <div class="card-body">                           
                            <form id="myForm" name="myForm" action="#" method="POST">
                                <div class="mb-2">
                                    <label for="br_name" class="form-label text-danger">Branch Name*</label>
                                    <input type="text" class="form-control" id="br_name" name="br_name" required>
                                </div> 
                                
                                <div class="mb-3">
                                    <small id="message_text" class="d-none form-text text-muted"> </small>   
                                </div> 
                                    <input type="hidden" name="br_id" id="br_id" value="0">
                                    <button type="submit" class="btn btn-primary" id="submitForm">Save</button> 
                                    
                            </form>
                        </div> 
                    </div> 
                </div> 
            </div> 
            
        <div class="row">                
            <div class="col-12">
                <div class="card">
                    <div class="card-body"> 
                        <!-- end nav--> 

                        <div class="tab-content">
                            <div class="tab-pane show active" id="buttons-table-preview">
                                <table id="datatable-buttons" class="table table-sm dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>SL#</th>
                                            <th>company Name</th>  
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody> 
                                    </tbody>
                                </table>
                            </div> <!-- end preview-->
                            
                            
                            <!-- end preview code-->
                        </div> <!-- end tab-content-->

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
            

        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- [ Main Content ] end -->
	<?php include('common/footer.php'); ?>
    
    <script src="branches/function.js?d=<?=date('YmdHis')?>"></script>