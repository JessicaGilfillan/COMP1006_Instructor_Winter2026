<?php 

declare(strict_types=1);

$host = "localhost"; //hostname
$db = "week_two"; //database name
$user = "root"; //username
$password = ""; //password

//points to the database
$dsn = "mysql:host=$host;dbname=$db";

try {
 $pdo = new PDO($dsn, $user, $pass); 
 $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
 echo "Connected to the database! Yay!"; 
}
catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

