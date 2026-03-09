<?php 

class Items {
    public static function getItems(): array {
//Taking the items array from the index, and placing them into a method here within a class to make updating it easier, especially if it were to be used on multiple pages
        return ["Home", "About", "Contact"];
//My knowledge of how to do this actually comes from last semester's COMP1002 brief coverage of php. This was not something that was directly taught to us, but I learned it for the purposes of a pizza website assignment we had to do. The checkout page utilized something similar when carrying over topping selections from the pizza building page, but at the time I was not overly familiar with OOP, so it was not done in a separate class.
    }
    public static function displayItems(): void {
//Method here copies the html from the original index syntax, but now uses the getItems method to retrieve the array. Self is something I learned while working on lab one in this course. As I understand it, self is used to call on static methods within the same class. Void used as there is no need for a return value.
        $items = self::getItems();
        echo "<ul>";
        foreach ($items as $item) {
            echo "<li>{$item}</li>";
        }
        echo "</ul>";
    }
}