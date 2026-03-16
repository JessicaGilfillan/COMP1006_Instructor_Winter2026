<!-- This page is called when the user has signed in and is going to post a message -->
<?php

// Connect to the database
require("includes/connect.php");

// If the request method is not post, exit the page
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    die("Invalid Request");
}

// Grab form data and sanitize
$username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
$password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

// Empty array to store error information
$errors = [];

// If the username or password are null or empty, add an error to the array
if ($username === null || $username === "") {
    $errors[] = "Username is Required";
}
if ($password === null || $password === "") {
    $errors[] = "Password is Required";
}

// Variables to check if the user entered a valid account name and password
$users = [];
$validUser = false;

// Get all users from the database
$sql = "SELECT * FROM users ORDER BY id";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$users = $stmt->fetchAll();

// For each user, check if what the user entered matches a username in the database, if it does, check if the password for that username matches. if so, the user is valid
foreach ($users as $user) {
    if ($username === $user["username"]) {
        if ($password === $user["password"]) {
            $validUser = true;
        }
    }
}

// If the username and/or password are not correct, add an error to the errors array
if ($validUser === false) {
    $errors[] = "Username and/or Password are invalid, please try again";
}

// If the errors array is not empty, display what went wrong and disallow the user from accessing the page
if (!empty($errors)) {
    require("includes/header.php");
    echo "<title>Novachat | Error During Signin</title>";
    echo "</head>";
    echo "<h2>ERROR DURING SIGNIN, PLEASE FIX THE FOLLOWING:</h2>";
    echo "<ul>";
    foreach ($errors as $error) {
        echo "<li>" . htmlspecialchars($error) . "</li>";
    }
    echo "</ul>";
    echo "<a href='signIn1.php'>Return to Sign In Page</a>";
    require("includes/footer.php");
    exit;
}

?>
<!-- Header Content -->
<?php include("includes/header.php"); ?>
<meta name="description" content="Create a post page for Novachat" />
<title>Novachat | Create a Post</title>
</head>
<!-- Page body -->
<body>
    <header>
        <h1>Novachat</h1>
        <?php include("includes/nav.php"); ?>
    </header>
    <main>
        <!-- User enters what they would like to post -->
        <h3>Create a Post</h3>
        <form action="posted.php?username=<?= urlencode($username); ?>" method="post" class="mt-3">
            <label class="form-label mt-3" for="text">What's on your mind?</label>
            <textarea id="text" name="text" rows="6" cols="60" required></textarea>
            <button class="btn btn-primary mt-4" type="submit">Post</button>
        </form>
    </main>
</body>
<?php include("includes/footer.php") ?>