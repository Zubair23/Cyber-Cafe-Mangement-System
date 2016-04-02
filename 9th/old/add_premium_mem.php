<?php
	include('inc/connection.php');
	include('inc/header.php');
	include('inc/nav.php');
?>
 
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add Premium Member</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <form action="inc/query.php" method="POST">
				   <div class="form-group">
					<label for="mem_name">Member Name</label>
					<input type="text" class="form-control" id="mem_name" placeholder="Member Name" name="mem_name">
				  </div>
				   <div class="form-group">
					<label for="mem_mobile">Member Mobile</label>
					<input type="text" class="form-control" id="mem_mobile" placeholder="Member Mobile" name="mem_mobile">
				  </div>

				  <div class="form-group">
					<label for="mem_email">Member Email</label>
					<input type="email" class="form-control" id="mem_email" placeholder="Member Email" name="mem_email" required>
				  </div>
				  <div class="form-group">
					<label for="sub_time">Subscription Time</label>
					<input type="number" class="form-control" id="sub_time" name="sub_time" placeholder="Subscription Hour"/>
				  </div>
				  <div class="form-group">
					<label for="reg_date">Registration Date</label>
					<input type="text" class="form-control" id="reg_date" value="<?php echo date('Y-m-d');?>" name="reg_date" readonly>
				  </div>
				  <div class="form-group">
					<label for="amount">Amount</label>
					<input type="number" class="form-control" id="amount" placeholder="Amount" name="amount" >
				  </div>
				  <input type="submit" class="btn btn-primary" name="add_member" value="ADD"/>
				</form>
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
<?php
	include('inc/footer.php');
?>

