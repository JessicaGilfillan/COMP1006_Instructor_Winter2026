<?php 

    declare(strict_types=1);//enabling strict data types to ensure proper interpretation of variables.
    /*Using your local server (XAMPP, MAMP, WAMP), create a database. 
    Create a file called connect.php and use PDO to connect to your database. 
    Remember to include try/catch blocks to handle connection errors. 
    Use include/require to include this code in index.php. Add comments to explain your code (/5 marks)*/
    $host = "127.0.0.1"; //please note that I have changed localhost to 127.0.0.1 as I was having issues that seemed to stem from this.
    $db = "test_connection";//created a database called test_connection on my local server (http://127.0.0.1/phpmyadmin/index.php?route=/server/databases)
    $user = "root";//no username is set for the root user on my local server
    $pass = ""; //no password is set for the root user on my local server
    
    $dsn = "mysql:host=$host;port=3307;dbname=$db";
    /*So this was a fun time. 
    
    You will note the port 3307 addition I made. Due to port conflicts (presumably with workbench running on the same port).
    I had to manually change the my.ini file instances of 3306 to 3307 to get this working, as well as change windows file permissions for the xampp-control.ini 
    so it would be editable when using config in the xampp terminal.
    
    I also had to manually add in $cfg['Servers'][$i]['port'] = '3307'; to the config.inc.php file in phpmyadmin folder to fully get this working.
    
    Without these changes, I could not even access my local server through phpmyadmin, let alone get this assignment working.
    And by golly, it's working.
    */

try {//try and catch as you showed us, unchanged. Catches any errors connecting to the database.
    $pdo = new PDO($dsn, $user, $pass);//further explanation on how this works would be appreciated. Programming fundamentals covered this briefly.
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    echo "Database Connection Successful"; 
}
catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>