<?php
	$file = fopen("http://35.197.87.247/jeremy/php_test/testmachine/memName.txt", "r");  //帳密
	//輸出文本中所有的行，直到文件結束為止。
	while(! feof($file)){
	  $data=fgets($file);   //fgets 一次抓一行
	  echo "<pre>";
	  print_r(json_decode($data,true));
	  $mem = json_decode($data,true);
	}
	fclose($file);
?>