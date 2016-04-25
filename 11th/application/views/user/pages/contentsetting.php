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
					<i class = "fa fa-plus">  Page</i>
				</button>
			</div><br/><br/><br/><br/>
			<table class="table table-striped table-hover table-bordered jumbotron" id = "sortcontent">
				<thead>
					<tr>
						<th class = "col-lg-1">Sr No.</th>
						<th class = "col-lg-2">Page Name</th>
						<th class = "col-lg-3">Page Title</th>
						<th class = "col-lg-3">Status</th>
						<th class = "col-lg-3">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$selectquery = $this->db->query("SELECT * FROM tbl_cms WHERE 1 ORDER BY is_active DESC");
						$i = 1;
						foreach($selectquery->result() as $row)
						{
							if($row->is_active != 'd')
							{
					?>
								<tr id="row_<?php echo $row->id;?>">
									<td><?php echo $i; ?></td>
									<td><?php echo $row->page_name; ?></td>
									<td><?php echo $row->page_title; ?></td>
									<td>
									 <!-- Code of is_editable<?php //if(($row->is_editable) == 'n'){echo "It is not editable.";} ?>-->
										<div class="checkbox" <?php //if(($row->is_editable) == 'n'){echo "style = 'visibility:hidden;'";}?>>
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
										<button class = 'btn btn-material-purple-500' name = 'view' data-toggle='modal' 
											onclick = 'showpage(<?php echo $row->id; ?>)' data-target='#view'>
											<i class='fa fa-eye'></i>
										</button>
										<?php
											//code of is_editable
											/* if(($row->is_editable) == 'y')
											{ */
										?>
										<button class = 'btn btn-material-blue-500' name = 'edit'
											 onclick = 'editpage(<?php echo $row->id; ?>)' data-toggle='modal' data-target='#edit'>
											<i class='fa fa-pencil'></i>
										</button>
										
										<!-- Use of data-rowid and data-remove to call AJAX -->
										<span class = 'btn btn-material-red-700 btn_delete' name = 'delete' data-rowid = '<?php echo $row->id; ?>' data-remove="row_<?php echo $row->id;?>">
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
			  <h4 class='modal-title'>Add Page Content</h4>
			</div>
			<div class='modal-body'>
				<form name="form_addcontent" id="form_addcontent" action="<?php echo base_url()."index.php/admin/contentsetting";?>" method="post">
				<div class = "form-group">
					<input type="hidden" name="action" value="submit_addcontent" />
				</div>
				<table class="table table-striped table-hover table-bordered">
					<tbody>
						<tr>
							<td>
								<label class = "control-label" for = "addname">Page Name*</label>
							</td>
							<td class = "form-group">
								<input type="text" class="form-control" placeholder="Page Name" name="addname" id="addname" 
									value = "" required />
							</td>
						</tr>
						<tr>
							<td>
								<label class = "control-label" for = "addtitle">Page Title*</label>
							</td>
							<td class = "form-group">
								<input type="text" class="form-control" placeholder="Page Title" value = "" 
									name="addtitle" id="addtitle" required />
							</td>
						</tr>
						<tr>
							<td>
								<label class = "control-label" for = "addpagedes">Page Description</label>
							</td>
							<td class = "form-group">
								<textarea class = "summernote" id = "addpagedes" name = "addpagedes"></textarea>
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
			  <h4 class='modal-title'>View Page Content</h4>
			</div>
			<div class='modal-body'>
				<table class="table table-striped table-hover table-bordered">
					<tbody>
						<tr>
							<td class = "col-lg-2">
								<label for = "viewname">Page Name</label>
							</td>
							<td id="viewname"></td>
						</tr>
						<tr>
							<td class = "col-lg-2">
								<label for = "viewtitle">Page Title</label>
							</td>
							<td id="viewtitle"></td>
						</tr>
						<tr>
							<td class = "col-lg-2">
								<label for = "viewpagedes">Page Description</label>
							</td>
							<td id="viewpagedes"></td>
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
				<form name="form_editcontent" id="form_editcontent" action="<?php echo base_url()."index.php/admin/contentsetting";?>" method="post">
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
	function ycheck(str)
	{		
		document.getElementById("ycheck"+str).removeAttribute("checked");
		$.post("<?php echo base_url(); ?>ajax/ajaxdemo/ajaxcontentsetting/activetrue/"+str,{},function(data, status){/*dyn_notice();*/});
	}
	function ncheck(str)
	{
		document.getElementById("ncheck"+str).setAttribute("checked","checked");
		$.post("<?php echo base_url(); ?>ajax/ajaxdemo/ajaxcontentsetting/activefalse/"+str,{},function(data, status){/*dyn_notice();*/});
	}
	function showpage(str)
	{
		$.post('<?php echo base_url(); ?>ajax/ajaxdemo/ajaxcontentsetting/show/'+str,{},function(data,status){
			if(data['status'] == 'true')
			{
				$("#viewname").html(data['result'][0]['page_name']);
				$("#viewtitle").html(data['result'][0]['page_title']);
				$("#viewpagedes").html(data['result'][0]['page_description']);
			}
		},'json');
	}
	function editpage(str)
	{
		$.post("<?php echo base_url(); ?>ajax/ajaxdemo/ajaxcontentsetting/edit/"+str,{},function(data,status){
			if(data['status'] == 'true')
			{
				$("#editsrno").val(data['result'][0]['id']);
				$("#editname").val(data['result'][0]['page_name']);
				$("#edittitle").val(data['result'][0]['page_title']);
				$("#editpagedes").code(data['result'][0]['page_description']);
			}
		},'json');
	}
	/*
	function deletepage(str)
	{
		var message = confirm('Are you sure to delete?');
		$.post("<?php echo base_url(); ?>ajax/ajaxcontent",{id:str,msg:message,action:"del"},function(data, status){
			if(data['status'] == 'true')
				dyn_notice();
		},'json');
	}
	*/
</script>