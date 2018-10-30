<title><?php print $PAGE_TITLE;?></title>
<meta charset="UTF-8">
<link rel="icon" type="image/png" href="../Resources/Images/favicon-32x32.png" sizes="32x32" />
<link href="https://fonts.googleapis.com/css?family=Cherry+Swash" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="/script.js"></script>
<?php if ($CURRENT_PAGE == "Home") { ?>
    <link rel="stylesheet" href="../Styles/home.css">
    <link rel="stylesheet" href="../Styles/mainStyles.css">
    <link rel="stylesheet" href="../Styles/timeStyles.css">
<?php } ?>

<?php if ($CURRENT_PAGE == "Meet-ups") { ?>
    <link rel="stylesheet" href="../Styles/meet_ups.css">
    <link rel="stylesheet" href="../Styles/mainStyles.css">
    <link rel="stylesheet" href="../Styles/timeStyles.css">
<?php } ?>

<?php if ($CURRENT_PAGE == "Member") { ?>
    <link rel="stylesheet" href="../Styles/member.css">
    <link rel="stylesheet" href="../Styles/mainStyles.css">
<?php } ?>

<?php if ($CURRENT_PAGE == "Photos") { ?>
    <link rel="stylesheet" href="../Styles/member.css">
    <link rel="stylesheet" href="../Styles/mainStyles.css">
<?php } ?>

<?php if ($CURRENT_PAGE == "Login") { ?>
    <link rel="stylesheet" href="../Styles/login.css">
<?php } ?>
