<?php

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
	<h1><a href="index.php">BOOK</a></h1>
	<h1>
	<h3 align="right">
		<a href="session.php">로그인</a>
	</h3><h3 align ="center"><form method="post" action="search.php">
		<strong style="color:blue">검색</strong>
		<input type="search" name="booktitle" placeholder="책 이름/작가" size="60%">
		<input type="submit" value="검색">
	</form></h3>
	</h1>
	</body>
</html>


