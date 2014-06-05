<?php
	
	session_start();
	error_reporting(4);
	include("mysqlInc2.php");
	
	$sid = $_POST['sid'];
	
	$sql = 'SELECT * FROM data WHERE id='.$sid;
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
		
	echo $row['stopTime']-time();
	
	
?>