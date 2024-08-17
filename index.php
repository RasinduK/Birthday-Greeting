<!DOCTYPE html>
<html>
<head>
    <title>LOGIN/SIGNUP</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<header>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="index.php">Login</a></li>
        </ul>
    </nav>
</header>
<h1>Birth Day Greetings</h1>

<div class="container">
    <!-- Login Form -->
    <div id="LoginForm" class="form-content">
        <form action="login.php" method="post">
            <h2>LOGIN</h2>
            <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>
            <label>User Name</label>
            <input type="text" name="uname" placeholder="User Name">
            <label>Password</label>
            <input type="password" name="password" placeholder="Password"><br>
            <button type="submit">Login</button>
            <a href="#" class="toggle-form" onclick="toggleForm('SignupForm')">Create an account</a>
        </form>
    </div>

    <!-- Signup Form -->
    <div id="SignupForm" class="form-content" style="display:none;">
        <form action="signup-check.php" method="post">
            <h2>SIGN UP</h2>
            <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>
            <?php if (isset($_GET['success'])) { ?>
                <p class="success"><?php echo $_GET['success']; ?></p>
            <?php } ?>
            <label>Name</label>
            <input type="text" name="name" placeholder="Name" value="<?php echo isset($_GET['name']) ? $_GET['name'] : ''; ?>">
            <label>User Name</label>
            <input type="text" name="uname" placeholder="User Name" value="<?php echo isset($_GET['uname']) ? $_GET['uname'] : ''; ?>">
            <label>Email</label>
            <input type="text" name="Email" placeholder="Email" value="<?php echo isset($_GET['Email']) ? $_GET['Email'] : ''; ?>">
            <label>Password</label>
            <input type="password" name="password" placeholder="Password">
            <label>Re Password</label>
            <input type="password" name="re_password" placeholder="Re_Password"><br>
            <button type="submit">Sign Up</button>
            <a href="#" class="toggle-form" onclick="toggleForm('LoginForm')">Already have an account?</a>
        </form>
    </div>
</div>

<script>
    function toggleForm(formId) {
        var loginForm = document.getElementById('LoginForm');
        var signupForm = document.getElementById('SignupForm');
        if (formId === 'LoginForm') {
            loginForm.style.display = 'block';
            signupForm.style.display = 'none';
        } else {
            loginForm.style.display = 'none';
            signupForm.style.display = 'block';
        }
    }
</script>
<footer>
        <p>&copy; 2024 Birthday Greetings Web App. All rights reserved.</p>
</footer>
</body>
</html>
