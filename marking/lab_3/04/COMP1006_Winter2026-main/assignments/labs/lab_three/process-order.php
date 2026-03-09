<?php require "includes/header.php";

// clean inputs
$firstName = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_SPECIAL_CHARS);
$lastName = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_SPECIAL_CHARS); 
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_SPECIAL_CHARS);
// var to store errors
$errors = [];

// validate inputs 
if ($firstName === null || $firstName === '') {
    $errors[] = "First Name is Required."; 
}

if ($lastName === null || $lastName === '') {
    $errors[] = "Last Name is Required."; 
}

if ($email === null || $email === '') {
    $errors[] = "Email is Required"; 
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Email must be a valid email"; 
}

if ($message === null || $message === '') {
    $errors[] = "Message is required."; 
}

// Check for Errors
if(!empty($errors)) {
    echo "<h3>Error sending message:</h3>";
    echo "<ul>";
    foreach ($errors as $error) : ?>
        <li><?php echo $error; ?> </li>
    <?php endforeach;
    echo "</ul>";
    echo "<p><a href='order.php'>Go back</a></p>";
    require "includes/footer.php";
    exit; 
}

// email information
$to = "info@bakery.com"; 

$subject = "New Contact Form Message from " . $firstName;

$message = "You have received a new message from the website contact form.\n\n";
$message .= "Name: " . $firstName . " " . $lastName . "\n";
$message .= "Email: " . $email . "\n";
$message .= "Message:\n" . $message . "\n";



// Send the email
mail($to, $subject, $message);

?>
<!-- confirmation page -->
<main>
    <?php echo "<h2> Thanks for contacting us, " . $firstName . "!</h2>"; ?>
    <p>We have received your message and will get back to you shortly.</p>

    <h3> Message Summary: </h3>
    <p> <strong>From:</strong> <?php echo "$firstName $lastName ($email)"; ?> </p>
    <p> <strong>Message:</strong> <br> <?php echo $message; ?> </p>
</main>
<?php require "includes/footer.php" ?>
</body>
</html>