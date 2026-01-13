<?php
// car.php
// This file defines a Car class.
// A class is a "blueprint" for creating objects (instances) of that type.

class Car
{
    // Properties (data) for the Car.
    // "public" means code outside the class can access them (beginner-friendly).
    public $make;
    public $model;
    public $year;

    // Constructor: runs automatically when we create a new Car object.
    // It initializes the properties based on the values passed in.
    public function __construct($make, $model, $year)
    {
        $this->make = $make;     // $this refers to the current object instance
        $this->model = $model;
        $this->year = $year;
    }

    // Method: a function inside a class.
    // This returns a formatted description of the car.
    public function getInfo()
    {
        return "Car: " . $this->year . " " . $this->make . " " . $this->model;
    }
}
