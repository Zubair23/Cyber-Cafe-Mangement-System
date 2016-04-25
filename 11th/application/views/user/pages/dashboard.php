<div class="right_col" role="main">
		<!-- top tiles -->
		<div class="row top_tiles">
			<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<div class="tile-stats">
					<div class="icon"><i class="fa fa-check-square-o"></i>
					</div>
					<div class="count">
						<?php 
							$user = $this->db->query("SELECT created_on FROM tbl_user WHERE 1");
							$i=0;
							foreach($user->result() as $row)
							{
								$r = substr($row->created_on,0,10);
								if($r == date("Y-m-d"))
									$i++;
							}
							echo $i;
						?>
					</div>

					<h3>New Sign ups</h3>
				</div>
			</div>
			<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<div class="tile-stats">
					<div class="icon"><i class="fa fa-phone"></i>
					</div>
					<div class="count">
						<?php 
							$user = $this->db->query("SELECT created_on FROM tbl_contact WHERE 1");
							$i=0;
							foreach($user->result() as $row)
							{
								$r = substr($row->created_on,0,10);
								if($r == date("Y-m-d"))
									$i++;
							}
							echo $i;
						?>
					</div>

					<h3>New Contacts</h3>
				</div>
			</div>
			<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<div class="tile-stats">
					<div class="icon"><i class="fa fa-user"></i>
					</div>
					<div class="count">
						<?php 
							$user = $this->db->query("SELECT id FROM tbl_user WHERE 1");
							echo $user->num_rows();
						?>
					</div>

					<h3>Total Users</h3>
				</div>
			</div>
			<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<div class="tile-stats">
					<div class="icon"><i class="fa fa-caret-square-o-right"></i>
					</div>
					<div class="count">
						<?php 
							$user = $this->db->query("SELECT last_logged_in FROM tbl_user WHERE 1");
							$i=0;
							foreach($user->result() as $row)
							{
								$r = substr($row->last_logged_in,0,10);
								if($r == date("Y-m-d"))
									$i++;
							}
							echo $i;
						?>
					</div>

					<h3>Today's Visitors</h3>
				</div>
			</div>
		</div>
		<!-- /top tiles -->
		<br/><br/><br/><br/>
		<div class="panel panel-material-cyan-900 col-lg-5">
			<div class="panel-heading">
				<div class="panel-title">
					<i class="fa fa-user"></i>
					Blocked Users
				</div>
			</div>
			<div class="panel-body">
				<ol style = "font-size:18px;">
				<?php
					$name = $this->db->query("SELECT firstname, lastname FROM tbl_user WHERE is_active= 'n'");
					foreach($name->result() as $nm)
					{
				?>
					<a href = "<?php echo base_url()."manageusers"; ?>"><li style = "color:#7949bc"><?php echo $nm->firstname." ".$nm->lastname; ?></li></a>
				<?php } ?>
				</ol>
			</div>
		</div>
		<div class="panel panel-material-cyan-900 col-lg-5 col-lg-offset-1">
			<div class="panel-heading">
				<div class="panel-title">
					<i class="fa fa-phone"></i>
					Blocked Contacts
				</div>
			</div>
			<div class="panel-body">
				<ol style = "font-size:18px;">
				<?php
					$name = $this->db->query("SELECT name FROM tbl_contact WHERE is_active= 'n'");
					foreach($name->result() as $nm)
					{
				?>
					<a href = "<?php echo base_url()."managecontact"; ?>"><li style = "color:#7949bc"><?php echo $nm->name; ?></li></a>
				<?php } ?>
				</ol>
			</div>
		</div>
	</div>
<!-- /page content -->