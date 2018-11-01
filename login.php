<?php session_start();
 $message = isset($_SESSION['message']) ? $_SESSION['message'] : '';
 unset($_SESSION['message']);

include("includes/a_config.php");?>

<!DOCTYPE html>
<head>
    <?php include("includes/header.php"); ?>
    <link href="https://fonts.googleapis.com/css?family=Cherry+Swash" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=.7">
</head>
<body>
    <div id="wrapper">
        <div id="header">
            <img class="homeIcon" src="../Resources/Images/famIcon.png"/>

            <h1>Welcome to Family Connections</h1>
        </div>
        <?php if(empty($message)) { ?>
            <hr/>
        <?php } ?>
        <?php if(!empty($message)) { ?>
            <hr class="hrError"/>
            <div class="errorMessage"> <?php echo $message; ?> </div>
        <?php } ?>
        <div class="loginForm">
            <div id="openModal" class="modalDialog">
                <div>
                    <a href="#close" title="Close" class="close">X</a>
                    <h2>Create Account</h2>
                    <hr/>
                    <form method="post" action="signUp_handler.php">
                        <label class="modalLabel" for="signUp-displayname">Display Name</label>
                        <input type="text" placeholder="Display Name" name="signUp-displayname" required>
                        <label for="signUp-username">Username</label>
                        <input type="text" placeholder="Username" name="signUp-username" required>
                        <label for="signUp-email">Email Address</label>
                        <input type="text" placeholder="Email Address" name="signUp-email" required>
                        <label for="signUp-password">Password</label>
                        <input type="password" placeholder="Password" name="signUp-password" required>
                        <label for="signUp-confirmpassword">Confirm Password</label>
                        <input type="password" placeholder="Confirm Password" name="signUp-confirmpassword" required>
                        <button type="submit">Sign Up</button>
                    </form>
                </div>
            </div>

            <form method="post" action="login_handler.php">
                <div class="container">
                    <label for="username">Username</label>
                    <input type="text" placeholder="Enter Username" name="username" value=""><br/>
                    <label for="password">Password</label>
                    <input type="password" placeholder="Enter Password" name="password" value="">
                    <button type="submit">Login</button>
                    <label class="checkbox">
                        <input type="checkbox" checked="checked" id="remember" name="remember"> Remember me
                    </label>
                    <span class="pass">Forgot <a href="#">password?</a></span>
                    <div class="createAccount">
                        <span>Not a member? <a href="#openModal">Sign up</a></span>
                    </div>
                    <button class="guest" name="guest" value="guest">Guest</button>
                </div>
            </form>

        <?php include("includes/footer.php"); ?>
        </div>
    </div>
</body>

