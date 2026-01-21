<?php
// Database connection settings
// These values tell PHP where the database is and how to log in
$host = "localhost";    // The server where the database is running (usually localhost)
$db = "week_two";       // The name of the database we want to connect to
$user = "root";         // Database username
$password = "";         // Database password (empty by default in local setups)

// DSN (Data Source Name)
// This string tells PDO which database system to use (MySQL),
// where it is located, and which database to connect to
$dsn = "mysql:host=$host;dbname=$db";

// Try to connect to the database
// Code inside the try block is attempted first
try {
    // Create a new PDO object
    // This line actually attempts to connect to the database
    $pdo = new PDO($dsn, $user, $password); 

    // Configure PDO to throw an exception when an error occurs
    // This makes database errors easier to detect and handle
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // If the connection succeeds, this message will be displayed
    echo "<p>YAY CONNECTED!</p>"; 
}

// Catch block runs if something goes wrong in the try block
// PDOException is the type of error thrown by PDO
catch (PDOException $e) {

    // Stop the script and display a helpful error message
    // getMessage() contains details about what went wrong
    die("Database connection failed: " . $e->getMessage()); 
}
/* PDO tries to connect.
If it fails, PHP creates a PDOException object.
That object contains an error message.
getMessage() lets us read that message.*/ 