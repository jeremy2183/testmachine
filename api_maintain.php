<?php
$date = $_POST["date"];
$hour = $_POST["hour"];
$min = $_POST["min"];
$sec = $_POST["sec"];

$time = date("Y/m/d h:i:sa");
$day = date("Ymd");
$new_line = $date." ".$hour.":".$min.":".$sec; 
$main = array(
	'reCode' => '000',
	'reData' => $new_line
);

$json = json_encode($main);

file_put_contents($day.".log", "， 設定時間：".$new_line." ".$json." ".$time." ", FILE_APPEND);

echo $new_line."<br>";
echo $json;

file_put_contents("setTime".$day.".txt",$json, FILE_APPEND);  



?>