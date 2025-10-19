<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <link
            href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css"
            rel="stylesheet"
        />
    </head>
    <body>
        <header>
        <a href="home.html" class="logo">CYCRIDE</a>
        
        <div class="hamburger" id="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </div>

        <nav class="navbar" id="navbar">
            <a href="home.html">Home</a>
            <a href="index.html">Products</a>
            <a href="about.html">About Us</a>
            <a href="contact.html">Contact Us</a>
            <a href="login.html" class="login-link">Login</a>
            <a href="register.html" class="register-link">Register</a>
            <a href="profile.html" class="profile-link" style="display: none;">Profile</a>
        </nav>

        <div id="cart-icon">
        </div>
        </header>
        <div class="hero-image" style="border-bottom:3px solid rgb(255, 40, 40);">
        </div>
        <h1 style="text-align:center; font-weight:600px; padding-top:35px;">Brands that we offer </h1>
        <section class="brand-logos">
            <img src="images/treklogo.jpg" alt="Trek">
            <img src="images/sworkslogo.jpg" alt="S-Works">
            <img src="images/cervelologo.png" alt="Cervelo">
            <img src="images/giantlogo.jpg" alt="Giant">
        </section>
        <div class="buy-now-wrapper">
        <a href="index.html" class="buy-now-btn">Buy Now</a>
        </div>

        <script src="script.js"></script>
        <script>
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
