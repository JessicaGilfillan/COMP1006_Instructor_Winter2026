<?php require "includes/header.php" ?>
        <main>
            <h1>Contact Us</h1>
            <form action="process.php" method="post">
                <!--form action set to post so as to not plaster user info all over the url. The user message would also turn make the url massive, not ideal-->
                <div><!--Added a couple divs so I could do some CSS magic-->
                <fieldset>
                    <legend><h2>Contact Information</h2></legend>
                    <label for="first_name">First name</label>
                    <input type="text" id="first_name" name="first_name" placeholder="Required" required>
                    <label for="last_name">Last name</label>
                    <input type="text" id="last_name" name="last_name" placeholder="Required" required>
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Required" required>
                    <!--Fieldset containing input boxes for name and email, all are required. Process.php acquires the input strings by 
                    referencing the name attribute. 
                    Placeholder reading required so the user knows before attempting to submit. Another common method which would free up 
                    placeholder is using an asterisk in the html, typically making it red-->
                </fieldset>
                <fieldset>
                    <legend><h2>Message</h2></legend>
                    <label for="message">Please enter your message here</label>
                    <textarea id="message" name="message" rows="10" placeholder="Required" required></textarea>
                    <!--fieldset containing the user message input box. Text area to allow scalable window to type in-->
                </fieldset>
                </div>
                <div>
                <button type="submit">SUBMIT</button>
                <button type="reset">CLEAR FORM</button>
                </div>
                <!--Added a clear button to allow the user to start fresh if they enter a bunch of stuff and then decide its no bueno-->
            </form>
        </main>
        <?php require "includes/footer.php" ?>
    </body>
</html>
