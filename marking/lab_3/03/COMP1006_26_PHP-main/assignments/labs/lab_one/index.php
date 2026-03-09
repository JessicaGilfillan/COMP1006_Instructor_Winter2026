<?php 
    declare(strict_types=1);
    require_once "connect.php";
    require "header.php";//header goes at the top 
    echo "<p> Follow the instructions outlined in instructions.txt to complete this lab. Good luck & have fun!😀 </p>";
    //Use include/require to include this code in index.php. 
    include "car.php";//include or require seem fine here. I suppose it comes down to whether you want a fatal error if the file is missing. I don't so I'm using include.
    //Instantiate a new instance of a car object and echo the car information in the browser
    $myCar = new Car("Toyota", "Camry", 2020);//can make as many instances as I want, each time it will call the constructor, and spit out some html formatted info.
    //Uses the strings typed here as data for the constructor to format, order matters.
    echo $myCar->getCarInfo();//calls the method for this instanced object. Repeated thrice for good measure.
    $myCar = new Car("Ford", "Mustang", 1969);
    echo $myCar->getCarInfo();
    $myCar = new Car("Honda", "Civic", 2015);
    echo $myCar->getCarInfo();
    // $myCar = new Car("Honda", 2015, "Civic"); this is invalid since the order is string, string, int as per the constructor
    require "footer.php";//footer goes at the bottom
    /*Add a multi-line comment in index.php reflecting on which parts of the lab you found easy and which parts were challening.
    ---------------------------------------------------------------------------------------------------------------------------------------------------
    Overall, I found this lab straight forward after getting the database connection working. Please see connection.php comments for that whole ordeal.
    
    We did OOP last semester in programming fundamentals, so this is familiar.

    Well versed in html at this point, so formatting output with a little pizzazz seemed appropriate.

    Near verbatim copied your connect.php example (with a couple of small tweaks that were necessary to get my local server working).
    PDO (PHP Data Objects) seems to have a lot of depth, I'd like to learn more about the ins and outs of it in the future, and I assume we will.
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); this line in particular I would like to understand better.
    
    Out of my own fruition, I elected to create an incrementing vehicle number header for each car instance created. I had the idea, decided to figure out
    how to do it. The internet is a wonderfull thing. See car.php comments for more details on that.

    TLDR: Getting database working === pain in butt, rest of lab === familiar territory.
    ---------------------------------------------------------------------------------------------------------------------------------------------------
    */
?> 