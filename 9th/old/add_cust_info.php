<?php
	include('inc/connection.php');
	include('inc/header.php');
	include('inc/nav.php');
	include('inc/functions.php');
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
					<label for="cust_name">Customer Name</label>
					<input type="text" class="form-control" id="cust_name" placeholder="Customer Name" name="cust_name">
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
					<input type="number" class="form-control" id="cust_mobile" placeholder="Customer mobile" name="cust_mobile" >
				  </div>



				   <div class="form-group">
					<label for="cust_entry">Customer Entry</label>
					<input type="number" class="form-control" id="cust_mobile" placeholder="Customer mobile" name="cust_mobile" >
				  </div>

				   <div class="form-group">
					<label for="action">Action</label>
					<input type="number" class="form-control" id="cust_mobile" placeholder="Customer mobile" name="cust_mobile" >
				  </div>


				   <div class="form-group">
					<label for="button">button</label>
					<input type="number" class="form-control" id="cust_mobile" placeholder="Customer mobile" name="cust_mobile" >
				  </div>

				  <input type="submit" class="btn btn-primary" name="add_customer" value="ADD"/>
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

