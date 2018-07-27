<?php
class apitest{
	function api($test){
	  // $url = 'http://35.197.97.179/iapi/post.php';
	  $url = 'http://35.225.251.63/iapi/post.php';
		$wa99 = array("wa99" => json_encode($test));
	  // Open connection
	  $ch = curl_init();
	  // Set the url, number of POST vars, POST data
	  curl_setopt($ch, CURLOPT_URL, $url);
	  curl_setopt($ch, CURLOPT_POST, true);
	  // curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true ); //將結果回傳成字串,設為 true，curl 就只會將結果傳回，不會輸出在畫面上。
	  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); //驗證伺服器憑證
	  // curl_setopt($ch, CURLOPT_POSTFIELDS, array("wa99" => json_encode($test)));
	  curl_setopt($ch, CURLOPT_POSTFIELDS, $wa99);

	  // Execute post
	  $result = curl_exec($ch);
	  // Close connection
	  curl_close($ch);
	  $result = json_decode(urldecode($result), true);
	  
	  if (empty($result))
	    {
	        // print "抱歉，這個網站無回應。<p>";
	        // echo "url : ".$url,"<br>";
	        // print_r($wa99);
	    }
	  else
	    {
	        return $result;
	    }  
	  // return $result;
	}


	//siteStatus 網站狀態
	function siteStatus(){
		$sites = array(
			'class_name' => 'member',
			'function_name' => 'siteStatus'
		);

		$val = $this -> api($sites);
		return $val;
	}

}



?>