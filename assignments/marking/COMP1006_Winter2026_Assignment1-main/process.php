<!-- Page appears after the user attempts to sign up for an account, if there are issues display them and otherwise add the user to the database -->
<?php

// Connect to the database
require("includes/connect.php");

// If the server request method is not post, kill the page
if($_SERVER["REQUEST_METHOD"] !== "POST") {
    die("Invalid Request");
}

// Grab form data and sanitize
$username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
$password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

// Empty array to catch errors
$errors = [];

// If the username or password are null, add an error to the errors array
if($username === null || $username === "") {
    $errors[] = "Username is Required";
}
if($password === null || $password === "") {
    $errors[] = "Password is Required";
}

// Empty array to store all current users
$users = [];

// SQL query to get all users
$sql = "SELECT username FROM users ORDER BY id";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$users = $stmt->fetchAll();

// For each user, check if the username the current user has entered is taken. If so, add an error to the errors array
foreach($users as $user) {
    if($username === $user["username"]) {
        $errors[] = "Sorry, username has already been used. Please go back and try another";
    }
}

// If there are errors, display them and disallow the user from accessing the rest of the page
if(!empty($errors)) {
    require("includes/header.php");
    echo "<title>Novachat | Error During Signup</title>";
    echo "</head>";
    echo "<h2>ERROR DURING SIGNUP, PLEASE FIX THE FOLLOWING:</h2>";
    echo "<ul>";
    foreach($errors as $error) {
        echo "<li>" . htmlspecialchars($error) . "</li>";
    }
    echo "</ul>";
    echo "<a href='signUp.php'>Return to Sign Up Page</a>";
    require("includes/footer.php");
    exit;
}

// SQL Query
$sql = "
    insert into users(username, password)
    values (:username, :password)
";

// Prepare Query
$stmt = $pdo->prepare($sql);

// Bind parameters
$stmt->bindParam(":username", $username);
$stmt->bindParam(":password", $password);

// Execute Query
$stmt->execute();

// Header Content
include("includes/header.php");
?>
<meta name="description" content="Signed up for Novachat" />
<title>Novachat | Signed Up</title>
</head>
<!-- Page Body -->
<body>
    <main>
        <h2>Registered</h2>
        <p>You are now registered as <?= htmlspecialchars($username) ?>.</p>
        <p><a href="index.php">Return to Homepage</a></p>
    </main>
</body>
<?php include("includes/footer.php"); ?>