<?php
require "includes/header.php";
require "includes/connect.php";

// Check form submission
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die('Invalid request');
}

// Grab form data
$firstName = trim(filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_SPECIAL_CHARS));
$lastName = trim(filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_SPECIAL_CHARS));
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

// Write an INSERT statement with named placeholders
$sql = "
    INSERT INTO subscribers (
        first_name,
        last_name,
        email
    ) VALUES (
        :first_name,
        :last_name,
        :email
    )
";

// Prepare the statement
$stmt = $pdo->prepare($sql);

// Execute the statement with an array of values
$stmt->execute([
    ':first_name' => $firstName,
    ':last_name' => $lastName,
    ':email' => $email
]);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <main class="container mt-4">
        <h2>Thank You for Subscribing</h2>

        <!-- Display a confirmation message -->
        <p>Thanks, <?= htmlspecialchars($firstName . ' ' . $lastName); ?>! You have been added to our mailing list.</p>


        <p class="mt-3">
            <a href="subscribers.php">View Subscribers</a>
        </p>
    </main>
</body>

</html>