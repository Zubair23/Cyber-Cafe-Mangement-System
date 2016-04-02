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
                    <h1 class="page-header">View Hourly Rate</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
				<table class="table table-bordered">
				<tr>
						<th>Rate (.Tk)</th>
						<th>Entry Date</th>
						<th>Action</th>
						
					</tr>
					
					<?php
						$row=SelectAllWhere('hourly_rate','del_status',0);
						foreach($row as $rw)
						{
							extract($rw);
							echo "<tr>";
								echo "<td>".$rate."</td>";
								echo "<td>".$entry_date."</td>";								
								echo "<td><a href='edit_hourly_rate.php?rid=$rate_id' class='btn btn-warning'>Edit</a></td>";
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
