<!-- This page is called when the user goes to update a post -->
<?php
// Connect to the server
require "includes/connect.php";

// If there is no message id provided in the url, kill the page
if (!isset($_GET['id'])) {
    die("No post ID provided.");
}

// Get the ID for the page
$postId = $_GET["id"];

// Runs when the user submits their edit, runs an SQL script to update the post and sends them back to the main page
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $text = filter_input(INPUT_POST, "text", FILTER_SANITIZE_SPECIAL_CHARS);

    if($text === "" || $text === null) {
        $error = "Some text is required for message to be posted.";
    }
    else {

    $sql = "UPDATE posts SET body = :text WHERE posts.id = :id";

    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(":text", $text);
    $stmt->bindParam(":id", $postId);

    $stmt->execute();

    header("Location: index.php");
    exit;
    }
}

// Creates and executes and SQL script to get the content of a specific post
$sql = "SELECT * FROM posts WHERE posts.id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":id", $postId, PDO::PARAM_INT);
$stmt->execute();

// Attempts to get the posts content and set it to a variable
$post = $stmt->fetch();

// If the post does not exist, kill the page
if (!$post) {
    die("Post not found.");
}

// Header content
require "includes/header.php";
?>
<meta name="description" content="Edit a post page for Novachat" />
<title>Novachat | Edit a post</title>
</head>
<!-- Page Body -->
<body>
    <header>
        <h1>Novachat</h1>
        <?php include("includes/nav.php"); ?>
    </header>
    <main>
        <!-- User enters the edit they wish to make to their post, then saves the changes. This sends them automatically back to the homepage. -->
        <h3>Create a Post</h3>
        <form method="post" class="mt-3">
            <label class="form-label mt-3" for="text">Edit Post:</label>
            <textarea id="text" name="text" rows="6" cols="60" value="<?= htmlspecialchars($post["body"]) ?>" required></textarea>
            <button class="btn btn-primary mt-4">Save Changes</button>
        </form>
    </main>
</body>
<?php include("includes/footer.php") ?>