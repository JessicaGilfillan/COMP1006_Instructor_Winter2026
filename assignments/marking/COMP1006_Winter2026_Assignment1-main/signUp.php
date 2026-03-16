<!-- Page for when the user wants to sign up for an account -->
 <!-- Header Content -->
<?php include("includes/header.php"); ?>
<meta name="description" content="Sign up page for Novachat" />
<title>Novachat | Sign Up</title>
</head>
<!-- Page body -->
<body>
    <header>
        <h1>Novachat</h1>
        <?php include("includes/nav.php"); ?>
    </header>
    <!-- User enters a username and password and sends them to the next page -->
    <form action="process.php" method="post" class="mt-3">
        <label class="form-label mt-3" for="username">Username</label>
        <input class="form-control" type="text" id="username" name="username" required>

        <label class="form-label mt-3" for="password">Password</label>
        <input class="form-control" type="text" id="password" name="password" required>

        <button class="btn btn-primary mt-4" type="submit">Sign Up</button>
    </form>
</body>
<?php include("includes/footer.php") ?>