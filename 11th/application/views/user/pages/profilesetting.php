<div class="right_col" role="main">
	<!-- Edit Profile Starts-->
	<div class = "panel panel-primary col-lg-6" style = "margin-left:40px;margin-top:25px;">
		<div class = "panel-heading">
			<div class = "panel-title">
				<i class="fa fa-edit"></i>
				Edit Profile
			</div>
		</div>
		<div class="panel-body">      
			<form name="form_editprofile" id="form_editprofile" action="<?php echo base_url()."admin/editprofile"; ?>" method="post" enctype="multipart/form-data">
				<div class = "form-group">
					<input type="hidden" name="action" value="submit_editprofile" />
				</div>
				<table class="table table-striped table-hover table-bordered">
					<thead>
						<tr>
							<th class = "col-lg-2">Name</th>
							<th class = "col-lg-10">Value</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$selectquery = $this->db->query("SELECT * FROM tbl_user WHERE email_id = '".$_SESSION['email']."'");
							foreach($selectquery->result() as $val)
							{
						?>
						<tr>
							<td>
								<label class = "control-label">First Name*</label>
							</td>
							<td class = "form-group">
								<input type="text" class="form-control" placeholder="First Name" name="firstname" id="firstname" 
									onkeypress = "return charonly(this);" value = "<?php echo $val->firstname;?>" required />
							</td>
						</tr>
						<tr>
							<td>
								<label class = "control-label">Last Name*</label>
							</td>
							<td class = "form-group">
								<input type="text" class="form-control" placeholder="Last Name" value = "<?php echo $val->lastname;?>" 
									name="lastname" id="lastname" onkeypress = "return charonly(this);" required />
							</td>
						</tr>
						<tr>
							<td>
								<label class = "control-label">Avatar Image*<br/><?php echo (($val->avatar_image) != NULL)?$val->avatar_image:"";?></label>
							</td>
							<td class = "form-group">
								<img src = "<?php echo base_url().ADM_DIR_IMG.$val->avatar_image; ?>" alt = "Image" height = "150px" width = "150px"/>
								<input type="file" class="form-control" name="file" id="file"/>
							</td>
						</tr>
						<tr>
							<td>
								<label class = "control-label">Contact No</label>
							</td>
							<td class = "form-group">
								<input type="text" class="form-control" placeholder="Contact Number" value = "<?php echo $val->contact_no;?>" name="contactno" id="contactno" onkeypress = "return numonly(this);"/>
							</td>
						</tr>
						<?php
							}
						?>
					</tbody>
				</table>
				* indicates required fields
				<div class = "form-group col-lg-offset-4">
					<button class = "btn btn-success" name = "save" id = "save" value = "save">
						<i class="fa fa-save"></i>  Save
					</button>
					<button class = "btn btn-danger" name = "cancel" id = "cancel" value = "cancel">
						<i class="fa fa-close"></i> Cancel
					</button>
				</div>
			</form>
		</div>
	</div>
	<!--Edit Profile Ends-->
	<!-- Change Password Starts-->
	<div class = "panel panel-primary col-lg-4 col-lg-offset-1" style = "height:400px;margin-top:25px;">
		<div class = "panel-heading">
			<div class = "panel-title">
				<i class="fa fa-key"></i>
				Change Password
			</div>
		</div>
		<div class="panel-body">      
			<form name="form_changepassword" id="form_changepassword" action="<?php echo base_url()."admin/changepassword"; ?>" method="post">
				<div class = "form-group">
					<input type="hidden" name="action" value="submit_changepassword" />
				</div><br/>
				<div class = "form-group">
					<input type="password" class="form-control" placeholder="Old Password" name="oldpassword" id="oldpassword" required=""/><br/>
				</div>
				<div class = "form-group">
					<input type="password" class="form-control" placeholder="New Password" name="newpassword" id="newpassword" required="" /><br/>
				</div>
				<div class = "form-group">
					<input type="password" class="form-control" placeholder="Confirm Password" name="confirmpassword" id="confirmpassword" required="" /><br/>
				</div>
				<div class = "form-group col-lg-offset-2">
					<button class = "btn btn-success" name = "change" id = "change" value = "change">
						<i class="fa fa-edit"></i> Change
					</button>
					<button class = "btn btn-danger" name = "cancel" id = "cancel" value = "cancel">
						<i class="fa fa-close"></i> Cancel
					</button>
				</div>
			</form>
		</div>
	</div>
	<!-- Change Password Ends-->
</div>
<script>
	function numonly(obj)
	{
		x=(event.which)?event.which:event.keyCode;
		if(!((x>=48 && x<=57) || x==43 || x==45))
		return false;
	}
	function charonly(obj)
	{
		x=(event.which)?event.which:event.keyCode;
		if(!((x>=97 && x<=122) || (x>=65 && x<=90) || x==32))
		return false;
	}
</script>