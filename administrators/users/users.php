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
                                    <li><a href="#!" data-toggle="modal" data-target="#exampleModalLong" id="addNewBtn"><i class="feather icon-file-plus"></i> add new</a> </li>
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
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Modal Title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <form id="myForm" name="myForm" action="#" method="POST"> 
                            <div class="modal-body">                            
                                <h5>🔹 SECTION 1: Basic Details</h5>
                                <div class="row mb-2">                                    
                                    <div class="col-md-3">
                                        <label for="full_name" class="form-label text-danger">Full Name (as per Aadhaar)*</label>
                                        <input type="text" class="form-control" name="full_name" id="full_name" value="">
                                    </div>                                   
                                    <div class="col-md-3">
                                        <label for="fat_hus_name" class="form-label text-danger">Father / Husband Name*</label>
                                        <input type="text" class="form-control" name="fat_hus_name" id="fat_hus_name" value="">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="date_of_birth" class="form-label text-danger">Date of Birth*</label>
                                        <input type="date" class="form-control" name="date_of_birth" id="date_of_birth" value="">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="gender" class="form-label text-danger">Gender*</label>
                                        <select class="form-control" name="gender" id="gender">
                                            <option value="">Select</option>
                                            <option value="1">Male</option>
                                            <option value="2">Female</option>
                                            <option value="3">Other</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="row mb-2">
                                    <div class="col-md-3">
                                        <label for="phone_number" class="form-label text-danger">Mobile Number (WhatsApp active?)*</label>
                                        <input type="text" class="form-control" name="phone_number" id="phone_number" value="">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="alt_phone_number" class="form-label">Alternate Mobile Number</label>
                                        <input type="text" class="form-control" name="alt_phone_number" id="alt_phone_number" value="">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="marital_status" class="form-label text-danger">Marital Status*</label>
                                        <select class="form-control" name="marital_status" id="marital_status">
                                            <option value="">Select</option>
                                            <option value="1">Single</option>
                                            <option value="2">Married</option>
                                            <option value="3">Widow</option>
                                            <option value="4">Divorced</option>
                                        </select>
                                    </div>
                                </div>
                                <a href="javascript: void(0);" id="partTwoSwitch" class="float-right">Section 2</a>
                                <br>
                                <hr>    

                                <h5>🔹 SECTION 2: Address Details</h5>
                                <div class="row mb-2" id="partTwoBoard">
                                    <div class="col-md-6">
                                        <label for="address" class="form-label text-danger">Permanent Address*</label>
                                        <textarea class="form-control" id="address" name="address"></textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="curr_address" class="form-label text-danger">Current Address (where staying now)*</label>
                                        <textarea class="form-control" id="curr_address" name="curr_address"></textarea>
                                    </div>
                                    
                                    <div class="col-md-3">
                                        <label for="city" class="form-label text-danger">City*</label>
                                        <input type="text" class="form-control" name="city" id="city" value="">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="state_id" class="form-label text-danger">State*</label>
                                        <select class="form-control" name="state_id" id="state_id">
                                            <option value="">Select</option> 
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="pincode" class="form-label text-danger">Pincode*</label>
                                        <input type="text" class="form-control" name="pincode" id="pincode" value="">
                                    </div>
                                </div>
                                <a href="javascript: void(0);" id="partThreeSwitch" class="float-right">Section 3</a>
                                <br>
                                <hr> 

                                <h5>🔹 SECTION 3: Identity Details</h5>
                                <div class="row mb-2" id="partThreeBoard"> 
                                    <div class="col-md-3">
                                        <label for="adhar_card" class="form-label text-danger">Aadhaar Number*</label>
                                        <input type="text" class="form-control" name="adhar_card" id="adhar_card" value="">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="adhar_card_img" class="form-label">Upload Aadhaar Card Photo</label>
                                        <input type="file" class="form-control-file" name="adhar_card_img" id="adhar_card_img" value="">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="pan_card" class="form-label">PAN Card</label>
                                        <input type="text" class="form-control" name="pan_card" id="pan_card" value="">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="pan_card_img" class="form-label">Upload PAN Card Photo</label>
                                        <input type="file" class="form-control-file" name="pan_card_img" id="pan_card_img" value="">
                                    </div>
                                
                                    
                                    <div class="col-md-3">
                                        <label for="voter_id_card" class="form-label text-danger">Voter ID Card*</label>
                                        <input type="text" class="form-control" name="voter_id_card" id="voter_id_card" value="">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="voter_id_card_img" class="form-label">Voter ID Card Image</label>
                                        <input type="file" class="form-control-file" name="voter_id_card_img" id="voter_id_card_img" value="">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="user_photo" class="form-label">Live Photo (Clear Face Photo)</label>
                                        <input type="file" class="form-control-file" name="user_photo" id="user_photo" value="">
                                    </div>
                                </div>
                                <a href="javascript: void(0);" id="partFourSwitch" class="float-right">Section 4</a>
                                <br>
                                <hr> 

                                <h5>🔹 SECTION 4: Work Details</h5>
                                <div class="row mb-2" id="partFourBoard">
                                    <div class="col-md-3">
                                        <label for="wt_id" class="form-label">Work Type Applying For</label>
                                        <select class="form-control" name="wt_id" id="wt_id">
                                            <option value="">Select</option>
                                            <option value="1">Maid</option>
                                            <option value="2">Cook</option>
                                            <option value="3">Babysitter</option>
                                            <option value="4">Patient Care</option>
                                            <option value="5">Elder Care</option>
                                            <option value="6">Japa Maid</option>
                                            <option value="7">Housekeeping</option> 
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="work_exp" class="form-label">Work Experience (in years)</label>
                                        <input type="text" class="form-control" name="work_exp" id="work_exp" value="">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="earlier_work_city" class="form-label">Earlier Work City</label>
                                        <input type="text" class="form-control" name="earlier_work_city" id="earlier_work_city" value="">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="last_emplr_name" class="form-label">Last Employer Name (if any)</label>
                                        <input type="text" class="form-control" name="last_emplr_name" id="last_emplr_name" value="">
                                    </div>
                                    
                                    <div class="col-md-3">
                                        <label for="skill_id" class="form-label">Skills</label>
                                        <select class="form-control" name="skill_id" id="skill_id">
                                            <option value="">Select</option>
                                            <option value="1">Cooking</option>
                                            <option value="2">Cleaning</option>
                                            <option value="3">Baby Care</option>
                                            <option value="4">Patient Care</option>
                                            <option value="5">Elder Care</option>
                                            <option value="6">Old Age Care</option>
                                            <option value="7">All Work</option> 
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="lang_id" class="form-label">Languages Known</label>
                                        <select class="form-control" name="lang_id" id="lang_id">
                                            <option value="">Select</option>
                                            <option value="1">Cooking</option>
                                            <option value="2">Cleaning</option>
                                            <option value="3">Baby Care</option>
                                            <option value="4">Patient Care</option>
                                            <option value="5">Elder Care</option>
                                            <option value="6">Old Age Care</option>
                                            <option value="7">All Work</option> 
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="work_loc" class="form-label">Preferred Work Location*</label>
                                        <input type="text" class="form-control" name="work_loc" id="work_loc" value="">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="st_id" class="form-label">Stay Type</label>
                                        <select class="form-control" name="st_id" id="st_id">
                                            <option value="">Select</option>
                                            <option value="1">Live-in</option>
                                            <option value="2">Part-time</option> 
                                            <option value="3">Full-time</option> 
                                        </select>
                                    </div>
                                </div>
                                <a href="javascript: void(0);" id="partFiveSwitch" class="float-right">Section 5</a>
                                <br>
                                <hr> 

                                <h5>🔹 SECTION 5: Salary & Availability</h5>
                                <div class="row mb-2" id="partFiveBoard">
                                    <div class="col-md-3">
                                        <label for="exp_salary" class="form-label">Expected Salary (₹)</label>
                                        <input type="text" class="form-control" name="exp_salary" id="exp_salary" value="">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="available_from" class="form-label">Available From (date)</label>
                                        <input type="date" class="form-control" name="available_from" id="available_from" value="">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="wof_id" class="form-label">Weekly Off Required?</label>
                                        <select class="form-control" name="wof_id" id="wof_id">
                                            <option value="">Select</option>
                                            <option value="1">Yes</option>
                                            <option value="2">No</option>  
                                        </select>
                                    </div>
                                </div>
                                <a href="javascript: void(0);" id="partSixSwitch" class="float-right">Section 6</a>
                                <br>
                                <hr> 

                                <h5>🔹 SECTION 6: Health & Safety</h5>
                                <div class="row mb-2" id="partSixBoard">
                                    <div class="col-md-3">
                                        <label for="ill_id" class="form-label">Any Major Illness?</label>
                                        <select class="form-control" name="ill_id" id="ill_id">
                                            <option value="">Select</option>
                                            <option value="1">Yes</option>
                                            <option value="2">No</option>  
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="pol_vrfy_id" class="form-label">Police Verification Done?</label>
                                        <select class="form-control" name="pol_vrfy_id" id="pol_vrfy_id">
                                            <option value="">Select</option>
                                            <option value="1">Yes</option>
                                            <option value="2">No</option>  
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="crim_id" class="form-label">Any Criminal Case History?</label>
                                        <select class="form-control" name="crim_id" id="crim_id">
                                            <option value="">Select</option>
                                            <option value="1">Yes</option>
                                            <option value="2">No</option>  
                                        </select>
                                    </div>
                                </div>
                                <a href="javascript: void(0);" id="partSevenSwitch" class="float-right">Section 7</a>
                                <br>
                                <hr> 

                                <h5>🔹 SECTION 7: Emergency Contact</h5>
                                <div class="row mb-2" id="partSevenBoard">
                                    <div class="col-md-3">
                                        <label for="emg_cont_person" class="form-label">Emergency Contact Person Name</label>
                                        <input type="text" class="form-control" name="emg_cont_person" id="emg_cont_person" value="">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="relation" class="form-label">Relation</label>
                                        <input type="text" class="form-control" name="relation" id="relation" value="">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="emg_cont_number" class="form-label">Emergency Contact Number</label>
                                        <input type="text" class="form-control" name="emg_cont_number" id="emg_cont_number" value="">
                                    </div>
                                </div>
                                <a href="javascript: void(0);" id="partEightSwitch" class="float-right">Section 8</a>
                                <br>
                                <hr> 
                                
                                <h5>🔹 SECTION 8: Others</h5>
                                <div class="row mb-2" id="partEightBoard">
                                    <div class="col-md-6">
                                        <label for="bank_details" class="form-label">Bank Details</label>
                                        <textarea class="form-control" name="bank_details" id="bank_details"></textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="highest_edu" class="form-label">Educational Qualification</label>
                                        <textarea class="form-control" name="highest_edu" id="highest_edu"></textarea>
                                    </div>
                                    
                                    <div class="col-md-3">
                                        <label for="bank_details_img" class="form-label">Bank Details Image</label>
                                        <input type="file" class="form-control-file" name="bank_details_img" id="bank_details_img" value="">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="email_id" class="form-label">Email</label>
                                        <input type="text" class="form-control" name="email_id" id="email_id" value="">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" class="form-control" name="username" id="username" value="">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="text" class="form-control" name="password" id="password" value="">
                                    </div>
                                </div>  
                                <a href="javascript: void(0);" id="partNineSwitch" class="float-right">Section 9</a>
                                <br>
                                <hr> 

                                <h5>🔹 SECTION 9: Declaration</h5>
                                <div class="row mb-2" id="partNineBoard">
                                    <div class="col-md-12">
                                        <input type="checkbox" id="subscribe" name="newsletter" value="subscribed">
                                        <label for="subscribe">I confirm that all information given is correct. If any information is false, Saha Enterprise can cancel my registration.</label>
                                    </div> 
                                </div>

                            </div>
                            <div class="modal-footer">
                                <input type="hidden" name="serial_number" id="serial_number" value="0">
                                <button type="submit" class="btn btn-primary" id="submitForm">Save</button>                            
                                <button type="button" class="btn btn-dark" id="cancelForm">Clear</button>
                            </div>
                        </form> 
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
    
    <script src="users/function.js?d=<?=date('YmdHis')?>"></script>
    

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