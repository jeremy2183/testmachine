<?php
session_start();
	if($_SESSION["authenticated"] == true){
		$result = '登入者：'.$_SESSION["memId"];
		$time = '登入時間：'.$_SESSION["login_time"];
	}else{
		header('Location: login.php');
		exit;
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>登入成功</title>
	<link rel="stylesheet" href="css/success.css">
</head>
<body>
<?php require_once('sidebar.php') ?>
<!-- <script type="text/javascript">
	function myfunction(){
		setTimeout('login()',2500);
	}
	function login(){
		location.href = "time_test.php";	
	}
	window.onload = myfunction;
</script> -->
</body>
</html>