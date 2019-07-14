
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
$Bookid= $_POST['bookid'];
$Keyword= $_POST['keyword'];
$Bpoint=$_POST['point'];
$Userid=$_SESSION['userid'];
$Date=date("Y-m-d");
$con=mysqli_connect('localhost','root','kim4866','Project');
$sql="update book set State=0 where Bid=\"$Bookid\";";
$sql1="update book set B_date=\"$Date\" where Bid=\"$Bookid\";";
$sql3="update book set B_Uid=\"$Userid\" where Bid=\"$Bookid\";";
$sql2="update user
set Point=Point+$Bpoint
where Uid=\"$Userid\";";
$tempsql="select * from user where Uid=\"$Userid\";";
mysqli_query($con,'set names utf8');
$tempresult=mysqli_query($con,$tempsql);
$UserPoint=mysqli_fetch_array($tempresult);
if($UserPoint['Point']>=10000){
	$vipsql="insert into vip (Uid,Vid) values (\"$Userid\",\"$Userid\");";
	mysqli_query($con,'set names utf8');
	mysqli_query($con,$vipsql);
}
mysqli_query($con,$sql3);
mysqli_query($con,$sql);
mysqli_query($con,$sql1);
mysqli_query($con,$sql2);
?>
<html>
<style>
h3{
	margin-right:30;
	margin-top:50;
	color:orange;
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
	
	</h1>
	</body>
    <?php
    echo "<script>alert(\"구매완료.\")</script>";
    ?>
    <form method="post" action="search.php">
    <input type="hidden" name="booktitle" value="<?php echo $Keyword?>">
    <button type="submit">돌아가기</button>
    </form>
    
</html>