<?php 

session_start();
if($_SESSION["authenticated"] == true){
		$result = '登入者：'.$_SESSION["memId"];
	}else{
		header('Location: login.php');
		exit;
	}
	$time =  date('H:i:s');
?>


<?php
	//主機1
	$ch = curl_init();
	// $url = "http://localhost/phpLab/php_test/testmachine/data.php";  //本地端
	$url = "http://35.197.87.247/jeremy/php_test/testmachine/data.php";
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true ); //將結果回傳成字串
	$result = curl_exec($ch);
	// echo $result;
?>

<!-- 固定時間重新整理 -->
<!-- header('refresh:45 ;url="time_test.php"')?> -->

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Time test</title>
	<link rel="stylesheet" href="css/success.css">
	<link rel="stylesheet" href="css/time_reset.css">
</head>
<body>
	<?php require_once('sidebar.php') ?>
	<div class="box">
		<h2 align="center">北京時間</h2>
		<div id="showbox"></div>
		<p id="showDataForm"></p>
		<div class="flex">
			<ul class="time_one">
				<ol>主機1</ol>
				<ol>主機2</ol>
				<ol>主機3</ol>
			</ul>
			<ul class="time_two">
				<ol id="one"><?php echo $result; ?></ol>
				<ol id="two"><?php echo $result; ?></ol>
				<ol id="three"></ol>
			</ul>
			<div class="time_three">
				<button id="btn1"><img src="image/pencil.png"></button>
				<button id="btn2"><img src="image/pencil.png"></button>
				<button id="btn3"><img src="image/pencil.png"></button>
			</div>
		</div>


		<form id="form" method="POST">
			<input id="hour" type="text" name="hour" maxlength="2" onkeypress="checkNum()">時
			<input id="min" type="text" name="min" maxlength="2" onkeypress="checkNum()">分
			<input id="sec" type="text" name="sec" maxlength="2" onkeypress="checkNum()">秒
			<input id="ajax_btn" type="button" value="修改"  onclick="postData()">
			<!-- <input id="btn4" type="submit" name="" value="修改"> -->
			<input id="btn5" type="button" value="取消" >
		</form>

		<form id="form2" method="POST">
			<input id="hour2" type="text" name="hour" maxlength="2" onkeypress="checkNum()">時
			<input id="min2" type="text" name="min" maxlength="2" onkeypress="checkNum()">分
			<input id="sec2" type="text" name="sec" maxlength="2" onkeypress="checkNum()">秒
			<input id="ajax_btn2" type="button" value="修改"  onclick="postData2()">
			<input id="btn6" type="button" value="取消" >
		</form>

	</div>

	<script type="text/javascript">
		//btn2 修改
			var form = document.getElementById("form");
			var form2 = document.getElementById("form2");
			var btn1 = document.getElementById("btn1");
			var btn2 = document.getElementById("btn2");
			

			var hour = document.getElementById("hour"); //時
			var min = document.getElementById("min"); //分
			var sec = document.getElementById("sec"); //秒
			var btn4 = document.getElementById("btn4"); //修改鈕
			var btn5 = document.getElementById("btn5"); //form 取消鈕
			var btn6 = document.getElementById("btn6");//form2 取消鈕
			
			btn1.onclick = function(){
				form.style.display = "block";
				form2.style.display = "none";
				show.innerHTML = "";
			}

			btn2.onclick = function(){
				form.style.display = "none";
				form2.style.display = "block";
				show.innerHTML = "";
			}

			btn5.onclick = function(){
				form.style.display = "none";	
			}

			btn6.onclick = function(){
				form2.style.display = "none";
			}
	</script>

	<script type="text/javascript">
		var show = document.getElementById('showDataForm');

      //主機1 修改
			function postData(){
				var hour = document.getElementById('hour').value;
        var min = document.getElementById('min').value;
        var sec = document.getElementById('sec').value;

				if(sec > 59 || min > 59 || hour > 23 || sec == "" || min =="" || hour ==""){
					alert("請輸入時間");
					hour="";
					min="";
					sec="";
					return;
				}

        var vars = "hour="+hour+"&min="+min+"&sec="+sec;
				
				// var value = new Array();
				// value[0] = hour;
				// value[1] = min;
				// value[2] = sec;
	      

				// location.href="time_test.php?value=" + value;

					// <?php
					// 		$aa = $_GET['value'];
					// 		$ss = array();
					// 		$len = count(explode(',',$aa));
					// 		for($i=0; $i<$len ; $i++){
					// 			$ss[$i] = explode(',',$aa)[$i];
					// 		}
						  
						  
					    
					//     	$date = date("Y/m/d h:i:sa");
					// 	  	$day = date("Ymd");
					// 	  	$new_line2 = "hour=".$ss[0]."min=".$ss[1]."sec=".$ss[2];
					//   		file_put_contents($day.".log","主機1修改時間 : ".$new_line2 ." ".$date." ", FILE_APPEND);
					    
					// ?>
         
        // console.log(vars);
        var hr = new XMLHttpRequest();
        // var url = "test.php";
        // var url = "http://localhost/phpLab/php_test/testmachine/test.php"; //本地端

        var url = "http://35.197.87.247/jeremy/php_test/testmachine/test.php";
        

        hr.onreadystatechange = function(){
          if(this.readyState == 4 && this.status == 200){
            // var myObj = JSON.parse();      
            // console.log(hr.responseText);
        
            show.innerHTML = hr.responseText;
            form.style.display = "none";
            refresh();
            showTime();
          }
        }

        hr.open("POST",url,true);
        hr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        hr.send(vars);


			}

			// var myVar;

			function refresh(){
				alert("修改成功");
				// myVar = setTimeout(jump,3000);
				window.location.href = "time_test.php";  
			}

			function checkNum(){   
				if(event.keyCode < 48 || event.keyCode > 57){
						event.returnValue = false;   
						window.alert("請輸入數字");
				}
			}	
			// function jump(){
			// 	window.location.href = "time_test.php";
			// }

      //主機2 修改
			function postData2(){
				var hour = document.getElementById('hour2').value;
        var min = document.getElementById('min2').value;
        var sec = document.getElementById('sec2').value;

				if(sec > 59 || min > 59 || hour > 23 || sec == "" || min =="" || hour ==""){
					alert("請輸入時間");
					hour="";
					min="";
					sec="";
					return;
				}

        var vars = "hour="+hour+"&min="+min+"&sec="+sec;
        // console.log(vars);

        var hr = new XMLHttpRequest();
        // var url = "test.php";
        // var url = "http://localhost/phpLab/php_test/testmachine/test2.php"; //本地端

        var url = "http://35.197.87.247/jeremy/php_test/testmachine/test2.php";
        

        hr.onreadystatechange = function(){
          if(this.readyState == 4 && this.status == 200){
            // var myObj = JSON.parse();      
            // console.log(hr.responseText);
            show.innerHTML = hr.responseText;
            form2.style.display = "none";
            refresh();
            showTime();
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
  

	<script type="text/javascript">
			//北京時間
		function showTime(){
			var now = new Date();
			var show = document.getElementById('showbox');
			show.innerHTML = now.getHours() + ":" + now.getMinutes() + ":" + now.getSeconds();
			setInterval('showTime()',1000);
		}

		// var btn2 = document.getElementById('btn2');
			// btn2.onclick = function(){
		// 	var now = new Date();
		// 	var show = document.getElementById('two');
		// 	show.innerHTML = now.getHours() + ":" + now.getMinutes() + ":" + now.getSeconds();
		// // }

			// var show2 = document.getElementById('three');
			// show2.innerHTML = now.getHours() + ":" + now.getMinutes() + ":" + now.getSeconds();

		var btn3 = document.getElementById('btn3');
			btn3.onclick = function(){
			var now = new Date();
			var show = document.getElementById('three');
			show.innerHTML = now.getHours() + ":" + now.getMinutes() + ":" + now.getSeconds();
		}

			
		function IfZero(num){
      return ((num <= 9) ? ("0" + num) : num);
    }
    function check24(hour) {
    return (hour >= 24) ? hour - 24 : hour;
    }

      var dt = new Date();
      var def = dt.getTimezoneOffset()/60;
      var gmt = (dt.getHours() + def);
      var h = gmt;
      var m = dt.getMinutes();
      var s = dt.getSeconds();

      var ending = ":" + IfZero(m) + ":" + IfZero(s);
      
      var thr = document.getElementById('three');
      var tky =check24(((gmt + 9) > 24) ? ((gmt + 9) - 24) : (gmt + 9));
      thr.innerHTML = (IfZero(tky) +ending);         

		
	window.onload = showTime;
	</script>
</body>
</html>