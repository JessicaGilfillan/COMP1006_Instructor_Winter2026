<?php 

require "header.php"; 
echo "<p>Follow the instructions outlined in instructions.txt to complete this lab. Good luck & have fun!😀</p>";
require "car.php";

echo "<h2>Task 3: Car Object Example</h2>";

$myCar = new Car("Ford", "Ranger", 2023);

echo "<p><strong>My Car Information:</strong> " . $myCar->getCarInfo() . "</p>";

$secondCar = new Car("Honda", "Civic", 2024);
echo "<p><strong>Second Car Information:</strong> " . $secondCar->getCarInfo() . "</p>";

echo "<h2>Task 4: Database Connection</h2>";
require "connect.php";
require "footer.php"; 

/**
 * Lab Reflection (Task 6)
 * 
 * Easy Part:
 * The easy part was definitely coding the index.php file, as all I really had to do was create a new object and echo the information. Coding the connect.php file was also relatively easy because of the week 2 folder containing a great template.
 * 
 * Challenging Part:
 * The car.php was definitely the hardest part to code, as I forgot a significant amount of information related to classes, so it was a bit of a learning curve at first, but I slowly remembered more and more as I went on.

 */
?>