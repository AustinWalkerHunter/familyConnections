<?php session_start();

$username = $_POST['username'];
$password = $_POST['password'];

require_once 'Dao.php';
$loginCheck = new Dao();
$loginCheck->checkCredentials($username, $password);

if ($loginCheck === 1) {
    $_SESSION['logged_in'] = true;
    header('Location: index.php');
    exit;
}
$_SESSION['logged_in'] = false;
$_SESSION['message'] = "Username or password invalid";
header('Location: login.php');
exit;