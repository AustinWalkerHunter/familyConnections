<?php session_start();

if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header('Location: login.php');
    exit;
}

include("includes/a_config.php");?>
<!DOCTYPE html>
<head>
    <?php include("includes/header.php");
    require_once 'post_Dao.php';
    $dao = new post_Dao();
    $users = $dao->getUsers();?>
</head>
<body>
<div id="wrapper">
    <!-- the header and navigation -->
    <div id="header">
        <?php include("includes/navigation.php"); ?>
    </div>
    <!-- the content -->
    <div id="content">
        <div class="title">
            <h2>Family Members</h2>
        </div>

        <?php
        foreach ($users as $user) {
            echo "<div class='members'>
                <h4 class='username'>" . htmlentities($user['displayname']) . "</h4>
                <h5>Username: " . htmlentities($user['username']) . "</h5>
                <h5>Email: " . htmlentities($user['email']) . "</h5>
            </div>";
        }
        ?>
    </div>
    <!-- the footer -->
    <?php include("includes/footer.php"); ?>
</div>
</body>

