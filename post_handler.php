<?php session_start();
require_once 'post_Dao.php';
$dao = new post_Dao();

$content = $_POST['content'];

$badForm = false;

if ($_SESSION['guest'] == true) {
    $_SESSION['message']= "This feature is not available for guests. Please
        sign in or register to make a post.";
    $badForm = true;
}

if(empty($content)){
    if ($_SESSION['guest'] == true) {
        $_SESSION['message']= "This feature is not available for guests. Please
        sign in or register to make a post.";
        $badForm = true;
    }
    else
    $_SESSION['message']= "Your post cannot be empty, please try again.";
    $badForm = true;
}

if($badForm){
    $_SESSION['validated'] = 'bad';
    header('Location: index.php');
    exit;
}

$dao->savePost($content);
$_SESSION['message'] = "Successfully posted!";
$_SESSION['validated'] = 'good';

header('Location: index.php');
exit;


