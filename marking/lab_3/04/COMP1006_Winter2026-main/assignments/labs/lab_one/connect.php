<?php

$host = "localhost";        // Database server 
$dbname = "comp1006_lab1";  // Name of database
$username = "root";         // Database username 
$password = "root";             // Database password 

$dsn = "mysql:host=$host;dbname=$dbname";

try { // Try to establish a database connection

    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    echo "<p>Database connection successful!</p>";
    
} catch (PDOException $e) { //Exception Handling    
    // Stop script execution if database connection fails
    die("Database connection failed: " . $e->getMessage());
}
?>