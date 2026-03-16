<!-- Sign in page when the user wants to create a post -->
 <!-- Header content -->
<?php include("includes/header.php"); ?>
<meta name="description" content="Sign in page for Novachat to create a post" />
<title>Novachat | Sign In to Create a Post</title>
</head>
<!-- Page Body -->
<body>
    <header>
        <h1>Novachat</h1>
        <h3>Sign in to Create a Post</h3>
    </header>
    <main>
        <?php include("includes/nav.php"); ?>
        <!-- User enters a username and password and sends them to the next page -->
        <form action="post.php" method="post" class="mt-3">
            <label class="form-label mt-3" for="username">Username</label>
            <input class="form-control" type="text" id="username" name="username" required>

            <label class="form-label mt-3" for="password">Password</label>
            <input class="form-control" type="text" id="password" name="password" required>

            <button class="btn btn-primary mt-4" type="submit">Sign In</button>
        </form>
    </main>
</body>
<?php include("includes/footer.php") ?>