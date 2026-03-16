<!-- This page allows users to edit or delete their messages -->
<?php

// Connect to the database
require("includes/connect.php");

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    die("Invalid Request");
}

// Grab form data and sanitize
$username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
$password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

// Empty array to collect errors if any occur
$errors = [];

// If the username or password are empty or null, add an error
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
    echo "<title>Novachat | Error During Sign in</title>";
    echo "</head>";
    echo "<h2>ERROR DURING SIGNIN, PLEASE FIX THE FOLLOWING:</h2>";
    echo "<ul>";
    foreach ($errors as $error) {
        echo "<li>" . htmlspecialchars($error) . "</li>";
    }
    echo "</ul>";
    echo "<a href='signIn2.php'>Return to Sign In Page</a>";
    require("includes/footer.php");
    exit;
}

// Empty array to store the user's posts
$posts = [];

// Get all posts by the specific user
$sql = "SELECT * FROM posts AS p WHERE p.user = :username";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":username", $username);
$stmt->execute();
$posts = $stmt->fetchAll();

?>

<!-- Header content -->
<?php include("includes/header.php"); ?>
<meta name="description" content="Create a post page for Novachat" />
<title>Novachat | Create a Post</title>
</head>

<!-- Page Body -->
<body>
    <header>
        <h1>Novachat</h1>
        <?php include("includes/nav.php"); ?>
    </header>
    <main class="mt-4">
        <h2>Edit your posts</h2>
        <!-- For each post, display the post id, date, and content, as well as buttons used for editing or deleting -->
        <?php if (empty($posts)): ?>
            <p>You haven't posted anything yet!</p>
        <?php else: ?>
            <div class="table-responsive">
                <?php foreach ($posts as $post): ?>
                    <div>
                        <p>Post ID: <?= htmlspecialchars($post["id"]); ?></p>
                        <p>Date Posted: <em><?= htmlspecialchars($post["posted_on"]); ?></em></p>
                        <p><?= htmlspecialchars($post["body"]); ?></p>
                        <a class="btn btn-sm btn-warning" href="update.php?id=<?= urlencode($post["id"]); ?>">Edit Post</a>
                        <a class="btn btn-sm btn-danger mt-2" href="delete.php?id=<?= urlencode($post["id"]); ?>" onclick="return confirm('Are you sure you want to delete this post?');">Delete</a>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </main>
</body>
<?php require "includes/footer.php"; ?>