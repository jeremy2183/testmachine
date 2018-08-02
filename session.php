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