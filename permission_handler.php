<?php session_start();
//require_once 'login_Dao.php';
//$dao = new login_Dao();
$code = "HUNTER";
$permissionCode = $_POST['permissionAttempt'];
$_SESSION['permission'] = 0;
$_SESSION['permissionAttempt'] = $permissionCode;

if($permissionCode === $code){
    $_SESSION['permission'] = 1;
    ?><script>showSignUp()</script><?php
    header('Location: login.php');
    exit;
}
else {
    $_SESSION['signupMessage'] = "Incorrect permission code. Please try again.";
    header('Location: login.php');
    exit;
}