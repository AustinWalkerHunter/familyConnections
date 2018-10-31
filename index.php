<?php session_start();
$message = isset($_SESSION['message']) ? $_SESSION['message'] : '';
unset($_SESSION['message']);

if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header('Location: login.php');
    exit;
}
require_once 'post_Dao.php';
$dao = new post_Dao();
$posts = $dao->getPosts();

//echo "<pre>" . print_r($_SESSION,1) . "</pre>";

include_once("includes/a_config.php");?>
<!DOCTYPE html>
<head>
    <?php include_once("includes/header.php"); ?>
    <!--messages-->
    <?php if(!empty($message)) { ?>
        <div class="message <?php echo isset($_SESSION['validated']) ? $_SESSION['validated'] : '';?>"><?php
            echo $message; ?></div>
    <?php  }
    unset($_SESSION['messages']);
    ?>
</head>
<body>
    <div id="wrapper">
        <!-- the header and navigation -->
        <div id="header">
            <?php include_once("includes/navigation.php"); ?>
        </div>
        <!-- the sidebar -->
        <div id="leftSidebar">
            <?php include("includes/leftSidebar.php"); ?>
        </div>

        <div id="rightSidebar">
            <?php include("includes/rightSidebar.php"); ?>
        </div>

        <!-- the content -->
        <div id="content">
            <div class="postContainer">
                <ul class="postType">
                    <li><button class="postBtn">Post</button></li>
                    <li> | </li>
                    <li><button class="postBtn">Meet-Up</button></li>
                </ul>
                <hr/>
                <form method="post" action="post_handler.php">
                    <textarea  placeholder="What's on your mind?" name="content"></textarea>
                    <button class="postButton" type="submit">Post!</button>
                </form>
            </div>

            <!--   User Posts     -->
            <?php
            foreach ($posts as $post) {
                echo "<div class='userPosts'>
                    <textarea readonly>{$post['content']}</textarea>
                        <span>{$post['date_entered']}</span>
                  </div>";
            }
            ?>

        </div>
        <!-- the footer -->
        <?php include_once("includes/footer.php"); ?>
    </div>
</body>