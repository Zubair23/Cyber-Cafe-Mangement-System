<?php
	include('inc/connection.php');
	include('inc/header.php');
	include('inc/nav.php');
	include('inc/functions.php');

?>
 
        <div id="page-wrapper">
		<?php
			if(isset($_GET['memid']))
			{
				$member_id=$_GET['memid'];
				$row=SelectAllWhere('premium_mem','member_id',$member_id);
				foreach($row as $rw)
				{
					extract($rw);
				}
		?>


            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Renew</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <form action="inc/query.php" method="POST">
                     <input type="hidden" name="member_id" value="<?php echo $member_id;?>"/>
				    <div class="form-group">				

					
				  <div class="form-group">
					<label for="date">Subscription hour</label>

					<input type="number" class="form-control" id="sub_hour" placeholder="Subscription Hour" name="sub_hour" value='<?php echo $sub_hour;?>'>
				  </div> 

				  <div class="form-group"> 
					<label for="amount">Amount</label>

					<input type="number" class="form-control" id="amount" placeholder="Amount" name="amount" value='<?php echo $amount;?>'>
				  </div>
				 
				  <input type="submit" class="btn btn-primary" name="renew_mem" value="Renew"/>
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

