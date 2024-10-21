<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Museum Lan</title>
    <!-- <link rel="stylesheet" href="contac.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<style>
    /* General Styles */

@font-face {
    font-family: "Arthouse";
    src: url("fonts/Arthouse.ttf") format("truetype");
  }
body {
    margin: 0;
    font-family: "Cormorant Garamond", serif;
    line-height: 1.6;
    background-color: #f4f4f4;
}

/* Dark Mode Styles */
body.dark-mode {
    background-color: #555;
    color: #bda065;
}

nav.dark-mode {
    background-color: #111;
    color: #f50c0c;
}

nav.dark-mode .nav-links a {
    color: #b89667;
}

nav.dark-mode .hamburger span {
    background-color: #8c3794;
}

.container.dark-mode {
    background-color: #333;
}

.contact-info.dark-mode .col-left a:hover {
    text-decoration: underline;
}

/* Dark Mode Map iframe */
.dark-mode iframe {
    filter: invert(90%) hue-rotate(180deg); /* Optional for a dark-themed map */
}


/* Dark Mode Button */
.dark-mode-btn {
    padding: 10px 20px;
    background-color: #444;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin: 10px;
}

.dark-mode-btn:hover {
    background-color: #555;
}

/* Navbar Styling */
nav {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #b89667;
    padding: 10px 20px;
}

nav .logo {
    font-family: "Arthouse";
    font-size: 44px;
    color: white;
}

.nav-links {
    display: flex;
    list-style: none;
}

.nav-links li {
    margin: 0 15px;
}

.nav-links a {
    color: white;
    text-decoration: none;
    font-size: 18px;
    padding: 8px 12px;
    transition: background-color 0.3s ease;
}

.nav-links a:hover {
    background-color: #5b5244;
    border-radius: 5px;
}


/* Hamburger Menu Styling */
.hamburger {
    display: none;
    flex-direction: column;
    gap: 5px;
    cursor: pointer;
}

.hamburger span {
    width: 30px;
    height: 3px;
    background-color: white;
    transition: all 0.3s ease;
}

/* Contact Section */
.container {
   
    max-width: 1200px;
    margin: 100px auto;
    padding: 20px;
    background-color: white;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
}

.container h1 {
    text-align: center;
    margin-bottom: 20px;
    font-size: 36px;
}

.contact-info {
    display: flex;
    justify-content: space-between;
}

.contact-info .col-left, .contact-info .col-right {
    width: 45%;
}

.contact-info h4 {
    font-size: 24px;
    margin-bottom: 10px;
}

.contact-info p {
    margin: 10px 0;
    font-size: 18px;
}

.contact-info a {
    color: #333;
    text-decoration: none;
}

.contact-info a:hover {
    text-decoration: underline;
}

iframe {
    border-radius: 10px;
    width: 100%;
    height: 300px;
}

/* Responsive Menu */
@media (max-width: 768px) {
    .nav-links {
        display: none;
        flex-direction: column;
        width: 100%;
        text-align: center;
        position: absolute;
        top: 60px;
        left: 0;
        background-color: #333;
        z-index: 1;
    }

    .nav-links.active {
        display: flex;
    }

    .hamburger {
        display: flex;
    }

    .contact-info {
        flex-direction: column;
    }

    .contact-info .col-left, .contact-info .col-right {
        width: 100%;
    }
}

</style>
<body>
    <nav>
        <div class="logo">Museum Lan</div>
        <ul class="nav-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="galery.php">Gallery</a></li>
            <li><button id="dark-mode-toggle" class="dark-mode-btn">Dark Mode</button></li>
        </ul>
        <div class="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </nav>
    <div class="container">
        <h1>Contact Us</h1>
        <div class="contact-info">
            <div class="col-left">
                <h4>Our Address</h4>
                <p><i class="fa-solid fa-location-dot"></i><a href="#">123 Museum Street, IKN City, 45678, Indonesia</a></p>
                <p><i class="fa-solid fa-phone"></i><a href="#">Phone: +62 123 456 789</a></p>
                <p><i class="fa-solid fa-envelope"></i><a href="#">Email: info@museumlan.com</a></p>
            </div>
            <div class="col-right">
                <!-- Embed Google Maps -->
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.8372415231597!2d116.75394067615261!3d-1.2706382356116788!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2df138e747630637%3A0xbaa5ede92fe9dd65!2sIkn%20Nusantara%20College!5e0!3m2!1sen!2sid!4v1727232247219!5m2!1sen!2sid" 
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
    <script>
        const hamburger = document.querySelector('.hamburger');
    const navLinks = document.querySelector('.nav-links');

    hamburger.addEventListener('click', () => {
        navLinks.classList.toggle('active');
    });

    document.getElementById('dark-mode-toggle').addEventListener('click', function () {
        document.body.classList.toggle('dark-mode');
        document.querySelector('nav').classList.toggle('dark-mode');
        const links = document.querySelectorAll('a');
        links.forEach(link => link.classList.toggle('dark-mode'));
    });
    </script>
</body>
</html>
