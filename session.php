
<html>
<style>
h2{;
    color:orange;}
.center{
    margin : auto;
    width :400;
    border : 3px solid #73AD21;
}

</style>
<title>Login Page</title>
    <head></head>
    <body style="background-color:powderblue;">
        <div class="center"id="login_box">
        <h2 align="center" >로그인</h2>
       <h3> <form action="login_check.php" method="POST" >
            <table align="center" border="0" cellspacing="1" width="300">
            <tr>
                <td align="center">
                <input type="text" name="userid" placeholder="아이디">
                </td>
            </tr>
            <tr>
                <td  align="center">
                <input type="password" name="userpassword" placeholder="비밀번호">
                </td>
            </tr>
            <tr>
            <td  align="center">
          <input  align="center" type="submit" value="로그인">
            </td>
            </tr>
          
        </form></h3>
        </table>
        <h3 align="center"><a href="regmember.php">회원가입</a> </h3>
        </div>
    </body>
</html>