<!-- This page is run when the user selects to delete a post, it does not display anything to the user -->
<?php

// Connect to the database
require "includes/connect.php";

// Check if an id is set, if not, send the user back to the homepage
if(!isset($_GET["id"])) {
    header("Location: index.php");
    exit;
}

// Get the id from the url
$postId = $_GET["id"];

// create and run an sql script to delete the post from the server
$sql = "DELETE FROM posts WHERE posts.id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":id", $postId, PDO::PARAM_INT);
$stmt->execute();

// Return the user to the homepage and exit
header("Location: index.php");
exit();

?>