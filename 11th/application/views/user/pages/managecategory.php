<div class="right_col" role="main">
	<div class="panel panel-primary col-lg-10 col-lg-offset-1">
		<div class="panel-heading">
			<div class="panel-title">
				<i class="fa fa-list"></i>
				Manage Categories
			</div>
		</div>
		<div class="panel-body">
			<div class = "row">
			<div class = "col-lg-1 col-lg-offset-10">
				<button class = "btn btn-primary"  id = "btnmore" name = "btnmore" data-toggle = "modal" data-target = "#add">
					<i class = "fa fa-plus">  Category</i>
				</button>
			</div>
			</div>
			<table class="table table-striped table-hover table-bordered jumbotron">
				<thead>
					<tr>
						<th class = "col-lg-1">Sr No.</th>
						<th class = "col-lg-3">Category Name</th>
						<th class = "col-lg-3">Sub Category</th>
						<th class = "col-lg-3">Status</th>
						<th class = "col-lg-3">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$num_rec_per_page=1;
						$select = $this->db->query("SELECT category_name FROM tbl_product_category WHERE parent_id = '0'");
						$total_records = $select->num_rows();  //count number of records
						$total_pages = ceil($total_records / $num_rec_per_page);  //take higher value of division
						(isset($_GET["page"]))?$page = $_GET["page"]:$page = 1;  //get page from URL
						$start = ($page - 1) * $num_rec_per_page;
						$codesubcat = $this->db->query ("SELECT * FROM tbl_product_category WHERE parent_id = 0 LIMIT $start, $num_rec_per_page");
						$i = $page;
						foreach($codesubcat->result_array() as $row1)
						{
							if($row1["is_active"] != "d")
							{ 
					?>
								<tr>									
									<?php 
										$main = $this->db->query("SELECT * FROM tbl_product_category WHERE parent_id = '".$row1['id']."' AND is_active != 'd' LIMIT 1");
										
									?>
											<td><?php echo $i;?></td>
											<td><?php echo $row1['category_name'];?></td>
											<td></td>
											<td></td>
											<td></td>
								</tr>
											<?php
										foreach($main->result_array() as $row)
										{ 
												$main = $this->db->query("SELECT * FROM tbl_product_category WHERE parent_id = '".$row1['id']."' AND is_active != 'd'");
												$k = 1;
												foreach($main->result_array() as $row)
												{
											?>
								<tr>
									<td></td>
									<td></td>
									<td>
										<?php
											echo "<div class = 'col-lg-2'>".$i.".".$k." "."</div>";
											echo "<div class = 'col-lg-10'>".$row['category_name']."</div>";
											$k++;
										?>
									</td>
									<td>
										<div class="checkbox">
											<label>	
												<?php
												if($row["is_active"] == "y")
												{ 
												?> 										
												<input type="checkbox" checked = "" id = "ycheck<?php echo $row["id"];?>" onclick = 'ycheck(<?php echo $row["id"];?>)'>
												<?php
												}
												else
												{ 
												?>
												<input type="checkbox" id = "ncheck<?php echo $row["id"];?>" onclick = 'ncheck(<?php echo $row["id"];?>)'>
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
										<span class = "btn btn-material-red-700" name = "delete" 
											onclick = 'deletecategory(<?php echo $row["id"];?>)'>
											<i class="fa fa-trash"></i>
										</span>
									</td>
									</tr>
									
										<?php
											}
											$i++;
										}
										?>
								<?php 
							}
						}
					?>
				</tbody>
			</table>
			<div class = "col-lg-offset-4">
			<?php	
				if($page!=1)
					$page=($page-1);
				echo "<a href='".base_url()."admin/managecategory?page=$page'>"."<button>Prev</button>"."</a> "; // Goto Previous page 	
				echo "<a href='".base_url()."admin/managecategory?page=1'>"."<button>First</button>"."</a> "; // Goto First page
				for ($k=1; $k<=10; $k++)
				{ 
					echo "<a href='".base_url()."admin/managecategory?page=".$page."'>".$page."</a> ";
					if($page == $total_pages)
						break;
					$page++;	
				}
				echo "<a href='".base_url()."admin/managecategory?page=$total_pages'>"."<button>Last</button>"."</a> "; // Goto Last page	
				if($page<$total_pages)
				{
					((isset($_GET['page'])?$_GET['page']:"") == $total_pages) ? $page = $total_pages : $page = ((isset($_GET['page'])?$_GET['page']:"") + 1);
				}
				echo "<a href='".base_url()."admin/managecategory?page=$page'>"."<button>Next</button>"."</a> "; // Goto Next page
				$i++;
			?>
			</div>
		</div>
	</div>
	<div class="modal fade" id="add" role = "dialog">	
		<div class='modal-dialog modal-lg'>
		  <div class='modal-content'>
			<div class='modal-header'>
			  <button type='button' class='close' data-dismiss='modal'>&times;</button>
			  <h4 class='modal-title'>Add Category</h4>
			</div>
			<div class='modal-body'>
				<form name="form_addcategory" id="form_addcategory" action="<?php echo base_url()."admin/managecategory";?>" method="post">
				<div class = "form-group">
					<input type="hidden" name="action" value="submit_addcategory" />
				</div>
				<table class="table table-striped table-hover table-bordered">
					<tbody>
						<tr>
							<td>
								<label class = "control-label" for = "addcategory">Category Name*</label>
							</td>
							<td class = "form-group">
								<select class = "form-control" name = "select" id = "select">
									<?php 
										$viewselect = $this->db->query("SELECT category_name FROM tbl_product_category WHERE parent_id = '0'");
										foreach($viewselect->result_array() as $option)
										{
									?>
									<option ><?php echo $option['category_name']; ?></option>
									<?php
									}
									?>
									<option>Other</option>
								</select>
								<input type = "text" class = "form-control" name = "option" id = "option" placeholder = "Please Specify Other" >
							</td>
						</tr>
						<tr>
							<td>
								<label class = "control-label" for = "addsubcategory">Sub-Category Name*</label>
							</td>
							<td class = "form-group">
								<input type="text" class="form-control" placeholder="Category Name" name="addsubcategory" id="addsubcategory" 
									value = "" required />
							</td>
						</tr>
						<tr>
							<td>
								<label class = "control-label" for = "adddate">Added On</label>
							</td>
							<td class = "form-group">
								<input type="text" class="form-control" placeholder="Added On" name="adddate" 
									id="adddate" value = "<?php echo date("Y:m:d H:i:s");?>" readonly />
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
</div>
<script>
	window.onload = (function()
	{
		$("#option").hide();
		$("#select").click(function()
		{
			var x = $("#select").val();
			if(x == "Other")
				$("#option").show();
			else
				$("#option").hide();
		});		
	});
	function ycheck(str)
	{		
		document.getElementById("ycheck"+str).removeAttribute("checked");
		$.post("<?php echo base_url()?>ajax/ajaxcategory",
			{id:str, action:"activetrue"},
			function(data, status){});
	}
	function ncheck(str)
	{
		document.getElementById("ncheck"+str).setAttribute("checked","checked");
		$.post("<?php echo base_url()?>ajax/ajaxcategory",
			{id:str, action:"activefalse"},
			function(data, status){});
	}
	function deletecategory(str)
	{
		var message = confirm('Are you sure to delete?');
		$.post("<?php echo base_url()?>ajax/ajaxcategory",{id:str,msg:message, action:"del"},function(data, status){window.location = "";});
	}
</script>