<!-- Page appears after the user attempts to post a message, will display errors if their are any and posts the message if not -->
<?php

// Connect to the database
require("includes/connect.php");

// If no username is set, kill the page
if(!isset($_GET["username"])) {
    die("No username applied");
}

// If the server request method is not post, kill the page
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    die("Invalid Request");
}

// Empty array to catch errors
$errors = [];

// Get the username from the url, as well as the text content
$username = $_GET["username"];
$text = filter_input(INPUT_POST, "text", FILTER_SANITIZE_SPECIAL_CHARS);

// If the username or text sections are null or empty, add a message to the errors array
if ($username === null || $username === "") {
    $errors[] = "Username is Required";
}
if ($text === null || $text === "") {
    $errors[] = "Text to post is required";
}

// If there are errors, display them and disallow the user from accessing the rest of the page
if (!empty($errors)) {
    require("includes/header.php");
    echo "<title>Novachat | Error During Post</title>";
    echo "</head>";
    echo "<h2>ERROR DURING POST:</h2>";
    echo "<ul>";
    foreach ($errors as $error) {
        echo "<li>" . htmlspecialchars($error) . "</li>";
    }
    echo "</ul>";
    echo "<a href='index.php'>Return to Homepage</a>";
    require("includes/footer.php");
    exit;
}

// SQL Query
$sql = "
    insert into posts(user, body)
    values (:username, :text)
";

// Prepare Query
$stmt = $pdo->prepare($sql);

// Bind parameters
$stmt->bindParam(":username", $username);
$stmt->bindParam(":text", $text);

// Execute Query
$stmt->execute();

?>

<!-- Header content -->
<?php include("includes/header.php"); ?>
<meta name="description" content="Created a post page for Novachat" />
<title>Novachat | Created a Post</title>
</head>

<!-- Page body, user is told their post was sucessfully created and is prompted to return to the main page -->
<body>
    <main>
        <h2>Successfully created post</h2>
        <p><?= htmlspecialchars($username); ?>: <?= htmlspecialchars($text); ?></p>
        <p><a href="index.php">Return to Homepage</a></p>
    </main>
</body>
<?php include("includes/footer.php"); ?>