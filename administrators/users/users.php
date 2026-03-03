<?php 
if(!$_SESSION["user_id"]){
    header("location:?p=signin");
}
include('common/head.php'); 
$sess_user_type = $_SESSION["user_type"];

?>
<script type="text/javascript">   

</script>
<style>
    table td {
        word-break: break-word;
        vertical-align: top;
        white-space: normal !important;
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
            <!-- [ sample-page ] start -->
             <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5> <?=$title?> </h5>
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
                                    <li><a href="#!" data-toggle="modal" data-target="#exampleModalLong"><i class="feather icon-file-plus"></i> add new</a> </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body"> 
                        

                        <!-- Nav -->
                        <div class="nav-tabs">
                            <input type="hidden" name="sess_user_type" id="sess_user_type" value="<?=$sess_user_type?>">
                            <button class="tab-btn btn btn-primary <?php if($sess_user_type == '1'){?> active <?php } if($sess_user_type > 1){?>d-none<?php } ?>" data-tab="admin">Admin</button>
                            <button class="tab-btn btn btn-secondary <?php if($sess_user_type == '2'){?> active <?php } if($sess_user_type > 2){?>d-none<?php } ?>" data-tab="manager">Manager</button>
                            <button class="tab-btn btn btn-success <?php if($sess_user_type == '3'){?> active <?php } if($sess_user_type > 3){?>d-none<?php } ?>" data-tab="employee">Employee</button>
                            <button class="tab-btn btn btn-warning" data-tab="client">Client</button>
                            <button class="tab-btn btn btn-info" data-tab="worker">Worker</button>
                        </div>

                        <!-- Tab Content -->
                        <div class="tab-content">
                            <div class="tab-pane  <?php if($sess_user_type == '1'){?> active <?php } ?>" id="admin">
                                <h4>Admin List</h4>
                                <div class="table-responsive">
                                    <table id="admin_list" class="table table-striped" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Sl.No.</th>
                                                <th>Admin name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Adhar Card</th>
                                                <th>PAN Card</th>
                                                <th>Voter Card</th>
                                                <th>Pincode</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead> 
                                    </table>
                                </div> 
                            </div>

                            <div class="tab-pane <?php if($sess_user_type == '2'){?> active <?php } ?>" id="manager">
                                <h4>Manager List</h4> 
                                <div class="table-responsive">
                                    <table id="manager_list" class="table table-striped" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Sl.No.</th>
                                                <th>Admin name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Adhar Card</th>
                                                <th>PAN Card</th>
                                                <th>Voter Card</th>
                                                <th>Pincode</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead> 
                                    </table>
                                </div> 
                            </div>

                            <div class="tab-pane <?php if($sess_user_type == '3'){?> active <?php } ?>" id="employee">
                                <h4>Employee List</h4>
                                <div class="table-responsive">
                                    <table id="employee_list" class="table table-striped" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Sl.No.</th>
                                                <th>Admin name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Adhar Card</th>
                                                <th>PAN Card</th>
                                                <th>Voter Card</th>
                                                <th>Pincode</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead> 
                                    </table>
                                </div>  
                            </div>

                            <div class="tab-pane <?php if($sess_user_type == '4'){?> active <?php } ?>" id="client">
                                <h4>Client List</h4> 
                                <div class="table-responsive">
                                    <table id="client_list" class="table table-striped" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Sl.No.</th>
                                                <th>Admin name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Adhar Card</th>
                                                <th>PAN Card</th>
                                                <th>Voter Card</th>
                                                <th>Pincode</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead> 
                                    </table>
                                </div> 
                            </div>

                            <div class="tab-pane" id="worker">
                                <h4>Worker List</h4> 
                                <div class="table-responsive">
                                    <table id="worker_list" class="table table-striped" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Sl.No.</th>
                                                <th>Admin name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Adhar Card</th>
                                                <th>PAN Card</th>
                                                <th>Voter Card</th>
                                                <th>Pincode</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead> 
                                    </table>
                                </div> 
                            </div>
                        </div>
                    
                    </div>
                </div>
                <!-- End Card -->
            </div> 
            <!-- End col 12 -->

            <!-- Modal start -->
            <div id="exampleModalLong" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Modal Title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Recipient:</label>
                                    <input type="text" class="form-control" id="recipient-name">
                                </div>
                                <div class="form-group">
                                    <label for="message-text" class="col-form-label">Message:</label>
                                    <textarea class="form-control" id="message-text"></textarea>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn  btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn  btn-primary">Save changes</button>
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
	<?php include('common/footer_1.php'); ?>
    
    <script src="users/function.js"></script>
    

<script>
    // Select all tab buttons
    /*const buttons = document.querySelectorAll('.tab-btn');
    const panes = document.querySelectorAll('.tab-pane');

    buttons.forEach(button => {
        button.addEventListener('click', function () {

            // Remove active class from all buttons
            buttons.forEach(btn => btn.classList.remove('active'));

            // Hide all tab panes
            panes.forEach(pane => pane.classList.remove('active'));

            // Add active class to clicked button
            this.classList.add('active');

            // Show corresponding tab pane
            const tabId = this.getAttribute('data-tab');
            document.getElementById(tabId).classList.add('active');

            // Active Tab Name
            let activeTab = document.querySelector('.tab-pane.active');
            if (activeTab) {
                console.log(activeTab.id);
                $current_tab = activeTab.id;                
                populateDataTable();
            }

        });
    });*/
</script>