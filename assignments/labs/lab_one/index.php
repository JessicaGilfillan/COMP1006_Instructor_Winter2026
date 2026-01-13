<?php
// index.php
// This is the main page students will load in the browser via localhost.

// 1) Include shared header.
// require_once: if it fails, the page should stop (header is "required").
require_once "header.php";

// 2) Include our Car class definition file.
// If the class isn't loaded, we cannot create a Car object.
require_once "car.php";

// 3) Include database connection.
// This sets up $pdo (if successful) and sets $dbMessage either way.
require_once "connect.php";
?>

<h2>Part 1: OOP (Car Class)</h2>

<?php
// Instantiate (create) a new Car object.
// "new" creates an object instance from the class.
$myCar = new Car("Honda", "Civic", 2020);

// Call the getInfo() method and echo the result to the browser.
echo "<p>" . $myCar->getInfo() . "</p>";
?>

<h2>Part 2: PDO Connection</h2>

<?php
// Show database connection result (success or failure).
echo "<p>" . $dbMessage . "</p>";
?>

<?php
/*
Reflection (Instructor example – students write their own):

I found creating the Car class and instantiating an object straightforward
once I understood that a class is a template and an object is the instance.

The most challenging part was setting up the database connection because
I had to ensure my database name, username, and password were correct
for my local server environment (MAMP/WAMP/XAMPP).
*/
?>

<?php
// Include footer (optional file content).
// include: if it fails, the page can still display most content.
include "footer.php";
?>
