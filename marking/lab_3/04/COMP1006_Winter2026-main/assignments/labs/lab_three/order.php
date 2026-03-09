<?php require "includes/header.php" ?>

<main>
    <!-- use post method -->
    <form action="process-order.php" method="post">
        <h2>Contact Us - Bake It Till You Make It Bakery 🧁</h2>
        <!-- record user information -->
        <fieldset>
            <legend>Contact Information</legend>
            <label for="first_name">First name</label>
            <input type="text" id="first_name" name="first_name" required>

            <label for="last_name">Last name</label>
            <input type="text" id="last_name" name="last_name" required>

            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" required>

            <label for="message">Message</label>
            <textarea id="message" name="message" rows="5" required></textarea>
        </fieldset>
        <!-- sumbit button -->
        <p><button type="submit">Send Message</button></p>
    </form>
</main>
<?php require "includes/footer.php" ?>
</body>
</html>