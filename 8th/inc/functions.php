<?php
	//include('connection.php');
	function SelectAll($table)
	{
		$query="SELECT * from $table";
		$select=mysql_query($query) or die(mysql_error());
		$result = Array();
		while($row = mysql_fetch_assoc($select)){
			$result[] = $row; 
		}
		return $result;
	}
	////
	function SelectAllWhere($table,$where,$value)
	{
		$query="SELECT * from $table where $where=$value";
		$select=mysql_query($query) or die(mysql_error());
		$result = Array();
		while($row = mysql_fetch_assoc($select)){
			$result[] = $row; 
		}
		return $result;
	}

?>