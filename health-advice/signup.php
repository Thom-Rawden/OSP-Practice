<?php 
require "./config/config.php";

$showLogin = false;
$pageName = "Sign up";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styles.css">
    <title>Login</title>
</head>
<body>
    <?php include "./templates/header.php";
    ?>

    <div class="login-container">
        <h1>Sign up</h2>
        <form method="POST" action="signup-process.php">
            <div>
                <h2>Username:</h2>
                <input class="login-input" type="text" name="username" required>
            </div>
            <div>
                <h2>Password:</h2>
                <input class="login-input" type="password" name="password" required>
            </div>
            <div>
                <button type="submit" class="login-button">Sign up</button>
            </div>
        </form>
    </div>
        
        
</body>
</html>