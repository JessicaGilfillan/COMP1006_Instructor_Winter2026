<?php
/**
 * process.php
 * -----------
 * PURPOSE:
 * - Receive form data from an HTML form
 * - Sanitize and validate user input
 * - Build and send an email to the client
 * - Display a confirmation message
 *
 * This version includes:
 * - Email field support
 * - filter_input() for sanitizing
 * - filter_var() for validation
 */

/* =========================================================
   SUPERGLOBALS (Instructor Notes)
   ---------------------------------------------------------
   - $_POST is automatically populated when method="post"
   - filter_input() safely reads from superglobals
   - $_SERVER provides request metadata
   ========================================================= */

// ---------------------------------------------------------
// 1) Ensure the form was submitted using POST
// ---------------------------------------------------------
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo "<p>This page expects a POST form submission.</p>";
    exit;
}

// ---------------------------------------------------------
// 2) Sanitize scalar form fields using filter_input()
// ---------------------------------------------------------
// Instructor note:
// - filter_input() reads from INPUT_POST instead of $_POST
// - FILTER_SANITIZE_SPECIAL_CHARS prevents HTML injection
$firstName = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_SPECIAL_CHARS);
$lastName  = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_SPECIAL_CHARS);
$email     = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$phone     = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_SPECIAL_CHARS);
$address   = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_SPECIAL_CHARS);
$comments  = filter_input(INPUT_POST, 'comments', FILTER_SANITIZE_SPECIAL_CHARS);

// ---------------------------------------------------------
// 3) Access array-based item data
// ---------------------------------------------------------
// Instructor note:
// - filter_input() does not work well with nested arrays
// - Array inputs must be accessed directly
$items = $_POST['items'] ?? [];

// ---------------------------------------------------------
// 4) Validate required fields
// ---------------------------------------------------------
$errors = [];

// Required text fields
if ($firstName === null || $firstName === '') {
    $errors[] = "First name is required.";
}

if ($lastName === null || $lastName === '') {
    $errors[] = "Last name is required.";
}

// Email validation
if ($email === null || $email === '') {
    $errors[] = "Email address is required.";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Email address must be a valid email.";
}

// Phone validation (simple, teaching-friendly)
if ($phone === null || $phone === '') {
    $errors[] = "Phone number is required.";
} elseif (!filter_var($phone, FILTER_VALIDATE_REGEXP, [
    'options' => ['regexp' => '/^[0-9\-\+\(\)\s]{7,25}$/']
])) {
    $errors[] = "Phone number format is invalid.";
}

if ($address === null || $address === '') {
    $errors[] = "Address is required.";
}

// ---------------------------------------------------------
// 5) Validate item quantities
// ---------------------------------------------------------
// Instructor note:
// - We require at least one item with quantity > 0
$itemsOrdered = [];

foreach ($items as $item => $quantity) {
    if (filter_var($quantity, FILTER_VALIDATE_INT) !== false && $quantity > 0) {
        $itemsOrdered[$item] = $quantity;
    }
}

if (count($itemsOrdered) === 0) {
    $errors[] = "Please order at least one item.";
}

// ---------------------------------------------------------
// 6) If errors exist, display them and stop
// ---------------------------------------------------------
if (!empty($errors)) {
    ?>
    <!doctype html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <title>Order Error</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
      <main>
        <h1>There was a problem with your order</h1>

        <ul>
          <?php foreach ($errors as $error): ?>
            <li><?= $error ?></li>
          <?php endforeach; ?>
        </ul>

        <p>
          <a href="index.html">Return to the form</a>
        </p>
      </main>
    </body>
    </html>
    <?php
    exit;
}

// ---------------------------------------------------------
// 7) Build the email message
// ---------------------------------------------------------
$to = "bitumi@gmail.com";
$subject = "New Bakery Order Submission";

$message  = "NEW BAKERY ORDER\n";
$message .= "=========================\n";
$message .= "Customer: {$firstName} {$lastName}\n";
$message .= "Email: {$email}\n";
$message .= "Phone: {$phone}\n";
$message .= "Address: {$address}\n\n";

$message .= "Items Ordered:\n";
foreach ($itemsOrdered as $item => $quantity) {
    $message .= "- {$item}: {$quantity}\n";
}

$message .= "\nAdditional Comments:\n";
$message .= ($comments === null || $comments === '') ? "(none)\n" : "{$comments}\n";

// ---------------------------------------------------------
// 8) Send the email
// ---------------------------------------------------------
$headers  = "From: no-reply@bakeittillyoumakeit.example\r\n";
$headers .= "Reply-To: {$email}\r\n";

mail($to, $subject, $message, $headers);
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Order Confirmation</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

  <main>
    <h1>Thank You for Your Order! 🧁</h1>

    <p>
      Thanks <strong><?= $firstName ?></strong>!
      Your order has been successfully submitted.
    </p>

    <h2>Your Order Summary</h2>

    <p><strong>Name:</strong> <?= $firstName ?> <?= $lastName ?></p>
    <p><strong>Email:</strong> <?= $email ?></p>
    <p><strong>Phone:</strong> <?= $phone ?></p>
    <p><strong>Address:</strong> <?= $address ?></p>

    <h3>Items Ordered</h3>
    <ul>
      <?php foreach ($itemsOrdered as $item => $quantity): ?>
        <li><?= $item ?> — <?= $quantity ?></li>
      <?php endforeach; ?>
    </ul>

    <h3>Additional Comments</h3>
    <p><?= ($comments === null || $comments === '') ? "(none)" : $comments ?></p>

    <p>
      A confirmation has been sent to the bakery.
    </p>

    <p>
      <a href="index.html">Place another order</a>
    </p>
  </main>

</body>
</html>

