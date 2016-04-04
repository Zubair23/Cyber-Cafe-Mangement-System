<?php
	include('inc/connection.php');
	include('inc/functions.php');
	if(isset($_GET['rid']))
	{
		$pc_id=$_GET['rid'];
		$row=SelectAllWhere('premium_mem','member_id',$member_id);

		foreach($row as $rw)
		{
			extract($rw);
		}
		if($status==0)
		{
			$query="UPDATE premium_mem SET del_status=1 where member_id='$member_id'";
			$insert=mysql_query($query) or die(mysql_error());
			if($insert)
			{
				$msg="Successfully Deleted";
				header('location:view_premium_mem.php?msg='.$msg);
			}
		}
		else
		{
			$msg="PC Is in used can not be deleted";
			header('location:view_premium_mem.php?msg='.$msg);
		}
	}
?>