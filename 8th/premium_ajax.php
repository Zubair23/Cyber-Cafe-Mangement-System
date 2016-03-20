<?php
include_once('inc/connection.php');
include_once('inc/functions.php');

if(!empty($_POST['cid']))
{
	$customer_id = $_POST['cid'];
	$rows=SelectAllWhere('premium_mem','member_id',$customer_id);
	extract($rows);
	foreach($rows as $row){
		extract($row);
	}
	echo $remain_hour;
	// echo "test";
}
?>