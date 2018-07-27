<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>ajax_test</title>
</head>
<body>
	 <form name="TestForm" action="test.php" method="post">
        時:<input type="text" name="hour" id="hour"><br>
        分:<input type="text" name="min" id="min" ><br>
        秒:<input type="text" name="sec" id="sec"><br>
        <input type="button" value="SEND via AJAX" onclick="postData()">
        <input type="submit" value="submit">
    </form>
	
		<div id="output"></div>

	<script> 
     		var output = document.getElementById('output');
     	function postData(){
			  var hour = document.getElementById('hour').value;
        var min = document.getElementById('min').value;
        var sec = document.getElementById('sec').value;

        var vars = "hour="+hour+"&min="+min+"&sec="+sec;
        console.log(vars);
        var hr = new XMLHttpRequest();
        var url = "test.php";
        hr.onreadystatechange = function(){
          if(this.readyState == 4 && this.status == 200){
            // var myObj = JSON.parse();      
            console.log(hr.responseText);
            output.innerHTML = hr.responseText;

          }
        }
        hr.open("POST",url,true);
        hr.setRequestHeader("Content-type","application/x-www-form-urlencoded");

        hr.send(vars);
    }
</script>
</body>
</html>