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
                    <h1 class="page-header">View Discount Rate</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
				<table class="table table-bordered">
				<tr>
						<th>Minimum Hour</th>
						<th>Discount (%)</th>
						<th>Action</th>
						
					</tr>
					
					<?php
						$row=SelectAllWhere('discount','dell_status',0);
						foreach($row as $rw)
						{
							extract($rw);
							echo "<tr>";
								echo "<td>".$dis_condition."</td>";
								echo "<td>".$dis_rate."</td>";								
								echo "<td><a href='edit_dis_rate.php?rid=$dis_id' class='btn btn-warning'>Edit</a></td>";
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
