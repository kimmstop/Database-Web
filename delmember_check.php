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
?>
<html>
<head>
		<meta charset="utf-8">
		<title><?php
			echo 'BOOK';
		?></title>
		<img src="bookpicture.jpg" width="100%" height="15%">
	</head>
	<body style="background-color:powderblue;"></body>
<h2>
    <?php
    print "정말로 탈퇴 하시겠습니까?";
    ?></h2>
    <h1>
    <table>
    <tr>
    <form method="post" action="delmember.php">
    <td align="center"><button  type="submit">예</button></td>
    </form>
    <form method="post" action="login_ok.php">
    <td align="center"><button type="submit">아니요</button></td>
    </form>
    </tr>
    </table>
    </h1>
</html>