<?php
    session_unset($_SESSION['username']);
    setcookie('member_login');
    session_destroy();
    header('Location: login.php')
?>