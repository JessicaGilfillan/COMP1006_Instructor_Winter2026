<?php 

declare(strict_types=1);

$host = "localhost";
$db = "test_connection";
$user = "root";
$pass = "";

$dsn = "mysql:host=$host;dbname=$db";

try {
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<p>Connection to the database was successful!</p>";
} catch (PDOException $e) {
    die ("Connection failed: " . $e->getMessage());
}

?>