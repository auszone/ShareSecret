<?php
	
	session_start();
	error_reporting(4);
	include("mysqlInc2.php");
	
	$sid = $_POST['sid'];
	
	$sql = 'SELECT * FROM data WHERE id='.$sid;
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	$num = $row['readCount']+1;
	$sql = "UPDATE data SET readCount='$num' WHERE id='$sid'";
	mysql_query($sql);
	setcookie("id_".$sid."",$sid,$row['stopTime']);
	
	$con = str_replace("<br/>", "\n", $con);
	$con = htmlspecialchars($row['content']);
		
	echo $con;
	
	
?>