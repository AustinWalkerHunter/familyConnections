<?php session_start();
 $message = isset($_SESSION['message']) ? $_SESSION['message'] : '';
 unset($_SESSION['message']);

include("includes/a_config.php");?>

<!DOCTYPE html>
<head>
    <?php include("includes/header.php"); ?>
    <link href="https://fonts.googleapis.com/css?family=Cherry+Swash" rel="stylesheet">
</head>
<body>
    <div id="wrapper">
        <div id="header">
            <h1>Welcome to Family Connections</h1>
        </div>
        <hr/>
        <div class="loginForm">
            <?php if(!empty($message)) { ?>
                <div class="errorMessage"> <?php echo $message; ?> </div>
            <?php } ?>

            <div id="openModal" class="modalDialog">
                <div>
                    <a href="#close" title="Close" class="close">X</a>
                    <h2>Create Account</h2>
                    <hr/>
                    <form method="post" action="signUp_handler.php">
                        <label for="username">Username</label>
                        <input type="text" placeholder="Enter Username" id="signUp-username" name="signUp-username" required><br/>
                        <label for="email">Email Address</label>
                        <input type="text" placeholder="Enter Email Address" id="signUp-email" name="signUp-email" required><br/>
                        <label for="password">Password</label>
                        <input type="password" placeholder="Enter Password" id="signUp-password" name="signUp-password" required>
                        <button type="submit">Sign Up</button>
                    </form>
                </div>
            </div>

            <form method="post" action="login_handler.php">
                <div class="container">
                    <label for="username">Username</label>
                    <input type="text" placeholder="Enter Username" id="username" name="username"><br/>
                    <label for="password">Password</label>
                    <input type="password" placeholder="Enter Password" id="password" name="password">
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

