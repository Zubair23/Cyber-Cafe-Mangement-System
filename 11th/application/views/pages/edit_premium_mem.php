<?php
	include('inc/connection.php');
	include('inc/header.php');
	include('inc/nav.php');
	include('inc/functions.php');

?>
 
        <div id="page-wrapper">
		<?php
			if(isset($_GET['rid']))
			{
				$member_id=$_GET['rid'];
				$row=SelectAllWhere('premium_mem','member_id',$member_id);
				foreach($row as $rw)
				{
					extract($rw);
				}
		?>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Premium Membership</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <form action="inc/query.php" method="POST">
					<input type="hidden" name="member_id" value="<?php echo $member_id;?>"/>
				  <div class="form-group">
					<label for="mem_name">Member Name</label>

					<input type="text" class="form-control" id="mem_name" placeholder="Member Name" name="mem_name" value='<?php echo $mem_name;?>'>
				  </div>

				   <div class="form-group">
					<label for="mem_mobile">Member mobile</label>

					<input type="text" class="form-control" id="mem_mobile" placeholder="Member Mobile" name="mem_mobile" value='<?php echo $mem_mobile;?>'>
				  </div>
				   <div class="form-group">
					<label for="mem_email">Member Email</label>

					<input type="email" class="form-control" id="mem_email" placeholder="Member Email" name="mem_email" value='<?php echo $mem_email;?>'>
				  </div> 
				  <div class="form-group">
					<label for="date">Subscription time</label>

					<input type="text" class="form-control" id="sub_time" placeholder="Subscription Time" name="sub_time" value='<?php echo $sub_time;?>'>
				  </div> 

				  <div class="form-group">
					<label for="amount">Amount</label>

					<input type="number" class="form-control" id="amount" placeholder="Amount" name="amount" value='<?php echo $amount;?>'>
				  </div>
				 
				  <input type="submit" class="btn btn-primary" name="edit_premium_mem" value="EDIT"/>
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

