<?php
require './bootstrap.php';

$isPost=$_SERVER['REQUEST_METHOD']=='POST';
$isSuccess=false;
$params=[];
$errors=[];

if ($isPost){
    $params['username']=$_POST['username'] ?? null;
    $params['email']=$_POST['email'] ?? null;
    $params['password']=$_POST['password'] ?? null;
    $params['confirm_password']=$_POST['confirm_password'] ?? null;


    
}

$view='auth/register.php';
echo $template->renderLayout($view);
?>
