<?php
	include('connection.php');
	//pc insert
	if(isset($_POST['add_pc']))
	{
		$pc_name=$_POST['pc_name'];
		$config=$_POST['config'];
		$query="INSERT into pc_info(pc_name,configure) values('$pc_name','$config')";
		$insert=mysql_query($query) or die(mysql_error());
		if($insert)
		{
			$msg="Successfully Inserted";
			header('location:../view_pc.php?msg='.$msg);
		}
	}
	///member insert
	if(isset($_POST['add_member']))
	{
		$mem_name=$_POST['mem_name'];
		$mem_mobile=$_POST['mem_mobile'];
		$mem_email=$_POST['mem_email'];
		$sub_time=$_POST['sub_time'];
		echo $reg_date=$_POST['reg_date'];
		$amount=$_POST['amount'];
		$query="INSERT into premium_mem(mem_name,mem_mobile,mem_email,sub_time,reg_date,amount) values('$mem_name','$mem_mobile','$mem_email','$sub_time','$reg_date','$amount')";
		$insert=mysql_query($query) or die(mysql_error());
		if($insert)
		{
			$msg="Successfully Inserted";
			header('location:../view_premium_mem.php?msg='.$msg);
		}
	}
	///customer insert
	if(isset($_POST['add_customer']))
	{
		$cust_name=$_POST['cust_name'];
		$pc_id=$_POST['pc_id'];
		$cust_mobile=$_POST['cust_mobile'];
		// $entry_time=date('H:i:s');
		$query="INSERT into customer_info( 	cust_name,pc_id,cust_mobile,cust_entry) values('$cust_name','$pc_id','$cust_mobile',now())";
		$insert=mysql_query($query) or die(mysql_error());
		if($insert)
		{
			$update=mysql_query("UPDATE pc_info set status='1' where id='$pc_id'");
			if($update)
			{
				$msg="Successfully Inserted";
				header('location:../view_customer.php?msg='.$msg);
			}
		}
	}
?>