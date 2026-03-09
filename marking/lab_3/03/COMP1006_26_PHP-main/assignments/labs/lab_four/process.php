<?php
    //  TODO: connect to the database 
    require "includes/connect.php";
    //   TODO: Grab form data (no validation or sanitization for this lab)
    $firstName = htmlspecialchars($_POST['first_name']);//grabbing form data using htmlspecialchars
    $lastName  = htmlspecialchars($_POST['last_name']);
    $email     = htmlspecialchars($_POST['email']);
    
      //1. Write an INSERT statement with named placeholders
    $sql = "INSERT INTO subscribers(first_name, last_name, email) VALUES (:first_name, :last_name, :email)";//you taught us this before relational databases got to it. The statement inserts values into the subscribers table, with named placeholders for the form data values that will be inserted into the database
      //2. Prepare the statement
    $stmt = $pdo->prepare($sql);//prepare the SQL statement for execution, using the PDO connection from connect.php
      //3. Execute the statement with an array of values
    $stmt ->bindParam(':first_name', $firstName);//binding values to the named placeholders in the SQL statement
    $stmt ->bindParam(':last_name', $lastName);
    $stmt ->bindParam(':email', $email);
    $stmt->execute([':first_name' => $firstName, ':last_name' => $lastName, ':email' => $email]);//executing said list of values as array

    $pdo = null;//close connection
?>

<?php include 'includes/header.php'; ?><!--using header and styles from lesson to make it look presentable-->

    <main class="container mt-4">
        <h2>Thank You for Subscribing</h2>

        <!-- TODO: Display a confirmation message -->
        <!-- Example: "Thanks, Name! You have been added to our mailing list." -->
        <p>Thank you, <?php echo ($firstName . ' ' . $lastName); ?>! We have added you to our mailing list.</p>
        <!--Message with first and last name form data inserted into it-->

        <p class="mt-3">
            <a href="subscribers.php">View Subscribers</a>
        </p>
    </main>
    <?php include 'includes/footer.php'; ?><!--using footer from lesson to make it look presentable-->
</body>

</html>