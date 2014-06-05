<?php
	
	session_start();
	error_reporting(4);
	include("mysqlInc2.php");
	
	$sid = $_POST['sid'];
	$k = $_POST['k'];
	
	$sql = 'SELECT * FROM data WHERE id='.$sid;
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	
	echo $k.' '.($row['stopTime']-time()).' '.($row['count'] - $row['readCount']);
	
	
?>