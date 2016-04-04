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
		$reg_date=$_POST['reg_date'];
		$amount=$_POST['amount'];
		$query="INSERT into premium_mem(mem_name,mem_mobile,mem_email,sub_hour,remain_hour,reg_date,amount) values('$mem_name','$mem_mobile','$mem_email','$sub_time','$sub_time','$reg_date','$amount')";
		$insert=mysql_query($query) or die(mysql_error());
		if($insert)
		{
			$msg="Successfully Inserted";
			header('location:../view_premium_mem.php?msg='.$msg);
		}
	}
	///general customer insert
	if(isset($_POST['add_gene_cust']))
	{
		
		$cust_mobile=$_POST['cust_mobile'];
		$cust_name=$_POST['cust_name'];
		$cust_email=$_POST['cust_email'];
		$cust_password=$_POST['cust_password'];
		
		$query="INSERT into general_customer(cust_mobile,cust_name,cust_email,cust_password) values('$cust_mobile','$cust_name','$cust_email','$cust_password')";
		$insert=mysql_query($query) or die(mysql_error());
		if($insert)
		{
			$msg="Successfully Inserted";
			header('location:../view_gene_cust.php?msg='.$msg);
		}
	}
	/// regular member insert into gp_customer
	if(isset($_POST['mem_types']))
	{
		$cust_type=$_POST['cust_type'];
		$cust_mobile=$_POST['cust_mobile'];
		$pc_id=$_POST['pc_id'];
		$est_time=$_POST['est_time'];
		$amount=$_POST['amount'];
		$discount=$_POST['discount'];
		$total_discount=$_POST['total_discount'];
		
		$query="INSERT into gp_customer(cust_type,cust_mobile,pc_id,est_time,amount,discount,total_discount) values('$cust_type','$cust_mobile','$pc_id','$est_time','$amount','$discount','$total_discount')";
		$insert=mysql_query($query) or die(mysql_error());
		if($insert)
		{
			$msg="Successfully Inserted";
			header('location:../view_gene_cust.php?msg='.$msg);
		}
	}
	
    ///view premium customer
	if(isset($_POST['add_prem_cust']))
	{
		$cust_type="premium";
		$pc_id=$_POST['pc_id'];	
		$query="INSERT into gp_customer(cust_type,pc_id) values('$cust_type','$pc_id')";
		$insert=mysql_query($query) or die(mysql_error());
		if($insert)
		{
			$msg="Successfully Inserted";
			header('location:../view_cust_info.php?msg='.$msg);
		}
	}
	
	
	
	///customer insert
	if(isset($_POST['add_reg_customer']))
	{
		$cust_type="regular";
		$gen_cust=$_POST['prem_cust'];
		$pc_id=$_POST['pc_id'];
		$est_time=$_POST['est_time'];
		$amount=$_POST['amount'];
		$discount=$_POST['discount'];
		$to_amount=$_POST['to_amount'];
		
		// $entry_time=date('H:i:s');
		$query="INSERT into gp_customer( 	cust_type,cust_mobile,pc_id,est_time,amount,discount,total_amount) values('$cust_type','$gen_cust','$pc_id','$est_time','$amount','$discount','$to_amount')";
		$insert=mysql_query($query) or die(mysql_error());
		if($insert)
		{
			$update=mysql_query("UPDATE pc_info set status='1' where id='$pc_id'");
			if($update)
			{
				$msg="Successfully Inserted";
				header('location:../view_cust_info.php?msg='.$msg);
			}
		}
	}
	//general customer EDit
	if(isset($_POST['edit_gene_cust']))
	{
		$cust_id=$_POST['cust_id'];
		$cust_mobile=$_POST['cust_mobile'];
		$cust_email=$_POST['cust_email'];
		$cust_password=$_POST['cust_password'];
		
		$query="UPDATE general_customer SET cust_mobile='$cust_mobile',cust_email='$cust_email',cust_password='$cust_password' where id='$cust_id'";
		$insert=mysql_query($query) or die(mysql_error());
		if($insert)
		{
			$msg="Successfully Edited";
			header('location:../view_gene_cust.php?msg='.$msg);
		}
	}
	
	
	
	//pc EDit
	if(isset($_POST['edit_pc']))
	{
		$pc_id=$_POST['pc_id'];
		$pc_name=$_POST['pc_name'];
		$config=$_POST['config'];
		$query="UPDATE pc_info SET pc_name='$pc_name',configure='$config' where id='$pc_id'";
		$insert=mysql_query($query) or die(mysql_error());
		if($insert)
		{
			$msg="Successfully Edited";
			header('location:../view_pc.php?msg='.$msg);
		}
	}
	//Add hourly Rate	
	if(isset($_POST['add_hourly_rate']))
	{
		$rate=$_POST['rate'];
		$entry_date=$_POST['entry_date'];
		$query="INSERT into hourly_rate(rate,entry_date) values('$rate','$entry_date')";
		$insert=mysql_query($query) or die(mysql_error());
		if($insert)
		{
			$msg="Successfully Inserted";
			header('location:../view_hourly_rate.php?msg='.$msg);
		}
	}
	//// add discount rate
	if(isset($_POST['add_discount_rate']))
	{
		$dis_condition=$_POST['dis_condition'];
		$dis_rate=$_POST['dis_rate'];
		
		$query="INSERT into discount(dis_condition,dis_rate) values('$dis_condition','$dis_rate')";
		$insert=mysql_query($query) or die(mysql_error());
		if($insert)
		{
			$msg="Successfully Inserted";
			header('location:../view_discount_rate.php?msg='.$msg);
		}
	}
	
    ///edit discount rate
	
	 if(isset($_POST['edit_dis_rate']))
	{
		 $dis_condition=$_POST['dis_condition'];
		 $dis_rate=$_POST['dis_rate'];
		$query="UPDATE discount SET dis_condition='$dis_condition' where dis_id='$dis_id'";
		 $insert=mysql_query($query) or die(mysql_error());
		if($insert)
		 {
			 $msg="Successfully Edited";
			 header('location:../view_discount_rate.php?msg='.$msg);
		}
	}
	
   
	
	//EDit hourly rate
	if(isset($_POST['edit_hourly_rate']))
	{
		$rate_id=$_POST['rate_id'];
		$rate=$_POST['rate'];
		$query="UPDATE hourly_rate SET rate='$rate' where rate_id='$rate_id'";
		$insert=mysql_query($query) or die(mysql_error());
		if($insert)
		{
			$msg="Successfully Edited";
			header('location:../view_hourly_rate.php?msg='.$msg);
		}
	}
	
	
	///member Edit
	if(isset($_POST['edit_premium_mem']))
	{
		// $mem_name=$_POST['mem_name'];
		// $mem_mobile=$_POST['mem_mobile'];
		// $mem_email=$_POST['mem_email'];
		// $sub_time=$_POST['sub_time'];
		// $amount=$_POST['amount'];
		// $query="UPDATE premium_mem SET mem_name='$mem_name',mem_mobile='$mem_mobile',mem_email='$mem_email',sub_time='$sub_time',mem_name='$mem_name',mem_name='$mem_name', where id='$rate_id'";
		// $insert=mysql_query($query) or die(mysql_error());
		// if($insert)
		// {
			// $msg="Successfully Inserted";
			// header('location:../view_premium_mem.php?msg='.$msg);
		// }
	}
	///renew
	if(isset($_POST['renew_mem']))
	{
		$member_id=$_POST['member_id'];
		
		$query="SELECT * from premium_mem where member_id=$member_id";
		$select=mysql_query($query) or die(mysql_error());
		$result = Array();
		while($row = mysql_fetch_assoc($select)){
			//$result[] = $row; 
			$prev_sub_hour=$row[sub_hour];
			$prev_amount=$row[amount];
		}
		
		
		$new_sub_hour=$_POST['sub_hour'];
		$new_amount=$_POST['amount'];
		
		$updated_sub_hour=floatval($prev_sub_hour)+ floatval($new_sub_hour);
		$updated_amount=floatval($prev_amount)+ floatval($new_amount);
		
		$query="UPDATE premium_mem SET  member_id='$member_id',sub_hour='$updated_sub_hour',amount='$updated_amount' where member_id='$member_id'";
		$insert=mysql_query($query) or die(mysql_error());
		if($insert)
		{
			$msg="Successfully Edited";
			header('location:../renew_mem.php?msg='.$msg);
		}
	}
?>