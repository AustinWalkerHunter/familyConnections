<?php session_start();
require_once 'login_Dao.php';
$dao = new login_Dao();

$username = $_POST['signUp-username'];
$email = $_POST['signUp-email'];
$password = $_POST['signUp-password'];

$usernameCheck = $dao->checkAvailability($username);

if (!$usernameCheck) {
    $dao->createNewAccount($username,$email, $password);
    $_SESSION['logged_in'] = true;
    header('Location: index.php');
    exit;
}
$_SESSION['logged_in'] = false;
$_SESSION['message'] = "Uh oh! The username you have chosen is already in use.";
header('Location: login.php');
exit;