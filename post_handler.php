<?php session_start();
require_once 'post_Dao.php';
$dao = new post_Dao();

$postText = $_POST['postText'];

$badForm = false;

if ($_SESSION['guest'] == true) {
    $_SESSION['message']= "This feature is not available for guests. Please
    sign in to make a post";
    $badForm = true;
}

if(empty($postText)){
    if ($_SESSION['guest'] == true) {
        $_SESSION['message']= "This feature is not available for guests. Please
    sign in to make a post";
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

$_SESSION['message'] = "Successfully posted!";
$_SESSION['validated'] = 'good';

$dao->savePost($postText);

header('Location: index.php');
exit;


