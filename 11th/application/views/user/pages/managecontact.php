<div class="right_col" role="main">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<div class="panel-title">
				<i class="fa fa-phone"></i>
				Contact Management
			</div>
		</div>
		<div class="panel-body">
			<table class="table table-striped table-hover table-bordered jumbotron" id = "sortcontact">
				<thead>
					<tr>
						<th class = "col-lg-1">Sr No.</th>
						<th class = "col-lg-3">Name</th>
						<th class = "col-lg-3">Email</th>
						<th class = "col-lg-2">Status</th>
						<th class = "col-lg-3">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$selectquery = $this->db->query("SELECT * FROM tbl_contact WHERE 1 ORDER BY is_active DESC");
						$i = 1;
						foreach($selectquery->result() as $val)
						{							
							if($val->is_active != 'd')
							{
					?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo $val->name; ?></td>
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
											onclick = 'showcontact(<?php echo $val->id; ?>)' data-target='#view'>
											<i class='fa fa-eye'></i>
										</button>
										<button class = 'btn btn-material-red-700' name = 'delete' 
											onclick = 'deletecontact(<?php echo $val->id; ?>)'>
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
			  <h4 class='modal-title'>View Contact</h4>
			</div>
			<div class='modal-body'>
				<table class="table table-striped table-hover table-bordered">
					<tbody>
						<tr>
							<td>
								<label for = "viewname">Name</label>
							</td>
							<td id="viewname"></td>
						</tr>
						<tr>
							<td>
								<label for = "viewemail">Email Id</label>
							</td>
							<td id="viewemail"></td>
						</tr>
						<tr>
							<td>
								<label for = "viewemessage">Message</label>
							</td>
							<td id="viewmessage"></td>
						</tr>
						<tr>
							<td>
								<label for = "viewcreated">Contacted On</label>
							</td>
							<td id="viewcreated"></td>
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
		$.post("<?php echo base_url(); ?>ajax/ajaxcontact",{id:str, action:"activetrue"},function(data, status){});
	}
	function ncheck(str)
	{
		document.getElementById("ncheck"+str).setAttribute("checked","checked");
		$.post("<?php echo base_url(); ?>ajax/ajaxcontact",{id:str, action:"activefalse"},function(data, status){});
	}
	function showcontact(str)
	{
		$.post("<?php echo base_url(); ?>ajax/ajaxcontact",{id:str, action:"show"},function(data,status){
			$("#viewname").html(data.name);
			$("#viewemail").html(data.email_id);
			$("#viewmessage").html(data.message);
			$("#viewcreated").html(data.created_on);
		},'json');
	}
	function deletecontact(str)
	{
		var message = confirm('Are you sure to delete?');
		$.post("<?php echo base_url(); ?>ajax/ajaxcontact",{id:str, msg:message, action:"del"},function(data, status){}
		);
	}
</script>