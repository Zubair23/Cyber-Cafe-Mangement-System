<div class="right_col" role="main">
	<div class="panel panel-primary col-lg-12">
		<div class="panel-heading">
			<div class="panel-title">
				<i class="fa fa-gear"></i>
				General Settings
			</div>
		</div>
		<div class="panel-body">
			<div class = "row">
			<div class = "col-lg-1 col-lg-offset-10">
				<button type = "submit" class = "btn btn-primary"  id = "btnmore" name = "btnmore" data-toggle = "modal" data-target = "#add">
					<i class = "fa fa-plus">  More</i>
				</button>
			</div>
			</div>
			<!--View General Setting-->
			<div class="modal fade" id="add" role = "dialog">	
				<div class='modal-dialog'>
				  <div class='modal-content'>
					<div class='modal-header'>
					  <button type='button' class='close' data-dismiss='modal'>&times;</button>
					  <h4 class='modal-title'>Add More Settings</h4>
					</div>
					<div class='modal-body'>
						<form name="form_addgeneral" id="form_addgeneral" action="<?php echo base_url()."admin/generalsetting";?>" method="post">
						<div class = "form-group">
							<input type="hidden" name="action" value="submit_addgeneral" />
						</div>
						<table class="table table-striped table-hover table-bordered jumbotron">
							<tbody>
								<tr>
									<td>Label Name*</td>
									<td class = "form-group">
										<input type="text" class="form-control" placeholder="Label" 
											name="addlabel" id="addlabel" value = ""/>
									</td>
								</tr>
								<tr>
									<td>Field Type*</td>
									<td class = "form-group">
										<select class = "form-control" name="addfieldtype" id="addfieldtype" onchange = "changetype()">
											<option selected>Select</option>
											<option>text</option>
											<option>file</option>
											<option>textarea</option>
										</select>
									</td>
								</tr>
								<tr>
									<td>Value*</td>
									<td class = "form-group">
										<input type="" class="form-control" placeholder="Value" 
											name="addvalue" id="addvalue" value = ""/>
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
			<!--/View General Setting/-->
			<!--Edit General Setting-->			
				<table class="table table-striped table-hover table-bordered jumbotron">
					<thead>
						<tr>
							<th class = "col-lg-1">Sr No.</th>
							<th class = "col-lg-2">Label Name</th>
							<th class = "col-lg-5">Value</th>
							<th class = "col-lg-4">Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$selectquery = $this->db->query("select * from mst_site_config where 1");
						$i = 1;
						foreach($selectquery->result() as $row)
						{
							if(($row->is_active) != 'd')
							{
					?>
								<form name='form_editgeneral' id='form_editgeneral' action='<?php echo base_url()."admin/generalsetting";?>' method='post' enctype='multipart/form-data'>
										<div class = 'form-group'>
											<input type='hidden' name='action' value='submit_editgeneral' />
										</div>
									<tr>
										<td><?php echo $i; ?></td>
										<td><?php echo $row->label; ?></td>
										<td class = 'form-group'>
										<?php
											if(($row->field_type)!="textarea")
											{
												if(($row->field_type)=="file")
												{
													echo $row->value;
													?>
													<br/>
													<img src = '<?php echo base_url(); ?>themes/admin/assets/images/<?php echo $row->value; ?>' alt = 'Image' height = '150px' width = '150px'/>
													<input type='text' class='form-control' placeholder='Value'
													name='editlogo' id='editlogo' readonly value = '<?php echo $row->value; ?>'/>
												<?php 
												}
												if($row->label == "VAT")
												{
												?>
													<input type='<?php echo $row->field_type;?>' class='form-control' placeholder='Value'
													name='editvalue' id='editvalue' value = '<?php echo $row->value; ?>' onkeypress = 'return numonly(this);'/>
												<?php
												}
												else
												{
												?>
													<input type='<?php echo $row->field_type;?>' class='form-control' placeholder='Value'
													name='editvalue' id='editvalue' value = '<?php echo $row->value; ?>'/>
											<?php
												}
											}
											else
											{
											?>
												<textarea class='form-control' placeholder='TextArea' 
													name='editvalue' id='editvalue' rows = '5' cols = '10' 
													style = 'resize:none;'><?php echo $row->value; ?></textarea>
											<?php
											}
											?>
										</td>
										<td>
											<input type = 'hidden' name = 'rowlabel[]' id = 'rowlabel' value = '<?php echo $row->label; ?>'>
											<button class = 'btn btn-success' name = 'save' id = 'save'>
												<i class='fa fa-save'></i>  Save
											</button>												
									</form>												
											<button class = 'btn btn-danger' name = 'delete' id = 'delete' onclick = 'deletegeneral(<?php echo $row->id; ?>)'>
												<i class='fa fa-trash'></i> Delete
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
			<!--/Edit General Setting/-->
		</div>
	</div>
</div>
<script>	
	function numonly(obj)
	{
		x=(event.which)?event.which:event.keyCode;
		if(x==46 || (x>=48 && x<=57))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	function changetype()
	{
		var option = document.getElementById("addfieldtype").value;
		if(option == "text")
		{
			document.getElementById("addvalue").type = "text";
		}
		else if(option == "file")
		{
			document.getElementById("addvalue").type = "file";
		}
		else if(option == "textarea")
		{
			var input = document.getElementById("addvalue");
			var textarea = document.createElement('textarea');
			textarea.setAttribute('name', input.getAttribute('name'));
			textarea.setAttribute('id', input.getAttribute('id'));
			input.parentNode.replaceChild(textarea, input);
		}
	}
	function deletegeneral(str)
	{
		var message = confirm('Are you sure to delete?');
		$.post("<?php echo base_url(); ?>ajax/ajaxgeneral",{q:str,msg:message},function(data,status){window.location = "";});
	}		
</script>