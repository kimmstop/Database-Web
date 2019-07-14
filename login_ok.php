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
$userid=$_SESSION['userid'];
$con=mysqli_connect('localhost','root','kim4866','Project');
$sql="select * from user where Uid=\"$userid\";";
mysqli_query($con,'set names utf8');
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);
$userpoint=$row['Point'];
?>
<html>
<style>
h3{
	margin-right:10;
	margin-top:30;
	color:orange;
}
.info{
    margin-right:1;
    width:300;
    border : 3px solid #73AD21;
}
</style>
	<head>
		<meta charset="utf-8">
		<title><?php
			echo 'BOOK';
		?></title>
		<img src="bookpicture.jpg" width="100%" height="15%">
	</head>
	<body style="background-color:powderblue;">
	<h1><a href="login_ok.php">BOOK</a></h1>
	<h1><?php
		echo "<font size='10' color='black'>검색</font>";
	?>
    </h1>
    <h4 >
  	<div class="info" >
        <h3 align="right">
        <p style="color:green"><?php echo $_SESSION['userid']?>님 환영합니다!</p>
		<?php if($userpoint>=3000){
			echo "VIP회원님 환영합니다!!";?><br>
		<?php 
			echo "모든 책 2000원 할인!!";
		}
		?>
        <h5 align="right" style="color:gray">포인트:<?php echo $row['Point']?>point</h5>
		<p><a href="logout.php">로그아웃</a></p>
		<p><a href="delmember_check.php">회원탈퇴</a></p>
        <p><a href="buy_list.php">도서 구매 목록 조회</a></p>
        <p><a href="reg_list.php">도서 등록 목록 조회</a></p>
		<p><a href="regbook.php">도서 등록 하기</a></p>
	    </h3>
    </div>
    </h4>
    <h3 align ="center"><form method="post" action="search.php">
		<strong style="color:blue">검색</strong>
		<input type="search" name="booktitle" placeholder="책 이름/작가" style="width:500">
		<input type="submit">
	</form></h3>
	</body>
</html>