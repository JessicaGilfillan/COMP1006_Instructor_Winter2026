<?php
/* What's the Problem? 
    - PHP logic + HTML in one file
    - Works, but not scalable
    - Repetition will become a problem

    How can we refactor this code so it’s easier to maintain?
    <ul>
    <?php foreach ($items as $item): ?>
    <li><?= $item ?></li>
    <?php endforeach; ?>
    </ul>
    $items = ["Home", "About", "Contact"];
    ^I just moved these here in case I screwed up syntax and needed to reference them

    "Add a short comment indicating one thing you learned from this lab that you will apply in Course Project Phase One"

    My comment:
    The reality is, this assignment is replicative of what I learned in my previous semester COMP1002. Dividing reoccurring code into separate files was one of the few things we learned, specifically for headers and footers at the time. This lab did refresh me on that, it also let me practice OOP a bit more.

    What I carry from this to project phase one is the desire to know how to integrate these practices with the actual data in a database. Ideally I want to make something which utilizes data extensively. Those are my thoughts.
*/



?>

<!DOCTYPE html>
<html>
<head><?php include "includes/head.php"; ?></head>
    <!--The head element often contains duplicate syntax that is the same on every page. In this particular scenario, the one element that is in it is one that may be subject to change depending on the page being viewed. So with that being said, this is for demonstrative purposes only. In reality, the title would remain on this page, and everything else contained in the head would go inside the head.php file.-->
<body>

    <h1>Welcome</h1>

    <?php
    include "includes/Items.php";
    Items::displayItems();
    //Using the displayItems method from the Items class to output the list of items, making the list updatable and transferable to other pages without retyping the whole thing. Makes sense especially in the context of a navigation menu, where the links may change. See Items.php for more details.
    ?>
    <?php include "includes/footer.php"; ?>
    <!--Footers tend to remain identical regardless of the page they are on, so including the entire element in it's own file makes sense.-->
</body>

</html>
    <!--Elements that remain on this page are ones that are seldom to change and be unique to a specific page. -->