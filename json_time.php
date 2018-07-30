<?php
$day = date("Ymd");
// $main = file("http://35.197.87.247/jeremy/php_test/testmachine/setTime20180727.txt");
$main = file("http://35.197.87.247/jeremy/php_test/testmachine/setTime".$day.".txt");
echo json_encode($main);

?>