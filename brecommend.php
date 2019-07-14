<?php
$con=mysqli_connect('localhost','root','kim4866','Project');
$Bookid=$_POST['bookid'];
$Keyword=$_POST['keyword'];
$sql="update evaluation set Num_of_Good=Num_of_Good+1 where Bid=$Bookid;";
mysqli_query($con,'set names utf8');
mysqli_query($con,$sql);
?>
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
    echo "<script>alert(\"추천했습니다.\")</script>";
    ?>
    <form method="post" action="search.php">
    <input type="hidden" name="booktitle" value="<?php echo $Keyword?>">
    <button type="submit">돌아가기</button>
    </form>