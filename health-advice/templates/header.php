<div class="header-container">
    <a href = "index.php" class="header-logo">Logo</a>
    <div class="header-main"><?php echo $pageName ?></div>

    <div class="header-login-full">
        <?php
        $_SESSION['logged'];
        if ($pageName == "Login" || $pageName == "Sign up") {}


        // Display Login / Signup options if not on a login page and not logged in
        else if ($_SESSION['logged'] != true) {
            echo <<< END
            <div class="header-login-container">
            <a class="header-login-box" href="login.php"><div>Login</div></a>
            <a class="header-login-box" href="signup.php"><div>Sign Up</div></a>
            </div>
            END;


        // Display a logout button if logged in
        } else {
            echo <<< END
            
            <a class="header-login-box" href="./login-handler/logout.php"><div>Logout</div></a>
            
            END;
        }
        ?>
    </div>
    

</div>