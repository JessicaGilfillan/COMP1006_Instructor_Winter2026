<?php
// Turn on error reporting so syntax and runtime errors are visible during development
ini_set('display_errors', 1);
error_reporting(E_ALL);


$host = "127.0.0.1";
$db = "test_connection";
$username = "root";
$pass = "";

$dsn = "mysql:host=$host;port=3307;dbname=$db";
try {

    $pdo = new PDO($dsn, $username, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);

    echo "Connected to database!";
}
catch (PDOException $e) {
    echo "Database error: " . $e;
}