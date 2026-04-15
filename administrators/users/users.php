<?php 
if(!$_SESSION["user_id"]){
    header("location:?p=signin");
}
include('common/head.php'); 
$sess_user_type = $_SESSION["user_type"];

if($sess_user_type > 3){
    header("location:?p=signin");
}
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
                            <?php if($sess_user_type == '1' || $sess_user_type == '2' || $sess_user_type == '3'){?>
                            <button class="tab-btn btn btn-warning" data-tab="client">Client</button>
                            <button class="tab-btn btn btn-info" data-tab="worker">Worker</button>
                            <?php } ?>
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
                                                <th>State</th> 
                                                <th>City</th> 
                                                <th>Pincode</th> 
                                                <th>Profile Photo</th>
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
                                                <th>Manager name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Adhar Card</th>
                                                <th>PAN Card</th>
                                                <th>Voter Card</th>
                                                <th>State</th> 
                                                <th>City</th> 
                                                <th>Pincode</th> 
                                                <th>Profile Photo</th>
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
                                                <th>Emp. name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Adhar Card</th>
                                                <th>PAN Card</th>
                                                <th>Voter Card</th>
                                                <th>State</th> 
                                                <th>City</th> 
                                                <th>Pincode</th> 
                                                <th>Profile Photo</th>
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
                                                <th>Client name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <!-- <th>Adhar Card</th>
                                                <th>PAN Card</th>
                                                <th>Voter Card</th> -->
                                                <th>State</th> 
                                                <th>City</th> 
                                                <th>Pincode</th>
                                                <th>Lead/Confirm</th>
                                                <th>Profile Photo</th>
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
                                                <th>Worker Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Adhar Card</th>
                                                <th>PAN Card</th>
                                                <th>Voter Card</th>
                                                <th>State</th> 
                                                <th>City</th> 
                                                <th>Pincode</th>
                                                <th style="width: 30px;">Skills</th>
                                                <th>Lead/Confirm</th>
                                                <th>Profile Photo</th>
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
                                    <div class="col-md-3 d-block" id="partOneBoard1">
                                        <label for="fat_hus_name" class="form-label text-danger">Father / Husband Name*</label>
                                        <input type="text" class="form-control" name="fat_hus_name" id="fat_hus_name" value="">
                                    </div>
                                    <div class="col-md-3 d-block" id="partOneBoard2">
                                        <label for="date_of_birth" class="form-label text-danger">Date of Birth*</label>
                                        <input type="date" class="form-control" name="date_of_birth" id="date_of_birth" value="">
                                    </div>
                                    <div class="col-md-3 d-block" id="partOneBoard3">
                                        <label for="gender" class="form-label text-danger">Gender*</label>
                                        <select class="form-control" name="gender" id="gender">
                                            <option value="0">Select</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="row mb-2">
                                    <div class="col-md-3">
                                        <label for="phone_number" class="form-label text-danger">Mobile Number (WhatsApp active?)*</label>
                                        <input type="text" class="form-control" name="phone_number" id="phone_number" value="">
                                    </div>
                                    <div class="col-md-3 d-block" id="partOneBoard4">
                                        <label for="alt_phone_number" class="form-label">Alternate Mobile Number</label>
                                        <input type="text" class="form-control" name="alt_phone_number" id="alt_phone_number" value="">
                                    </div>
                                    <div class="col-md-3 d-block" id="partOneBoard5">
                                        <label for="m_id" class="form-label text-danger">Marital Status*</label>
                                        <select class="form-control" name="m_id" id="m_id">
                                            <option value="0">Select</option>
                                        </select>
                                    </div>
                                </div>
                                <a href="javascript: void(0);" id="partTwoSwitch" class="float-right">Section 2 &#8645;</a>
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
                                        <label for="country_id" class="form-label text-danger">Country*</label>
                                        <select class="form-control" name="country_id" id="country_id">
                                            <option value="0">Select</option> 
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="state_id" class="form-label text-danger">State*</label>
                                        <select class="form-control" name="state_id" id="state_id">
                                            <option value="0">Select</option> 
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="city_id" class="form-label text-danger">City*</label>
                                        <select class="form-control" name="city_id" id="city_id">
                                            <option value="0">Select</option> 
                                        </select>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="pincode" class="form-label text-danger">Pincode*</label>
                                        <input type="text" class="form-control" name="pincode" id="pincode" value="">
                                    </div>
                                </div>
                                <a href="javascript: void(0);" id="partThreeSwitch" class="float-right d-block">Section 3 &#8645;</a>
                                <br>
                                <hr> 

                                <h5 class="d-block" id="partThreeTitle">🔹 SECTION 3: Identity Details</h5>
                                <div class="row mb-2" id="partThreeBoard"> 
                                    <div class="col-md-4 d-block" id="partThreeBoard1">
                                        <label for="adhar_card" class="form-label text-danger">Aadhaar Number*</label>
                                        <input type="text" class="form-control" name="adhar_card" id="adhar_card" value="">
                                    </div>
                                    <div class="col-md-4 d-block" id="partThreeBoard2">
                                        <label for="adhar_card_img" class="form-label">Aadhaar Card Photo</label>
                                        <input type="file" class="form-control-file" name="adhar_card_img" id="adhar_card_img" value="" oninput="uploadPhoto('adhar_card_img')">
                                        <br>
                                        <div id="preview_adhar_card_img"></div>
                                    </div>
                                    <div class="col-md-4 d-block" id="partThreeBoard3">
                                        <label for="adhar_card_back_img" class="form-label">Aadhaar Card (Back Side)</label>
                                        <input type="file" class="form-control-file" name="adhar_card_back_img" id="adhar_card_back_img" value="" oninput="uploadPhoto('adhar_card_back_img')">
                                        <br>
                                        <div id="preview_adhar_card_back_img"></div>
                                    </div>
                                    <div class="col-md-4 d-block" id="partThreeBoard4">
                                        <label for="pan_card" class="form-label">PAN Card</label>
                                        <input type="text" class="form-control" name="pan_card" id="pan_card" value="">
                                    </div>
                                    <div class="col-md-4 d-block" id="partThreeBoard5">
                                        <label for="pan_card_img" class="form-label">Upload PAN Card Photo</label>
                                        <input type="file" class="form-control-file" name="pan_card_img" id="pan_card_img" value="" oninput="uploadPhoto('pan_card_img')">
                                        <br>
                                        <div id="preview_pan_card_img"></div>
                                    </div>
                                
                                    
                                    <div class="col-md-4 d-block" id="partThreeBoard6">
                                        <label for="voter_id_card" class="form-label">Voter ID Number</label>
                                        <input type="text" class="form-control" name="voter_id_card" id="voter_id_card" value="">
                                    </div>
                                    <div class="col-md-4 d-block" id="partThreeBoard7">
                                        <label for="voter_id_card_img" class="form-label">Voter ID Card</label>
                                        <input type="file" class="form-control-file" name="voter_id_card_img" id="voter_id_card_img" value="" oninput="uploadPhoto('voter_id_card_img')">
                                        <br>
                                        <div id="preview_voter_id_card_img"></div>
                                    </div>
                                    <div class="col-md-4 d-block" id="partThreeBoard8">
                                        <label for="voter_id_card_back_img" class="form-label">Voter ID Card (Back Side)</label>
                                        <input type="file" class="form-control-file" name="voter_id_card_back_img" id="voter_id_card_back_img" value="" oninput="uploadPhoto('voter_id_card_back_img')">
                                        <br>
                                        <div id="preview_voter_id_card_back_img"></div>
                                    </div>
                                    <div class="col-md-4 d-block" id="partThreeBoard9">
                                        <label for="user_photo" class="form-label">Live Photo (Clear Face Photo)</label>
                                        <input type="file" class="form-control-file" name="user_photo" id="user_photo" value="" oninput="uploadPhoto('user_photo')">
                                        <br>
                                        <div id="preview_user_photo"></div>
                                    </div>
                                </div>
                                <a href="javascript: void(0);" id="partFourSwitch" class="float-right d-none">Section 4 &#8645;</a>
                                <br>
                                <hr> 

                                <h5 class="d-none" id="partFourTitl">🔹 SECTION 4: Work Details</h5>
                                <div class="row mb-2" id="partFourBoard">
                                    <div class="col-md-3 mb-2 d-none" id="sec_4_1">
                                        <label for="wt_id" class="form-label">Work Type Applying For</label>
                                        <select class="form-control" name="wt_id" id="wt_id" multiple>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-2 d-none" id="sec_4_2">
                                        <label for="work_exp" class="form-label">Work Experience (in years)</label>
                                        <input type="text" class="form-control" name="work_exp" id="work_exp" value="">
                                    </div>
                                    <div class="col-md-3 mb-2 d-none" id="sec_4_3">
                                        <label for="earlier_work_city" class="form-label">Earlier Work City</label>
                                        <input type="text" class="form-control" name="earlier_work_city" id="earlier_work_city" value="">
                                    </div>
                                    <div class="col-md-3 mb-2 d-none" id="sec_4_4">
                                        <label for="last_emplr_name" class="form-label">Last Employer Name (if any)</label>
                                        <input type="text" class="form-control" name="last_emplr_name" id="last_emplr_name" value="">
                                    </div>
                                    
                                    <div class="col-md-3 mb-2 d-none" id="sec_4_5">
                                        <label for="sk_id" class="form-label">Skills (Ctrl+Click)</label>
                                        <select class="form-control" name="sk_id" id="sk_id" multiple>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-2 d-none" id="sec_4_6">
                                        <label for="l_id" class="form-label">Languages Known (Ctrl+Click)</label>
                                        <select class="form-control" name="l_id" id="l_id" multiple>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-2 d-none" id="sec_4_7">
                                        <label for="nr_id" class="form-label">Nurses (Ctrl+Click)</label>
                                        <select class="form-control" name="nr_id" id="nr_id" multiple>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-2 d-none" id="sec_4_8">
                                        <label for="work_loc" class="form-label">Preferred Work Location</label>
                                        <input type="text" class="form-control" name="work_loc" id="work_loc" value="">
                                    </div>
                                    <div class="col-md-3 mb-2 d-none" id="sec_4_9">
                                        <label for="st_id" class="form-label">Stay Type</label>
                                        <select class="form-control" name="st_id" id="st_id">
                                            <option value="0">Select</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-2 d-none" id="sec_4_10">
                                        <label for="wh_id" class="form-label">Working Hours in a Day</label>
                                        <select class="form-control" name="wh_id" id="wh_id">
                                            <option value="0">Select</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-2 d-none" id="sec_4_11">
                                        <label for="religion" class="form-label">Religion</label>
                                        <input type="text" class="form-control" name="religion" id="religion" value="">
                                    </div>
                                    <div class="col-md-3 mb-2 d-none" id="sec_4_12">
                                        <label for="nationality" class="form-label">Nationality</label>
                                        <input type="text" class="form-control" name="nationality" id="nationality" value="">
                                    </div>
                                    <div class="col-md-12 mb-2 d-none" id="sec_4_13">
                                        <label for="family_bg_info" class="form-label">Family Background with Information</label>
                                        <textarea class="form-control" name="family_bg_info" id="family_bg_info"></textarea>
                                    </div>
                                </div>
                                <a href="javascript: void(0);" id="partFiveSwitch" class="float-right">Section 5 &#8645;</a>
                                <br>
                                <hr> 

                                <h5>🔹 SECTION 5: Salary & Availability</h5>
                                <div class="row mb-2" id="partFiveBoard">
                                    <div class="col-md-3">
                                        <label for="exp_salary" class="form-label">Expected Salary (₹)</label>
                                        <input type="text" class="form-control" name="exp_salary" id="exp_salary" value="">
                                    </div> 

                                    <div id="sec_5_1" class="col-md-3 d-none">
                                        <label for="available_from" class="form-label">Available From (date)</label>
                                        <input type="date" class="form-control" name="available_from" id="available_from" value="">
                                    </div>
                                    <div id="sec_5_2" class="col-md-3 d-none">
                                        <label for="wf_id" class="form-label">Weekly Off Required?</label>
                                        <select class="form-control" name="wf_id" id="wf_id">
                                            <option value="0">Select</option>
                                        </select>
                                    </div> 
                                </div>
                                <a href="javascript: void(0);" id="partSixSwitch" class="float-right d-none">Section 6 &#8645;</a>
                                <br>
                                <hr> 

                                <h5 id="partSixTitl" class="d-none">🔹 SECTION 6: Health & Safety</h5>
                                <div class="row mb-2" id="partSixBoard">
                                    <div class="col-md-3 d-none"  id="partSixBoard1">
                                        <label for="il_id" class="form-label">Any Major Illness?</label>
                                        <select class="form-control" name="il_id" id="il_id">
                                            <option value="0">Select</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 d-none" id="partSixBoard2">
                                        <label for="pv_id" class="form-label">Police Verification Done?</label>
                                        <select class="form-control" name="pv_id" id="pv_id">
                                            <option value="0">Select</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 d-none" id="partSixBoard3">
                                        <label for="ch_id" class="form-label">Any Criminal Case History?</label>
                                        <select class="form-control" name="ch_id" id="ch_id">
                                            <option value="0">Select</option>
                                        </select>
                                    </div>
                                </div>
                                <a href="javascript: void(0);" id="partSevenSwitch" class="float-right d-none">Section 7 &#8645;</a>
                                <br>
                                <hr> 

                                <h5 id="partSevenTitl" class="d-none">🔹 SECTION 7: Emergency Contact</h5>
                                <div class="row mb-2" id="partSevenBoard">
                                    <div class="col-md-3 d-none" id="partSevenBoard1">
                                        <label for="emg_cont_person" class="form-label">Emergency Contact Person Name</label>
                                        <input type="text" class="form-control" name="emg_cont_person" id="emg_cont_person" value="">
                                    </div>
                                    <div class="col-md-3 d-none" id="partSevenBoard2">
                                        <label for="relation" class="form-label">Relation</label>
                                        <input type="text" class="form-control" name="relation" id="relation" value="">
                                    </div>
                                    <div class="col-md-3 d-none" id="partSevenBoard3">
                                        <label for="emg_cont_number" class="form-label">Emergency Contact Number</label>
                                        <input type="text" class="form-control" name="emg_cont_number" id="emg_cont_number" value="">
                                    </div>
                                </div>
                                <a href="javascript: void(0);" id="partEightSwitch" class="float-right d-block">Section 8 &#8645;</a>
                                <br>
                                <hr> 
                                
                                <h5 id="partEightTitl" class="d-block">🔹 SECTION 8: Others</h5>
                                <div class="row mb-2" id="partEightBoard">
                                    <div class="col-md-6 d-block" id="partEightBoard1">
                                        <label for="bank_details" class="form-label">Bank Details</label>
                                        <textarea class="form-control" name="bank_details" id="bank_details"></textarea>
                                    </div>
                                    <div class="col-md-6 d-block" id="partEightBoard2">
                                        <label for="highest_edu" class="form-label">Educational Qualification</label>
                                        <textarea class="form-control" name="highest_edu" id="highest_edu"></textarea>
                                    </div>
                                    
                                    <div class="col-md-3 d-block" id="partEightBoard3">
                                        <label for="bank_details_img" class="form-label">Bank Details Image</label>
                                        <input type="file" class="form-control-file" name="bank_details_img" id="bank_details_img" value="" oninput="uploadPhoto('bank_details_img')">
                                        <br>
                                        <div id="preview_bank_details_img"></div>
                                    </div>
                                    <div class="col-md-3 d-block" id="partEightBoard4">
                                        <label for="email_id" class="form-label">Email</label>
                                        <input type="text" class="form-control" name="email_id" id="email_id" value="">
                                    </div>
                                    <div class="col-md-3 d-block" id="partEightBoard5">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" class="form-control" name="username" id="username" value="">
                                    </div>
                                    <div class="col-md-3 d-block" id="partEightBoard6">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="text" class="form-control" name="password" id="password" value="">
                                    </div>
                                    <div class="col-md-3 d-block" id="col_lc_id">
                                        <label for="lc_id" class="form-label">Lead / Confirm</label>
                                        <select class="form-control" name="lc_id" id="lc_id">
                                            <option value="0">Select</option>
                                        </select>
                                    </div>
                                </div>  
                                <a href="javascript: void(0);" id="partNineSwitch" class="float-right">Section 9 &#8645;</a>
                                <br>
                                <hr> 

                                <h5>🔹 SECTION 9: Declaration</h5>
                                <div class="row mb-2" id="partNineBoard">
                                    <div class="col-md-12">
                                        <input type="checkbox" id="declaration" name="declaration" value="" >
                                        <label for="declaration">I confirm that all information given is correct. If any information is false, Saha Enterprise can cancel my registration.</label>
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

            

            <!-- Modal Invoice Send start -->
            <div id="invModalLong" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="invModalLongTitle" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="invoice_ui_title">Monthly Bill of: Client</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="$('#invModalLong').modal('hide')"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-row">
                                <div class="col-md-3 mb-2">
                                    <label for="lc_id" class="form-label text-danger">Month - Year*</label>
                                    <input class="form-control form-control-sm" type="month" id="inv_month" name="inv_month">
                                </div>  
                                
                                <div class="col-md-3 mb-2">
                                    <label for="lc_id" class="form-label">Bill Type(Normal / GST)</label>
                                    <select class="form-control form-control-sm" name="lc_id" id="lc_id">
                                        <option value="1">Normal</option>
                                        <option value="2">GST</option>
                                    </select>
                                </div> 
                                
                                <div class="col-md-3 mb-2">
                                    <label for="terms_condi" class="form-label">Terms & Conditions</label>
                                    <select class="form-control form-control-sm" name="terms_condi" id="terms_condi">
                                        <option value="1">Normal</option>
                                        <option value="2">GST</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-row" id="invoice_ui_label">
                                <div class="col-md-3 mb-2">
                                    <label for="bill_status">INV ID</label>
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="bill_status">From Date</label>
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="bill_status">To Date</label>
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="bill_status">Worker</label>
                                </div>
                                <!-- <div class="col-md-1 mb-2">
                                    <input type="checkbox" id="selectAll"> Send
                                </div>
                                <div class="col-md-1 mb-2">
                                    <input type="checkbox" id="selectAll"> Paid
                                </div> -->
                                
                            </div>

                            <div class="form-row" id="invoice_ui">
                                <div class="col-md-3 mb-2">
                                    <input class="form-control form-control-sm" type="test" id="inv_id" name="inv_id" placeholder="INV ID" readonly>
                                </div>
                                <div class="col-md-3 mb-2">
                                    <input class="form-control form-control-sm" type="test" id="from_date" name="from_date" placeholder="From Date" readonly>
                                </div>
                                <div class="col-md-3 mb-2">
                                    <input class="form-control form-control-sm" type="test" id="to_date" name="to_date" placeholder="To Date" readonly>
                                </div>
                                <div class="col-md-3 mb-2">
                                    <input class="form-control form-control-sm" type="test" id="worker_id" name="worker_id" placeholder="Worker" readonly>
                                </div>
                                <!-- <div class="col-md-1 mb-2">
                                    <input type="checkbox" id="selectAll">
                                </div>
                                <div class="col-md-1 mb-2">
                                    <input type="checkbox" id="selectAll1">
                                </div>                                 -->
                            </div>

                            <!-- Start payment receive section -->
                            <a href="javascript: void(0);" id="paymentSwitch" class="float-right d-block">Payment &#8645;</a>
                            <br>
                            <hr> 
                            <div class="form-row" id="paymentBoard">  
                                <div class="col-md-3 mb-2" id="div_paid_amount1">
                                    <label for="paid_amount" class="text-danger">Amount*</label>
                                    <input type="text" class="form-control form-control-sm" name="paid_amount" id="paid_amount"> 
                                </div>  
                                <div class="col-md-2 mb-2" id="div_payment_mode1">       
                                    <label for="payment_mode">Payment Mode</label>                                 
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="payment_mode">
                                        <label class="custom-control-label" for="payment_mode">Cash/UPI</label>
                                    </div>
                                </div> 
                                <div class="col-md-3 mb-2" id="div_transaction_id1">
                                    <label for="transaction_id">Transaction ID</label>
                                    <input type="text" class="form-control form-control-sm" name="transaction_id" id="transaction_id"> 
                                </div>
                                <div class="col-md-3 mt-4" id="div_rcv_btn1">
                                    <label for="rcv_btn">&nbsp;</label>
                                    <button type="button" class="btn btn-primary btn-sm">Received</button> 
                                </div>
                            </div>
                            <div class="form-row" id="div_p_history1">
                                <h5>Payment Receive History</h5>
                                <div class="col-md-12"> Amount: Rs. 1500/- Received by Cash on 02-Apr-2026 </div>
                                <div class="col-md-12"> Amount: Rs. 500/- Received by UPI on 03-Apr-2026 </div>
                            </div>
                            <!-- End payment section -->
                        </div>

                        <div class="modal-footer">
                            <div class="float-lg-left">Total due till date: Rs. 5000.00</div>
                            <input type="hidden" name="user_id" id="user_id" value="0">
                            
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="$('#invModalLong').modal('hide')">Close</button>
                            <button type="button" class="btn btn-primary">Save & Print</button>
                            <!-- <button class="btn  btn-primary d-block" type="button" id="submitForm">
                                <span class="spinner-border spinner-border-sm" role="status" style="display: none;" id="submitForm_spinner"></span>
                                <span class="load-text" style="display: none;" id="submitForm_spinner_text">Loading...</span>
                                <span class="btn-text" id="submitForm_text">Save</span>
                            </button> -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Invoice Send end -->

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