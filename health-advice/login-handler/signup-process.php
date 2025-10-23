<?php
session_start();

// Does all the logic. Adds the user to the DB
// Sends back to home page and logs them in

$username = $_POST['username'];
$username = strtolower($username);

$password = $_POST['password'];

// Hash password for security
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// SQLite database file
$dbFile = '../users.db';

try {
    // Open the SQLite database
    $pdo = new PDO('sqlite:' . $dbFile);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare an SQL query to insert a user
    $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
    $stmt = $pdo->prepare($sql);

    // Bind parameters
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $hashedPassword);

    // Execute the query
    $stmt->execute();


    //Create the session to say they are logged in
    $_SESSION['logged'] = true;
    //Redirect them to the home page
    header("Location: ../index.php");
    exit();

} catch (PDOException $e) {
    $_SESSION['loginError'] = 'Username unavailable, please try again.';
    header("Location: ../signup.php");
}

?>