<?php 
    declare(strict_types=1);
    //Create a PHP file called car.php. In this file, create a class to represent a car. 
    class Car {
        //Properties should include make, model and year and include a method to return this information. 
        public string $make;//make is going to be a word, therefore string data type
        public string $model;//model is also a word or word + numbers, therefore string data type
        public int $year;//year is a number, therefore integer data type, though technically makes no difference here unless you were using said number in calculations.

        private static int $carCount = 0;
        //want headers to say vehicle 1, vehicle 2, etc. for each class instance. Doesn't need to be public, only used in the class itself.

        public function __construct(string $make, string $model, int $year)
        {
            self::$carCount++;/*increment car count each time a new instance is created (googled how to increment a counter each time a new object is made, "self"
            is apparently how.)
            
            "Used to access static properties or methods from within the class, as opposed to $this which refers to the current object instance"
            - Google, stealing from someone else and failing to credit them.*/
            $this->make = $make;//make property assigned from constructor parameter
            $this->model = $model;//etc
            $this->year = $year;//etc
        }
        public function getCarInfo(): string //method to return car information as a string
        {
            $carInstanceIncrementer = self::$carCount;//incrementing local variable to be used in the return string
            return "<h3>Vehicle {$carInstanceIncrementer}</h3><p><b>Car Make:</b> {$this->make}</p><p><b>Model:</b> {$this->model}</p><p><b>Year:</b> {$this->year}</p>";
            //calls the properties of the class and formats them in HTML for a tidy output
        }
    }

?>