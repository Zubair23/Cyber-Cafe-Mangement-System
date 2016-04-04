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
				$dis_id=$_GET['rid'];
				$row=SelectAllWhere('discount','dis_id',$dis_id);
				foreach($row as $rw)
				{
					extract($rw);
				}
		?>
		  <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Discount Rate</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
			
				<form action="inc/query.php" method="POST">
					<input type="hidden" name="dis_id" value="<?php echo $dis_id;?>"/>
				  
				  <div class="form-group">
					                          
					<label for="dis_condition">Minimum Hour</label>
					<input type="text" class="form-control" id="dis_condition" name="dis_condition" value='<?php echo $dis_condition;?>'>
				  </div>
				 
				  
				  <div class="form-group">
					                          
					<label for="dis_rate">Discount Rate</label>
					<input type="text" class="form-control" id="dis_rate" name="dis_rate" value='<?php echo $dis_rate;?>'>
				  </div>
				  
				  <input type="submit" class="btn btn-primary" name="edit_dis_rate" value="EDIT"/>
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