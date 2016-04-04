<?php
	include('inc/connection.php');
	include('inc/header.php');
	include('inc/nav.php');
?>
 
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add General Customer</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <form action="inc/query.php" method="POST">
				   
				   <div class="form-group">
					<label for="cust_mobile">Customer Mobile</label>
					<input type="number" class="form-control" id="cust_mobile" placeholder="Customer Mobile" name="cust_mobile">
				  </div>
				  <div class="form-group">
					<label for="cust_name">Member Name</label>
					<input type="text" class="form-control" id="cust_name" placeholder="Customer Name" name="cust_name">
				  </div>

				  <div class="form-group">
					<label for="cust_email">Customer Email</label>
					<input type="email" class="form-control" id="cust_email" placeholder="Customer Email" name="cust_email" required>
				  </div>
				  
				  <div class="form-group">
					<label for="cust_password">Password</label>
					<input type="number" class="form-control" id="cust_password" placeholder="Password" name="cust_password" >
				  </div>
				  <input type="submit" class="btn btn-primary" name="add_gene_cust" value="ADD"/>
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

