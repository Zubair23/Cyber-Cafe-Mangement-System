<?php
	include('inc/connection.php');
	include('inc/header.php');
	include('inc/nav.php');
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
                    <h1 class="page-header">View Premium Member</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
				<table class="table table-bordered">
					<tr>
						<th>Name</th>
						<th>Mobile</th>
						<th>Email</th>
						<th>Subscription Date</th>
						<th>Registration Date</th>
						<th>Amount</th>
					</tr>
					<?php
						$query="SELECT * from premium_mem";
						$select=mysql_query($query);
						while($data=mysql_fetch_assoc($select))
						{
							echo "<tr>";
								echo "<td>".$data['mem_name']."</td>";
								echo "<td>".$data['mem_mobile']."</td>";
								echo "<td>".$data['mem_email']."</td>";
								echo "<td>".$data['sub_time']."</td>";
								echo "<td>".$data['reg_date']."</td>";
								echo "<td>".$data['amount']."</td>";
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

