<?php session_start();
require_once 'login_Dao.php';
$dao = new login_Dao();

$displayname = $_POST['signUp-displayname'];
$username = $_POST['signUp-username'];
$email = $_POST['signUp-email'];
$password = $_POST['signUp-password'];
$confirmpassword = $_POST['signUp-confirmpassword'];


$_SESSION['signUp-displayname'] = $displayname;
$_SESSION['signUp-username'] = $username;
$_SESSION['signUp-email'] = $email;
$_SESSION['signUp-password'] = $password;
$_SESSION['signUp-confirmpassword'] = $confirmpassword;

$usernameCheck = $dao->checkAvailability($username);
$emailRegex = "/[^@]+@[^\.]+\..+/";

if (!$usernameCheck) {
    if (preg_match($emailRegex, $email)) {
        // Indeed, the expression matches
        if($password === $confirmpassword) {
            $dao->createNewAccount($displayname, $username, $email, $password);
            $userData = $dao->getUserData($username);
            $_SESSION['userData'] = $userData;
            $_SESSION['logged_in'] = true;
            $_SESSION['message'] = "Thank you " . $displayname . " for creating an account! Enjoy.";
            $_SESSION['validated'] = 'good';
            unset($_SESSION["signUp-username"]);
            unset($_SESSION['signUp-displayname']);
            unset($_SESSION['signUp-email']);
            unset($_SESSION["signUp-password"]);
            unset($_SESSION["signUp-confirmpassword"]);

            header('Location: index.php');
            exit;
        }
        else{
            $_SESSION['logged_in'] = 0;
            $_SESSION['errorNumber'] = 2;
            $_SESSION['signupMessage'] = "Uh oh! The passwords you entered do not match. Please try again.";
            header('Location: login.php#openSignUpModal');
            exit;
        }
    } else {
        $_SESSION['logged_in'] = 0;
        $_SESSION['errorNumber'] = 1;
        $_SESSION['signupMessage'] = "Uh oh! The email you entered is invalid. Please try again.";
        header('Location: login.php#openSignUpModal');
        exit;
    }
}
$_SESSION['logged_in'] = 0;
$_SESSION['errorNumber'] = 3;
$_SESSION['signupMessage'] = "Uh oh! The username you have chosen is already in use.";
header('Location: login.php#openSignUpModal');
exit;