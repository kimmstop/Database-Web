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
$tempsql="select * from user where Uid=\"$Userid\";";
mysqli_query($con,'set names utf8');
$tempresult=mysqli_query($con,$tempsql);
$temprow=mysqli_fetch_Array($tempresult);
$sql1="select * from book,evaluation,author
where author.Bid=book.Bid
	  and evaluation.Bid=book.Bid 
	  and book.R_Uid=\"$Userid\";";
mysqli_query($con,'set names utf8');
$result=mysqli_query($con,$sql1);
$rep_count=mysqli_num_rows($result);
if($rep_count==0){
   echo "<h2 align=\"center\">도서 등록 결과 없음</h2>";?>
    <p><a href="login_ok.php">돌아가기</a></p>  
	<?php
}
else
	{
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
	
    <div  >
        <p><a href="login_ok.php">돌아가기</a></p>   
        <h3 align="right">
        <p style="color:green"><?php echo $_SESSION['userid']?>님 환영합니다!</p>
        <h5 align="right" style="color:gray">포인트:<?php echo $temprow['Point']?>point</h5>
		<p><a href="logout.php">로그아웃</a></p>
    </div>
	<table style="width:100%">
		<tr>
			<th> 제 목 </th>
			<th> 저 자 </th>
			<th> 장 르 </th>
			<th> 가 격 </th>
			<th> 포인트</th>
			<th> 추 천 </th>
            <th> 등 록 일 </th>
            <th> 상 태 </th>
		</tr>
<?php
		while($row=mysqli_fetch_array($result))
		{
?>
			<tr>
				<td align="center" bgcolor="skyblue"><?php echo $row['Bname'];?></td>
				<td align="center" bgcolor="skyblue"><?php echo $row['Author_name'];?></td>
				<td align="center" bgcolor="skyblue"><?php echo $row['Bcategory'];?></td>
				<td align="center" bgcolor="skyblue"><?php echo $row['Price'];?></td>
				<td align="center" bgcolor="skyblue"><?php echo $row['Bpoint'];?></td>
				<td align="center" bgcolor="skyblue"><?php echo $row['Num_of_Good'];?></td>
                <td align="center" bgcolor="skyblue"><?php echo $row['R_date'];?></td>
                <td align="center" bgcolor="skyblue">
<?php
                if($row['State']==1){
                    echo "판매중";
                }
                else{
					echo "판매완료";
				}
?>
				</td>
			</tr>
<?php
		}
?>
<?php
		}
?>
	</table>
    </html>