
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
$con=mysqli_connect('localhost','root','kim4866','Project');
$sql="select * from book,author,evaluation where book.Bid=\"$Bookid\";";
mysqli_query($con,'set names utf8');
$result1=mysqli_query($con,$sql);

?>

<html>

<style>
table,th,td{
	border :2px solid green;
}
h3{
	margin-right:30;
	margin-top:50;
	color:red;
}
h2{
    margin-left:500;
    color:red;
}
h1{
    margin-left:800;
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
    <table style="width:100%">
		<tr>
			<th> 제 목 </th>
			<th> 저 자 </th>
			<th> 장 르 </th>
			<th> 가 격 </th>
			<th>쌓이는 포인트</th>
			<th> 추 천 </th>
			
		</tr>
        <?php $row=mysqli_fetch_array($result1);?>
        <tr>
				<td align="center" bgcolor="skyblue"><?php echo $row['Bname'];?></td>
				<td align="center" bgcolor="skyblue"><?php echo $row['Author_name'];?></td>
				<td align="center" bgcolor="skyblue"><?php echo $row['Bcategory'];?></td>
				<td align="center" bgcolor="skyblue"><?php echo $row['Price'];?></td>
				<td align="center" bgcolor="skyblue"><?php echo $row['Bpoint'];?></td>
				<td align="center" bgcolor="skyblue"><?php echo $row['Num_of_Good'];?></td>
		</tr>
    </table>
   <h2>
    <?php
    print "정말로 구매 하시겠습니까?";
    ?></h2>
    <h1>
    <table>
    <tr>
    <form method="post" action="buy.php">
    <input type="hidden" name="keyword" value="<?php echo $Keyword?>">
    <input type="hidden" name="bookid" value="<?php echo $Bookid?>">
    <input type="hidden" name="point" value="<?php echo $Bpoint?>">
    <td align="center"><button  type="submit">예</button></td>
    </form>
    <form method="post" action="search.php">
    <input type="hidden" name="booktitle" value="<?php echo $Keyword?>">
    <td align="center"><button type="submit">아니요</button></td>
    </form>
    </tr>
    </table>
    </h1>
    
</html>