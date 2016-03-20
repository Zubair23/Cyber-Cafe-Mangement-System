<?php
	include('inc/connection.php');
	include('inc/functions.php');
	
	if(isset($_GET['rid']))
	{
		$rate_id=$_GET['rid'];
		$row=SelectAllWhere('hourly_rate','id',$rate_id);
		foreach($row as $rw)
		{
			extract($rw);
		}
		if($status==0)
		{
			$query="UPDATE hourly_rate SET del_status=1 where id='$rate_id'";
			$insert=mysql_query($query) or die(mysql_error());
			if($insert)
			{
				$msg="Successfully Deleted";
				header('location:view_hourly_rate.php?msg='.$msg);
			}
		}
		else
		{
			$msg="Can not be deleted";
			header('location:view_hourly_rate.php?msg='.$msg);
		}
	}
?>