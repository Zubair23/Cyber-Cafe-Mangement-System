<?php
	include('inc/connection.php');
	include('inc/header.php');
	include('inc/nav.php');
?>

            <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add Hourly Rate </h1>
                </div>
				<!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
			
            <div class="row">
				<div class="col-md-6 well">
			<?php
				$query="SELECT * from hourly_rate";
				$select=mysql_query($query) or die(mysql_error());
				$rows=mysql_num_rows($select);
				if($rows>0)
				{
					echo "<h2 class='text-danger'>Hourly Rate allready Inserted</h2>";
					echo "<h3 class='text-warning'>Please go to <a href='view_hourly_rate.php'>View Rate</a> to edit hourly rate</h3>";
				}
				else
				{
			?>
                <form action="inc/query.php" method="POST">
				   <div class="form-group">
					<label for="rate">Rate</label>
					<input type="text" class="form-control" id="rate" placeholder="Rate" name="rate">
				  </div>
				  <div class="form-group">
					<label for="entry_date">Date</label>
					<input type="date" class="form-control" id="entry_date" name="entry_date" value="<?php echo date('Y-m-d');?>">
				  </div>
				   <input type="submit" class="btn btn-primary" name="add_hourly_rate" value="ADD"/>
				</form>
			<?php
				}
			?>
            <!-- /.row -->
			</div>
			<div class="col-md-6 well">
				<?php
				$query2="SELECT * from discount";
				$select2=mysql_query($query2) or die(mysql_error());
				$rows2=mysql_num_rows($select2);
				if($rows2>0)
				{
					echo "<h2 class='text-danger'>Discount Rate allready Added</h2>";
					echo "<h3 class='text-warning'>Please go to <a href='view_discount_rate.php'>View Discount</a> to edit Discount rate</h3>";
				}
				else
				{
			?>	
				<h2 class="text-primary">Add Discount Rate</h2>
                <form action="inc/query.php" method="POST">
				   <div class="form-group">
					<label for="dis_condition">Discount Condition: Hour should be more than</label>
					<input type="number" class="form-control" id="dis_condition" placeholder="Enter Hour" name="dis_condition">
				  </div>
				  <div class="form-group">
					<label for="dis_rate">Discount in %</label>
					<input type="number" class="form-control" id="dis_rate" placeholder="Enter Rate" name="dis_rate">
				  </div>
				   <input type="submit" class="btn btn-primary" name="add_dis_rate" value="ADD"/>
				</form>
			<?php
				}
			?>
			</div>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
	


<?php
	include('inc/footer.php');
?>
