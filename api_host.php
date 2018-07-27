<?php 

session_start();
if($_SESSION["authenticated"] == true){
		$result = '登入者：'.$_SESSION["memId"];
	}else{
		header('Location: login.php');
		exit;
	}

require("api_call.php");

$apitest = new apitest();
$sites = $apitest -> siteStatus();
// var_dump($sites);
$code = $sites["errorCode"];
// $code = "";  //測試用
$val="";
$err = "";
$url = "";
$sites = array(
			'class_name' => 'member'."<br>",
			'function_name' => 'siteStatus'
		);
$normal = "000";  //正常
$test = "909";  //p模試
$main = "999";  //維護
	if($normal == $code){
		$val = "正常";
		$sucs = "目前主機線路正常";
		$date = date("Y/m/d h:i:sa");
		$day = date("Ymd");
		$new_line2 = "，連線狀態 -> errorCode : ".$code." message : ".$val;
		file_put_contents($day.".log",$new_line2." ".$date." ", FILE_APPEND);
	}else if($test == $code){
		$val = "測試中";
		$test99 = "目前主機正在測試中";
		$date = date("Y/m/d h:i:sa");
		$day = date("Ymd");
		$new_line2 = "，連線狀態 -> errorCode : ".$code." message : ".$val;
		file_put_contents($day.".log",$new_line2." ".$date." ", FILE_APPEND);
	}else if($main == $code){
		$val = "維護中";
		$err99 = "目前主機正在維護中";
		$date = date("Y/m/d h:i:sa");
		$day = date("Ymd");
		$new_line2 = "，連線狀態 -> errorCode : ".$code." message : ".$val;
		file_put_contents($day.".log",$new_line2." ".$date." ", FILE_APPEND);
	}else{
		$val = "空值";
		$err = "主機1 => 抱歉，目前主機無回應";
		$url = "http://35.225.251.63/iapi/post.php";
		$wa99 = $sites;
		$date = date("Y/m/d h:i:sa");
		$day = date("Ymd");
		$new_line2 = "，連線狀態 -> errorCode : ".$val." message : ".$err." ".$url;
		file_put_contents($day.".log",$new_line2." ".$date." ", FILE_APPEND);
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>API status</title>
	<link rel="stylesheet" href="css/success.css">
	<link rel="stylesheet" href="css/api_host.css">
</head>
<body>
	<?php require_once('sidebar.php') ?>
	<div id="show">
		<?php
		  echo $sucs;
		  echo $err99;
		  echo $test99;
		  echo "$err<br>";
		  echo "$url<br>";
			print_r($wa99);
		?>
	</div>
	<div class="box">
			<div class="flex">
				<ul class="host">
					<ol>主機1</ol>
					<ol>主機2</ol>
					<ol>主機3</ol>
				</ul>
				<ul class="status">
					<ol id="one"><?php echo $val." (代碼:$code)" ?></ol>
					<ol id="two"><?php echo $val." (代碼:$code)" ?></ol>
					<ol id="three"><?php echo $val." (代碼:$code)" ?></ol>
				</ul>
			</div>
	</div>

</body>
</html>