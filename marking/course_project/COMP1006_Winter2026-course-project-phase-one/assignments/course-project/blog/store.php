<?php

/*
    Phase One Review

    For this phase I built a simple Blog/CMS with full CRUD using PHP, MySQL, and Bootstrap. Everything worked pretty smoothly, but the reCAPTCHA part took the longest. The info online is scattered across a bunch of different pages, so it took some time to figure out how the widget, the keys, and the server-side verification all fit together. I ended up piecing it together using the official Google docs plus a clearer walkthrough from GeeksforGeeks. Once I understood the flow, the rest of the project came together well.

    Sources: 
    - Google reCAPTCHA Documentation (client + server)
    - GeeksforGeeks — “How to Integrate Google reCAPTCHA in PHP"
 */

// Connect to the database
include 'connect.php';

// Basic validation
if (empty($_POST['title']) || empty($_POST['date']) || empty($_POST['body']) || empty($_POST['category'])) {
    die("All fields are required.");
}

// reCAPTCHA validation learned how through https://developers.google.com/recaptcha/docs/display and https://developers.google.com/recaptcha/docs/verify
$recaptcha = $_POST['g-recaptcha-response'];
if (!$recaptcha) {
    die("Please complete the reCAPTCHA.");
}

$secret = "6Ld4umssAAAAABujftEIY88Momzj_PuenYtwkrsw";
$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$recaptcha");
$responseData = json_decode($response);

if (!$responseData->success) {
    die("reCAPTCHA failed.");
}

// Collect form data
$title = $_POST['title'];
$date = $_POST['date'];
$body = $_POST['body'];
$category = $_POST['category'];

// Insert the new post into the database
$sql = "INSERT INTO posts (title, date, body, category) VALUES (:title, :date, :body, :category)";
$stmt = $conn->prepare($sql);

$stmt->bindParam(':title', $title);
$stmt->bindParam(':date', $date);
$stmt->bindParam(':body', $body);
$stmt->bindParam(':category', $category);

$stmt->execute();

// Redirect back to the main page
header("Location: index.php");
exit();
