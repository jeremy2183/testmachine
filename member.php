<?php
$ch = curl_init();
$url = "http://35.197.87.247/jeremy/php_test/testmachine/member.txt";
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true ); 
$result = curl_exec($ch);
?>