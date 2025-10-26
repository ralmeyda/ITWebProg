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
        <p>Don't have an account? <a href="register.html" style="color:orange;">Register here</a></p>
    </div>
    <script>
document.getElementById("loginForm").addEventListener("submit", function(e) {
    e.preventDefault();
    
    const formData = new FormData();
    formData.append('username', document.getElementById("loginUsername").value);
    formData.append('password', document.getElementById("loginPassword").value);
    
    fetch('login_process.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert(data.message);
            // Store minimal data in localStorage for JS access
            localStorage.setItem("username", data.user.username);
            localStorage.setItem("userId", data.user.user_id);
            
            // Redirect based on user type
            if (data.user.user_type === 'admin') {
                window.location.href = "admin/dashboard.php";
            } else {
                window.location.href = "index.php";
            }
        } else {
            alert(data.message);
        }
    })
    .catch(error => {
        alert("Login failed. Please try again.");
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

