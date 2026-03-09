<?php
// Connect to the database
require 'connect.php';

// Make sure an ID was provided 
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = $_GET['id']; 
// Fetch the post 
$sql = "SELECT * FROM posts WHERE id = :id"; 
$stmt = $conn->prepare($sql); 
$stmt->bindParam(':id', $id, PDO::PARAM_INT); 
$stmt->execute(); 
$post = $stmt->fetch(PDO::FETCH_ASSOC); 

require 'header.php'; 

// If no post found, stop
if (!$post) { 
    echo "<p>Post not found.</p>"; 
    require 'footer.php'; 
    exit; 
} 
?> 

<h1 class="mb-3"><?php echo htmlspecialchars($post['title']); ?></h1>
<p class="text-muted"> 
    <strong>Date:</strong> <?php echo $post['date']; ?> 
    <br> 
    <strong>Category:</strong> <?php echo htmlspecialchars($post['category']); ?> 
</p>

<div class="mb-4"> 
    <?php echo nl2br(htmlspecialchars($post['body'])); ?> 
</div> 
<a href="edit.php?id=<?php echo $post['id']; ?>" class="btn btn-warning">Edit</a> 
<a href="delete.php?id=<?php echo $post['id']; ?>"
    class="btn btn-danger" 
    onclick="return confirm('Are you sure you want to delete this post?');"> 
    Delete 
</a> 
<a href="index.php" class="btn btn-secondary">Back to Posts</a> 

<?php require 'footer.php'; ?>