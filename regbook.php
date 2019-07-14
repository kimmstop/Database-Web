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
$con=mysqli_connect('localhost','root','kim4866','Project');
$sql="select * from category;";
mysqli_query($con,'set names utf8');
$result=mysqli_query($con,$sql);
?>
<html>
<style>
h2{
    color:orange;}
    .center{
    margin : auto;
    width : auto;
    border : 3px solid #73AD21;}
body{background-color:powderblue;}
</style>
<title>도서등록</title>
<head>
    <meta charset="utf-8">
</head>
<body ><div class="center">
    <form method="POST" action="regbook_ok.php">
        <h2 align="center">도서등록</h2>
        <table align="center" border="0" cellspacing="2" width="300">
        <tr>
            <td align="center">
            책 제목
            </td>
            <td>
            <input type="text" name="bookname" placeholder="책 제목" >
            </td>
        </tr>
        <tr>
            <td  align="center">
            저자
            </td>
            <td>
            <input type="text" name="author" placeholder="저자" >
            </td>
          
        </tr>
        <tr>
            <td  align="center">
            가격
            </td>
            <td>
            <input type="text" name="price" placeholder="가격" >
            </td>
        </tr>
        </table>
        <table align="center" border="1" cellspacing="2" width="500">
        <tr>
            <td  align="center">
            장르
            </td>
            
<?php
            while($row=mysqli_fetch_array($result)){
?>
            <td align="center">
            <input type="radio" name="category" value="<?php echo $row['Bcategory']?>"><br>
   
<?php       echo $row['Bcategory'];
?>
       
<?php       }
?>
            </td>
        </tr>
        </table>
        <h2 align="center">
        <input type="submit" value="등록">
        <a href="regmember.php"></a>
         </h2>       
        </div>
</body>

</html>