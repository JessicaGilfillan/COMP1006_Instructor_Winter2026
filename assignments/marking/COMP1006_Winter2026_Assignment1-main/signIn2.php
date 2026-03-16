<!-- Sign in page for when the user wants to edit a post -->
 <!-- Header content -->
<?php include("includes/header.php"); ?>
<meta name="description" content="Sign in page for Novachat to edit a post" />
<title>Novachat | Sign In to Edit Posts</title>
</head>
<!-- Page body -->
<body>
    <header>
        <h1>Novachat</h1>
        <h3>Sign in to Edit Posts</h3>
    </header>
    <main>
        <?php include("includes/nav.php"); ?>
        <!-- User enters a username and password and sends them to the next page -->
        <form action="edit.php" method="post" class="mt-3">
            <label class="form-label mt-3" for="username">Username</label>
            <input class="form-control" type="text" id="username" name="username" required>

            <label class="form-label mt-3" for="password">Password</label>
            <input class="form-control" type="text" id="password" name="password" required>

            <button class="btn btn-primary mt-4" type="submit">Sign In</button>
        </form>
    </main>
</body>
<?php include("includes/footer.php") ?>