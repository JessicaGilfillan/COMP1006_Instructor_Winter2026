<?php 
$host = "172.31.22.43"; //hostname
$db = "JessicaJessica001"; //database name
$user = "JessicaJessica001"; //username
$password = "cYjG165s6m"; //password

//points to the database
$dsn = "mysql:host=$host;dbname=$db";

//try to connect, if connected echo a yay!
try {
   $pdo = new PDO ($dsn, $user, $password); 
   $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}
//what happens if there is an error connecting 
catch(PDOException $e) {
    die("Database connection failed: " . $e->getMessage()); 
}
