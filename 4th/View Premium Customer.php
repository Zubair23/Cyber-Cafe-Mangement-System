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
						<th>mem_name</th>
						<th>mem_mobile</th>
						<th>mem_email</th>
						<th>time</th>
						<th>date</th>
						<th>amount</th>
					</tr>
					<?php
						$query="SELECT * from pc_info";
						$select=mysql_query($query);
						while($data=mysql_fetch_assoc($select))
						{
							echo "<tr>";
								echo "<td>".$data['id']."</td>";
								echo "<td>".$data['pc_name']."</td>";
								echo "<td>".$data['config']."</td>";
								echo "<td>".$data['mem_name']."</td>";
								echo "<td>".$data['mem_mobile']."</td>";
								echo "<td>".$data['mem_email']."</td>";
								echo "<td>".$data['sub_time']."</td>";
								echo "<td>".$data['sub_date']."</td>";
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

