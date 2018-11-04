<?php session_start();
//require_once 'login_Dao.php';
//$dao = new login_Dao();
$code = "HUNTER";
$permissionCode = $_POST['permissionAttempt'];
$_SESSION['permission'] = 0;
$_SESSION['permissionAttempt'] = $permissionCode;

if($permissionCode === $code){
    $_SESSION['permission'] = 1;
    header('Location: login.php#openSignUpModal');
    exit;
}
else {
    $_SESSION['errorNumber'] = 1;
    $_SESSION['signupMessage'] = "Incorrect permission code. Please try again.";
    header('Location: login.php#openPermissionModal');
    exit;
}