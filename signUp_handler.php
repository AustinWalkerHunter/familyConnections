<?php session_start();
require_once 'login_Dao.php';
$dao = new login_Dao();

$displayname = $_POST['signUp-displayname'];
$username = $_POST['signUp-username'];
$email = $_POST['signUp-email'];
$password = $_POST['signUp-password'];
$confirmpassword = $_POST['signUp-confirmpassword'];

$_SESSION['displayname'] = $displayname;
$_SESSION['username'] = $username;
$_SESSION['email'] = $email;
$_SESSION['password'] = $password;
$_SESSION['confirmpassword'] = $confirmpassword;


$usernameCheck = $dao->checkAvailability($username);

if (!$usernameCheck) {
    if($password === $confirmpassword) {
        $dao->createNewAccount($displayname, $username, $email, $password);
        $_SESSION['logged_in'] = true;
        $_SESSION['message'] = "Thank you for creating an account! Enjoy.";
        $_SESSION['validated'] = 'good';
        unset($_SESSION["password"]);
        unset($_SESSION["confirmpassword"]);
        header('Location: index.php');
        exit;
    }
    $_SESSION['logged_in'] = 0;
    $_SESSION['message'] = "Uh oh! The passwords you entered do not match. Please try again.";
    header('Location: login.php');
    exit;
}
$_SESSION['logged_in'] = 0;
$_SESSION['message'] = "Uh oh! The username you have chosen is already in use.";
header('Location: login.php');
exit;