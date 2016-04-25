<div class="right_col" role="main">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<div class="panel-title">
				<i class="fa fa-edit"></i>
				Manage FAQ
			</div>
		</div>
		<div class="panel-body">
			<div class = "row">
			<div class = "col-lg-2 col-lg-offset-10">
				<button class = "btn btn-primary"  id = "btnmore" name = "btnmore" data-toggle = "modal" data-target = "#add">
					<i class = "fa fa-plus">  FAQ</i>
				</button>
			</div><br/><br/><br/><br/>
			<table class="table table-striped table-hover table-bordered jumbotron" id = "sortcontent">
				<thead>
					<tr>
						<th class = "col-lg-1">Sr No.</th>
						<th class = "col-lg-2">Question</th>
						<th class = "col-lg-3">Answer</th>
						<th class = "col-lg-3">Status</th>
						<th class = "col-lg-3">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$selectquery = $this->db->query("SELECT * FROM tbl_faq WHERE 1 ORDER BY is_active DESC");
						$i = 1;
						foreach($selectquery->result() as $row)
						{
							if($row->is_active != 'd')
							{
					?>
								<tr id="row_<?php echo $row->id;?>">
									<td><?php echo $i; ?></td>
									<td><?php echo $row->question; ?></td>
									<td><?php echo $row->answer; ?></td>
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
											 onclick = 'editfaq(<?php echo $row->id; ?>)' data-toggle='modal' data-target='#edit'>
											<i class='fa fa-pencil'></i>
										</button>
										
										<!-- Use of data-rowid and data-remove to call AJAX -->
										<span class = 'btn btn-material-red-700 btn_delete_faq' name = 'delete' data-rowid = '<?php echo $row->id; ?>' data-remove="row_<?php echo $row->id;?>">
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
			  <h4 class='modal-title'>Add FAQ</h4>
			</div>
			<div class='modal-body'>
				<form name="form_addfaq" id="form_addfaq" action="<?php echo base_url()."admin/managefaq";?>" method="post">
				<div class = "form-group">
					<input type="hidden" name="action" value="submit_addfaq" />
				</div>
				<table class="table table-striped table-hover table-bordered">
					<tbody>
						<tr>
							<td>
								<label class = "control-label" for = "addque">Question*</label>
							</td>
							<td class = "form-group">
								<input type="text" class="form-control" name="addque" id="addque" required />
							</td>
						</tr>
						<tr>
							<td>
								<label class = "control-label" for = "addans">Answer*</label>
							</td>
							<td class = "form-group" required>
								<textarea class = "summernote" id = "addans" name = "addans" ></textarea>
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
			  <h4 class='modal-title'>Edit FAQ</h4>
			</div>
			<div class='modal-body'>
				<form name="form_editfaq" id="form_editfaq" action="<?php echo base_url()."admin/managefaq";?>" method="post">
				<div class = "form-group">
					<input type="hidden" name="action" value="submit_editfaq" />
				</div>
				<table class="table table-striped table-hover table-bordered">
					<tbody>
						<input type = "hidden" name = "editsrno" id = "editsrno" value = "">
						<tr>
							<td>
								<label class = "control-label" for = "editque">Question*</label>
							</td>
							<td class = "form-group">
								<input type="text" class="form-control" placeholder = "Question" name="editque" id="editque" required />
							</td>
						</tr>
						<tr>
							<td>
								<label class = "control-label" for = "editans">Answer*</label>
							</td>
							<td class = "form-group">
								<textarea class = "summernote" id = "editans" name = "editans"></textarea>
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
		$.post("<?php echo base_url(); ?>ajax/ajaxdemo/ajaxmanagefaq/activetrue/"+str,{},function(data, status){/*dyn_notice();*/});
	}
	function ncheck(str)
	{
		document.getElementById("ncheck"+str).setAttribute("checked","checked");
		$.post("<?php echo base_url(); ?>ajax/ajaxdemo/ajaxmanagefaq/activefalse/"+str,{},function(data, status){/*dyn_notice();*/});
	}
	function editfaq(str)
	{
		$.post("<?php echo base_url(); ?>ajax/ajaxdemo/ajaxmanagefaq/edit/"+str,{},function(data,status){
			if(data['status'] == 'true')
			{
				$("#editsrno").val(data['result'][0]['id']);
				$("#editque").val(data['result'][0]['question']);
				$("#editans").code(data['result'][0]['answer']);
			}
		},'json');
	}
</script>