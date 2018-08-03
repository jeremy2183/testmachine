<?php
$memId = $_POST['memId'];
$memPsw = $_POST['memPsw'];
require_once('member.php');   //會員帳密
$sev = explode(',',$result);
print_r($sev);
var_dump($sev);
 $cus = array("id"=>$sev[0],"psw"=>$sev[1],"id2"=>$sev[2],"psw2"=>$sev[3],"id3"=>$sev[4],"psw3"=>$sev[5],"id4"=>$sev[6],"psw4"=>$sev[7]);
 

if(isset($_POST["memId"]) === true){
	if($memId == $cus["id"] && $memPsw == $cus["psw"] || $memId == $cus["id2"] && $memPsw == $cus["psw2"] || $memId == $cus["id3"] && $memPsw == $cus["psw3"] || $memId == $cus["id4"] && $memPsw == $cus["psw4"]){
		
		session_start();
    
		$_SESSION['authenticated'] = true;
		$_SESSION['memId'] = $_POST["memId"];
		$_SESSION['login_time'] = date('h:i:sa');
		
		if(isset($_SESSION["UrlRedirect"])){
			$redir = $_SESSION["UrlRedirect"];
		}else{
				$date = date("Y/m/d h:i:sa");
				$day = date("Ymd");
			 // 寫入登入者資料到list2.txt

			if ($_POST["memId"] == $cus["id"]){
	      	$new_line2 = implode(array($cus["id"])); 
       }else if ($_POST["memId"] == $cus["id2"]){
	      	$new_line2 = implode(array($cus["id2"])); 
       }else if ($_POST["memId"] == $cus["id3"]){
	      	$new_line2 = implode(array($cus["id3"])); 
       }else if ($_POST["memId"] == $cus["id4"]){
	      	$new_line2 = implode(array($cus["id4"])); 
       }
       file_put_contents($day.".log", "、 登入者：".$new_line2 ." ".$date." ", FILE_APPEND); // file_put_contents(把字串寫入文件中)

			echo "<script>
						alert('登入成功');
						location.href = 'login_success.php';	
					</script>";

			header ('login_success.php');		
			// $redir = 'login_success.php';
		}
		// header("Location: $redir");
		exit;
	}else{
		echo "<script>
						alert('查無此帳密，請重新登入');
						window.location = 'index.html';
					</script>";
	}

}else {
	echo "查無此帳密，請重新登入";
	echo "<br>";
	echo "<a href='index.html'>回首頁</a>";
	exit;
}

?>

