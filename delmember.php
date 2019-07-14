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
$Userid=$_SESSION['userid'];
$con=mysqli_connect('localhost','root','kim4866','Project');
$tempsql="select * from book where R_Uid=\"$Userid\";";
mysqli_query($con,'set names utf8');
$result=mysqli_query($con,$tempsql);
while($row=mysqli_fetch_array($result)){
   $Bid=$row['Bid'];
    $sql="delete from author where Bid=$Bid;";
    mysqli_query($con,'set names utf8');
    mysqli_query($con,$sql);
    $sql="delete from evaluation where Bid=$Bid;";
    mysqli_query($con,'set names utf8');
    mysqli_query($con,$sql);
    $sql="delete from book where Bid=$Bid;";
    mysqli_query($con,'set names utf8');
    mysqli_query($con,$sql);
} 
$tempsql="select * from book where B_Uid=\"$Userid\";";
mysqli_query($con,'set names utf8');
$result2=mysqli_query($con,$tempsql);
while($row=mysqli_fetch_array($result2)){
   $Bid=$row['Bid'];
    $sql="update book set B_Uid=NULL where Bid=$Bid;";
    mysqli_query($con,'set names utf8');
    mysqli_query($con,$sql);
} 
$tempsql="select * from user where Uid=\"$Userid\";";
$result1=mysqli_query($con,$tempsql);
$row=mysqli_fetch_array($result1);
if($row['Point']>=10000)  {
    $sql="delete from vip where Uid=\"$Userid\";";
mysqli_query($con,'set names utf8');
mysqli_query($con,$sql);
}

 $sql="delete from user where Uid=\"$Userid\";";
    mysqli_query($con,'set names utf8');
    mysqli_query($con,$sql);
?>
<?php
echo "<script>alert(\"회원 탈퇴 되었습니다. 감사합니다.\")</script>";
echo("<script>location.replace('index.php');</script>");
?>
<head>
		<meta charset="utf-8">
		<title><?php
			echo 'BOOK';
		?></title>
		<img src="bookpicture.jpg" width="100%" height="15%">
	</head>
	<body style="background-color:powderblue;"></body>