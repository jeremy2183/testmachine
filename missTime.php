<?php
    //接收javascript傳來的值
    // echo $_GET['value'];
    // $aa = $_GET['value'];
    // echo $aa;

// date_default_timezone_get("Asia/Taipei");
// date('Y-m-d G:i:T', strtotime('+8HOUR'));
// date_default_timezone_set("Asia/Taipei");
// echo date('h:i:s');
// echo "<br>";



$hour = '12';
$min = '30';
$sec = '00';
$time = "$hour:$min:$sec";
echo $time;   //2
echo "<br>";
echo "更改的時間為：";
echo exec('sudo date -s '.$time, $log, $status); //3
echo "<br>";
echo "output: " .$log;
echo "<br>";
echo "Return value: " .$status;
echo "<hr>";	

// $time = 'sudo date -s "18:18:00"';
// echo "更改的時間為：".exec($time);
// echo "<hr>";

// date_default_timezone_set("Asia/Tokyo");
// echo date('Y-m-d H:i:s',strtotime('-8HOUR')),"<br>";


// echo "設置時間："."<br>";
// $command = "sudo date -s '$('wget -qSO- --max-redirect=0 google.com 2>&1 | grep Date: | cut -d' ' -f5-8)Z'";
// exec('$command', $log, $status);
// print_r($log);
// echo "<br>";
// echo "Return value: " .$status."<br>";
// echo exec("$command")."<br>";
// echo "<br><hr>";

// echo "<h3>抓取主機時間</h3>";
// echo "主機時間：";
// echo exec("date")."<br><hr>";

echo "讀取時間："."<br>";
$command = "date; hwclock -r";
exec('$command', $log, $status);
print_r($log);
echo "<br>";
echo "Return value: " .$status."<br>";
echo exec("$command")."<br>";
echo "<br><hr>";

echo "寫入時間："."<br>";
$command2 = "hwclock -w; hwclock -r";
exec('$command2', $log, $status);
print_r($log);
echo "<br>";
echo "Return value: " .$status;
echo exec("$command2");
echo "<br><hr>";

// echo "<h3>目前正確時間</h3>";
// echo "當前時間是：".exec('date "+%H:%M:%S"')."<br>";
// echo "寫入：".exec("hwclock -w; hwclock -r; date")."<br>";

// echo date('h:i:s');





?>