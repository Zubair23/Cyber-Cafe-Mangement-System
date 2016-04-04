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
            <div class="row">
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
            </div>
			<?php
				}
			?>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
	


<?php
	include('inc/footer.php');
?>
