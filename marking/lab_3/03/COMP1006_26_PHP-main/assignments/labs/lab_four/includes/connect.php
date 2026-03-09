<?php 
$host = "127.0.0.1"; //hostname
$db = "lab4"; //database name
$user = "root"; //username
$password = ""; //password

//points to the database
$dsn = "mysql:host=$host;dbname=$db;port=3307";

//try to connect, if connected, proceed, if not, catch the error and display message
try {
   $pdo = new PDO ($dsn, $user, $password); 
   $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}
//what happens if there is an error connecting 
catch(PDOException $e) {
    die("Database connection failed: " . $e->getMessage()); 
}
