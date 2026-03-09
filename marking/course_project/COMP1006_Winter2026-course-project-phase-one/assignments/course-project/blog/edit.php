<?php
// Connect to the database
require 'connect.php';

// Ensure an ID was provided
if (!isset($_GET['id'])) { 
    header("Location: index.php"); 
    exit; 
}


$id = $_GET['id'];

// Fetch the post from the database
$sql = "SELECT * FROM posts WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$post = $stmt->fetch(PDO::FETCH_ASSOC);

// Load the header
require 'header.php';

// If no post found, stop
if (!$post) {
    echo "<p>Post not found.</p>";
    require 'footer.php';
    exit;
}

?>

<h1 class="mb-4">Edit Blog Post</h1>

<form action="update.php" method="POST" class="mb-5">

    <!-- Hidden field to send the ID -->
    <input type="hidden" name="id" value="<?php echo $post['id']; ?>">

    <div class="mb-3">
        <label class="form-label">Title:</label>
        <input 
            type="text" 
            name="title" 
            class="form-control" 
            required
            value="<?php echo htmlspecialchars($post['title']); ?>"
        >
    </div>

    <div class="mb-3">
        <label class="form-label">Date:</label>
        <input 
            type="date" 
            name="date" 
            class="form-control" 
            required
            value="<?php echo $post['date']; ?>"
        >
    </div>

    <div class="mb-3">
        <label class="form-label">Body:</label>
        <textarea 
            name="body" 
            rows="10" 
            class="form-control" 
            required
        ><?php echo htmlspecialchars($post['body']); ?></textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Category:</label>
        <input 
            type="text" 
            name="category" 
            class="form-control" 
            required
            value="<?php echo htmlspecialchars($post['category']); ?>"
        >
    </div>

    <button type="submit" class="btn btn-warning">Update Post</button>
</form>

<?php require 'footer.php'; ?>
