<?php
session_start();
include("db.php");
?>
<?php
$sub = $_GET['sub'];
if(isset($sub)){
	$new_pwd=$_GET['password'];
	$email = $_SESSION['email'];
	$sql = "UPDATE users SET password = '$new_pwd' WHERE email='$email'";
	$result = mysql_query($sql);
	if($result){
		$_SESSION['password']=$new_pwd;
		echo '<script>
		alert("Successfully Modified")
		</script>';
		echo '<meta http-equiv=REFRESH CONTENT=0;url=index.php>'; 
	}
}
?>
<html>
<head>
<link rel=stylesheet type="text/css" href="myCss.css">
</head>
<form action="mdyinfo.php" method="get">
	New Password:<input type="text" name="password"><br/>
	<input type="submit" name="sub">
</form>
</html>