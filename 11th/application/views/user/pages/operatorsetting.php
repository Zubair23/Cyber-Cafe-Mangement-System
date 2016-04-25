<div class="right_col" role="main">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<div class="panel-title">
				<i class="fa fa-clipboard"></i>
				Content Settings
			</div>
		</div>
		<div class="panel-body">
			<div class = "row">
			<div class = "col-lg-2 col-lg-offset-10">
				<button class = "btn btn-primary"  id = "btnmore" name = "btnmore" data-toggle = "modal" data-target = "#add">
					<i class = "fa fa-plus">  Add New</i>
				</button>
			</div><br/><br/><br/><br/>
			<table class="table table-striped table-hover table-bordered jumbotron" id = "sortuser">
				<thead>
					<tr>
						<th class = "col-lg-1">Sr No.</th>
						<th class = "col-lg-2">Name</th>
						<th class = "col-lg-2">Email</th>
						<th class = "col-lg-2">Status</th>
						<th class = "col-lg-3">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$selectquery = $this->db->query("SELECT * FROM tbl_user WHERE user_type_id = '3' ORDER BY is_active DESC");
						$i = 1;
						foreach($selectquery->result() as $val)
						{							
							if($val->is_active != 'd')
							{
					?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo $val->firstname." ".$val->lastname; ?></td>
									<td><?php echo $val->email_id; ?></td>
									<td>
										<div class="checkbox">
											<label>	
												<?php
												if($val->is_active == "y")
												{ 
												?> 										
												<input type="checkbox" checked = "" id = "ycheck<?php echo $val->id;?>" onclick = 'ycheck(<?php echo $val->id;?>)'>
												<?php
												}
												else
												{ 
												?>
												<input type="checkbox" id = "ncheck<?php echo $val->id;?>" onclick = 'ncheck(<?php echo $val->id;?>)'>
												<?php 
												} 
												?>
												<span class="checkbox-material">
													<span class="check">
													</span>
												</span>
												Active / Block
											</label>
										</div>
									</td>
									<td>
										<button class = 'btn btn-material-purple-500' name = 'view' data-toggle='modal' 
											onclick = 'showuser(<?php echo $val->id; ?>)' data-target='#view'>
											<i class='fa fa-eye'></i>
										</button>
										<button class = 'btn btn-material-red-700' name = 'delete' 
											onclick = 'deleteuser(<?php echo $val->id; ?>)'>
											<i class='fa fa-trash'></i>
										</button>
									</td>
								</tr>
								<?php
								$i++;
							}
						}
					?>
				</tbody>
			</table>			
		</div>
		</div>
	</div>
	<div class="modal fade" id="add" role = "dialog">	
		<div class='modal-dialog modal-lg'>
		  <div class='modal-content'>
			<div class='modal-header'>
			  <button type='button' class='close' data-dismiss='modal'>&times;</button>
			  <h4 class='modal-title'>Add Operator</h4>
			</div>
			<div class='modal-body'>
				<form name="form_addcontent" id="form_addcontent" action="<?php echo base_url()."index.php/admin/operatorsetting";?>" method="post">
				<div class = "form-group">
					<input type="hidden" name="action" value="submit_addoperator" />
				</div>
				<table class="table table-striped table-hover table-bordered">
					<tbody>
						<tr>
							<td>
								<label class = "control-label" for = "firstname">First Name*</label>
							</td>
							<td class = "form-group">
								<input type="text" class="form-control" placeholder="First Name" name="firstname" id="firstname" 
									value = "" required />
							</td>
						</tr>
						<tr>
							<td>
								<label class = "control-label" for = "lastname">Last Name*</label>
							</td>
							<td class = "form-group">
								<input type="text" class="form-control" placeholder="Last Name" name="lastname" id="lastname" 
									value = "" required />
							</td>
						</tr>
						<tr>
							<td>
								<label class = "control-label" for = "email">Email*</label>
							</td>
							<td class = "form-group">
								<input type="text" class="form-control" placeholder="Email" name="email" id="email" 
									value = "" required />
							</td>
						</tr>
						<tr>
							<td>
								<label class = "control-label" for = "password">Password*</label>
							</td>
							<td class = "form-group">
								<input type="text" class="form-control" placeholder="Password" value = "" 
									name="password" id="password" required />
							</td>
						</tr>
						<tr>
							<td>
								<label class = "control-label" for = "repassword">Re-Type Password*</label>
							</td>
							<td class = "form-group">
								<input type="text" class="form-control" placeholder="Re-Type Password" value = "" 
									name="repassword" id="repassword" required />
							</td>
						</tr>
					</tbody>
				</table>
				* indicates mandatory fields
				<div class = "form-group col-lg-offset-3">
					<button class = "btn btn-success" name = "add" id = "add">
						<i class="fa fa-plus"></i>  Add
					</button>
					<button type='button' class='btn btn-danger' data-dismiss='modal'>
						<i class="fa fa-close"></i>  Cancel
					</button>
				</div>
			</form>
			</div>
		  </div>		  
		</div>
	</div>
	<div class="modal fade" id="view" role = "dialog">	
		<div class='modal-dialog modal-lg'>
		  <div class='modal-content'>
			<div class='modal-header'>
			  <button type='button' class='close' data-dismiss='modal'>&times;</button>
			  <h4 class='modal-title'>View Operator</h4>
			</div>
			<div class='modal-body'>
				<table class="table table-striped table-hover table-bordered">
					<tbody>
						<!--<tr>
							<td colspan = 2  id="viewimage" align = "center">
								<img src = "" alt = "Image" width = "150px" height = "150px">
							</td>
						</tr>-->
						<tr>
							<td>
								<label for = "viewname">Name</label>
							</td>
							<td id="viewname"></td>
						</tr>
						<tr>
							<td>
								<label for = "viewusertype">User Type</label>
							</td>
							<td id="viewusertype"></td>
						</tr>
						<tr>
							<td>
								<label for = "viewemail">Email Id</label>
							</td>
							<td id="viewemail"></td>
						</tr>
						<!-- <tr>
							<td>
								<label for = "viewcontact">Contact Number</label>
							</td>
							<td id="viewcontact"></td>
						</tr> -->
						<tr>
							<td>
								<label for = "viewcreated">Account Created On</label>
							</td>
							<td id="viewcreated"></td>
						</tr>
						<tr>
							<td>
								<label for = "viewupdated">Account Updated On</label>
							</td>
							<td id="viewupdated"></td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class='modal-footer'>
			  <button type='button' class='btn btn-info' data-dismiss='modal'>Close</button>
			</div>
		  </div>		  
		</div>
	</div>
	<div class="modal fade" id="edit" role = "dialog">	
		<div class='modal-dialog modal-lg'>
		  <div class='modal-content'>
			<div class='modal-header'>
			  <button type='button' class='close' data-dismiss='modal'>&times;</button>
			  <h4 class='modal-title'>Edit Page Content</h4>
			</div>
			<div class='modal-body'>
				<form name="form_editcontent" id="form_editcontent" action="<?php echo base_url()."admin/contentsetting";?>" method="post">
				<div class = "form-group">
					<input type="hidden" name="action" value="submit_editcontent" />
				</div>
				<table class="table table-striped table-hover table-bordered">
					<tbody>
						<input type = "hidden" name = "editsrno" id = "editsrno" value = "">
						<tr>
							<td>
								<label class = "control-label" for = "editname">Page Name*</label>
							</td>
							<td class = "form-group">
								<input type="text" class="form-control" placeholder="Page Name" name="editname" id="editname" 
									value = "" required = "required" readonly = "readonly"/>
							</td>
						</tr>
						<tr>
							<td>
								<label class = "control-label" for = "edittitle">Page Title*</label>
							</td>
							<td class = "form-group">
								<input type="text" class="form-control" placeholder="Page Title" value = "" 
									name="edittitle" id="edittitle" required />
							</td>
						</tr>
						<tr>
							<td>
								<label class = "control-label" for = "editpagedes">Page Description</label>
							</td>
							<td class = "form-group">
								<textarea class = "summernote" id = "editpagedes" name = "editpagedes"></textarea>
							</td>
						</tr>
					</tbody>
				</table>
				* indicates mandatory fields
				<div class = "form-group col-lg-offset-3">
					<button class = "btn btn-success" name = "save" id = "save">
						<i class="fa fa-save"></i>  Save
					</button>
					<button type='button' class='btn btn-danger' data-dismiss='modal'>
						<i class="fa fa-close"></i>  Cancel
					</button>
				</div>
			</form>
			</div>
		  </div>		  
		</div>
	</div>
</div>
<script>
"use strict";
	function ycheck(str)
	{		
		document.getElementById("ycheck"+str).removeAttribute("checked");
		$.post("<?php echo base_url(); ?>index.php/ajax/ajaxuser",{id:str, action:"activetrue"},function(data, status){});
	}
	function ncheck(str)
	{
		document.getElementById("ncheck"+str).setAttribute("checked","checked");
		$.post("<?php echo base_url(); ?>index.php/ajax/ajaxuser",{id:str, action:"activefalse"},function(data, status){});
	}
	function showuser(str)
	{
		$.post("<?php echo base_url(); ?>index.php/ajax/ajaxuser",{id:str, action:"show"},function(data,status){
			//$("#viewimage").html("<img src = '<?php echo base_url().ADM_DIR_IMG;?>"+data.avatar_image+"' alt = 'Image' width = '150px' height = '150px'>"+"<br>"+data.avatar_image);
			$("#viewname").html(data.firstname+" "+data.lastname);
			if(data.type_name==3)
			{
				$("#viewusertype").html('Operator');
			}
			else{
				$("#viewusertype").html('Operator');
			}
			$("#viewemail").html(data.email_id);
			// $("#viewcontact").html(data.contact_no);
			$("#viewcreated").html(data.created_on);
			$("#viewupdated").html(data.updated_on);
		},'json');
	}
	function deleteuser(str)
	{
		var message = confirm('Are you sure to delete?');
		$.post("<?php echo base_url(); ?>index.php/ajax/ajaxuser",{id:str, msg:message, action:"del"},function(data, status){window.location = "";});
	}
</script>