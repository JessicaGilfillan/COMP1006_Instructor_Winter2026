<?php
declare(strict_types=1);
// require_once "connect.php";
//1. Set Up & Start 


//2. Code Commenting 
//inline Commenting
/* 
  Multi-line Commenting
*/

//3. Variables, Data Tyoes, Concatenation, Conditional Statements & Echo



$firstName = "Michael";
$lastName = "Emdin";
$age = 30;
$isStudent = true;

echo "<p>Hello, my name is " . $firstName . " " . $lastName . " and I am " . $age . " years old.</p>";

if ($isStudent) {
    echo "<p>I am a student.</p>";
} 
else {
    echo "<p>I am not a student.</p>";
}
//4. Loosely Typed Language Demo
$num1 = 1; //int
$num2 = 2;

function add($num1, $num2) {
    return $num1 + $num2;
}

echo "<p>The sum is: " . add($num1, $num2) . "</p>";
//5. Strict Types & Types Hints


//6. OOP with PHP
class Person {
    public string $name;
    public int $age;
    public bool $isInstructor;

    public function __construct(string $name, int $age, bool $isInstructor)
    {
        $this->name = $name;
        $this->age = $age;
        $this->isInstructor = $isInstructor;
    }

    public function getBadge(): string
    {
        $role = $this->isInstructor ? "Instructor" : "Student";
        return "Name :  {$this->name} | Age: {$this->age} | Role : $role";
    }
}

//create an instance of object 

$person = new Person("Jessica", 40, true);

//use the object 

echo $person->getBadge();
?>