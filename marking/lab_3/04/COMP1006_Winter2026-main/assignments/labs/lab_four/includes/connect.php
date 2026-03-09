<?php 
$host = "localhost";
$db = "comp1006_lab4";
$user = "root";
$password = "root";

$dsn = "mysql:host=$host;port=8889;dbname=$db;charset=utf8mb4";

try {
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected!";
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
