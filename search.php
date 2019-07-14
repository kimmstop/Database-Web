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
if(!isset($_SESSION['userid'])){
	echo "<script>alert(\"로그인을 해주세요.\")</script>";
	echo("<script>location.replace('session.php');</script>");
}
else{
$userid=$_SESSION['userid'];
$con=mysqli_connect('localhost','root','kim4866','Project');
$sql="select * from user where Uid=\"$userid\"";
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
table,th,td{
	border :2px solid green;
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
		<input type="submit" value="검색">
	</form></h3>
<?php

	$keyword=$_POST['booktitle'];
	$con=mysqli_connect('localhost','root','kim4866','Project');
	$sql1="select * from book,author,evaluation 
		where (book.Bcategory like \"%$keyword%\" 
		or book.Bname like \"%$keyword%\" 
		or author.Author_name  like \"%$keyword%\")
		and	(book.Bid=author.Bid
		and book.Bid=evaluation.Bid);";
	mysqli_query($con,'set names utf8');
	$result1=mysqli_query($con,$sql1);
	$rep_count=mysqli_num_rows($result1);
	if($rep_count==0){
	    echo "<h2 align=\"center\">검색 결과 없음</h2>";
	}
	else
	{
?>
	<table style="width:100%">
		<tr>
			<th> 제 목 </th>
			<th> 저 자 </th>
			<th> 장 르 </th>
			<th> 가 격 </th>
			<th>쌓이는 포인트</th>
			<th> 추 천 </th>
			<th></th>
		</tr>
<?php
		while($row=mysqli_fetch_array($result1))
		{
?>
			<tr>
				<td align="center" bgcolor="skyblue"><?php echo $row['Bname'];?></td>
				<td align="center" bgcolor="skyblue"><?php echo $row['Author_name'];?></td>
				<td align="center" bgcolor="skyblue"><?php echo $row['Bcategory'];?></td>
				<td align="center" bgcolor="skyblue">
				<?php 
					if($userpoint>=3000){
						echo $row['Price']."->";
					echo $row['Price']-2000;
					}
					else{
						echo $row['Price'];
					}
					?>
					</td>
				<td align="center" bgcolor="skyblue"><?php echo $row['Bpoint'];?></td>
				<td align="center" bgcolor="skyblue"><?php echo $row['Num_of_Good'];?>
				<form method="post" action="brecommend.php">
				<input type="hidden" name="bookid" value="<?php echo $row['Bid']?>"/>
				<input type="hidden" name="keyword" value="<?php echo $keyword?>"/>
				<button type="submit">추천</button></form>
				</td>
				<td align="center" bgcolor="skyblue">
			
<?php
				if($row['State']==1)
				{
?>
				<form method="post" action="buy_check.php">
				<input type="hidden" name="bookid" value="<?php echo $row['Bid']?>"/>
				<input type="hidden" name="keyword" value="<?php echo $keyword?>"/>
				<input type="hidden" name="point" value="<?php echo $row['Bpoint']?>"/>
				<button type="submit">구매</button>
				</form>
<?php
				}else{
					echo "구매불가";
				}
?>
				</td>
			</tr>
<?php
		}
?>
	</table>	
<?php
	}
?>
<?php
	}
?>
	</body>
</html>
