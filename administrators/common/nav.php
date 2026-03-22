<?php  
$sess_user_type = $_SESSION["user_type"];

?>
<nav class="pcoded-navbar ">
		<div class="navbar-wrapper">
			<div class="navbar-content scroll-div" id="nav_bar">
				
				<!-- <div class="">
					<div class="main-menu-header">
						<img class="img-radius" src="assets/images/user/avatar-4.jpg" alt="User-Profile-Image">
						<div class="user-details">
							<span>Kundan Saha</span>
							<div id="more-details">CEO<i class="fa fa-chevron-down m-l-5"></i></div>
						</div>
					</div>
					<div class="collapse" id="nav-user-link">
						<ul class="list-unstyled">
							<li class="list-group-item"><a href="#!"><i class="feather icon-user m-r-5"></i>View Profile</a></li>
							<li class="list-group-item"><a href="#!"><i class="feather icon-settings m-r-5"></i>Settings</a></li>
							<li class="list-group-item"><a href="#!"><i class="feather icon-log-out m-r-5"></i>Logout</a></li>
						</ul>
					</div>
				</div> -->
				
				<ul class="nav pcoded-inner-navbar " >
					<li class="nav-item <?php if($p == 'dashboard'){ ?> active <?php } ?>">
					    <a href="?p=dashboard" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
					</li>

					<li class="nav-item pcoded-menu-caption" id="setup">
						<label>SETUP</label>
					</li>
					<li class="nav-item <?php if($p == 'maid_request'){ ?> active <?php } ?>">
					    <a href="?p=maid_request&gr=setup" class="nav-link "><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">Maid Request List</span></a>
					</li>
					<li class="nav-item <?php if($p == 'services'){ ?> active <?php } ?>">
					    <a href="?p=services&gr=setup" class="nav-link "><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">Services</span></a>
					</li>
					<?php if($sess_user_type == '1' || $sess_user_type == '2' || $sess_user_type == '3'){?>
					<li class="nav-item <?php if($p == 'users'){ ?> active <?php } ?>">
					    <a href="?p=users&gr=setup" class="nav-link "><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">Users</span></a>
					</li>
					<?php } ?>
					<?php if($sess_user_type == '1' || $sess_user_type == '2' || $sess_user_type == '3'){?>
					<li class="nav-item <?php if($p == 'attendance'){ ?> active <?php } ?>">
					    <a href="?p=attendance&gr=setup" class="nav-link "><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">Attendance</span></a>
					</li>
					<?php } ?>

					<!-- <li class="nav-item pcoded-hasmenu <?php if($p == 'deposit' || $p == 'loan'){ ?> active pcoded-trigger <?php } ?>">
					    <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-layout"></i></span><span class="pcoded-mtext">Product</span></a>
					    <ul class="pcoded-submenu">
					        <li <?php if($p == 'deposit'){ ?> class="active" <?php } ?> ><a href="?p=deposit&gr=setup">Deposit</a></li>
					        <li <?php if($p == 'loan'){ ?> class="active" <?php } ?> ><a href="?p=loan&gr=setup" >Loan</a></li>
					    </ul>
					</li>

					<li class="nav-item pcoded-hasmenu <?php if($p == 'member' || $p == 'group' || $p == 'staff' || $p == 'member_kyc_form'){ ?> active pcoded-trigger <?php } ?>">
						<a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-layout"></i></span><span class="pcoded-mtext">Profile</span></a>
						<ul class="pcoded-submenu">
							<li <?php if($p == 'member'){ ?> class="active" <?php } ?>><a href="?p=member&gr=setup">Member</a></li>
							<li <?php if($p == 'group'){ ?> class="active" <?php } ?>><a href="?p=group&gr=setup">Group</a></li>
							<li <?php if($p == 'staff'){ ?> class="active" <?php } ?>><a href="?p=staff&gr=setup">Staff</a></li>
							<li <?php if($p == 'member_kyc_form'){ ?> class="active" <?php } ?>><a href="?p=member_kyc_form&gr=setup">Member KYC Form</a></li>
						</li>						
						</ul>
					</li>

					<li class="nav-item <?php if($p == 'commission_setup'){ ?> active <?php } ?>">
					    <a href="?p=commission_setup&gr=setup" class="nav-link "><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">Commission Setup</span></a>
					</li>

					<li class="nav-item <?php if($p == 'extra_information'){ ?> active <?php } ?>">
					    <a href="?p=extra_information&gr=setup" class="nav-link "><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">Extra Information</span></a>
					</li>-->								

				</ul>				
				
			</div>
		</div>
	</nav>