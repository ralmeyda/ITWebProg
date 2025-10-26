<!DOCTYPE html>
<html>
<head>
    <title>Login - CYCRIDE</title>
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
        <h2>Login</h2>
        <form id="loginForm">
            <input type="text" id="loginUsername" placeholder="Username" required>
            <input type="password" id="loginPassword" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <p>Don't have an account? <a href="register.php" style="color:orange;">Register here</a></p>
    </div>
    <script>
        document.getElementById("loginForm").addEventListener("submit", function(e) {
            e.preventDefault();

            const loginUsername = document.getElementById("loginUsername").value;
            const loginPassword = document.getElementById("loginPassword").value;

            const userData = JSON.parse(localStorage.getItem("userData"));

            if (userData && userData.username === loginUsername && userData.password === loginPassword) {
                alert("Login successful!");
                
                // ✅ Set the logged-in username key
                localStorage.setItem("username", userData.username);

                window.location.href = "index.php";
            } else {
                alert("Invalid username or password.");
            }
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
