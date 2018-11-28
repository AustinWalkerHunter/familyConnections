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
$currentUser = htmlentities($_SESSION['userData']['displayname']);


//echo "<pre>" . print_r($_SESSION,1) . "</pre>";





//TODO: Multiple posts without refresh borks everything. You need keep a count on which post is which once it is new so you remove the correct postID.






include_once("includes/a_config.php");
?>

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
<!--                action="post_handler.php-->
                <form method="POST" id="postForm">
                        <div id="makePostContainer">
                            <input id="user" type="hidden" value="<?php echo $currentUser ?>"/>
                            <input id="contentId" type="hidden" name="contentId" value="<?php echo  $_SESSION['nextContentId'] ?>"/>

                            <input id="postSubject" class="postTitle"  type="text" placeholder="Subject" name="subject" autocomplete="off" onkeypress="return event.keyCode != 13;" required>
                            <textarea id="postTextArea" placeholder="Join the conversation!" name="content" required></textarea>
                            <button class="postButton" type="submit">Post!</button>
                        </div>
                </form>
<!--                action="post_handler.php">-->
                <form method="POST" id="meetupForm">
                        <div id="makeMeetupContainer">
                            <input id="user" type="hidden" value="<?php echo $currentUser ?>"/>
                            <input id="contentId" type="hidden" name="contentId" value="<?php echo  $_SESSION['nextContentId'] ?>"/>

                            <input id="meetupSubject" class="postTitle"  type="text" placeholder="Subject" name="subject" autocomplete="off" onkeypress="return event.keyCode != 13;" required>
                            <input id="date" class="meetupDate" type="date" name="date" data-date="" data-date-format="DD MMMM YYYY" required> <label class="dateLabel">Start day:</label>
                            <textarea id="meetupContent" placeholder="Plan a meet-up!" name="content"  required></textarea>
                            <button class="postButton" type="submit">Post meet-up!</button>
                        </div>
                </form>
            </div>

            <!--   User Posts     -->
            <div id="userPosts">
                <?php
                $maxContentId = 0;
                foreach ($posts as $post) {
//                    if($maxContentId < $post["content_id"]){
//                        $maxContentId = $post["content_id"];
//                    }
                    echo "<div id='postBlock" . $post['content_id'] . "' class='userPosts " . (($post['date'] != NULL) ? 'meetup' : '') . "'>
                        <p class='username'><a href=''>" . htmlentities($post['displayname']) . "</a></p>
                        " . ((($post['user_id'] === $_SESSION['userData']['id']) || ($_SESSION['userData']['username'] === "ADMIN"))
                            ? "<p class='editPost'><a onclick='removeNewPost({$post['content_id']})'>X</a></p>" : '')
                        . (($post['date'] != NULL) ? "<span class='meetupLabel'>Meet-Up</span>" : "<span class='meetupLabel postLabel'>Post</span>")
                        . (($post['date'] != NULL) ? "<p class='meetupDate'>{$post['date']}</p><span class='startDate'>Meet-up date:  </span>" : null) . "
                            
                        <hr class='hrPost'/>
                        <p class=\"postTitle\">{$post['subject']}</p>
                        <div class='textareaContent'><textarea readonly>{$post['content']}</textarea></div>
                        
                        <span class='datePosted'>{$post['date_entered']}</span>
                      </div>";
                }

//                $_SESSION['nextContentId'] = $maxContentId;

                ?>
            </div>
        </div>
        <!-- the footer -->
        <?php include_once("includes/footer.php"); ?>
    </div>
</body>