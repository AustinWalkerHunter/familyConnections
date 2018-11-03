<?php include("includes/a_config.php");?>
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
            <hr>
        </div>

        <?php
        foreach ($users as $user) {
            echo "<div>
                <h4>{$user['displayname']}</h4>
                <h5>Username: {$user['username']}</h5>
                <h5>Email: {$user['email']}</h5>
                <hr>
            </div>";
        }
        ?>
    </div>
    <!-- the footer -->
    <?php include("includes/footer.php"); ?>
</div>
</body>

