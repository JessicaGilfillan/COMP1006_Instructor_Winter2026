<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Week 4 - Form Validation </title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--
    Instructor note:
    - Bootstrap is included via CDN
    - This keeps setup simple (no downloads)
  -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">
    <link href="styles/main.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>
    <header>
        <h1 class="site-title">
            <img
                src="assets/bitumi.png"
                alt="Bake It Til You Make It Bakery"
                class="logo">
        </h1>
        <!-- =========================
       Navigation
       ========================= -->
        <!--
    Instructor note:
    - <nav> is semantic
    - .navbar gives basic styling quickly
    - This satisfies the “make it look better” request
      without heavy customization
  -->
        <nav class="navbar navbar-expand-md navbar-light bg-light mb-4">
            <div class="container">
                <a class="navbar-brand" href="#">Bake It Till You Make It</a>

                <!-- Hamburger button (shows on small screens) -->
                <button
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#mainNav"
                    aria-controls="mainNav"
                    aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Collapsible menu -->
                <div class="collapse navbar-collapse" id="mainNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Order</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Menu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>