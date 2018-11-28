<?php session_start();
require_once 'post_Dao.php';
$dao = new post_Dao();

$content = htmlentities($_POST['content']);
$contentId = $_POST['contentId'];
$subject = htmlentities($_POST['subject']);
$user_id = $_SESSION['userData']['id'];
$date = $_POST['date'];
$displayname = htmlentities($_SESSION['userData']['displayname']);


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
    exit;
}
$dao->savePost($user_id, $content, $subject, $date, $contentId);
//$_SESSION['nextContentId'] += 10;

$_SESSION['message'] = "Successfully posted!";
$_SESSION['validated'] = 'good';