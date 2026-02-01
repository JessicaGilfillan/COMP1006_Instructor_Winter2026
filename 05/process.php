<?php 
require "includes/header.php"; 
require "includes/connect.php";
//STEP ONE access the form data and then echo on the screen in a confirmation message 
//grab the data, clean and store in a variable - santize! 
$firstName = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_SPECIAL_CHARS); 
$lastName = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_SPECIAL_CHARS); 
$address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_SPECIAL_CHARS);

$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$phone     = filter_input(INPUT_POST, 'phone', 
FILTER_SANITIZE_SPECIAL_CHARS);
$comments = filter_input(INPUT_POST, 'comments', FILTER_SANITIZE_SPECIAL_CHARS);
$items = $_POST['items'] ?? []; 

//STEP TWO - validation time - serverside 

$errors = []; 

//require text fields 
if ($firstName === null || $firstName === '') {
    $errors[] = "First Name is Required."; 
}

if ($lastName === null || $lastName === '') {
    $errors[] = "Last Name is Required."; 
}

//require email and validate proper format 
if ($email === null || $email === '') {
    $errors[] = "Email is Required"; 
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Email must be a valid email"; 
}

// require phone number and validate proper format 
if ($phone === null || $phone === '') {
    $errors[] = "Phone number is required.";
} elseif (!filter_var($phone, FILTER_VALIDATE_REGEXP, [
    'options' => ['regexp' => '/^[0-9\-\+\(\)\s]{7,25}$/']
])) {
    $errors[] = "Phone number format is invalid.";
}

//require address
if ($address === null || $address === '') {
    $errors[] = "Address is required."; 
}
$itemsOrdered = [];
//check that the order quantity is a number 

foreach($items as $item => $quantity) {
    if(filter_var($quantity, FILTER_VALIDATE_INT) !== false && $quantity > 0 ) {
        $itemsOrdered[$item] = $quantity; 
    }
}
if(count($itemsOrdered) === 0) {
    $errors[] = "Please order at least one item"; 
}

//loop through error messages 

//if there are errors, display to user and exit the script 
if(!empty($errors)) {
foreach ($errors as $error) : ?>
    <li><?php echo $error; ?> </li>
<?php endforeach;
//stop the script from executing  
exit; 
}

/* 
STEP THREE - Prepare Data for the DB 
*/

$allowedItemColumns = [
    'chaos_croissant',
    'midnight_muffin',
    'existential_eclair',
    'procrastination_cookie',
    'finals_week_brownie',
    'victory_cinnamon_roll'
];

// Start with all quantities at 0
$dbItemValues = array_fill_keys($allowedItemColumns, 0);

// Overwrite with actual ordered quantities (only allowed keys)
foreach ($itemsOrdered as $item => $qty) {
    if (array_key_exists($item, $dbItemValues)) {
        $dbItemValues[$item] = $qty;
    }
}


/* 
INSERT THE ORDER USING A PREPARED STATEMENT
*/
//set up the query used named placeholders
$sql = "INSERT INTO orders (
            first_name, last_name, phone, address, email,
            chaos_croissant, midnight_muffin, existential_eclair,
            procrastination_cookie, finals_week_brownie, victory_cinnamon_roll,
            comments
        ) VALUES (
            :first_name, :last_name, :phone, :address, :email,
            :chaos_croissant, :midnight_muffin, :existential_eclair,
            :procrastination_cookie, :finals_week_brownie, :victory_cinnamon_roll,
            :comments
        )";

//prepare the query 
$stmt = $pdo->prepare($sql);

//execute the query, matching the placeholder with the data entered by user
$stmt->execute([
    ':first_name' => $firstName,
    ':last_name'  => $lastName,
    ':phone'      => $phone,
    ':address'    => $address,
    ':email'      => $email,

    ':chaos_croissant'        => $dbItemValues['chaos_croissant'],
    ':midnight_muffin'        => $dbItemValues['midnight_muffin'],
    ':existential_eclair'     => $dbItemValues['existential_eclair'],
    ':procrastination_cookie' => $dbItemValues['procrastination_cookie'],
    ':finals_week_brownie'    => $dbItemValues['finals_week_brownie'],
    ':victory_cinnamon_roll'  => $dbItemValues['victory_cinnamon_roll'],

    ':comments' => $comments
]);

$orderId = $pdo->lastInsertId();
?>

<main>
    <!-- echo the data the user submitted -->
    <?php echo "<h2> Thanks for your order " . $firstName . "</h2>"; ?>

    <h3> Items Ordered </h3>
    <ul>
        <!-- use for each loop to loop through array and display quantities -->
    <?php foreach($items as $item => $quantity): ?>
        <li><?php echo $item ?> - <?php echo $quantity ?> </li>
    <?php endforeach; ?>
    </ul>
</main>

<?php require "includes/footer.php"; ?>