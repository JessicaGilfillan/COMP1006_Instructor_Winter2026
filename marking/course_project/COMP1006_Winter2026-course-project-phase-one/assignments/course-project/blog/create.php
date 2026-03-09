<?php
// Connect to the database and load the header
include 'connect.php';
include 'header.php';
?>
<h1 class="mb-4">Create a New Blog Post</h1>

<form action="store.php" method="POST" class="mb-5">

    <div class="mb-3">
        <label class="form-label">Title:</label>
        <input type="text" name="title" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Date:</label>
        <input type="date" name="date" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Body:</label>
        <textarea name="body" rows="10" cols="50" class="form-control" required></textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Category:</label>
        <input type="text" name="category" class="form-control" required>
    </div>

    <div class="g-recaptcha mb-3" data-sitekey="6Ld4umssAAAAAF49w5Hzc5KZDrPA-_-A4Hj1Fawx"></div>

    <button type="submit" class="btn btn-success">Save Post</button>
</form>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<?php require 'footer.php'; ?>