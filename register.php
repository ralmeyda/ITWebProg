<!DOCTYPE html>
<html>
<head>
    <title>Register - CYCRIDE</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <a href="home.php" class="logo">CYCRIDE</a>

        <div class="hamburger" id="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </div>

        <nav class="navbar" id="navbar">
            <a href="home.php">Home</a>
            <a href="index.php">Products</a>
            <a href="about.php">About Us</a>
            <a href="contact.php">Contact Us</a>
            <a href="login.php" class="login-link">Login</a>
            <a href="register.php" class="register-link">Register</a>
            <a href="profile.php" class="profile-link" style="display: none;">Profile</a>
        </nav>

        <div id="cart-icon">
            <i class="ri-shopping-bag-line"></i>
            <span class="cart-item-count"></span>
        </div>
    </header>

    <div class="form-container">
        <h2>Register</h2>
        <form id="registerForm">
            <input type="text" id="firstName" placeholder="First Name" required>
            <input type="text" id="lastName" placeholder="Last Name" required>
            <input type="tel" id="phone" placeholder="Phone Number" required>
            <input type="email" id="email" placeholder="Email Address" required>
            <input type="text" id="registerUsername" placeholder="Username" required>
            <input type="password" id="registerPassword" placeholder="Password" required>
            <button type="submit">Register</button>
        </form>
        <p>Already have an account? <a href="login.php">Login here</a></p>
    </div>

    <script>
        document.getElementById("registerForm").addEventListener("submit", function(e) {
            e.preventDefault();

            const firstName = document.getElementById("firstName").value;
            const lastName = document.getElementById("lastName").value;
            const phone = document.getElementById("phone").value;
            const email = document.getElementById("email").value;
            const username = document.getElementById("registerUsername").value;
            const password = document.getElementById("registerPassword").value;

            const userData = {
                firstName,
                lastName,
                phone,
                email,
                username,
                password
            };

            // Store user data as JSON string
            localStorage.setItem("userData", JSON.stringify(userData));

            alert("Registration successful!");
            window.location.href = "login.php";
        });

        document.addEventListener('DOMContentLoaded', () => {
            const hamburger = document.getElementById('hamburger');
            const nav = document.getElementById('navbar');

            hamburger.addEventListener('click', () => {
                nav.classList.toggle('active');
            });
        });
    </script>
</body>
</html>