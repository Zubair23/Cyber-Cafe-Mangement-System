<?php
	include('inc/connection.php');
	include('inc/header.php');
	include('inc/nav.php');
	include('inc/functions.php');

?>
    <div id="page-wrapper">
		<?php
			if(isset($_GET['rid']))
			{
				$rate_id=$_GET['rid'];
				$row=SelectAllWhere('hourly_rate','rate_id',$rate_id);
				foreach($row as $rw)
				{
					extract($rw);
				}
		?>
		  <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Hourly Rate</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
			
				<form action="inc/query.php" method="POST">
					<input type="hidden" name="rate_id" value="<?php echo $rate_id;?>"/>
				  <div class="form-group">
					<label for="rate">Hourly Rate</label>
					<input type="text" class="form-control" id="rate" name="rate" value='<?php echo $rate;?>'>
				  </div>
				  
				  <input type="submit" class="btn btn-primary" name="edit_hourly_rate" value="EDIT"/>
				</form>
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
			


<?php
	}
	include('inc/footer.php');
?>