<?php
//陣列是使用者資料
	$a=array(
		1=>array('user'=>'jeremy','pw'=>'123'),
		2=>array('user'=>'iroman','pw'=>'456'),
		3=>array('user'=>'flash' ,'pw'=>'789'),
		4=>array('user'=>'vivian','pw'=>'012')
		);

	echo "<pre>";
	print_r($a);
	// $_GET['user']='iroman';
	// $_GET['pw']='456';
	while(list($key)=each($a))
	{
		$mem=$a[$key];
		if($_GET['user']==$mem['user'] && $_GET['pw']==$mem['pw'])
		{
			$msg= 'welcome';
			break;
		}
		else
		{
			$msg= 'getout';
		}
	}


	echo $msg;

?>