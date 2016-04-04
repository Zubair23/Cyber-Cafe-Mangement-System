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
                    <h1 class="page-header">View General Customer</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
				<table class="table table-bordered">
					<tr>
						
						<th>Mobile</th>
						<th>Name</th>
						<th>Email</th>
						<th>Password</th>						
						<th>Action</th>
					</tr>
		<?php
            $row=SelectAllWhere('general_customer','del_status',0);
            foreach($row as $rw)
            {
              extract($rw);
              echo "<tr>";
                echo "<td>".$cust_mobile."</td>";
                echo "<td>".$cust_name."</td>";
                echo "<td>".$cust_email."</td>"; 
				echo "<td>".$cust_password."</td>"; 
				
                echo "<td><a href='edit_gene_cust.php?rid=$cust_id' class='btn btn-warning'>Edit</a> | <a href='delete_gene_cust.php?rid=$cust_id' class='btn btn-danger'>Delete</a></td>";
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

