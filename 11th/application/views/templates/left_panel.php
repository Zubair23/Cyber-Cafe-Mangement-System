<div class="col-md-3 left_col">
	<div class="left_col scroll-view">
		<div class="navbar nav_title" style="border: 0;">
			<a href="<?php echo base_url()."index.php/admin/dashboard"; ?>" class="site_title">
				<i class="fa fa-cab"></i>
				<span>The Titania Van</span>
			</a>
		</div>
		<div class="clearfix"></div>
		
		<!-- menu prile quick info -->
		<div>
			<div><br/><br/>
				<h5 style = "font-family:verdana;color:#81F7D8;"><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;Welcome, ".$firstname;?></h5>
			</div>
		</div>
		<!-- /menu prile quick info -->


		<!-- sidebar menu -->
		<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
			<div class="menu_section">
				<ul class="nav side-menu">
					<li>
						<a href = "<?php echo base_url()."index.php/admin/dashboard"; ?>">
							<i class="fa fa-home"></i> 
							Home
						</a>
					</li>
					<li>
						<a href="<?php echo base_url()."index.php/admin/generalsetting";?>">
							<i class="fa fa-gear"></i>
							General Settings
						</a>
					</li>
					<li>
						<a href="<?php echo base_url()."index.php/admin/contentsetting";?>">
							<i class="fa fa-clipboard"></i>
							Content Settings
						</a>
					</li>
					<li>
						<a href = "<?php echo base_url()."index.php/admin/profilesetting"; ?>">
							<i class="fa fa-lock"></i>Profile Settings
						</a>
					</li>
					<li>
						<a href = "<?php echo base_url()."index.php/admin/manageemail"; ?>">
							<i class="fa fa-envelope"></i>Email Templates
						</a>
					</li>
					<li>
						<a href = "<?php echo base_url()."index.php/admin/managesms"; ?>">
							<i class="fa fa-comment"></i>SMS Templates
						</a>
					</li>
					<li>
						<a href = "<?php echo base_url()."index.php/admin/manageusers"; ?>">
							<i class="fa fa-user"></i>User Management
						</a>
					</li>
					<li>
						<a href="<?php echo base_url()."index.php/admin/operatorsetting";?>">
							<i class="fa fa-clipboard"></i>
							Operator Management
						</a>
					</li>
					<li>
						<a href = "<?php echo base_url()."index.php/admin/managecategory"; ?>">
							<i class="fa fa-list"></i>Category Management
						</a>
					</li>
					<li>
						<a href = "<?php echo base_url()."index.php/admin/managedocument"; ?>">
							<i class="fa fa-file"></i>Document Management
						</a>
					</li>
					<li>
						<a href = "<?php echo base_url()."index.php/admin/managebooking"; ?>">
							<i class="fa fa-book"></i>Booking Management
						</a>
					</li>
					<li>
						<a href = "<?php echo base_url()."index.php/admin/managefaq"; ?>">
							<i class="fa fa-question-circle"></i>FAQ Management
						</a>
					</li>
					<li>
						<a href = "<?php echo base_url()."index.php/admin/managecontact"; ?>">
							<i class="fa fa-phone"></i>Contact Management
						</a>
					</li>
					<li>
						<a href = "<?php echo base_url()."index.php/admin/logout"; ?>">
							<i class="fa fa-sign-out"></i>Logout
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>
