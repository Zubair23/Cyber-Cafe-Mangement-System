<?php
	include('inc/connection.php');
	include('inc/header.php');
	include('inc/nav.php');
	include('inc/functions.php');
?>
		
        <div id="page-wrapper">
			<?php
				if(isset($_GET['msg']))
				{
					echo $_GET['msg'];
				}
			?>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">View PC</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
				<table class="table table-bordered">
					<tr>
						<th>ID</th>
						<th>PC Name</th>
						<th>OS</th>
					</tr>
					<?php
						$row=SelectAll('pc_info');
						foreach($row as $rw)
						{
							extract($rw);
							echo "<tr>";
								echo "<td>".$id."</td>";
								echo "<td>".$pc_name."</td>";
								echo "<td>".$configure."</td>";
							echo "</tr>";
						}
					?>
				</table>
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
<?php
	include('inc/footer.php');
?>

