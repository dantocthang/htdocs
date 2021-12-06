<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="form-container">
        <form method="POST" action="auth.php" autocomplete="off">
            <h2>Đăng nhập</h2>
            <div class="form-row">
                <label for="user">Username</label>
                <input type="text" id="user" name="username" > <br>
            </div>
            <div class="form-row">
                <label for="pwd">Password</label>
                <input type="password" id="pwd" name="password" > <br>
            </div>
            <br>
            <input type="checkbox" name="chk-remember" id="rem" >
            <label id="rem-label" for="rem">Remember me!</label>
            <br>
            <input id="login-button"type="submit" name="btn-submit" value="Login">
        </form>
    </div>
    
</body>
</html>