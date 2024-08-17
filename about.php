<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            color: #333;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        .about-us {
            background-color: #fff;
            padding: 40px;
            border-radius: 8px;
            text-align: center;
        }
        .about-us img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }
        .about-us h1 {
            font-size: 2em;
            margin-bottom: 20px;
        }
        .about-us p {
            font-size: 1em;
            line-height: 1.6;
            color: #666;
        }
        .contact-btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #28a745;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }
        .contact-btn:hover {
            background-color: #218838;
        }
        .info-boxes {
            display: flex;
            justify-content: space-around;
            margin-top: 40px;
        }
        .info-box {
            background-color: #28a745;
            color: #fff;
            padding: 20px;
            border-radius: 8px;
            flex: 1;
            margin: 0 10px;
            text-align: center;
        }
        .info-box h2 {
            font-size: 1.5em;
            margin-bottom: 10px;
        }
        .info-box p {
            font-size: 1em;
            margin: 0;
        }
        @media (max-width: 768px) {
            .info-boxes {
                flex-direction: column;
            }
            .info-box {
                margin-bottom: 20px;
            }
        }
footer {
    background-color: #2c3a2f;
    color: white;
    text-align: center;
    padding: 15px 0;
    position: sticky;
    width: 100%;
    bottom: 0;
}
header {
    background-color: #28A745; /* Green */
    color: white;
    padding: 15px 0;
    text-align: center;
    position: sticky;
}

header nav ul {
    list-style: none;
    padding: 0;
    display: flex;
    justify-content: center;
}

header nav ul li {
    margin: 0 15px;
}

header nav ul li a {
    color: white;
    text-decoration: none;
    font-size: 16px;
    transition: color 0.2s ease;
}

header nav ul li a:hover {
    text-decoration: underline;
}

header nav ul li a.active {
    color: #fff;
    background-color: #218838; /* Darker Green */
    padding: 10px;
    border-radius: 10px;
}
    </style>
</head>
<header>
        <nav class="simple-nav">
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="send_birthday_emails.php">Sent Emails</a></li>
                <li><a href="logout.php">Logout</a></li>
                
            </ul>
        </nav>
    </header>
<body>
    <div class="container">
        <div class="about-us">
            <!--<img src="https://via.placeholder.com/400" alt="About Us Image">-->
            <h1>About Us</h1>
            <p>we understand the importance of celebrating special moments and fostering a sense of community within our organization. Birthdays are significant milestones in every individual's life, and we believe in acknowledging and honoring each member of our team on their special day.</P>
            <p>Our birthday greeting web page is designed to streamline the process of sending personalized birthday messages to our employees. With just a few clicks, we ensure that every member of our organization receives a heartfelt birthday greeting, making them feel valued and appreciated.</p>
            <p>What sets us apart is our commitment to personalization and inclusivity. We recognize that every employee is unique, and our platform allows us to tailor birthday messages to reflect their individual preferences and personalities. Whether it's a simple email, a personalized card, or a thoughtful gift, we strive to make each birthday celebration memorable and meaningful.</p>
            <a href="contact.php" class="contact-btn" onclick="contactUs()">Contact Us</a>
        </div>
        <div class="info-boxes">
            <div class="info-box">
                <h2>Call Us</h2>
                <p>+96 76 3466717,<br></p>
            </div>
            <div class="info-box">
                <h2>Location</h2>
                <p>       <br>Sri Lanka</p>
            </div>
            <div class="info-box">
                <h2>Hours</h2>
                <p>Mon : Fri …… 11 am - 8 pm,<br>Sat : Sun ……. 6 am - 8 pm</p>
            </div>
        </div>
    </div>
    <script>
        function contactUs() {
            alert('Thank you for reaching out to us!');
        }
    </script>
</body>
<footer>
        <p>&copy; 2024 Birthday Greetings Web App. All rights reserved.</p>
    </footer>
</html>
