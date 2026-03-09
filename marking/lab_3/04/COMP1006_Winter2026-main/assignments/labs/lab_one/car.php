<?php
class Car {
    private $make; //Manufactuer of the car
    private $model; //Model name
    private $year; //Year of manufacture
    

    //intiliaze a new car object
    public function __construct($make, $model, $year) {
        $this->make = $make;
        $this->model = $model;
        $this->year = $year;
    }
    
    //Method that returns formatted string containing all car information
    public function getCarInfo() {
        return "Make: " . $this->make . ", Model: " . $this->model . ", Year: " . $this->year;
    }
}
?>
