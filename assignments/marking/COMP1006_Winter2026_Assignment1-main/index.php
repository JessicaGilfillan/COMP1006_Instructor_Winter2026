<!-- Homepage -->

<!-- Header content -->
<?php include("includes/header.php"); ?>
<meta name="description" content="Homepage for Novachat" />
<title>Novachat | Homepage</title>
</head>

<!-- Page connection -->
<?php require("includes/connect.php");

// Placeholder
$posts = [];

// Get all posts
$sql = "SELECT * FROM posts ORDER BY posted_on DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$posts = $stmt->fetchAll();
?>

<!-- Page body -->
<body>
    <header>
        <h1>Novachat</h1>
        <?php include("includes/nav.php"); ?>
    </header>
    <main>
        <!-- If there are no posts, display a message, otherwise display every post by the date -->
        <?php if (empty($posts)): ?>
            <p>No posts yet, create one!</p>
        <?php else: ?>
            <div>
                <?php foreach ($posts as $post): ?>
                    <section>
                        <h2><?= htmlspecialchars($post["user"]); ?></h2>
                        <p><em><?= htmlspecialchars($post["posted_on"]); ?></em></p>
                        <div class="post">
                            <p><?= htmlspecialchars($post["body"]); ?></p>
                        </div>
                    </section>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </main>
</body>
<?php require("includes/footer.php"); ?>