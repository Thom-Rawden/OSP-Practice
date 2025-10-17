<?php
// SQLite database file
$dbFile = 'users.db';

// Create a new PDO instance for SQLite
try {
    // Open or create the SQLite database file
    $pdo = new PDO('sqlite:' . $dbFile);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // SQL query to create the 'users' table
    $sql = "
    CREATE TABLE IF NOT EXISTS users (
        user_id INTEGER PRIMARY KEY AUTOINCREMENT,
        username TEXT NOT NULL UNIQUE,
        password TEXT NOT NULL
    );
    ";

    // Execute the query
    $pdo->exec($sql);

    echo "Database and table created successfully.";
} catch (PDOException $e) {
    echo "Error creating database: " . $e->getMessage();
}
?>
