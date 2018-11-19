<?php session_start();
    $loginusername = isset($_SESSION['loginusername']) ? $_SESSION['loginusername'] : '';
    $loginpassword = isset($_SESSION['loginpassword']) ? $_SESSION['loginpassword'] : '';
    $message = isset($_SESSION['message']) ? $_SESSION['message'] : '';
    $signupMessage = isset($_SESSION['signupMessage']) ? $_SESSION['signupMessage'] : '';
    $signupUsername = isset($_SESSION['signUp-username']) ? $_SESSION['signUp-username'] : '';
    $displayname = isset($_SESSION['signUp-displayname']) ? $_SESSION['signUp-displayname'] : '';
    $email = isset($_SESSION['signUp-email']) ? $_SESSION['signUp-email'] : '';
    $signupPassword = isset($_SESSION['signUp-password']) ? $_SESSION['signUp-password'] : '';
    $confirmpassword = isset($_SESSION['signUp-confirmpassword']) ? $_SESSION['signUp-confirmpassword'] : '';
    $permissionAttempt = isset($_SESSION['permissionAttempt']) ? $_SESSION['permissionAttempt'] : '';
    $permission = isset($_SESSION['permission']) ? $_SESSION['permission'] : 0;
    $errorNumber = isset($_SESSION['errorNumber']) ? $_SESSION['errorNumber'] : '';

     unset($_SESSION["loginusername"]);
     unset($_SESSION["loginpassword"]);
     unset($_SESSION['message']);
     unset($_SESSION['signupMessage']);
     unset($_SESSION["signUp-username"]);
     unset($_SESSION["signUp-displayname"]);
     unset($_SESSION["signUp-email"]);
     unset($_SESSION["signUp-password"]);
     unset($_SESSION["signUp-confirmpassword"]);
     unset($_SESSION["permissionAttempt"]);
     unset($_SESSION["errorNumber"]);

//     unset($_SESSION['permission']);


//echo "<pre>" . print_r($_SESSION,1) . "</pre>";

include("includes/a_config.php");?>

<!DOCTYPE html>
<head>
    <?php include("includes/header.php"); ?>
    <link href="https://fonts.googleapis.com/css?family=Cherry+Swash" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=.6">
</head>
<body>
    <div id="wrapper">
        <div id="header">
            <img class="homeIcon" src="../Resources/Images/famIcon.png"/>

            <h1>Welcome to Family Connections</h1>
        </div>


        <?php if(empty($message)) {?>
            <hr/>
        <?php } ?>

        <!-- On a login error, change sytles and display message -->
        <?php if(!empty($message)) { ?>
            <hr class="hrError"/>
            <div class="errorMessage"> <?php echo $message; ?> </div>
        <?php } ?>
        <div class="loginForm">
            <form method="post" action="login_handler.php">
                <div class="container">
                    <label for="username">Username</label>
                    <input type="text" placeholder="Enter Username" name="username" value="<?php echo isset($loginusername) ? $loginusername : ''; ?>"><br/>
                    <label for="password">Password</label>
                    <input type="password" placeholder="Enter Password" name="password" value="<?php echo isset($loginpassword) ? $loginpassword : ''; ?>">
                    <button type="submit">Login</button>
                    <label class="checkbox">
                        <input type="checkbox" checked="checked" id="remember" name="remember"> Remember me
                    </label>
                    <span class="pass">Forgot <a href="#">password?</a></span>
                    <div class="createAccount">
                        <span>Not a member? <a href="#openPermissionModal">Sign up</a></span>
                    </div>
                    <button class="guest" name="guest" value="guest">Guest</button>
                </div>
            </form>

            <!--Permission Modal-->
            <div id="openPermissionModal" class="modalDialog">
                <div>
                    <a href="/login.php" title="Close" class="close">X</a>
                    <div id="permissionOnly">
                        <h2>Permission Code</h2>
                        <hr/>
                        <form method="post" action="permission_handler.php">
                            <input class="<?php echo ($errorNumber === 1) ? "invalidInput" : ''; ?>" type="text" placeholder="Enter Code" name="permissionAttempt"  value="<?php echo isset($permissionAttempt) ? $permissionAttempt : ''; ?>" autocomplete="off" required>
                            <button type="submit">Submit</button>
                        </form>
                    </div>
                </div>
                <?php if(!empty($signupMessage)) { ?>
                    <div id="signupError"> <?php echo $signupMessage; ?> </div>
                <?php } ?>
            </div>

            <!-- Sign-up Modal-->
            <?php if($permission) { ?>
                <div id="openSignUpModal" class="modalDialog">
                    <div>
                        <a href="/login.php" title="Close" class="close">X</a>
                        <div id="permissionOnly">
                            <h2>Create Account</h2>
                            <hr/>
                            <form method="post" action="signUp_handler.php">
                                <label class="modalLabel" for="signUp-displayname">Display Name</label>
                                <input type="text" placeholder="Display Name" name="signUp-displayname" value="<?php echo isset($displayname) ? $displayname : ''; ?>" required>
                                <label for="signUp-username">Username</label>
                                <input class="<?php echo ($errorNumber === 3) ? "invalidInput" : ''; ?>" type="text" placeholder="Username" name="signUp-username" value="<?php echo isset($signupUsername) ? $signupUsername : ''; ?>" required>
                                <label for="signUp-email">Email Address</label>
                                <input class="<?php echo ($errorNumber === 1) ? "invalidInput" : ''; ?>" type="text" placeholder="Email Address" name="signUp-email" value="<?php echo isset($email) ? $email : ''; ?>" required>
                                <label for="signUp-password">Password</label>
                                <input class="<?php echo ($errorNumber === 2) ? "invalidInput" : ''; ?>" type="password" placeholder="Password" name="signUp-password" value="<?php echo isset($signupPassword) ? $signupPassword : ''; ?>" required>
                                <label for="signUp-confirmpassword">Confirm Password</label>
                                <input class="<?php echo ($errorNumber === 2) ? "invalidInput" : ''; ?>" type="password" placeholder="Confirm Password" name="signUp-confirmpassword" value="<?php echo (($errorNumber === 2) ? '' : isset($confirmpassword) ? $confirmpassword : ''); ?>" required>
                                <button type="submit">Sign Up</button>
                            </form>
                        </div>
                    </div>
                    <?php if(!empty($signupMessage)) { ?>
                        <div id="signupError"> <?php echo $signupMessage; ?> </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
        <?php include("includes/footer.php"); ?>
    </div>
</body>

