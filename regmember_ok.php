<?php
$userid=$_POST['userid'];
$password=$_POST['userpassword'];
$address=$_POST['useraddress'];
$name=$_POST['username'];
$confirmpassword=$_POST['confirmpassword'];
if($userid==NULL){
    echo "<script>alert(\"아이디를 입력해주세요.\")</script>";
        echo("<script>location.replace('regmember.php');</script>");
}
if($password==NULL){
    echo "<script>alert(\"비밀번호를 입력해주세요.\")</script>";
        echo("<script>location.replace('regmember.php');</script>");
}
if($address==NULL){
    echo "<script>alert(\"주소를 입력해주세요.\")</script>";
        echo("<script>location.replace('regmember.php');</script>");
}
if($name==NULL){
    echo "<script>alert(\"이름을 입력해주세요.\")</script>";
        echo("<script>location.replace('regmember.php');</script>");
}
if($password!=$confirmpassword){
    echo "<script>alert(\"비밀번호와 비밀번호 확인이 일치하지 않습니다.\")</script>";
        echo("<script>location.replace('regmember.php');</script>");
}
$preconn=mysqli_connect("localhost","root","kim4866","Project");
$presql="select Uid from user where Uid='$userid';";
$preresult=mysqli_query($preconn,$presql);
if(mysqli_num_rows($preresult)==1){
    echo "<script>alert(\"이미 가입되어 있는 아이디입니다.\")</script>";
    echo("<script>location.replace('regmember.php');</script>");
}
$userpassword=$_POST['userpassword'];
$useraddress=$_POST['useraddress'];
$username=$_POST['username'];
$conn=mysqli_connect("localhost","root","kim4866","Project");
$sql="insert into USER (Uid,Password,Address,Point,Name) values ('{$userid}','{$userpassword}','{$useraddress}',0,'{$username}');";
mysqli_query($conn,'set names utf8');
mysqli_query($conn,$sql);
echo "<script>alert(\"회원가입 완료!\")</script>";
echo("<script>location.replace('session.php');</script>");
?>


