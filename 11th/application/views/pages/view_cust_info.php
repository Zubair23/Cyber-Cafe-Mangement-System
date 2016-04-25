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
                    <h1 class="page-header">View Customer Information</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
				<table class="table table-bordered">
					<tr>
						
						<th>Customer Type</th>
						<th>Pc Id</th>
						<th>Customer Mobile</th>
						<th>Customer Entry</th>
						<th>Customer Out</th>
						<th>Estimated Time</th>
					     <th>Action</th>
					</tr>
					<?php
						$query="SELECT * from gp_customer";
						$select=mysql_query($query);
						while($data=mysql_fetch_assoc($select))
						{
							echo "<tr>";
								
								echo "<td>".$data['cust_type']."</td>";
								echo "<td>".$data['pc_id']."</td>";
								echo "<td>".$data['cust_mobile']."</td>";
								echo "<td>".$data['cust_entry']."</td>";
								echo "<td>".$data['cust_out']."</td>";
								echo "<td>".$data['est_time']."</td>";
								
								echo "<td>Javascript</td>";
								echo "<td><a href='#' class='btn btn-warning'>STOP</a></td>";
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

