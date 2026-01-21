<?php
class Car
{
    // These are the properties (variables) that belong to each Car object.
    // They are public so they can be accessed outside the class if needed.
    public string $make;
    public string $model;
    public int $year;

    // Automatically executed whenever a new Car object is instantiated.
    // It initializes the object's properties
    public function __construct(string $make, string $model, int $year)
    {
        // $this refers to the current instance of the object.
        // These assignments bind the incoming arguments to the object's properties.
        $this->make = $make;
        $this->model = $model;
        $this->year = $year;
    }
    // This is a method (a function inside a class).
    // It returns a string that describes the car.
    // Because it is public, it can be called from outside the class.
    public function getCar(): string
    {
        return "Make : {$this->make} | Model: {$this->model} | Year : {$this->year}";
    }
}

// Create a new Car object.
// The values passed here are sent to the constructor.
$car = new Car("Honda", "Civc", 2010);

// Call the getCar() method on the object and display the result.
echo $car->getCar();
