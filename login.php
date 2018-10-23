<?php session_start();
 $message = isset($_SESSION['message']) ? $_SESSION['message'] : '';
 unset($_SESSION['message']);

include("includes/a_config.php");?>

<!DOCTYPE html>
<head>
    <?php include("includes/header.php"); ?>
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
            <form method="post" action="login_handler.php">
                <div class="container">
                    <label for="username">Username</label>
                    <input type="text" placeholder="Enter Username" id="username" name="username" required><br/>
                    <label for="password">Password</label>
                    <input type="password" placeholder="Enter Password" id="password" name="password" required>
                    <button type="submit">Login</button>
                    <label class="checkbox">
                        <input type="checkbox" checked="checked" id="remember" name="remember"> Remember me
                    </label>
                    <span class="pass">Forgot <a href="#">password?</a></span>
                </div>
            </form>
        <?php include("includes/footer.php"); ?>
        </div>
    </div>
</body>

