<div class="header-container">
    <div class="header-logo">Logo</div>
    <div class="header-main"><?php echo $pageName ?></div>

    <div class="header-login-full">
        <?php 
        if ($showLogin == true) {
            echo <<< END
            <div class="header-login-container">
            <a class="header-login-signup" href="login.php"><div>Login</div></a>
            <a class="header-login-signup" href="signup.php"><div>Sign Up</div></a>
            </div>
            END;
        }
        ?>
    </div>

</div>