<?php
// Start or resume the current session.
// This allows us to store login information using $_SESSION variables.
session_start();

// Include the database connection so we can query the users table.
require "includes/connect.php";

// Include the site header (navigation, bootstrap, etc.)
require "includes/header.php";

// Variable to store any login error messages
$error = "";

// Check if the form was submitted using POST
// This prevents the login logic from running when the page first loads
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Retrieve and clean the username/email input
    // trim() removes whitespace from the beginning and end
    // ?? '' ensures a blank string if the field does not exist
    $usernameOrEmail = trim($_POST['username_or_email'] ?? '');

    // Retrieve the password from the form
    $password = $_POST['password'] ?? '';

    // Basic validation to ensure both fields were filled in
    if ($usernameOrEmail === '' || $password === '') {

        // Store an error message if either field is empty
        $error = "Username/email and password are required.";

    } else {

        // SQL query to find a matching user in the database
        // The user can log in using either their username or email
        $sql = "SELECT id, username, email, password
                FROM users
                WHERE username = :login OR email = :login
                LIMIT 1";

        // Prepare the SQL statement using PDO
        $stmt = $pdo->prepare($sql);

        // Bind the login value to the :login parameter
        // This prevents SQL injection attacks
        $stmt->bindParam(':login', $usernameOrEmail);

        // Execute the query
        $stmt->execute();

        // Fetch the matching user as an associative array
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Check two conditions:
        // 1. A user was found in the database
        // 2. The password entered matches the stored hashed password
        if ($user && password_verify($password, $user['password'])) {

            // Regenerate the session ID for security
            // This prevents session fixation attacks
            session_regenerate_id(true);

            // Store user information in session variables
            // These variables indicate that the user is logged in
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];

            // Redirect the user to the protected orders page
            header("Location: orders.php");

            // Stop the script immediately after redirecting
            exit;

        } else {

            // If login fails, display an error message
            $error = "Invalid credentials. Please try again.";
        }
    }
}
?>

<main class="container mt-4">
    <h2>Login</h2>

    <!-- If there is an error message, display it in a Bootstrap alert -->
    <?php if ($error !== ""): ?>
        <div class="alert alert-danger">
            <!-- htmlspecialchars prevents XSS attacks by escaping output -->
            <?= htmlspecialchars($error); ?>
        </div>
    <?php endif; ?>

    <!-- Login form -->
    <form method="post" class="mt-3">

        <!-- Username or Email field -->
        <label for="username_or_email" class="form-label">Username or Email</label>
        <input
            type="text"
            id="username_or_email"
            name="username_or_email"
            class="form-control mb-3"
            required
        >

        <!-- Password field -->
        <label for="password" class="form-label">Password</label>
        <input
            type="password"
            id="password"
            name="password"
            class="form-control mb-4"
            required
        >

        <!-- Submit button -->
        <button type="submit" class="btn btn-primary">Login</button>

        <!-- Link to the registration page -->
        <a href="signup.php" class="btn btn-secondary">Create Account</a>

    </form>
</main>

<?php
// Include the site footer
require "includes/footer.php";
?>