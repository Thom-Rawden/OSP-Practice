<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

try {
    // Connect to SQLite database
    $pdo = new PDO('sqlite:../users.db');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $username = strtolower($username);

    $password = $_POST['password'];


    if (!$username || !$password) {
        echo "Please enter both username and password.";
        exit;
    }

    // Prepare and execute query to find user by username
    $stmt = $pdo->prepare("SELECT user_id, username, password FROM users WHERE username = :username");
    $stmt->execute([':username' => $username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        // Password matches
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['username'] = $user['username'];


        $_SESSION['logged'] = true;
        unset($_SESSION['loginError']);

        // Redirect page
        header("Location: ../index.php");
        exit;

        

        exit;
    } else {
        $_SESSION['loginError'] = 'Incorrect username or password, please try again.';
        header("Location: ../login.php");
        exit();
    }
}
?>