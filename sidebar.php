<div class="bg-img"></div>
<div class="sidebar">
	<figure class="logo">
		<img src="image/1200px-2018_FIFA_world_cup.svg.png">
	</figure>
	<div class="welcome">
		歡迎，<span><?php echo $_SESSION["memId"]; ?></span>管理員				
	</div>
	<ul>
		<li><a href="time_test.php" class="item">各主機時間&重設</a></li>
		<li><a href="api_host.php" class="item">各主機API連線狀態</a></li>
		<li><a href="sms.php" class="item">簡訊驗證碼試發/簡訊Log狀態</a></li>
		<li><a href="maintain.php" class="item">維護時間設定</a></li>
		<li><a href="logout.php" class="item">登出</a></li>
	</ul>
</div>

<script type="text/javascript">
	function service(){
		alert("尚在維護中");
	}
</script>