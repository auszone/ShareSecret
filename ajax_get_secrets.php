<?php
	
	session_start();
	error_reporting(4);
	include("mysqlInc2.php");
	
	$sql = 'SELECT * FROM data ORDER BY RAND()';
		$result = mysql_query($sql);
	
		$scount=1;
		while($sid = mysql_fetch_array($result)){
			if($sid['stopTime']>time() && $sid['readCount']<$sid['count']){
			getMsgs($sid['id'],$scount);
			if($scount>9) break;
			}
		}
		function getMsgs($sid1,$scount1){
			$read = 0;
			$ID = $_COOKIE["id_".$sid1.""];
			if($ID!=null) $read = 1;
		
			if($read==0){
				$scount++;
				//echo '<script language="javascript">';
				echo $sid1.' ';
				//echo 'alert("'.$sid1.'");';
				//echo '</script>';
			}
		
		}
	
	
?>