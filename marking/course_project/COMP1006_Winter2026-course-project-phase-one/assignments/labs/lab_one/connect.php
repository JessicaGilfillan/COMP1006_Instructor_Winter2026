<?php
// connect.php
// This file connects to the local MySQL database using PDO

$host = "localhost";
$db = "lab_one";   // or whatever you named it
$user = "root";
$password = "";    // XAMPP default is empty unless you changed it

$dsn = "mysql:host=$host;dbname=$db";

try {
    // Create PDO instance
    $pdo = new PDO($dsn, $user, $password);

    // Enable exception mode for debugging
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "<p>Database connection successful!</p>";
}
catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
