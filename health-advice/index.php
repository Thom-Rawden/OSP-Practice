<?php
require "./config/config.php";

$menu = "sidebar-menu-selected";
$pageName = "Home Page";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel = "stylesheet" href = "./css/styles.css">
</head>
<body>
    <?php include "./templates/header.php";?>

    <div class="main-container">
        <?php include "./templates/sidebar.php";?>


        <div class="grid-full-container">

            <div class="content-container-upper">
                <div class="content">1</div>
                <div class="content">2</div>
            </div>

            <div class="content-container-lower">
                <div class="content">3</div>
            </div>
            
        </div>
        
    </div>
</body>
</html>