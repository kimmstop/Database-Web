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
$Bookname=$_POST['bookname'];
$Author=$_POST['author'];
$Price=$_POST['price'];
$Bcategory=$_POST['category'];
$Date=date("Y-m-d");
if($Bookname==NULL){
    echo "<script>alert(\"책이름을 입력해주세요.\")</script>";
        echo("<script>location.replace('regbook.php');</script>");
}
if($Author==NULL){
    echo "<script>alert(\"저자를 입력해주세요.\")</script>";
        echo("<script>location.replace('regbook.php');</script>");
}
if($Price==NULL){
    echo "<script>alert(\"가격을 입력해주세요.\")</script>";
        echo("<script>location.replace('regbook.php');</script>");
}
if($Bcategory==NULL){
    echo "<script>alert(\"장르를 선택해주세요.\")</script>";
        echo("<script>location.replace('regbook.php');</script>");
}
$Point=$Price*0.05;
$con=mysqli_connect("localhost","root","kim4866","Project");
$sql="insert into book (Bname, Bpoint, Price,Bcategory,State, R_date, R_Uid) 
values (\"$Bookname\",$Point,$Price,\"$Bcategory\",1,\"$Date\",\"$Userid\");";
mysqli_query($con,'set names utf8');
mysqli_query($con,$sql);
$tempsql="select max(Bid) from book;";
mysqli_query($con,'set names utf8');
$tempresult=mysqli_query($con,$tempsql);
$row=mysqli_fetch_array($tempresult);
$Bid=$row['max(Bid)'];
$sql3="insert into author (Bid,Author_name) values
($Bid,\"$Author\");";
mysqli_query($con,'set names utf8');
mysqli_query($con,$sql3);
$sql4="insert into evaluation  values
($Bid,0);";
mysqli_query($con,'set names utf8');
mysqli_query($con,$sql4);
echo "<script>alert(\"책 등록 완료!\")</script>";
echo("<script>location.replace('login_ok.php');</script>");
?>


