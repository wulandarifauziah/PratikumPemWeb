<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>aboutme</title>
</head>
<style>
@font-face {
    font-family: "Arthouse";
    src: url("fonts/Arthouse.ttf") format("truetype");
}

body {
    font-family: "Cormorant Garamond", serif;
    background-color: #DFD0B8;
}

.nav-links {
    list-style: none;
    display: flex;
    font-weight: bold;
}

.nav-links li {
    margin: 15px 0;
}

.nav-links li a {
    color: #f8f0e5;
    text-decoration: none;
    font-size: 1.1rem;
    margin: 25px;
}

.nav-links li a:hover {
    color: rgb(252, 192, 138);
    transition: 0.3s;
    transform: scaleX(0.2);
}


.content {
    padding: 20px;
}

.about-section {
    background-color: #948979;
    padding: 20px;
    margin: auto;
    margin-bottom: 30px;
    margin-top: 150px;
    text-align: center;
}

.about-section img.photo {
    border-radius: 50%;
    width: 100px;
    height: 100px;
    object-fit: cover;
    margin-bottom: 20px;
}

.dark-mode {
    background-color: #333;
    color: white;
}

.dark-mode a {
    color: #948979;
}

.dark-mode .about-section {
    background-color: #444;
}

/* Hamburger Menu Style */
.hamburger {
    display: none;
    flex-direction: column;
    cursor: pointer;
    gap: 5px;
}

.hamburger span {
    width: 30px;
    height: 3px;
    background-color: #333;
    transition: 0.3s;
}

/* General styling */

.logo {
    font-family: "Arthouse", serif;
    font-size: 70px;
    color: #f9f7cf;
    margin: 15px;
}

.nav-links {
    list-style: none;
    display: flex;
    font-weight: bold;
}

.nav-links li {
    margin: 15px 0;
}

.nav-links li a {
    color: #f8f0e5;
    text-decoration: none;
    font-size: 1.1rem;
    margin: 25px;
}

a {
    color: light brown;
}

a:hover {
    color: black;
}

.nav-links li a:hover {
    color: rgb(252, 192, 138);
    transition: 0.3s;
    transform: scaleX(0.2);
}

/* Hamburger Menu */
.hamburger {
    display: none;
    flex-direction: column;
    cursor: pointer;
    gap: 5px;
}

.hamburger span {
    width: 30px;
    height: 3px;
    background-color: white;
}

.contact-btn {
    background-color: rgb(170, 118, 28);
    color: #603f26;
    padding: 10px 20px;
    border-radius: 50px;
}

/* Dark Mode Button */
.dark-mode-toggle {
    padding: 10px 20px;
    margin-top: 3px;
    margin-bottom: 3px;
    cursor: pointer;
    background-color: rgb(170, 118, 28);
    color: #e7ded7;
    font-style: bold;
    padding: 10px 20px;
    border-radius: 50px;
    font-weight: bold;
    font-family: "Cormorant Garamond", serif;
}

nav {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0px 50px;
    background: rgba(0, 0, 0, 0.3);
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    z-index: 9999;
}

/* Responsive Menu */
@media (max-width: 768px) {
    .hamburger {
        display: flex;
        flex-direction: column;
        cursor: pointer;
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 9999;
    }

    .nav-links {
        display: none;
        flex-direction: column;
        position: absolute;
        top: 60px;
        right: 20px;
        background-color: #333;
        padding: 10px;
    }

    .nav-links.active {
        display: flex;
    }

    header {
        width: 133%;
    }
}

@media (max-width: 480px) {

    .logo {
        font-size: 2rem;
    }

    .nav-links li a {
        font-size: 0.9rem;
    }
}
</style>

<body>
    <nav>
        <div class="logo">Museum Lan</div>
        <ul class="nav-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="ticket.php">Ticket</a></li>
            <li><a href="contac.php"> Contact Us </a></li>
            <li><a href="satu.php">Join Us</a></li>
            <li><a href="galery.php" class="contact-btn">Gallery</a></li>
            <button id="dark-mode-toggle" class="dark-mode-toggle">Dark Mode</button>
        </ul>

        <!-- Hamburger Menu -->
        <div class="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </nav>

    <div class="about-section" id="about">
        <h2>About the Author</h2>
        <img src="img/foto almet.jpg" alt="fotoku" class="photo">
        <p><strong>Name:</strong> Siti Fauziah Wulandari</p>
        <p><strong>Tugas:</strong> Pemograman web</p>
        <p><strong>Universitas:</strong> Universitas Mulawarman, Jl. Kuaro, Gn. Kelua, Kec. Samarinda Ulu, Kota
            Samarinda, Kalimantan Timur 75119.</p>
        <p><strong>Praktikum web:</strong> <a
                href="https://classroom.google.com/c/NzEwMjM0NDcyMzE3/a/NzA2NzI0Nzc4MzA3/details">Posttest4</a></p>
    </div>

    <script>
    // Dark Mode Toggle
    const toggleButton = document.getElementById('dark-mode-toggle');
    toggleButton.addEventListener('click', () => {
        document.body.classList.toggle('dark-mode');
    });

    // Hamburger Menu Logic
    const hamburger = document.querySelector('.hamburger');
    const navLinks = document.querySelector('nav ul');

    hamburger.addEventListener('click', () => {
        navLinks.classList.toggle('active');
    });
    </script>
</body>

</html>