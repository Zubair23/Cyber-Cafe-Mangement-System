<?php
	include('inc/connection.php');
	include('inc/header.php');
	include('inc/nav.php');
	include('inc/functions.php');
?>
 
		<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
			<div class="col-md-8 well">
			<div class="bs-example bs-example-tabs" data-example-id="togglable-tabs"> 
				<ul id="myTabs" class="nav nav-tabs" role="tablist"> 
					<li role="presentation" class="active">
						<a href="#regular" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Regular Member</a>
					</li> 
					<li role="presentation" class="">
						<a href="#premium" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile" aria-expanded="false">Premium Member</a>
					</li>
					<li role="presentation" class="">
						<a href="#premium" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile" aria-expanded="false">Premium Member in PC</a>
					</li>
				</ul> 
				<div id="myTabContent" class="tab-content"> 
					<div role="tabpanel" class="tab-pane fade active in" id="regular" aria-labelledby="home-tab"> 
						<form action="inc/query.php" method="POST">
						   <div class="form-group">
							<label for="cust_name">Customer Name</label>
							<input type="text" class="form-control" id="cust_name" placeholder="Customer Name" name="cust_name" required>
						  </div>
						   <div class="form-group">
							<label for="pc_id">Pc Id</label>
							<select  class="form-control" name="pc_id" id="pc_id">
								<option value="">Select PC</option>
								<?php
									$row=SelectAllWhere('pc_info','status',0);
									// $i=1;
									foreach($row as $rw)
									{
										extract($rw);
										echo "<option value='$id'>PC ".$id."</option>";
										// $i++;
									}
								?>
							</select>
						  </div>

						  <div class="form-group">
							<label for="cust_mobile">Customer mobile</label>
							<input type="number" class="form-control" id="cust_mobile" placeholder="Customer mobile" name="cust_mobile">
						  </div>

						  <input type="submit" class="btn btn-primary" name="add_customer" value="ADD"/>
						</form>
					</div> 
					<div role="tabpanel" class="tab-pane fade" id="premium" aria-labelledby="profile-tab"> 
						<form action="inc/query.php" method="POST">
						   <div class="form-group">
							<label for="prem_cust">Select Premium Customer</label>
							<select  class="form-control" name="prem_cust" id="prem_cust">
								<option value="">Select Member</option>
								<?php
									$row1=SelectAll('premium_mem');
									// $i=1;
									foreach($row1 as $rw1)
									{
										extract($rw1);
										echo "<option value='$member_id'>".$mem_name."</option>";
										// $i++;
									}
								?>
							</select>
						  </div>
						   <div class="form-group">
							<label for="prem_pc">Pc Id</label>
							<select  class="form-control" name="prem_pc" id="prem_pc">
								<option value="">Select PC</option>
								<?php
									$row=SelectAllWhere('pc_info','status',0);
									// $i=1;
									foreach($row as $rw)
									{
										extract($rw);
										echo "<option value='$id'>PC ".$id."</option>";
										// $i++;
									}
								?>
							</select>
						  </div>
						  
						  <div class="form-group">
							<label for="remain_hour">Remaining Hour</label>
							<input type="text" class="form-control" id="remain_hour" name="remain_hour" readonly>
						  </div>
							<p id="test_ajax"></p>
						  <input type="submit" class="btn btn-primary" name="add_customer" value="ADD"/>
						</form>
					</div> 


						<div role="tabpanel" class="tab-pane fade" id="premium_in_pc" aria-labelledby="profile-tab"> 
						<form action="inc/query.php" method="POST">
						   <div class="form-group">
							<label for="prem_cust">Select Premium Customer</label>
							<select  class="form-control" name="prem_cust" id="prem_cust">
								<option value="">Select Member</option>
								<?php
									$row1=SelectAll('premium_mem');
									// $i=1;
									foreach($row1 as $rw1)
									{
										extract($rw1);
										echo "<option value='$member_id'>".$mem_name."</option>";
										// $i++;
									}
								?>
							</select>
						  </div>
						   <div class="form-group">
							<label for="prem_pc">Pc Id</label>
							<select  class="form-control" name="prem_pc" id="prem_pc">
								<option value="">Select PC</option>
								<?php
									$row=SelectAllWhere('pc_info','status',0);
									// $i=1;
									foreach($row as $rw)
									{
										extract($rw);
										echo "<option value='$id'>PC ".$id."</option>";
										// $i++;
									}
								?>
							</select>
						  </div>
						  
						  <div class="form-group">
							<label for="remain_hour">Remaining Hour</label>
							<input type="text" class="form-control" id="remain_hour" name="remain_hour" readonly>
						  </div>
							<p id="test_ajax"></p>
						  <input type="submit" class="btn btn-primary" name="add_customer" value="ADD"/>
						</form>
					</div> 


















				</div> 
			</div>
		</div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
<?php
	include('inc/footer.php');
?>
       <script type="text/javascript">
    $(document).ready(function () {
    	$('#prem_cust').change(function() {
			var prem_cust=document.getElementById('prem_cust').value;
			//alert(prem_cust);
			$.ajax({
				type: "POST", 
				url: "premium_ajax.php",
				data: "cid="+prem_cust,
				success: function(message){ 
					$("#remain_hour").val(message);
				}       
			});
			
			//alert("Hello");
		});
		// alert("Hello");
	});
</script>
