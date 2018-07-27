<?php
  $ch = curl_init();
	$url = "http://localhost/phpLab/php_test/testmachine/test-txt2.php";  //本地端
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true ); //將結果回傳成字串
	$result = curl_exec($ch);
	

?>