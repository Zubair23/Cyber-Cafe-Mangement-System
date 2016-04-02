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
						<th>Subscription Hour</th>
						<th>Remaining Hour</th>
						<th>Registration Date</th>
						<th>Amount</th>
						<th>Renew</th>
						<th>Action</th>
					</tr>
		<?php
            $row=SelectAllWhere('premium_mem','del_status',0);
            foreach($row as $rw)
            {
              extract($rw);
              echo "<tr>";
                echo "<td>".$mem_name."</td>";
                echo "<td>".$mem_mobile."</td>";
                echo "<td>".$mem_email."</td>";
                echo "<td>".$sub_hour."</td>";
                echo "<td>".$remain_hour."</td>";
                echo "<td>".$reg_date."</td>";
                echo "<td>".$amount."</td>";
				echo "<td><a href='renew_mem.php?memid=$member_id' class='btn btn-success'>Renew</a></td>";
                echo "<td><a href='edit_premium_mem.php?rid=$member_id' class='btn btn-warning'>Edit</a> | <a href='delete_premium_mem.php?rid=$member_id' class='btn btn-danger'>Delete</a></td>";
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

