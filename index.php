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
                <p id="toggle">
                    <button class="btn postBtn" id="postBtn" onclick="makePost()">Post</button>
                    <button class="btn meetupBtn" id="meetupBtn" onclick="makeMeetUp()">Meet-Up</button>
                </p>
                <hr/>
                <form method="post" action="post_handler.php">
                        <div id="makePostContainer">
                            <input class="postTitle" type="text" placeholder="Subject" name="subject" onkeypress="return event.keyCode != 13;" required>
                            <textarea  placeholder="Join the conversation!" name="content" id="postContent" required></textarea>
                            <button class="postButton" type="submit">Post!</button>
                        </div>
                </form>
                <form method="post" action="post_handler.php">
                        <div id="makeMeetupContainer">
                            <input class="postTitle" type="text" placeholder="Subject" name="subject" onkeypress="return event.keyCode != 13;" required>
                            <input id="datePicker" class="meetupDate" type="date" name="date" data-date="" data-date-format="DD MMMM YYYY" required> <label class="dateLabel">Start day:</label>
                            <textarea  placeholder="Plan a meet-up!" name="content" id="meetupContent" required></textarea>
                            <button class="postButton" type="submit">Post meet-up!</button>
                        </div>
                </form>
            </div>

            <!--   User Posts     -->
            <?php
            foreach ($posts as $post) {
                echo "<div class='userPosts " . (($post['date'] != NULL) ? "meetup" : '') . "'>
                    <p class='username'><a href=''>{$post['displayname']}</a></p>
                    " . ((($post['user_id'] === $_SESSION['userData']['id']) || ($_SESSION['userData']['username'] === "ADMIN"))
                        ? "<p class='editPost'><a href='/delete_post.php?content_id={$post['content_id']}'/>X</a></p>" : '')
                    . (($post['date'] != NULL) ? "<span class='meetupLabel'>Meet-Up</span>" : "<span class='meetupLabel postLabel'>Post</span>") . (($post['date'] != NULL) ? "<p class='meetupDate'>{$post['date']}</p><span class='startDate'>Meet-up date:  </span>" : null) . "
                        
                    <hr class='hrPost'/>
                    <p class=\"postTitle\">{$post['subject']}</p>
                    <textarea readonly>{$post['content']}</textarea>
                        <span class='datePosted'>{$post['date_entered']}</span>
                  </div>";
            }
            ?>

        </div>
        <!-- the footer -->
        <?php include_once("includes/footer.php"); ?>
    </div>
</body>