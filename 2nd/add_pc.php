<?php
	include('connection.php');
	include('header.php');
	include('nav.php');
?>
 
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add PC</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <form action="" method="POST">
				  <div class="form-group">
					<label for="pc_name">PC Name</label>
					<input type="text" class="form-control" id="pc_name" placeholder="PC Name" name="pc_name">
				  </div>
				  <div class="form-group">
					<label for="config">Configuration</label>
					<select name="config" id="config" class="form-control">
						<option value="">Select Option</option>
						<option value="Windows XP">Windows XP</option>
						<option value="Windows 7">Windows 7</option>
						<option value="Windows 8">Windows 8</option>
					</select>
				  </div>
				  <input type="submit" class="btn btn-primary" name="add_pc" value="ADD"/>
				</form>
				<?php
					if(isset($_POST['add_pc']))
					{
						$pc_name=$_POST['pc_name'];
						$config=$_POST['config'];
						$query="INSERT into pc_info(pc_name,configure) values('$pc_name','$config')";
						$insert=mysql_query($query) or die(mysql_error());
						if($insert)
						{
							echo "Successfully Inserted";
						}
					}
				?>
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
<?php
	include('footer.php');
?>

