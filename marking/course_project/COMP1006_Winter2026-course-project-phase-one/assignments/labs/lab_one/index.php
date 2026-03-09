<?php
declare(strict_types=1);

require "header.php"; 
require_once 'car.php';
require_once 'connect.php';
echo "<p> Follow the instructions outlined in instructions.txt to complete this lab. Good luck & have fun!😀 </p>";

// Create a Car object
$myCar = new Car("Hyundai", "Elantra", 2019, "Grey");

// echo the car info
echo $myCar->getCarInfo();

/*
Reflection:
the easiest part was recreating the car class as we covered everything but then i forgot to do the connect.php file at first so the most challenging part of this lab was remembering how to write out the connect.php file. remembering to mention the pdo, try/catch, error handling etc.
*/

require "footer.php"; 