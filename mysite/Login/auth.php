<?php
$users=require"./config.php";

if (!empty($_POST['btn-logout'])){
    include './logout.php';
}

if (isset($_POST['btn-submit'])){
    $user=$_POST['username'];
    $password=$_POST['password'];
}

$ok=0;
for ($i=0;$i<count($users);$i++){
    if ($user==$users[$i]['username'] && $password==$users[$i]['password']){
        $ok=1;
    }    
}
if ($ok==1){
    $_SESSION['username']=$user;
    if (!empty($_POST['chk-remember'])){
        setcookie("member_login",$_POST['username'],time()+60*3);
    } else{
        setcookie("member_login",$_POST['username'],0);    
    }
    header('Location: admin.php');
}
else{
    header('Location: login.php');
}
