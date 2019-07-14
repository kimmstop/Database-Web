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
$id=$_POST['userid'];
$passwd=$_POST['userpassword'];
$con=mysqli_connect('localhost','root','kim4866','Project');
$sql="select * from user;";
mysqli_query($con,'set names utf8');
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result)){
    if($row['Uid']==$id&&$row['Password']==$passwd){
        $_SESSION['userid']=$id;
        $_SESSION['userpassword']=$passwd;
        echo("<script>location.replace('login_ok.php');</script>");
    }

}
echo "<script>alert(\"아이디 또는 패스워드가 일치하지 않습니다.\")</script>";
?>
<html>
<body style="background-color:powderblue;"></body>
<br>
</html>
<?php
echo("<script>location.replace('session.php');</script>");?>
