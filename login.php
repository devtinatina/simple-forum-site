<!DOCTYPE html>
 
<html>
<head>
<meta charset='utf-8'>
<script src="https://kit.fontawesome.com/cb33a58ccf.js";
crossorigin="anonymous";></script>
<link rel="stylesheet" href="css/style.css">
<title>devtinatina | 로그인 페이지</title>
</head>
 
<body>
        <div align='center'>
        <span>Login</span>
 
        <form method='get' action='login_action.php'>
                <p>ID: <input name="id" type="text"></p>
                <p>PW: <input name="pw" type="password"></p>
                <input type="submit" value="sign in">
        </form>
        <br />
        <button id="join" onclick="location.href='./join.php'">sign up</button>
 
        </div>

</body>
 
</html>