<?php
$hour = $_POST["hour"];
$min = $_POST["min"];
$sec = $_POST["sec"];
$time = "$hour:$min:$sec";
// echo "主機2修改時間為：".$time;   //2

$date = date("Y/m/d h:i:sa");
$day = date("Ymd");
$new_line2 = $time;
file_put_contents($day.".log","主機2修改時間 : ".$new_line2 ." ".$date." ", FILE_APPEND);

// echo "更改的時間為：";
exec('sudo date -s '.$time); //3
// echo "<br>";
// echo "output: " .$log;
// echo "<br>";
// echo "Return value: " .$status;
// echo "<hr>";	

// echo "讀取時間："."<br>";
$command = "date; hwclock -r";
exec('$command');
// print_r($log);
// echo "<br>";
// echo "Return value: " .$status."<br>";
// echo exec("$command")."<br>";
// echo "<br><hr>";

// echo "寫入時間："."<br>";
$command2 = "hwclock -w; hwclock -r";
exec('$command2');
// print_r($log);
// echo "<br>";
// echo "Return value: " .$status;
// echo exec("$command2");
// echo "<br><hr>";

?>