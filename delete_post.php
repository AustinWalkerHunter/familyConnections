<?php session_start();

if ($_SESSION['guest'] == true) {
    $_SESSION['message']= "This feature is not available for guests. Please
        sign in or register to make a post.";
    $badForm = true;
}
if($badForm){
    $_SESSION['validated'] = 'bad';
    header('Location: index.php');
    exit;
}

$id = $_GET['content_id'];
require_once 'post_Dao.php';
$dao = new post_Dao();
$dao->deletePost($id);
//if($_SESSION['page'] == "Meet-ups"){
//    header('Location: /meetups.php');
//}
//else {
//    header('Location: index.php');
//}
exit;