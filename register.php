<?php
require_once 'config.php';

// Redirect if already logged in
if (isLoggedIn()) {
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Register - CYCRIDE</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet">
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
        </nav>
        
        <div id="cart-icon">
            <i class="ri-shopping-bag-line"></i>
            <span class="cart-item-count"></span>
        </div>
    </header>
    
    <div class="form-container" style="margin-top: 120px;">
        <h2>Register</h2>
        <div id="register-message" style="display:none; padding: 10px; margin-bottom: 15px; border-radius: 5px;"></div>
        <form id="registerForm">
            <input type="text" id="firstName" placeholder="First Name" required>
            <input type="text" id="lastName" placeholder="Last Name" required>
            <input type="tel" id="phone" placeholder="Phone Number" required>
            <input type="email" id="email" placeholder="Email Address" required>
            <input type="text" id="registerUsername" placeholder="Username" required>
            <input type="password" id="registerPassword" placeholder="Password" required minlength="6">
            <button type="submit">Register</button>
        </form>
        <p>Already have an account? <a href="login.php">Login here</a></p>
    </div>
    
    <script>
        document.getElementById("registerForm").addEventListener("submit", function(e) {
            e.preventDefault();
            
            const messageDiv = document.getElementById('register-message');
            const formData = new FormData();
            formData.append('username', document.getElementById("registerUsername").value);
            formData.append('email', document.getElementById("email").value);
            formData.append('password', document.getElementById("registerPassword").value);
            formData.append('firstName', document.getElementById("firstName").value);
            formData.append('lastName', document.getElementById("lastName").value);
            formData.append('phone', document.getElementById("phone").value);
            
            // Show loading
            messageDiv.style.display = 'block';
            messageDiv.style.background = '#d1ecf1';
            messageDiv.style.color = '#0c5460';
            messageDiv.textContent = 'Creating account...';
            
            fetch('register_process.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    messageDiv.style.background = '#d4edda';
                    messageDiv.style.color = '#155724';
                    messageDiv.textContent = data.message;
                    
                    // Redirect to login after 2 seconds
                    setTimeout(() => {
                        window.location.href = "login.php";
                    }, 2000);
                } else {
                    messageDiv.style.background = '#f8d7da';
                    messageDiv.style.color = '#721c24';
                    messageDiv.textContent = data.message;
                }
            })
            .catch(error => {
                messageDiv.style.background = '#f8d7da';
                messageDiv.style.color = '#721c24';
                messageDiv.textContent = "Registration failed. Please try again.";
                console.error('Error:', error);
            });
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
