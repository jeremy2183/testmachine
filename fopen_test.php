<?php
// $myfile = fopen("list.txt", "a");
// $txt = "Mickey\r\n";
// fwrite($myfile, $txt);   //第一個參數包含要寫入的文件的文件名，第二個參數是被寫的字符串
// $txt = "Minnie\r\n";
// fwrite($myfile, $txt);
// fclose($myfile);


// $line_arr = file("list.txt");
// print_r($line_arr);



/*
 * 逐行读取TXT文件 
 */
// function getTxtcontent($txtfile){
	$file = @fopen("member.txt",'r');
	$content = array();
	if(!$file){
		echo  'file open fail';
	}else{
		$i = 0;
		while (!feof($file)){
			$content[$i] = mb_convert_encoding(fgets($file),"UTF-8","GBK,ASCII,ANSI,UTF-8");
			$i++ ;
		}
		fclose($file);
		$content = array_filter($content); //数组去空
	}
 
	$aa = $content[0];
	$bb = $content[1];
  echo $aa." ".$bb."<br>";
  
  echo "<h3>jack array</h2>";
  $jack = array();
  $len = count($content);
  for($i=0; $i<$len ; $i++){
  	$jack[$i] = trim($content[$i]);
  }
  var_dump($jack);
  echo "<hr>";

	$arr = array("jeremy","cool");
	var_dump($arr);
	$id = $arr[0];
	$ps = $arr[1];

	if($jack[0] == $id){
		echo "yes";
	}else{
		echo "no";
	}



// }








?>