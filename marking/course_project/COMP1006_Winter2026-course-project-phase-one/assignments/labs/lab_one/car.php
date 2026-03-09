<?php
//Car class file
// Represents a car with make, model, year, and colour

class Car {
    public string $make;
    public string $model;
    public int $year;
    public string $colour;

    //Constructor initializes the car properties
    public function __construct(string $make, string $model, int $year, string $colour) {
        $this->make = $make;
        $this->model = $model;
        $this->year = $year;
        $this->colour = $colour;
    }

    // Method to return formatted car information
    public function getCarInfo(): string {
        return "{$this->year} {$this->colour} {$this->make} {$this->model}";
    }
}