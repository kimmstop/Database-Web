<html>
<style>
h2{
    color:orange;}
    .center{
    margin : auto;
    width : 400;
    border : 3px solid #73AD21;}
body{background-color:powderblue;}
</style>
<title>회원가입</title>
<head>
    <meta charset="utf-8">
</head>
<body ><div class="center">
    <form method="POST" action="regmember_ok.php">
        <h2 align="center">회원가입</h2>
        <table align="center" border="0" cellspacing="2" width="300">
        <tr>
            <td align="center">
            아이디
            </td>
            <td>
            <input type="text" name="userid" placeholder="아이디" >
            </td>
        </tr>
        <tr>
            <td  align="center">
            비밀번호
            </td>
            <td>
            <input type="password" name="userpassword" placeholder="비밀번호" >
            </td>
        </tr>
        <tr>
            <td  align="center">
            비밀번호 확인
            </td>
            <td>
            <input type="password" name="confirmpassword" placeholder="비밀번호확인" >
            </td>
        </tr>
        <tr>
            <td  align="center">
            주소
            </td>
            <td>
            <input type="text" name="useraddress" placeholder="주소" >
            </td>
        </tr>
        <tr>
            <td  align="center">
            이름
            </td>
            <td>
            <input type="text" name="username" placeholder="이름">
            </td>
        </tr>
        <td>
        </td>
        <td align="center">
        <input type="submit" value="회원가입">
        <a href="regmember.php"></a>
        </td>
        </table></div>
</body>

</html>