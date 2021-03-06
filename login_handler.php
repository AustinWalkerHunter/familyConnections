<?php session_start();
require_once 'login_Dao.php';


$salt = "fKd93Vmz!k*dAv5029Vkf9$3Aa";
$username = $_POST['username'];
$password =  $_POST['password'];
$guest = $_POST['guest'];
$_SESSION['loginusername'] = $username;
$_SESSION['loginpassword'] = $password;

$dao = new login_Dao();
$loginCheck = $dao->checkCredentials($username,  hash("sha256", $password . $salt));

if ($loginCheck || $guest) {
    $_SESSION['logged_in'] = 1;
    unset($_SESSION['message']);
    if($loginCheck){
        $userData = $dao->getUserData($username);
        $_SESSION['userData'] = $userData;
        unset($_SESSION["loginusername"]);
        unset($_SESSION["loginpassword"]);
    }
    else{
        //If a user attempts to login then clicks guest all data is cleared
        $_SESSION['guest'] = 1;
        $_SESSION["displayname"] = "Guest";
        unset($_SESSION["loginusername"]);
        unset($_SESSION["email"]);
        unset($_SESSION["loginpassword"]);
    }
    header('Location: index.php');
    exit;
}

$_SESSION['logged_in'] = 0;
$_SESSION['message'] = "Uh oh! The username and password you entered did not match our records. Please double-check and try again.";
header('Location: login.php');
exit;