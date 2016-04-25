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
				</ul> 
				<div id="myTabContent" class="tab-content"> 
					<div role="tabpanel" class="tab-pane fade active in" id="regular" aria-labelledby="home-tab"> 
					
						<form action="inc/query.php" method="POST">
						<div class="form-group">
							<label for="gen_cust">Select General Customer</label>
							<select  class="form-control" name="prem_cust" id="gen_cust">
								<option value="">Select Mobile Number</option>
								<?php
									$row1=SelectAll('general_customer');
									// $i=1;
									foreach($row1 as $rw1)
									{
										extract($rw1);
										echo "<option value='$cust_mobile'>".$cust_mobile."</option>";
										// $i++;
									}
								?>
							</select>
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
							<label for="est_time">Estimated Time in hour</label>
							<input type="number" class="form-control" id="est_time" placeholder="Estimated Time" name="est_time">
						  </div>
						  <div class="form-group">
							<label for="hourly_rate">Hourly Rate</label>
							<?php
								$row2=SelectAll('hourly_rate');
								foreach($row2 as $rw2)
								{
									extract($rw2);
								}
							?>
							<input class="form-control" id="hourly_rate" name="hourly_rate" value="<?php echo $rate;?>" readonly>
						  </div>
						  <div class="form-group">
							<label for="amount">Amount</label>
							<input type="number" class="form-control" id="amount" name="amount" readonly>
						  </div>
						  <?php
							$row3=SelectAll('discount');
								foreach($row3 as $rw3)
								{
									extract($rw3);
								}
						  ?>
						  <input type="hidden" id="dis_condition" value="<?php echo $dis_condition;?>"/>
						  <input type="hidden" id="dis_rate" value="<?php echo $dis_rate;?>"/>
						  <div class="form-group">
							<label for="discount">Discount</label>
							<input type="number" class="form-control" id="discount" name="discount" readonly>
						  </div>
						  <div class="form-group">
							<label for="to_amount">Total Amount</label>
							<input type="number" class="form-control" id="to_amount" name="to_amount" readonly>
						  </div>
						  <input type="submit" class="btn btn-primary" name="add_reg_customer" value="ADD"/>
						</form>
					</div> 
					<div role="tabpanel" class="tab-pane fade" id="premium" aria-labelledby="profile-tab"> 
						<form action="inc/query.php" method="POST">
						   <div class="form-group">
							<label for="prem_cust">Select Premium Customer</label>
							<select  class="form-control" name="prem_cust" id="prem_cust">
								<option value="">Select Number</option>
								<?php
									$row1=SelectAll('premium_mem');
									// $i=1;
									foreach($row1 as $rw1)
									{
										extract($rw1);
										echo "<option value='$mem_mobile'>".$mem_mobile."</option>";
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
							<label for="est_time">Remaining Hour</label>
							<input type="number" class="form-control" id="remain_hour" name="remaining_hour" readonly>
						  </div>
						  
						 <div class="form-group">
							<label for="est_time">Estimated Time</label>
							<input type="number" class="form-control" id="est_hour" placeholder="Estimated Time" name="est_time">
						  </div>
						   <div class="form-group">
							<label for="est_time"> New Hour Remaining</label>
							<input type="number" class="form-control" id="new_remaining_hour" name="new_remaining_hour" readonly>
						  </div>

						 	  <input type="submit" class="btn btn-primary" name="add_prem_cust" value="ADD"/>
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
		
		$('#est_hour').blur(function() {
			var remain_hour=document.getElementById('remain_hour').value;
			var est_time=document.getElementById('est_hour').value;
			var new_hour=remain_hour-est_time;
			document.getElementById('new_remaining_hour').value=new_hour;
			
		});
		$('#est_time').blur(function() {
			var dis_amount=0;
			var est_time=document.getElementById('est_time').value;
			var hourly_rate=document.getElementById('hourly_rate').value;
			var dis_condition=document.getElementById('dis_condition').value;
			var dis_rate=document.getElementById('dis_rate').value;
			var amount=est_time*hourly_rate;
			document.getElementById('amount').value=amount;
			if(est_time>dis_condition)
			{
				dis_amount=amount*dis_rate/100;
			}
			document.getElementById('discount').value=dis_amount;
			document.getElementById('to_amount').value=amount-dis_amount;
			// alert("Hello");
		});
		// alert("Hello");
	});
</script>
