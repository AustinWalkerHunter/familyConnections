<?php session_start();
require_once 'Dao.php';
$dao = new Dao();

$username = $_POST['username'];
$password = $_POST['password'];
$guest = $_POST['guest'];

$loginCheck = $dao->checkCredentials($username, $password);

if ($loginCheck || $guest) {
    $_SESSION['logged_in'] = true;
    header('Location: index.php');
    exit;
}
$_SESSION['logged_in'] = false;
$_SESSION['message'] = "Uh oh! The username and password you entered did not match our records. Please double-check and try again.";
header('Location: login.php');
exit;