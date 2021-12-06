<?php
include "./config.php";
// if (!isset($_SESSION['username']) && !isset($_COOKIE['member_login'])){
//     header('Location: login.php');
// }

if (isset($_COOKIE['member_login'])) {
    if (!isset($_SESSION['username']))
        $_SESSION['username'] = $_COOKIE['member_login'];
}

if (!isset($_SESSION['username']))
    header('Location: login.php');


?>
<html>

<head>
    <title>Trang Admin</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    Chào mừng <?php echo $_SESSION['username'] ; ?> đã đăng nhập thành công
    <form method="POST" action="auth.php" autocomplete="off">
        <input id="logout-button" type="submit" name="btn-logout" value="Logout">
    </form>
</body>

</html>