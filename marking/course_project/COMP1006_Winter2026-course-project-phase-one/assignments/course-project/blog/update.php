<?php
// Connect to the database
require 'connect.php';

// Ensure the form was submitted with an ID
if (!isset($_POST['id'])) {
    header("Location: index.php");
    exit;
}

if (empty($_POST['title']) || empty($_POST['date']) || empty($_POST['body']) || empty($_POST['category'])) {
    die("All fields are required.");
}

// Collect form data
$id = $_POST['id'];
$title = $_POST['title'];
$date = $_POST['date'];
$body = $_POST['body'];
$category = $_POST['category'];

// Update the post in the database
$sql = "UPDATE posts SET title = :title, date = :date, body = :body, category = :category WHERE id = :id";
$stmt = $conn->prepare($sql);

$stmt->bindParam(':title', $title);
$stmt->bindParam(':date', $date);
$stmt->bindParam(':body', $body);
$stmt->bindParam(':category', $category);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);

$stmt->execute();

// Redirect back to the main page
header("Location: index.php");
exit();
