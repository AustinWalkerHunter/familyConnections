<?php //session_start();
//require_once 'post_Dao.php';
//$dao = new post_Dao();
//
//$content = $_POST['content'];
//$subject = $_POST['subject'];
//$date = $_POST['date'];
//$user_id = $_SESSION['userData']['id'];
//$displayname = $_SESSION['userData']['displayname'];
//
//$badForm = false;
//
//if ($_SESSION['guest'] == true) {
//    $_SESSION['message']= "This feature is not available for guests. Please
//        sign in or register to make a post.";
//    $badForm = true;
//}
//
//if(empty($content)){
//    if ($_SESSION['guest'] == true) {
//        $_SESSION['message']= "This feature is not available for guests. Please
//        sign in or register to make a post.";
//        $badForm = true;
//    }
//    else
//    $_SESSION['message']= "Your post cannot be empty, please try again.";
//    $badForm = true;
//}
//
//if($badForm){
//    $_SESSION['validated'] = 'bad';
//    header('Location: index.php');
//    exit;
//}
//
//$dao->savePost($user_id, $content, $subject, $date);
//$_SESSION['message'] = "Successfully posted!";
//$_SESSION['validated'] = 'good';
//
//header('Location: index.php');
//exit;
//
//
