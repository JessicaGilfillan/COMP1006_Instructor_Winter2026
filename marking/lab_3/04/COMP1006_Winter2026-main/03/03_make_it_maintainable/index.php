<?php 
$items = ["Home", "About", "Contact"];
// Include header.php here to create basic html tags & body tag as well as head content
include 'header.php'; 
?>
<h1>Welcome</h1>
<ul>
    <?php foreach ($items as $item): ?>
        <li><?= $item ?></li>
    <?php endforeach; ?>
</ul>
<!-- Include footer.php here to create closing tags for html & body tags as well as footer content -->
<?php include 'footer.php'; ?>

<!-- One thing I learned: 
 This lab definitley reinforced the practice of reuseability in programming for me as it allowed me to get hands on experience refactoring a piece of php. This experience will hopefully improve my ability to properly modularize my code into proper reuseable seperate files for the phase 1 of the Course Project -->