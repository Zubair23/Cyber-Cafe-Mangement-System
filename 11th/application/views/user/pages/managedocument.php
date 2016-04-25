<div class="right_col" role="main">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<div class="panel-title">
				<i class="fa fa-file"></i>
				Document Management
			</div>
		</div>
		<div class="panel-body">
			<table class="table table-striped table-hover table-bordered jumbotron" id = "sortdocument">
				<thead>
					<tr>
						<th class = "col-lg-1">Sr No.</th>
						<th class = "col-lg-1">Name</th>
						<th class = "col-lg-1">Email</th>
						<th class = "col-lg-2">Document Type</th>
						<th class = "col-lg-1">Document Name</th>
						<th class = "col-lg-2">Approve</th>
						<th class = "col-lg-1">Status</th>
						<th class = "col-lg-1">Download</th>
					</tr>
				</thead>
				<tbody>
					<?php
						//$selectquery = $this->db->query("SELECT document_info_group.*,tbl_documents.is_approved,tbl_documents.is_active FROM document_info_group,tbl_documents WHERE document_info_group.user_id = tbl_documents.user_id");
						$selectquery = $this->db->query("SELECT * FROM document_info WHERE 1");
						$i = 1;
						foreach($selectquery->result_array() as $val)
						{		
							$type = explode(',',$val['document_type']);
							$name = explode(',', $val['document_name']);
							//if($val['is_active'] != 'd')
							//{
					?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo $val['firstname']." ".$val['lastname']; ?></td>
									<td><?php echo $val['email_id']; ?></td>
									<?php
										for($j = 0; $j < count($type); $j++)
										{
											$approve = $this->db->query("SELECT id, user_id, is_active, is_approved FROM tbl_documents WHERE document_name = '".$name[$j]."'");
											$row = $approve->row_array();
											if($j>=1)
											{
									?>
												<tr>
													<td colspan = 3></td>
									<?php } ?>
									<td>
										<?php echo $type[$j]; ?>
									</td>
									<td>
										<?php echo $name[$j]; ?>
									</td>
									<td>
										<div class="checkbox">
											<label>	
												<?php
												if($row['is_approved'] == "y")
												{ 
												?> 										
												<input type="checkbox" checked = "" id = "yapprove<?php echo $row['id'];?>" onclick = "yapprove('<?php echo $row['id']; ?>')">
												<?php
												}
												else
												{ 
												?>
												<input type="checkbox" id = "napprove<?php echo $row['id'];?>" onclick = "napprove('<?php echo $row['id']; ?>')">
												<?php 
												} 
												?>
												<span class="checkbox-material">
													<span class="check">
													</span>
												</span>
												Approve / Disapprove
											</label>
										</div>
									</td>
									<td>
										<div class="checkbox">
											<label>	
												<?php
												if($row['is_active'] == "y")
												{ 
												?> 										
												<input type="checkbox" checked = "" id = "ycheck<?php echo $row['id'];?>" onclick = "ycheck('<?php echo $row['id']; ?>')">
												<?php
												}
												else
												{ 
												?>
												<input type="checkbox" id = "ncheck<?php echo $row['id'];?>" onclick = "ncheck('<?php echo $row['id']; ?>')">
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
										<span class = "btn btn-material-purple-500" onclick="filedownload('<?php echo $row['user_id']; ?>','<?php echo $name[$j]; ?>');">
											<i class='fa fa-download'></i>
										</span>
									</td>
									<?php
										if($j>=1)
										{
											?>
											</tr>
											<?php
										}
										}
									?>
								</tr>
								<?php
								$i++;
							//}
						}
					?>
				</tbody>
			</table>			
		</div>
	</div>
</div>
<script>
"use strict";
	function filedownload(id,str)
	{
		var url = "<?php echo base_url(); ?>ajax/ajaxdocument/ajaxdocument/download/"+id+"/"+str;
		var win = window.open(url, '_self');
		win.focus();
	}
	function yapprove(str)
	{		
		document.getElementById("yapprove"+str).removeAttribute("checked");
		$.post("<?php echo base_url(); ?>ajax/ajaxdemo/ajaxdocument/approvetrue/"+str,{},function(data, status){});
	}
	function napprove(str)
	{	
		document.getElementById("napprove"+str).setAttribute("checked","checked");
		$.post("<?php echo base_url(); ?>ajax/ajaxdemo/ajaxdocument/approvefalse/"+str,{},function(data, status){});
	}
	function ycheck(str)
	{		
		document.getElementById("ycheck"+str).removeAttribute("checked");
		$.post("<?php echo base_url(); ?>ajax/ajaxdemo/ajaxdocument/activetrue/"+str,{},function(data, status){});
	}
	function ncheck(str)
	{
		document.getElementById("ncheck"+str).setAttribute("checked","checked");
		$.post("<?php echo base_url(); ?>ajax/ajaxdemo/ajaxdocument/activefalse/"+str,{},function(data, status){});
	}
</script>