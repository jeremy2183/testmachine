<?php
$code = $_POST["code"];
$number = $_POST["number"];
  smsCode();

	$day = date("Ymd");
	$new_line2 = "國碼 = ".$code." 手機號碼 = ".$number;
	file_put_contents($day.".log","簡訊驗證碼試發 : ".$new_line2 ." ", FILE_APPEND);

	function smsapi($test){
	  $url = 'http://ss.qsfsys.com/sms/smsCode.php';

	  // Open connection
	  $ch = curl_init();
	  // Set the url, number of POST vars, POST data
	  curl_setopt($ch, CURLOPT_URL, $url);
	  curl_setopt($ch, CURLOPT_POST, true);
	  // curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true ); //將結果回傳成字串
	  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); //驗證伺服器憑證
	  curl_setopt($ch, CURLOPT_POSTFIELDS,$test);

	  // Execute post
	  $result = curl_exec($ch);
	  // Close connection
	  curl_close($ch);
	  $result = json_decode($result, true);
	  
	  if (empty($result))
	    {
	        print "抱歉，這個網站無回應。<p>";
	    }
	  else
	    {
	        // return $result;
	        // var_dump($result);
	    	  
	        $reCode = $result["reCode"];
	        $reMsg = $result["reMsg"];
					$val = "";
					if($reCode == "000"){
						$val = "[TG系統]您的动态码是：".$reMsg;
						echo "reCode : ".$reCode;
						echo "<br>";
						echo $val;
						echo "<br>";

						$date = date("Y/m/d h:i:sa");
						$day = date("Ymd");
						$new_line2 = "， [TG系統]您的动态码是：".$reMsg."  reCode : ".$reCode;
						file_put_contents($day.".log",$new_line2 ." ".$date." ", FILE_APPEND);
					}else if($reCode == "101" || $reCode == "102" ){
						echo "reCode : ".$reCode;
						echo "<br>";
						echo "reMsg : ".$reMsg;
						echo "<br>";
						$date = date("Y/m/d h:i:sa");
						$day = date("Ymd");
						$new_line2 = "， reCode : ".$reCode." reMsg : ".$reMsg;
						file_put_contents($day.".log",$new_line2." ".$date." ", FILE_APPEND);
					}else if($reCode == "103"){
						// $val = $reMsg;
						echo "reCode : ".$reCode;
						echo "<br>";
						echo "reMsg : ".$reMsg;
						echo "<br>";
						$date = date("Y/m/d h:i:sa");
						$day = date("Ymd");
						$new_line2 = "， reCode : ".$reCode." reMsg : ".$reMsg;
						file_put_contents($day.".log",$new_line2 ." ".$date." ", FILE_APPEND);
					}else if($reCode == "104"){
						// $val = $reMsg;
						echo "reCode : ".$reCode;
						echo "<br>";
						echo "reMsg : ".$reMsg;
						echo "<br>";
						$date = date("Y/m/d h:i:sa");
						$day = date("Ymd");
						$new_line2 = "， reCode : ".$reCode." reMsg : ".$reMsg;
						file_put_contents($day.".log",$new_line2." ".$date." ", FILE_APPEND);
					}else if($reCode == "105"){
						// $val = $reMsg;
						echo "reCode : ".$reCode;
						echo "<br>";
						echo "reMsg : ".$reMsg;
						echo "<br>";
						$date = date("Y/m/d h:i:sa");
						$day = date("Ymd");
						$new_line2 = "， reCode : ".$reCode." reMsg : ".$reMsg;
						file_put_contents($day.".log",$new_line2." ".$date." ", FILE_APPEND);
					}else if($reCode == "106"){
						// $val = $reMsg;
						echo "reCode : ".$reCode;
						echo "<br>";
						echo "reMsg : ".$reMsg;
						echo "<br>";
						$date = date("Y/m/d h:i:sa");
						$day = date("Ymd");
						$new_line2 = "， reCode".$reCode." reMsg : ".$reMsg;
						file_put_contents($day.".log",$new_line2 ." ".$date." ", FILE_APPEND);
					}else if($reCode == "107"){
						// $val = $reMsg;
						echo "reCode : ".$reCode;
						echo "<br>";
						echo "reMsg : ".$reMsg;
						echo "<br>";
						$date = date("Y/m/d h:i:sa");
						$day = date("Ymd");
						$new_line2 = "， reCode : ".$reCode." reMsg : ".$reMsg;
						file_put_contents($day.".log",$new_line2." ".$date." ", FILE_APPEND);
					}else{
						print_r($result);		
					}
					
					
				// print_r($result);
	    }  	
	  // return $result;
	}

//發送簡訊驗證碼 
	function smsCode(){
		$code = $_POST["code"];
		$number = $_POST["number"];	
		// echo $code.'-'.$number;

		$smscode = array(
			'function_name' => 'smsCode',
			'reMode' => 'JSON',
			'phone' => $code.'-'.$number
		);

		smsapi($smscode);
		return;
		
	}


// var_dump($val);

?>