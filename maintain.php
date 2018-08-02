<?php
require_once('session.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>維護時間設定</title>
	<link rel="stylesheet" href="css/success.css">
	<link rel="stylesheet" href="css/maintain.css">
</head>
<body>
<?php 
	require("sidebar.php");
?>
<div class="box">
	<h2>維護時間設定</h2>
	<form id="form">
		<input id="date" type="date">
		<input id="hour" type="text" onkeypress="checkNum()">時
		<input id="min" type="text" onkeypress="checkNum()">分
		<input id="sec" type="text" onkeypress="checkNum()">秒
		<input id="btn" type="button" value="設定" onclick="setTime()">
	</form>
  <p id="show"></p>
	
	<script type="text/javascript">
		 var show = document.getElementById("show");
	   var d = document.getElementById("date");
		 var h = document.getElementById("hour");
		 var m = document.getElementById("min");
		 var s = document.getElementById("sec");

		function setTime(){
			 var date = document.getElementById("date").value;
			 var hour = document.getElementById("hour").value;
			 var min = document.getElementById("min").value;
			 var sec = document.getElementById("sec").value;
			
       if(date == "" || hour == "" || min == "" || sec == ""){
       		alert("請輸入日期時間");
       		return;
       }

			 var vars = "date="+date+"&hour="+hour+"&min="+min+"&sec="+sec;

			 var hr = new XMLHttpRequest();
       var url = "api_maintain.php";
       // var url = "http://localhost/phpLab/php_test/testmachine/api_miantain.php"; //本地端

        hr.onreadystatechange = function(){
          if(this.readyState == 4 && this.status == 200){
            // var myObj = JSON.parse();      
            // console.log(hr.responseText);
            alert("成功");
            show.innerHTML = hr.responseText;
            d.value = "";
            h.value = "";
            m.value = "";
            s.value = "";
          }
        }

        hr.open("POST",url,true);
        hr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        hr.send(vars);
        
		}

		function checkNum(){   
			if(event.keyCode < 48 || event.keyCode > 57){
					event.returnValue = false;   
					window.alert("請輸入數字");
			}
		}	
	</script>
</div>
	
</body>
</html>