
<?php 
    $first_name = htmlspecialchars($_POST['first_name']);
    $last_name = htmlspecialchars($_POST['last_name']);
    $email = htmlspecialchars($_POST['email']);
    $userMessage = htmlspecialchars($_POST['message']);
    //variables to gather posted input data from contact page

    $first_name = filter_var($first_name, FILTER_SANITIZE_SPECIAL_CHARS);
    $last_name = filter_var($last_name, FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $userMessage = filter_var($userMessage, FILTER_SANITIZE_SPECIAL_CHARS);
    //variables to sanatize inputs appropriate to type (from what I've read, these are not ideal, and one would be better off creating their own specified constraints)
    //Your example from class was written $first_name = filter_var(INPUT_POST, $first_name, FILTER_SANITIZE_SPECIAL_CHARS);
    //With INPUT_POST included, I get this error
    /*
    Fatal error: Uncaught TypeError: filter_var(): Argument #2 ($filter) must be of type int, string given in 
    C:\xampp\htdocs\COMP1006_26_PHP\assignments\labs\lab_three\process.php:9 Stack trace: #0 C:\xampp\htdocs\COMP1006_26_PHP\assignments\labs\lab_three\process.php(9): 
    filter_var(0, 'd', 515) #1 {main} thrown in C:\xampp\htdocs\COMP1006_26_PHP\assignments\labs\lab_three\process.php on line 9 
    */
    //Presumable this only works for integers, and it seems to work fine without input post

    $errors = [];
    //array to store error statements, to be output on process page if there are any

    if($first_name == null || $first_name == ""){
        $errors[] = "First name is required.";
    }
    //^if first name is empty^
    if($last_name == null || $last_name == ""){
        $errors[] = "Last name is required."; 
    }
    //^if last name is empty^
    if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
        $errors[] = "Email address entered is not valid.";
    }
    //^if email characters are invalid or loose formatting rules aren't met^
    elseif ($email == null || $email == ""){
        $errors[] = "No email was entered";
    }
    //^if email is empty^
    if($userMessage == null || $userMessage == ""){
        $errors[] = "You must enter a message.";
    }
    //^if message is empty^
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo "<p>This page expects a POST form submission.</p>";
    exit;
    }
    //^if post method isn't used^
?>
<?php require "includes/header.php"?>
        <main>
            <?php 
                    $to = "$email, no-reply@bakeittillyoumakeit.com";
                    //sending email to both the user email and a mock one for the client
                    $headers = "From: no-reply@bakeittillyoumakeit.com\r\n";
                    $subject = "Email Confirmation";
                    $message = "Thank you for your comments " . htmlspecialchars($_POST['first_name']) . " " . htmlspecialchars($_POST['last_name']) . "!\n\n";
                    $message .= "We have received the following message: \n" . $userMessage . "\n";
                    $message .= "Your thoughts are important to us!\nWe will respond in 2-3 business days.\nThank you,\nBake It Till You Make It Bakery";
            // if(mail($to, $subject, $message, $headers)) { <-- this has been commented out to allow the rest of the php to run.
            //With a functional live server, this would allow an email to be sent to the input address, and would trigger the rest of the php.
                if (!empty($errors)){
                    echo "<h1>Submission requirements not met</h1>";
                    echo "<ul>";
                    foreach ($errors as $error)
                        echo "<li>" . $error . "</li>";
                    echo "</ul>";
                }
                //if any errors are returned to the errors array, a message will print explaining that the requirements were not met, and a list of errors will print depending on which if statements above were triggered
                else{
                    echo "<h1>Thank You For Your Submission</h1>";
                    echo "<h2>Your Contact Information</h2>";
                    echo "<h3>First Name: " . $first_name . "</h3>" . "\n" . "<h3>Last Name: " . $last_name . "</h3>" . "\n" . "<h3>Email: " . $email . "</h3>";
                    echo "<h2>Your Message</h2>";
                    echo "<p>" . $userMessage . "<p>";                    
                    echo "<h1>We have sent you an email confirmation, please check your inbox</h1>";
                    }
                    //else no errors are returned to the errors array, and the process page will reflect the user's data back to them.                   
                // }
                //else echo "<h1>Error: Email confirmation not sent</h1>"; <-- Message to web user to explain the problem
            ?>
        </main>
        <?php require "includes/footer.php"?>
    </body>
</html>