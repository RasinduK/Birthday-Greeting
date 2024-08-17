<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Birthday Greetings Web App</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <nav class="simple-nav">
            <ul >
                <li><a href="home.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <h1>Contact Us</h1>
    <main>
        <section class="contact">
            <h2>Get in Touch</h2>
            <p>We'd love to hear from you! Please feel free to contact us using the form below:</p>
<div  class="form-content">
            <form action="contact_form_handler.php" method="post">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="message">Message:</label>
                <textarea id="message" name="message" rows="4" required></textarea>

                <button type="submit">Send Message</button>
            </form>
</div>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Birthday Greetings Web App. All rights reserved.</p>
    </footer>
</body>
</html>
