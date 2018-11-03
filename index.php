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
$users = $dao->getUsers();

//echo "<pre>" . print_r($_SESSION,1) . "</pre>";

include_once("includes/a_config.php");?>
<!DOCTYPE html>
<head>
    <?php include_once("includes/header.php"); ?>
    <!--Error messages.-->
    <?php if(!empty($message)) { ?>
        <div class="message <?php echo isset($_SESSION['validated']) ? $_SESSION['validated'] : '';?>"><?php
            echo $message;
            unset($_SESSION['validated']);
            ?></div>
    <?php
    }
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
            <div class="postContainer" id="postContainer">
                <ul class="postType">
                    <li><button class="postBtn" onclick="makePost()">Post</button></li>
                    <li> | </li>
                    <li><button class="postBtn" onclick="makeMeetUp()">Meet-Up</button></li>
                </ul>
                <hr/>
                <form method="post" action="post_handler.php">
                    <textarea  placeholder="Join the conversation!" name="content" id="postContent"></textarea>
                    <button class="postButton" type="submit">Post!</button>
                </form>
            </div>

            <!--   User Posts     -->
            <?php
            foreach ($posts as $post) {
                echo "<div class='userPosts'>
                    <p>{$post['displayname']}</p>
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