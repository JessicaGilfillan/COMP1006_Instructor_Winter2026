<!-- connects to the database -->
<?php
$host = "localhost"; // Hostname
$db = "bitumi"; // Database containing all posts
$user = "root"; // Username for database
$password = ""; // Password for database

// Points to the database
$dsn = "mysql:host=$host;dbname=$db";

// Try to connect, on failure display a message
try {
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed, could not generate posts: " . $e->getMessage());
}
