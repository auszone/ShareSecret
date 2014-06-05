<?php
include 'mysqlInc2.php';
error_reporting(4);
$msg='';
if(!empty($_GET['code']) && isset($_GET['code']))
{
	$code=mysql_real_escape_string($_GET['code']);
	$sql = "SELECT uid FROM users WHERE activation='$code'";
    $result = mysql_query($sql);
    $row = mysql_fetch_array($result);
	//$c=mysqli_query($connection,"SELECT uid FROM users WHERE activation='$code'");

	if($row != null)
	{
	
	$sql = "SELECT uid FROM users WHERE activation='$code' and status='0'";
    $result = mysql_query($sql);
    $count = mysql_num_rows($result);
	//$count=mysqli_query($connection,"SELECT uid FROM users WHERE activation='$code' and status='0'");

	if($count == 1)
	{
    $sql = "UPDATE users SET status='1' WHERE activation='$code'";
    $result = mysql_query($sql);
    //mysqli_query($connection,"UPDATE users SET status='1' WHERE activation='$code'");
    $msg="Your account is activated";
    echo '<script>';
	echo 'alert("'.$msg.'")';
	echo '</script>';
	echo '<meta http-equiv=REFRESH CONTENT=0;url=sharesecret_login.php>';
    }
    else
    {
	$msg ="Your account is already active, no need to activate again";
	echo '<script>';
	echo 'alert("'.$msg.'")';
	echo '</script>';
	echo '<meta http-equiv=REFRESH CONTENT=0;url=sharesecret_login.php>';
    }

    }
    else
    {
	$msg ="Wrong activation code.";
	echo '<script>';
	echo 'alert("'.$msg.'")';
	echo '</script>';
	echo '<meta http-equiv=REFRESH CONTENT=0;url=sharesecret_login.php>';
    }

}
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>PHP Email Verification Script</title>
<link rel="stylesheet" href="<?php echo $base_url; ?>style.css"/>
</head>
<body>
	<div id="main">
	<h2><?php echo $msg; ?></h2>
	</div>
</body>
</html>