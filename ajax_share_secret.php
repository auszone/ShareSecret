<?php
	session_start();
	include("mysqlInc2.php");
	error_reporting(4);
	
	
		if($_SESSION['email']!=null) $acc = $_SESSION['email'];
		else $acc = '';
		//$acc = $_SESSION['account'];
		$sql = "SELECT MAX(id) AS '最大值' FROM data";
		mysql_query($sql);
		$result = mysql_query($sql);
		$row = mysql_fetch_array($result);
		$id = $row['最大值']+1;
		$content = $_POST['content'];
		$con = mysql_real_escape_string($content);
		//$con = mysql_real_escape_string($_POST['content']);
		date_default_timezone_set('Asia/Taipei');
		$startTime = date('Y-m-d H:i:s');
		//$stopTime = time() + 24*60*60*$_POST['day'] + 60*60*$_POST['hour'] + 60*$_POST['minute'];
		//$count = $_POST['count'];
		$counter = $_POST['counter'];
		if($counter==1){
			$count = 1;
		}else if($counter==2){
			$count = 3;
		}else if($counter==3){
			$count = 5;
		}else if($counter==4){
			$count = 10;
		}else if($counter==5){
			$count = 25;
		}else if($counter==6){
			$count = 50;
		}else if($counter==7){
			$count = 100;
		}else if($counter==8){
			$count = 250;
		}else if($counter==9){
			$count = 500;
		}else if($counter==10){
			$count = 1000;
		}
		//else if($_POST['counter']==10){
		$timer = $_POST['timer'];
		if($timer==1){
			$stopTime = time() + 60*1;
		}else if($timer==2){
			$stopTime = time() + 60*10;
		}else if($timer==3){
			$stopTime = time() + 60*30;
		}else if($timer==4){
			$stopTime = time() + 60*60*1;
		}else if($timer==5){
			$stopTime = time() + 60*60*3;
		}else if($timer==6){
			$stopTime = time() + 60*60*12;
		}else if($timer==7){
			$stopTime = time() + 24*60*60*1;
		}else if($timer==8){
			$stopTime = time() + 24*60*60*3;
		}else if($timer==9){
			$stopTime = time() + 24*60*60*7;
		}else if($timer==10){
			$stopTime = time() + 24*60*60*30;
		}
		//}else if($_POST['timer']==10){
		$sql = "INSERT INTO data (account, id, content, startTime, stopTime, count) VALUES ('$acc', '$id', '$con', '$startTime', '$stopTime', '$count')";
		mysql_query($sql);
		
		setcookie("id_".$id."",$id,$stopTime);
		
?>