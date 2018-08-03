<?php 
 $file = fopen("memName.txt", "r");

//輸出文本中所有的行，直到文件結束為止。
	while(! feof($file)){
	  // echo fgets($file)."<br>";
	  $data=fgets($file);   //fgets 一次抓一行
	  //$x=json_encode($data);
	  echo "<pre>";
	  print_r(json_decode($data,true));
	  $aa = json_decode($data,true);
	}
	fclose($file);
	$len = count($aa);
	echo "length : ".$len;
	echo "<br>";
	echo gettype($aa[0][0])." : ".$aa[0][0];
	echo "<br>";
	echo gettype($aa[0][1])." : ".$aa[0][1];
	echo "<br>";
	
	 $memId = "jeremy";
	 $psw = "123";

	echo gettype($memId)." : ".$memId;
	echo "<br>";
	echo gettype($psw)." : ".$psw;
	echo "<br>";

   if ($memId == $aa[0][0] && $psw == $aa[0][1]){
			echo "答對了";
		}else{
			echo "答錯了";
		}


	echo "<br>";
	for($i=0; $i<$len; $i++){
	   echo "ID : ".$aa[$i][0]." "."psw : ".$aa[$i][1]."<br>";
	   if ($memId == $aa[$i][0] && $psw == $aa[$i][1]){
				echo "答對了是jeremy"."<br>";
			}
	}
	
	


?>