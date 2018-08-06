<?php
session_start();
$memId = $_POST['memId'];
$memPsw = $_POST['memPsw'];
require_once("member.php");  //帳密
$len = count($mem);

// echo gettype($memId)." : ".$memId;
// echo "<br>";
// echo gettype($memPsw)." : ".$memPsw;
// echo "<br>";
$day = date("Ymd");
$date = date("Y/m/d h:i:sa");

if(isset($_POST["memId"]) === true){
		$_SESSION['authenticated'] = true;
		$_SESSION['memId'] = $_POST["memId"];
		$_SESSION['login_time'] = date('h:i:sa');
	 for($i=0; $i<$len; $i++){
	   if($memId == $mem[$i][0] && $memPsw == $mem[$i][1]){
	   		$a = "<script>
	   					alert('登入成功');
	   					window.location = 'login_success.php';
	   					</script>";
				file_put_contents($day.".log", "‧ 登入者：".$memId ." ".$date." ", FILE_APPEND);  
				break;
				// header ('login_success.php');		
	 }else{
	     $a = "<script>
							alert('請重新輸入2');
							window.location = 'index.html';
							</script>";
	 }
}
echo $a;
   
}else {
	echo "查無此帳密，請重新登入";
	echo "<br>";
	echo "<a href='index.html'>回首頁</a>";
	exit;
}

?>

