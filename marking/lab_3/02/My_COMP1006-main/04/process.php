<?php
require "includes/header.php";

$first_name = $_POST['first_name'];
$last_name  = $_POST['last_name'];
$email      = $_POST['email'];
$items      = $_POST['items'];

$first_name = filter_var($first_name, FILTER_SANITIZE_STRING);
$last_name  = filter_var($last_name, FILTER_SANITIZE_STRING);
$email      = filter_var($email, FILTER_SANITIZE_EMAIL);

$ok = true;

if (empty($first_name) || empty($last_name)) {
    echo "<p>Error: Name is missing!</p>";
    $ok = false;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "<p>Error: Invalid email address!</p>";
    $ok = false;
}

$total_qty = 0;
foreach ($items as $qty) {
    $total_qty += (int)$qty;
}

if ($total_qty === 0) {
    echo "<p>Error: You ordered zero items!</p>";
    $ok = false;
}

if ($ok) {
    echo "<h2>Success!</h2>";
    echo "<p>Thank you, $first_name. Your order for $total_qty!</p>";

} else {
    echo "<p><a href='index.php'>Go back and fix the errors.</a></p>";
}

require "includes/footer.php";
?>