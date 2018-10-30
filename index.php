<?php session_start();
$message = isset($_SESSION['message']) ? $_SESSION['message'] : '';
unset($_SESSION['message']);

if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header('Location: login.php');
    exit;
}

//echo "<pre>" . print_r($_SESSION,1) . "</pre>";

include_once("includes/a_config.php");?>
<!DOCTYPE html>
<head>
    <?php include_once("includes/header.php"); ?>
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

        <!--messages-->
        <?php if(!empty($message)) { ?>
        <div class="message <?php echo isset($_SESSION['validated']) ? $_SESSION['validated'] : '';?>"><?php
            echo $message; ?></div>
        <?php  }
        unset($_SESSION['messages']);
        ?>
        <div class="createPost">
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
        <p> Lorem ipsum dolor sit amet, dolores urbanitas te per, tibique posidonium in vel. Possim tritani diceret in has, eum liber oporteat no. At mei dictas admodum, duo ut viris scaevola consequat, mea an errem comprehensam. Definiebas scriptorem appellantur per id, ius ut illud summo repudiare. Nullam ridens vix te. Evertitur intellegam disputando vix ad, ea labitur meliore has.

            Singulis petentium pri et. Pri habeo affert eripuit at. Vis ei rationibus sententiae reprimique. Eum mutat meliore fabellas id, pri tamquam labores prodesset cu.

            Ut malis antiopam urbanitas has, pri eros verear laoreet cu, aperiri vituperata nam ut. Vis tantas causae ut. Ei malis ceteros luptatum vel, an virtute partiendo disputationi duo. Libris tamquam ad vix, usu cu nisl veniam.

            Has diam erroribus euripidis et, cu brute fugit vis. Usu eu tritani omittantur, et eam albucius scriptorem. Sed ullum perpetua urbanitas et, ut est atqui nusquam laboramus. Duis veri cotidieque est et, malis affert iudico cu ius. Veniam eleifend no vel, cu vix hinc integre.

            Brute bonorum labores mea ei, mundi legendos sadipscing pro ex, pro laoreet perfecto pertinacia ne. Quodsi verear voluptua ea eam. Mei in offendit adipiscing, ad cum graeco legimus sententiae, ex odio semper mea. Suas wisi atqui eu sea, an dicta alterum accumsan sit. Case lorem possit et pro, mei malorum recteque te. Solet mucius dolores te per, eos movet zril lobortis at.
        </p>
        <p>Lorem ipsum dolor sit amet, dolores urbanitas te per, tibique posidonium in vel. Possim tritani diceret in has, eum liber oporteat no. At mei dictas admodum, duo ut viris scaevola consequat, mea an errem comprehensam. Definiebas scriptorem appellantur per id, ius ut illud summo repudiare. Nullam ridens vix te. Evertitur intellegam disputando vix ad, ea labitur meliore has.

            Singulis petentium pri et. Pri habeo affert eripuit at. Vis ei rationibus sententiae reprimique. Eum mutat meliore fabellas id, pri tamquam labores prodesset cu.

            Ut malis antiopam urbanitas has, pri eros verear laoreet cu, aperiri vituperata nam ut. Vis tantas causae ut. Ei malis ceteros luptatum vel, an virtute partiendo disputationi duo. Libris tamquam ad vix, usu cu nisl veniam.

            Has diam erroribus euripidis et, cu brute fugit vis. Usu eu tritani omittantur, et eam albucius scriptorem. Sed ullum perpetua urbanitas et, ut est atqui nusquam laboramus. Duis veri cotidieque est et, malis affert iudico cu ius. Veniam eleifend no vel, cu vix hinc integre.

            Brute bonorum labores mea ei, mundi legendos sadipscing pro ex, pro laoreet perfecto pertinacia ne. Quodsi verear voluptua ea eam. Mei in offendit adipiscing, ad cum graeco legimus sententiae, ex odio semper mea. Suas wisi atqui eu sea, an dicta alterum accumsan sit. Case lorem possit et pro, mei malorum recteque te. Solet mucius dolores te per, eos movet zril lobortis at.
        </p>
    </div>

    <!-- the footer -->
    <?php include_once("includes/footer.php"); ?>
</div>
</body>

