<?php
//1. set up VS Code with extensions, create a project folder, then push to Github 

/*remind students we need to create PHP opening tags to let the PHP engine know that PHP happening. If a file contains only PHP, the closing tag is optional and often recommended to omit (cleaner code, best practice, avoids headers already sent). Only include closing PHP tag when you are using a mix of PHP and HTML to let PHP engine know when to stop and when to resume */

//2. Code Commenting 

//inline code 

/* 

multi-line code 

*/

//3. Varaibles, Data Tyoes, Concatenation, Conditional Statements & Echo ∏

$firstName = "Jessica"; //string
$lastName = "Gilfillan"; //string 
$age = 40; //integer
$isInstructor = true; //boolean

echo "<p> Hello there, my name is " . $firstname . " " . $lastName . "</p>";


if ($is_student === true) {
    echo "<p> I am your teacher! </p>";
} else {
    echo "<p> Uh oh, teach didn't show! </p>";
}

//4. Loosely Typed Language 

$num1 = 5;
$num2 = "10";

function add($num1, $num2) {
    return $num1 + $num2;
}

echo "<p>" . add($num1, $num2) . "</p>";


//5. Add strict_types and type hints 
//strict types tell PHP not to automatically convert values when calling functions


//type hints tell PHP what to expect 

/*declare (strict_types=1); 

function add(int $num1, int $num2) : int {
    return $num1 + $num2; 
}

echo add($num1, $num2);

*/

//6. OOP with PHP 

//create the class 

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

//7. Push to Github & Run on XAMPP
