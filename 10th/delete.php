<?php
	include('inc/connection.php');
	include('inc/functions.php');
	if(isset($_GET['rid']))
	{
		$pc_id=$_GET['rid'];
		$row=SelectAllWhere('pc_info','id',$pc_id);
		foreach($row as $rw)
		{
			extract($rw);
		}
		if($status==0)
		{
			$query="UPDATE pc_info SET del_status=1 where id='$pc_id'";
			$insert=mysql_query($query) or die(mysql_error());
			if($insert)
			{
				$msg="Successfully Deleted";
				header('location:view_pc.php?msg='.$msg);
			}
		}
		else
		{
			$msg="PC Is in used can not be deleted";
			header('location:view_pc.php?msg='.$msg);
		}
	}
	//undo
		if(isset($_GET['undoid']))
	{
		$pc_id=$_GET['undoid'];
		$query="UPDATE pc_info SET del_status=0 where id='$pc_id'";
		$insert=mysql_query($query) or die(mysql_error());
		if($insert)
		{
			$msg="Successfully Deleted";
			header('location:view_pc.php?msg='.$msg);
		}
		else
		{
			$msg="PC can not be retrive";
			header('location:view_pc.php?msg='.$msg);
		}
	}
	// if(isset($_GET['rateid']))
	// {
		// $rate_id=$_GET['rateid'];
		// $query="UPDATE hourly_rate SET del_status=1 where rate_id='$rate_id'";
		// $insert=mysql_query($query) or die(mysql_error());
		// if($insert)
		// {
			// $msg="Successfully Deleted";
			// header('location:view_hourly_rate.php?msg='.$msg);
		// }	
	// }
?>