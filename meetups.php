<?php session_start();

if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header('Location: login.php');
    exit;
}

include("includes/a_config.php");

require_once 'post_Dao.php';
$dao = new post_Dao();
$posts = $dao->getPosts();
$users = $dao->getUsers();

?>
<!DOCTYPE html>
<head>
    <?php include("includes/header.php"); ?>
</head>
<body>
<div id="wrapper">
    <!-- the header and navigation -->
    <div id="header">
        <?php include("includes/navigation.php"); ?>
    </div>
    <!-- the content -->
    <div id="content">
        <div>
            <?php
            foreach ($posts as $post) {
                if(($post['date'] != NULL)) {
                    echo "<div class='userPosts " . (($post['date'] != NULL) ? "meetup" : '') . "'>
                    <p class='username'><a href=''>{$post['displayname']}</a></p>
                    " . ((($post['user_id'] === $_SESSION['userData']['id']) || ($_SESSION['userData']['username'] === "ADMIN"))
                            ? "<p class='editPost'><a href='/delete_post.php?content_id={$post['content_id']}'/>X</a></p>" : '')
                        . (($post['date'] != NULL) ? "<span class='meetupLabel'>Meet-Up</span>" : null) . "
                        
                    <hr class='hrPost'/>
                    <p class=\"postTitle\">{$post['subject']}</p>
                    " . (($post['date'] != NULL) ? "<p class='meetupDate'>{$post['date']}</p><span class='startDate'>Starts : </span>" : null) . "
                    <textarea readonly>{$post['content']}</textarea>
                        <p class='datePosted'>{$post['date_entered']}</p>
                  </div>";
                }
            }
            ?>
        </div>
    </div>

<!--            <h1>Upcoming Meet-Ups</h1>-->
<!--            <div class="time_spacing">-->
<!--                <time datetime="2019-9-20" class="icon">-->
<!--                    <em>Saturday</em>-->
<!--                    <strong>September</strong>-->
<!--                    <span>20</span>-->
<!--                </time>-->
<!--            </div>-->
<!--            <div class="time_spacing">-->
<!--                <time datetime="2019-10-25" class="icon">-->
<!--                    <em>Saturday</em>-->
<!--                    <strong>October</strong>-->
<!--                    <span>25</span>-->
<!--                </time>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
    <!-- the footer -->
    <?php include("includes/footer.php"); ?>
</div>
</body>

