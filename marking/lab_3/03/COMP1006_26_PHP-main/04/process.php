
<?php
$chaos_croissant = "Chaos Croissant: x" . (int)$_POST['items']['chaos_croissant'];
$midnight_muffin = "Midnight Muffin: x" . (int)$_POST['items']['midnight_muffin'];
$existential_eclair = "Existential Éclair: x" . (int)$_POST['items']['existential_eclair'];
$procrastination_cookie = "Procrastination Cookie: x" . (int)$_POST['items']['procrastination_cookie'];
$finals_week_brownie = "Finals Week Brownie: x" . (int)$_POST['items']['finals_week_brownie'];
$victory_cinnamon_roll = "Victory Cinnamon Roll: x" . (int)$_POST['items']['victory_cinnamon_roll'];
$itemsOrdered = (int)$_POST['items'];

$first_name = htmlspecialchars($_POST['first_name']);
$last_name = htmlspecialchars($_POST['last_name']);
$phone_number = htmlspecialchars($_POST['phone']);
$address = htmlspecialchars($_POST['address']);
$email = htmlspecialchars($_POST['email']);
$comments = htmlspecialchars($_POST['comments']);

$first_name = filter_var($first_name, FILTER_SANITIZE_SPECIAL_CHARS);
$last_name = filter_var($last_name, FILTER_SANITIZE_SPECIAL_CHARS);
$phone_number = filter_var($phone_number, FILTER_SANITIZE_NUMBER_INT);
$address = filter_var($address, FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
$comments = filter_var($comments, FILTER_SANITIZE_SPECIAL_CHARS);

?>
<html>
    <?php require "includes/header.php" ?>
    <body>
        <main>
            <h2>Form submitted successfully!</h2>
            <h3>Customer Information:</h3>
            <?php 
            echo "First Name: " . $first_name . "<br>";
            echo "Last Name: " . $last_name . "<br>";
            echo "Phone Number: " . $phone_number . "<br>";
            echo "Address: " . $address . "<br>";
            echo "Email: " . $email . "<br>";
            ?>
            <h3>Order Details:</h3>
            <?php
            echo "<ul>";
            
            foreach([
                $chaos_croissant,
                $midnight_muffin,
                $existential_eclair,
                $procrastination_cookie,
                $finals_week_brownie,
                $victory_cinnamon_roll
            ] as $item) {
                if (strpos($item, 'x0') === false) {
                    echo "<li>" . htmlspecialchars($item) . "</li>";
                }
                
            }
            echo "</ul>";
            if($comments != ""){
                echo "<h2>Comments and Requests</h2>";
                echo "<pre><p>" . $comments . "</p></pre>";
            }
            echo "<h3>Thank you for your order! We have sent you an email confirmation.</h3>";
            $to = htmlspecialchars($_POST['email']);
            $subject = "Order Confirmation";
            $message = "Thank you for your order " . htmlspecialchars($_POST['first_name']) . " " . htmlspecialchars($_POST['last_name']) . "!\n\n";
            $message .= "Here are your order details:\n";
            $message .= $chaos_croissant . "\n" . $midnight_muffin . "\n" . $existential_eclair . "\n" . $procrastination_cookie . "\n" . $finals_week_brownie . "\n" . $victory_cinnamon_roll . "\n\n";

            if(mail($to, $subject, $message)) {
                echo "Email succesful";
            }
            else echo "Email invalid";
          ?> 
        </main>
        
        <?php require "includes/footer.php" ?>
    </body>
</html>