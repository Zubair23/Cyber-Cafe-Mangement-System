<?php
	include('connection.php');
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
?>