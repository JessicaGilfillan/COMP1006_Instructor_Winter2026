<?php
// connect.php
// This file creates a PDO connection to a MySQL database.
// PDO is a PHP class used to connect to databases in a consistent way.

$host = "localhost";
$dbname = "comp1006_lab1"; // database students create in phpMyAdmin
$user = "root";
$pass = ""; // MAMP/WAMP/XAMPP differs; adjust if needed

// DSN = Data Source Name (connection string)
// It tells PDO which database system to use and where it is located.
$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

try {
    // Create a new PDO object (this is the database connection).
    $pdo = new PDO($dsn, $user, $pass);

    // Set error mode so PDO throws exceptions when something goes wrong.
    // This helps us catch connection/query errors using try/catch.
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Optional: message for teaching/demo purposes.
    // In real apps, we usually wouldn't echo this directly.
    $dbMessage = "Database connection successful!";
} catch (PDOException $e) {
    // If connection fails, execution jumps here.
    // die() stops the script and prints the message.
    $dbMessage = "Database connection failed: " . $e->getMessage();
}
