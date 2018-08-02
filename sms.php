<?php
require_once('session.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>簡訊驗證試發</title>
	<link rel="stylesheet" href="css/success.css">
	<link rel="stylesheet" href="css/sms.css">
</head>
<body>
<?php 
	require("sidebar.php");
?>
<div class="box">
	<h2>簡訊驗證碼試發</h2>
	<form id="content" method="POST">
		<input id="code" type="text" name="code" maxlength="3" onkeypress="checkNum()"> 
		<input id="number" type="text" name="number" maxlength="10" onkeypress="checkNum()">
		<input id="btn" type="button" value="送出" onclick="postData()">
	</form>
	<p id="show"></p>
</div>

<script type="text/javascript">
	var show = document.getElementById("show");
	var cod = document.getElementById("code");
	var num = document.getElementById("number");
	
	function postData(){
		var code = document.getElementById("code").value;
	  var number = document.getElementById("number").value;
 
 		if(code =="" || number ==""){
			alert("請輸入號碼");
			code="";
			number="";
			return;
 		}

	  var vars = "code="+code+"&number="+number;
		
		 var hr = new XMLHttpRequest();
        
        var url = "http://localhost/phpLab/php_test/testmachine/api_sms.php"; //本地端

        // var url = "http://35.197.87.247/jeremy/php_test/testmachine/api_sms.php";

        hr.onreadystatechange = function(){
          if(this.readyState == 4 && this.status == 200){
            // var myObj = JSON.parse();      
            // console.log(hr.responseText);
            show.innerHTML = hr.responseText;
            cod.value ="";
            num.value ="";
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
</body>
</html>