<?php
//store db connection info in a variable
$host = "localhost" //hostname
$db = "lab_one";
$user = "root";
$pword = "";
//data source name - type of db, location and db name
$dsn = "mysql:host=$host;dbname=$db";

//what we want to happen
try {
    $pdo = new PDO($dsn, $user, $pword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<p> YAY Connected! </p>";

}
//this is what happens when things go wrong
catch (PDOException $e) {
    die ("Database conenction failed: " .$e->getMessage());
}
?>