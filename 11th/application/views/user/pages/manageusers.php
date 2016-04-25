<div class="right_col" role="main">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<div class="panel-title">
				<i class="fa fa-user"></i>
				User Management
			</div>
		</div>
		<div class="panel-body">
			<table class="table table-striped table-hover table-bordered jumbotron" id = "sortuser">
				<thead>
					<tr>
						<th class = "col-lg-1">Sr No.</th>
						<th class = "col-lg-2">Name</th>
						<th class = "col-lg-2">Profile Picture</th>
						<th class = "col-lg-2">Email</th>
						<th class = "col-lg-2">Status</th>
						<th class = "col-lg-3">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$selectquery = $this->db->query("SELECT * FROM tbl_user WHERE user_type_id = '2' ORDER BY is_active DESC");
						$i = 1;
						foreach($selectquery->result() as $val)
						{							
							if($val->is_active != 'd')
							{
					?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo $val->firstname." ".$val->lastname; ?></td>
									<td><?php echo $val->avatar_image; ?><br/>
										<img src = '<?php echo base_url().FRONT_DIR_UPLOAD.$val->id.'/'.$val->avatar_image; ?>' alt = 'Image' width = '150px' height = '150px'>
									</td>
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
	<div class="modal fade" id="view" role = "dialog">	
		<div class='modal-dialog modal-lg'>
		  <div class='modal-content'>
			<div class='modal-header'>
			  <button type='button' class='close' data-dismiss='modal'>&times;</button>
			  <h4 class='modal-title'>View Users</h4>
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
						<tr>
							<td>
								<label for = "viewcontact">Contact Number</label>
							</td>
							<td id="viewcontact"></td>
						</tr>
						<tr>
							<td>
								<label for = "viewlicence">Licence Number</label>
							</td>
							<td id="viewlicence"></td>
						</tr>
						<tr>
							<td>
								<label for = "viewinsurance">Insurance Number</label>
							</td>
							<td id="viewinsurance"></td>
						</tr>
						<tr>
							<td>
								<label for = "viewvehicleinfo">Vehicle Type - <br/>Registration No</label>
							</td>
							<td id="viewvehicleinfo"></td>
						</tr>
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
</div>
<script>
"use strict";
	function ycheck(str)
	{		
		document.getElementById("ycheck"+str).removeAttribute("checked");
		$.post("<?php echo base_url(); ?>ajax/ajaxuser",{id:str, action:"activetrue"},function(data, status){});
	}
	function ncheck(str)
	{
		document.getElementById("ncheck"+str).setAttribute("checked","checked");
		$.post("<?php echo base_url(); ?>ajax/ajaxuser",{id:str, action:"activefalse"},function(data, status){});
	}
	function showuser(str)
	{
		$.post("<?php echo base_url(); ?>ajax/ajaxuser",{id:str, action:"show"},function(data,status){
			document.getElementById("viewvehicleinfo").innerHTML = "";
			//$("#viewimage").html("<img src = '<?php echo base_url().ADM_DIR_IMG;?>"+data.avatar_image+"' alt = 'Image' width = '150px' height = '150px'>"+"<br>"+data.avatar_image);
			$("#viewname").html(data.firstname+" "+data.lastname);
			$("#viewusertype").html(data.type_name);
			$("#viewemail").html(data.email_id);
			$("#viewcontact").html(data.contact_no);
			$("#viewlicence").html(data.licence_no);
			$("#viewinsurance").html(data.insurance_no);
			var v = data.vehicle_name.split(",");
			var r = data.registration_no.split(",");
			for(var i = 0; i < (v.length); i++)
			{
				$("#viewvehicleinfo").append(v[i]+" - "+r[i]+"<br/>");
			}
			$("#viewcreated").html(data.created_on);
			$("#viewupdated").html(data.updated_on);
		},'json');
	}
	function deleteuser(str)
	{
		var message = confirm('Are you sure to delete?');
		$.post("<?php echo base_url(); ?>ajax/ajaxuser",{id:str, msg:message, action:"del"},function(data, status){window.location = "";});
	}
</script>