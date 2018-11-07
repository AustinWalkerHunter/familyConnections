<?php
session_start();
?>
<div id="navigation">
    <a href="/index.php"><img class="homeIcon" src="../Resources/Images/famIcon.png"></a>
    <h1 class="mainTitle">Family Connections</h1>
    <p class="currentUser">Logged in: <?php ($_SESSION['guest']) ? print($_SESSION['displayname']) : print($_SESSION['userData']['displayname'])?></p>
    <ul>
        <li<?php if ($CURRENT_PAGE=="Home")
            echo " id=\"currentpage\""; ?>><a href="/index.php">Home</a></li>
        <li<?php if ($CURRENT_PAGE=="Member")
            echo " id=\"currentpage\""; ?>><a href="/family.php">My Fam</a></li>
        <li<?php if ($CURRENT_PAGE=="Meet-ups")
            echo " id=\"currentpage\""; ?>><a href="/meetups.php">Meet-Ups</a></li>
        <li<?php if ($CURRENT_PAGE=="Photos")
            echo " id=\"currentpage\""; ?>>
<!--            <a href="/photos.php">Photos</a></li>-->
        <li class="logOut"><a href="/logout.php">Logout</a></li>
    </ul>
    <hr/>
</div>