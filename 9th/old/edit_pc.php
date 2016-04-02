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
				$id=$_GET['rid'];
				$row=SelectAllWhere('pc_info','id',$id);
				foreach($row as $rw)
				{
					extract($rw);
				}
		?>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit PC</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <form action="inc/query.php" method="POST">
					<input type="hidden" name="pc_id" value="<?php echo $id;?>"/>
				  <div class="form-group">
					<label for="pc_name">PC Name</label>
					<input type="text" class="form-control" id="pc_name" placeholder="PC Name" name="pc_name" value='<?php echo $pc_name;?>'>
				  </div>
				  <div class="form-group">
					<label for="config">Configuration</label>
					<select name="config" id="config" class="form-control">
						<option value="">Select Option</option>
						<option value="Windows XP" <?php if ($configure=='Windows XP') echo "selected";?>>Windows XP</option>
						<option value="Windows 7" <?php if ($configure=='Windows 7') echo "selected";?>>Windows 7</option>
						<option value="Windows 8" <?php if ($configure=='Windows 8') echo "selected";?>>Windows 8</option>
					</select>
				  </div>
				  <input type="submit" class="btn btn-primary" name="edit_pc" value="EDIT"/>
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

