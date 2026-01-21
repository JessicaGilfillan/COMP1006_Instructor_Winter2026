<?php
// Turn on error reporting so syntax and runtime errors are visible during development
ini_set('display_errors', 1);
error_reporting(E_ALL);

// FIXED: Missing semicolon in the student version
$host = "localhost";

// Correct variable name and syntax
$dbname = "week_two";
$username = "root";
$password = "";

// FIXED: Student version used an invalid DSN key and was missing a semicolon
// PDO requires "dbname" (not "db")
$dsn = "mysql:host=$host;dbname=$dbname";

try {
    // FIXED: try must be followed by curly braces
    // FIXED: Student version was missing a comma between arguments
    // FIXED: PDO requires three arguments (DSN, username, password)
    $pdo = new PDO($dsn, $username, $password);

    // FIXED: setAttribute() requires a comma between parameters
    // FIXED: ERRMODE_EXCEPTION is required for try/catch to work properly
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Success message only displays if no errors occurred
    echo "Connected to database!";
}
catch (PDOException $e) {
    // FIXED: catch must include parentheses and curly braces
    // FIXED: Display the actual error message for debugging
    echo "Database error: " . $e->getMessage();
}
