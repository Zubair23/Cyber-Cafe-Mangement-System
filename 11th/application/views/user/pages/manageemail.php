<div class="right_col" role="main">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<div class="panel-title">
				<i class="fa fa-envelope"></i>
				Manage Email
			</div>
		</div>
		<div class="panel-body">
			<div class = "row">
			<div class = "col-lg-2 col-lg-offset-10">
				<button class = "btn btn-primary"  id = "btnmore" name = "btnmore" data-toggle = "modal" data-target = "#add">
					<i class = "fa fa-plus">  Email</i>
				</button>
			</div><br/><br/><br/><br/>
			<table class="table table-striped table-hover table-bordered jumbotron" id = "sortcontent">
				<thead>
					<tr>
						<th class = "col-lg-1">Sr No.</th>
						<th class = "col-lg-2">Email Type</th>
						<th class = "col-lg-2">Subject</th>
						<th class = "col-lg-3">Message</th>
						<th class = "col-lg-2">Status</th>
						<th class = "col-lg-2">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$selectquery = $this->db->query("SELECT * FROM tbl_email WHERE 1 ORDER BY is_active DESC");
						$i = 1;
						foreach($selectquery->result() as $row)
						{
							if($row->is_active != 'd')
							{
					?>
								<tr id="row_<?php echo $row->id;?>">
									<td><?php echo $i; ?></td>
									<td><?php echo $row->email_type; ?></td>
									<td><?php echo $row->subject; ?></td>
									<td><?php echo $row->message; ?></td>
									<td>
										<div class="checkbox">
											<label>	
												<?php
												if($row->is_active == "y")
												{ 
												?> 										
												<input type="checkbox" checked = "" id = "ycheck<?php echo $row->id; ?>" onclick = 'ycheck(<?php echo $row->id; ?>)'>
												<?php
												}
												else
												{ 
												?>
												<input type="checkbox" id = "ncheck<?php echo $row->id;?>" onclick = 'ncheck(<?php echo $row->id;?>)'>
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
										<button class = 'btn btn-material-blue-500' name = 'edit'
											 onclick = 'editemail(<?php echo $row->id; ?>)' data-toggle='modal' data-target='#edit'>
											<i class='fa fa-pencil'></i>
										</button>
										
										<!-- Use of data-rowid and data-remove to call AJAX -->
										<span class = 'btn btn-material-red-700 btn_delete_email' name = 'delete' data-rowid = '<?php echo $row->id; ?>' data-remove="row_<?php echo $row->id;?>">
											<i class='fa fa-trash'></i>
										</span>
										<?php
											//}
										?>
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
			  <h4 class='modal-title'>Add Email</h4>
			</div>
			<div class='modal-body'>
				<form name="form_addemail" id="form_addemail" action="<?php echo base_url()."admin/manageemail";?>" method="post">
				<div class = "form-group">
					<input type="hidden" name="action" value="submit_addemail" />
				</div>
				<table class="table table-striped table-hover table-bordered">
					<tbody>
						<tr>
							<td>
								<label class = "control-label" for = "addtype">Email Type*</label>
							</td>
							<td class = "form-group">
								<input type="text" placeholder = "Email Type" class="form-control" name="addtype" id="addtype" required />
							</td>
						</tr>
						<tr>
							<td>
								<label class = "control-label" for = "addsubject">Subject*</label>
							</td>
							<td class = "form-group">
								<input type="text" placeholder = "Subject" class="form-control" name="addsubject" id="addsubject" required />
							</td>
						</tr>
						<tr>
							<td>
								<label class = "control-label" for = "addmessage">Message*</label>
							</td>
							<td class = "form-group">
								<textarea class = "summernote" id = "addmessage" name = "addmessage" ></textarea>
							</td>
						</tr>
					</tbody>
				</table>
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
	<div class="modal fade" id="edit" role = "dialog">	
		<div class='modal-dialog modal-lg'>
		  <div class='modal-content'>
			<div class='modal-header'>
			  <button type='button' class='close' data-dismiss='modal'>&times;</button>
			  <h4 class='modal-title'>Edit Email</h4>
			</div>
			<div class='modal-body'>
				<form name="form_editemail" id="form_editemail" action="<?php echo base_url()."admin/manageemail";?>" method="post">
				<div class = "form-group">
					<input type="hidden" name="action" value="submit_editemail" />
				</div>
				<table class="table table-striped table-hover table-bordered">
					<tbody>
						<input type = "hidden" name = "editsrno" id = "editsrno" value = "">
						<tr>
							<td>
								<label class = "control-label" for = "edittype">Email Type*</label>
							</td>
							<td class = "form-group">
								<input type="text" class="form-control" placeholder = "Email Type" name="edittype" id="edittype" readonly required />
							</td>
						</tr>
						<tr>
							<td>
								<label class = "control-label" for = "editsubject">Subject*</label>
							</td>
							<td class = "form-group">
								<input type="text" placeholder = "Subject" class="form-control" name="editsubject" id="editsubject" readonly required />
							</td>
						</tr>
						<tr>
							<td>
								<label class = "control-label" for = "editmessage">Message*</label>
							</td>
							<td class = "form-group">
								<textarea class = "summernote" id = "editmessage" name = "editmessage" ></textarea>
							</td>
						</tr>
					</tbody>
				</table>
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
	function ycheck(str)
	{		
		document.getElementById("ycheck"+str).removeAttribute("checked");
		$.post("<?php echo base_url(); ?>ajax/ajaxdemo/ajaxmanageemail/activetrue/"+str,{},function(data, status){/*dyn_notice();*/});
	}
	function ncheck(str)
	{
		document.getElementById("ncheck"+str).setAttribute("checked","checked");
		$.post("<?php echo base_url(); ?>ajax/ajaxdemo/ajaxmanageemail/activefalse/"+str,{},function(data, status){/*dyn_notice();*/});
	}
	function editemail(str)
	{
		$.post("<?php echo base_url(); ?>ajax/ajaxdemo/ajaxmanageemail/edit/"+str,{},function(data,status){
			if(data['status'] == 'true')
			{
				$("#editsrno").val(data['result'][0]['id']);
				$("#edittype").val(data['result'][0]['email_type']);
				$("#editsubject").val(data['result'][0]['subject']);
				$("#editmessage").code(data['result'][0]['message']);
			}
		},'json');
	}
</script>