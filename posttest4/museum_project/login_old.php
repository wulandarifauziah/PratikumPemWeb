<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="login.css"> <!-- Link ke CSS -->
    <title>Ludiflex | Form Input</title>
</head>
<style>

/* Global reset */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

html, body {
  padding: 0;
  margin: 0;
  width: 100%; /* Pastikan body dan html mengambil 100% lebar layar */
  overflow-x: hidden; /* Cegah elemen yang meluas melebihi layar */
}

@font-face {
  font-family: "Arthouse";
  src: url("fonts/Arthouse.ttf") format("truetype");
}

body {
  font-family: "Cormorant Garamond", serif;
  background-color: #f9f9f9;
}


  header {
    width: 100%; /* Memastikan lebar header 100% dari layar */
    height: 100vh; /* Atur tinggi sesuai layar */
    background: url("castle-4336616_1920.jpg") no-repeat center center/cover;
    position: relative;
    background-position: center;
    box-sizing: border-box; /* Pastikan padding dan border dihitung dalam lebar elemen */
    overflow: hidden; /* Menghindari konten keluar dari batas layar */
    padding: 0; /* Pastikan padding header 0 agar tidak bergeser */
    margin: 0; /* Pastikan margin 0 agar tidak ada pergeseran */
  }
  

/* Dark Mode Styles */
body.dark-mode {
  background-color: #a79480 ;
  color: #ffffff;
}

nav.dark-mode {
  background-color: #1e1e1e;
}

a.dark-mode {
  color: #704eb4;
}

p.dark-mode{
  color: #a47ee2;
}

.dark-mode .exhibitions {
  background-color: #a79480;
} 

.dark-mode .lukisan {
  background-color: #a79480;
}

.dark-mode .col-right p {
  color: #f1f1f1; /* Dark mode text color */
}

.dark-mode .col-right a.ctn {
  background-color: #111;
  color: #ddd;
}

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
  top: 0;
  left: 0;
  right: 0;
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 0px 50px;
  background: rgba(0, 0, 0, 0.3);
  position: fixed;
  z-index: 9999;
}

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

.nav-links li a:hover {
  color: rgb(252, 192, 138);
  transition: 0.3s;
  transform: scaleX(0.2);
}

.contact-btn {
  background-color: rgb(170, 118, 28);
  color: #603f26;
  padding: 10px 20px;
  border-radius: 50px;
}

.hero {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
  color: #ebe3d5;
}

.line {
  width: 15rem;
  background: #a14a06;
  margin: 10px auto;
  height: 5px;
  border-radius: 5px;
}

.hero h2 {
  font-size: 2rem;
  color: #ebe3d5;
  text-shadow: 2px -1px #373431;
  font-weight: bold;
  letter-spacing: 1.5px;
  margin-bottom: 18px;
}

.hero h1 {
  font-size: 4rem;
  color: #f6ffe2;
  margin-bottom: 20px;
}

.learn-more-btn {
  background-color: #ecb176;
  color: #603f26;
  padding: 10px 30px;
  border-radius: 50px;
  text-decoration: none;
  font-size: 1.2rem;
}

.learn-more-btn:hover {
  background-color: #ffeac5;
}

/* .hamburger {
  width: 13px;
  margin-top: 1px;
  display: flex;
  flex-direction: column;
  cursor: pointer;
  position: fixed;
  top: px;
  right: 20px;
  z-index: 9999;
}

.hamburger span {
  width: 10px;
  height: 1px;
  background-color: #fff;
  margin: 2px;
  transition: 0.3s;
} */

.section {
  width: 100%;
  margin: 100px;
}
.Halaman {
  color: #f6ffe2;
  margin-top: 100px;
  text-align: center;
  font-size: 4vmin;
}

.about {
  padding: 20px;
}

.Halaman h1 {
  text-align: center;
  padding-top: 0%;
  padding-bottom: 40px;
  font-size: 4rem;
  color: hsl(33, 22%, 84%);
}

.row {
  display: flex;
  align-items: center;
  justify-content: center;
  flex-wrap: wrap;
  gap: 20px;
}

.col-left img {
  margin-right: 50px;
  width: 100%;
  max-width: 400px;
  border-radius: 10px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.col-right h4 {
  font-size: 28px;
  margin-bottom: 20px;
  color: #1d1b19;
}

.col-right p {
  align-items: center;
  font-size: 20px;
  margin-bottom: 0px;
  line-height: 1.6;
  color: #624a2b;
}

.ctn {
  display: inline-block;
  padding: 10px 20px;
  background-color: #ecb176;
  color: rgb(74, 27, 27);
  text-decoration: none;
  border-radius: 5px;
}

a.ctn {
  background-color: #e3cfbb;
}

.ctn:hover {
  background-color: #ffeac5;
}

.popup {
  display: none; /* Sembunyikan popup secara default */
  position: fixed; /* Tetap di posisi yang sama saat di-scroll */
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(15, 15, 15, 0.459);
  justify-content: center;
  align-items: center;
  z-index: 99999;
}

.popup-content {
  color: #373431;
  background-color: #e3cfbb;
  padding: 20px;
  border-radius: 10px;
  text-align: center;
  max-width: 500px;
  width: 80%;
  margin: auto;
  position: relative;
  z-index: 99999;
}

.close-btn {
  position: absolute;
  top: 10px;
  right: 20px;
  font-size: 30px;
  cursor: pointer;
}

.cta-btn {
  display: inline-block;
  padding: 10px 20px;
  background-color: #a14a06;
  color: #fff;
  text-decoration: none;
  border-radius: 5px;
  margin-top: 20px;
}

.popup.show {
  display: flex;
}
 
.row {
  display: flex;
  justify-content: space-between;
  align-items: center;
  gap: 40px;
  max-width: 1200px;
  margin: 0 auto;
}

.col-left img {
  max-width: 100%;
  border-radius: 10px;
}

.col-right {
  margin-bottom: 20px;
}

.col-right p {
  margin-bottom: 20px;
  font-size: 16px;
  line-height: 1.6;
}

.ctn {
  display: inline-block;
  margin-top: 20px;
  padding: 12px 24px;
  background-color: #007bff;
  color: white;
  text-decoration: none;
  border-radius: 5px;
}

.ctn:hover {
  background-color: #0056b3;
}

/* Exhibitions Section */
.exhibitions {
  text-align: center;
  background-color: #fff;
  padding: 60px 0;
}

.exhibition-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 20px;
  max-width: 1200px;
  margin: 0 auto;
}

.exhibition-item {
  background-color: white;
  padding: 20px;
  box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
  border-radius: 10px;
  text-align: center;
  transition: transform 0.3s ease-in-out;
}

.exhibition-item:hover {
  transform: translateY(-10px);
}

.exhibition-item img {
  width: 100%;
  border-radius: 5px;
}

.exhibition-item h3 {
  margin-top: 15px;
  color: #333;
}

.exhibition-item p {
  color: #666;
}

/* Newsletter Section */
.newsletter {
  padding: 40px;
  background-color: #6d5132;
  color: white;
  text-align: center;
}

.newsletter h2 {
  font-size: 24px;
  margin-bottom: 10px;
}

.newsletter form {
  display: flex;
  justify-content: center;
  gap: 10px;
  margin-top: 20px;
}

.newsletter input {
  padding: 10px;
  border-radius: 5px;
  border: none;
  outline: none;
}

.newsletter button {
  padding: 10px 20px;
  background-color: #e3cfbb;
  border: none;
  border-radius: 5px;
  color: #666;
  cursor: pointer;
}

.newsletter button:hover {
  background-color: #a79480;
  color: white;
}

/* Footer */
footer {
  background-color: #333;
  color: white;
  padding: 20px 0;
  text-align: center;
}

footer a {
  color: white;
  text-decoration: none;
}

footer a:hover {
  text-decoration: underline;
}

.col img {
  width: 100%; /* Ensure images are responsive */
  height: auto;
}

.lukisan {
  width: 100%;
  padding: 20px 0;
  background-color: #f9f9f9;
  box-sizing: border-box;
}
/* Hamburger Menu */
.hamburger {
  display: none; /* Sembunyikan hamburger di layar besar */
  flex-direction: column;
  cursor: pointer;
  position: fixed;
  top: 20px;
  right: 20px;
  z-index: 9999;
}

.hamburger span {
  width: 25px;
  height: 3px;
  background-color: #fff;
  margin: 4px 0;
  transition: 0.3s;
}

</style>
<body>
    <!-- Video sebagai latar belakang -->
    <video class="video-background" autoplay loop muted>
        <source src="ShortFilm.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <header>
        <nav>
            <div class="logo">Museum Lan</div>
            <ul class="nav-links">
                <li><a href="#top">Home</a></li>
                <li><a href="ticket.html">Ticket</a></li>
                <li><a href="about.html">About Me</a></li>
                <li><a href="login.php">Join Us</a></li>
                <li><a href="galery.html" class="contact-btn">Gallery</a></li>
                <button id="dark-mode-toggle" class="dark-mode-toggle">Dark Mode</button>
            </ul>

            <!-- Hamburger Menu -->
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </nav>

              <!-- Hero Section -->
              <div class="hero">
            <h2>Explore the World Full of Stories</h2>
            <div class="line"></div>
            <h1>There are many beautiful things you haven't seen</h1>
            <a href="#" class="learn-more-btn">See More</a>
        </div>
    </header>  
    
    <section class="lukisan">
        <div class="Halaman">
            <h1>About Us</h1>
        </div>
        <div class="row">
            <div class="col-left">
                <img src="img/profil.png" alt="Museum Image">
            </div>
            <div class="col-right">
                <!-- <h4>About Us</h4> -->
                <p>Welcome to Museum Lan, a place where history, art, and culture come alive. Located in the heart of IKN, Museum Lan is dedicated to showcasing diverse exhibitions that span from ancient artifacts to contemporary masterpieces. Our mission is to educate, inspire, and ignite curiosity by providing an immersive experience that bridges the past with the present.</p>
                <p>At Museum Lan, we believe that art and history are essential to understanding the world we live in today. Our exhibits cover a wide range of themes, including local history, global cultures, and the latest in contemporary art.</p>
                <a href="#" class="ctn">Learn More</a>
            </div>
        </div>
    </section>

      <!-- Exhibitions Section -->
      <section class="exhibitions">
        <h2>Current Exhibitions</h2>
        <div class="exhibition-grid">
            <div class="exhibition-item">
                <img src="img/kuno2.jpg" alt="Exhibition 1">
                <h3>Ancient Artifacts</h3>
                <p>Explore ancient relics from civilizations across the world.</p>
            </div>
            <div class="exhibition-item">
                <img src="img/modern.png" alt="Exhibition 2">
                <h3>Modern Art Masterpieces</h3>
                <p>Discover contemporary art from the world's leading artists.</p>
            </div>
            <div class="exhibition-item">
                <img src="img/Portrait_de_l'artiste tenant_un_chardon.JPG" alt="Exhibition 3">
                <h3>Local Heritage</h3>
                <p>Dive into the rich cultural heritage of our local communities.</p>
            </div>
        </div>
    </section>
    

    <div class="wrapper">
        <h2>Form Input Data</h2>
        <div class="form-box">
            <form method="POST" action="">
                <div class="input-box">
                    <label for="name">Nama:</label>
                    <input type="text" class="input-field" name="name" id="name" placeholder="Masukkan nama" required>
                </div>
                <div class="input-box">
                    <label for="age">Usia:</label>
                    <input type="number" class="input-field" name="age" id="age" placeholder="Masukkan usia" required>
                </div>
                <div class="input-box">
                    <label for="password">Password:</label>
                    <input type="password" class="input-field" name="password" id="password" placeholder="Masukkan password" required>
                </div>
                <div class="input-box">
                    <input type="submit" class="submit" name="submit" value="Kirim">
                </div>
            </form>

            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $name = htmlspecialchars($_POST['name']);
                $age = htmlspecialchars($_POST['age']);
                $password = htmlspecialchars($_POST['password']);

                echo "<div class='result'>";
                echo "<h3>Hasil Input:</h3>";
                echo "<p><strong>Nama:</strong> $name</p>";
                echo "<p><strong>Usia:</strong> $age</p>";
                echo "<p><strong>Password:</strong> $password</p>";
                echo "</div>";
            }
            ?>
        </div>
    </div>
</body>
</html>
