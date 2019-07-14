<?php
session_start();
$timeout=600;
if(isset($_SESSION['start_time'])){
	$time=time()-$_SESSION['start_time'];
	if($time>=$timeout){
		session_destroy();
		echo "<script>alert(\"다시 로그인 해주세요.\")</script>";
		header('Location: ./index.php');
	}
}
$_SESSION['start_time']=time();
$temp=session_destroy();
if($temp){
    header('Location: ./index.php');
}
?>