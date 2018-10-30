<?php
switch ($_SERVER["SCRIPT_NAME"]) {
    case "/family.php":
        $CURRENT_PAGE = "Member";
        $PAGE_TITLE = "Members";
        break;
    case "/meetups.php":
        $CURRENT_PAGE = "Meet-ups";
        $PAGE_TITLE = "Meet-ups";
        break;
    case "/login.php":
        $CURRENT_PAGE = "Login";
        $PAGE_TITLE = "Login";
        break;
    case "/photos.php":
        $CURRENT_PAGE = "Photos";
        $PAGE_TITLE = "Photos";
        break;
    default:
        $CURRENT_PAGE = "Home";
        $PAGE_TITLE = "Family Connections";
}