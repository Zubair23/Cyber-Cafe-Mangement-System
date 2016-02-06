<?php
	include('inc/connection.php');
	include('inc/header.php');
	include('inc/nav.php');
?>
 
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Customer</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <form action="inc/query.php" method="POST">
				 



				   <div class="form-group">
					<label for="cust_id">Customer Id</label>
					<input type="number" class="form-control" id="cust_id" placeholder="Customer Id" name="cust_id">
				  </div>


				   <div class="form-group">
					<label for="cust_name">Customer Name</label>
					<input type="text" class="form-control" id="cust_name" placeholder="Customer Name" name="cust_name">
				  </div>





				   <div class="form-group">
					<label for="pc_id">Pc Id</label>
					<input type="number" class="form-control" id="pc_id" placeholder="Pc Id" name="pc_id">
				  </div>





				

				  <div class="form-group">
					<label for="cust_mobile">Customer mobile</label>
					<input type="number" class="form-control" id="cust_mobile" placeholder="Customer mobile" name="cust_mobile" >
				  </div>



				  


				  <div class="form-group">
					<label for="cust_entry">Customer Entry</label>
					<input type="date" class="form-control" id="cust_entry" placeholder="Customer Entry" name="cust_entry" >
				  </div>





				  <div class="form-group">
					<label for="cust_out">Customer Entry</label>
					<input type="date" class="form-control" id="cust_out" placeholder="Customer Out" name="cust_out" >
				  </div>



				 









				  <input type="submit" class="btn btn-primary" name="add_pc" value="ADD"/>
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

