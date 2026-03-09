<?php
// Connect to the database
require 'connect.php';

// Fetch all posts from newest to oldest
$sql = "SELECT * FROM posts ORDER BY date DESC";
$stmt = $conn->prepare($sql);
$stmt->execute();
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Load the page header
require 'header.php';
?>
<h1 class="mb-4">All Blog Posts</h1>

<a href="create.php" class="btn btn-primary mb-4">Create New Post</a>

<?php foreach ($posts as $post): ?>
     <div class="card mb-4">
        <div class="card-body">
            <h2 class="card-title"><?php echo htmlspecialchars($post['title']); ?></h2>

            <p class="text-muted mb-2">
                <strong>Date:</strong> <?php echo $post['date']; ?>
            </p>

            <p class="card-text">
                <?php echo nl2br(htmlspecialchars($post['body'])); ?>
            </p>

            <a href="edit.php?id=<?php echo $post['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
            <a href="delete.php?id=<?php echo $post['id']; ?>"
               class="btn btn-sm btn-danger"
               onclick="return confirm('Are you sure you want to delete this post?');">
               Delete
            </a>
        </div>
    </div>
<?php endforeach; ?>

<?php require 'footer.php'; ?>