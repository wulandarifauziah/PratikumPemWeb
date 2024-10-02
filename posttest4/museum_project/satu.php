<?php
// Initialize variables
$firstName = $lastName = $email = $age = $city = $state = $zip = $country = $password = "";
$showResults = false;

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = htmlspecialchars($_POST['first-name']);
    $lastName = htmlspecialchars($_POST['last-name']);
    $email = htmlspecialchars($_POST['email']);
    $age = htmlspecialchars($_POST['age']);
    $city = htmlspecialchars($_POST['city']);
    $state = htmlspecialchars($_POST['state']);
    $country = htmlspecialchars($_POST['country']);
    $password = htmlspecialchars($_POST['password']); // Generally, you shouldn't display this

    $showResults = true; // Set flag to true to show results
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Memorial Exhibit</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
</head>

<style>
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

@font-face {
  font-family: "Arthouse";
  src: url("fonts/Arthouse.ttf") format("truetype");
}

body {
    font-family: "Cormorant Garamond", serif;
}

.logo {
  font-family: "Arthouse", serif;
  font-size: 70px;
  color: #7c6c43;
  margin: 15px;
}

nav {
  top: 0;
  left: 0;
  right: 0;
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 0px 30px;
  background: #fff;
  position: fixed;
  z-index: 9999;

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

/* Warna default (light mode) */
body {
    background-color: white;
    color: black;
}

/* Dark mode styling */
body.dark-mode {
    background-color: #121212;
}

nav.dark-mode {
    background-color: #333;
}

a.dark-mode {
    color: #ddd;
}

p.dark-mode{
    color: #491414;
}

footer.dark-mode {
    background-color: #333;
    color: white;
}
body.dark-mode {
    background-color: #E1D7C6; /* Warna cream */
    color: #333; /* Warna teks yang lebih gelap untuk kontras */
}

.hamburger .dark-mode{
    color: #E1D7C6;
}
body.dark-mode .logo {
    color: white; /* Atau warna yang kamu inginkan */
}

.dark-mode .content p{
    color: #130d06 /* Ubah warna teks saat dark mode */
   
}

.dark-mode .content{
    background-color: #d9bf9d; /* Atur warna latar belakang */
}

nav .dark-mode {
    background-color: rgb(48, 48, 48);
}

nav ul {
    list-style: none;
    display: flex;
}

nav ul li {
    margin-left: 20px;
}

.nav-links li a {
    text-decoration: none;
    color: rgb(142, 59, 59);
    font-weight: bold;
}

.dark-mode {
    background-color: #333;
    color: #fff;
}

.dark-mode a {
    color: #fff;
}

.dark-mode .hamburger span {
  background-color: white; 
}

.btn-buy-tickets a {
    background-color: #d4bf82;
    color: black;
    padding: 10px 20px;
    text-decoration: none;
    font-weight: bold;
    border-radius: 5px;
}

.banner {
    position: relative;
    height: 50vh;
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;
}

#banner-video {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    z-index: -1; /* Menempatkan video di belakang teks */
}

.banner-text{
    text-align: center;
}

.banner-text h1 {
    color: white;
    font-size: 50px;
    letter-spacing: 2px;
    padding: 5px;
    margin-top: 50px;
    margin-bottom: 30px;
    text-align: center;
}

.banner-text p {
    color: white;
    font-size: 25px;
    text-align: center;

}

main .content {
    background-color: #f0e5d8;
    padding: 50px;
    text-align: center;
    color: black; 
}

main .content h2 {
    color: 	hsl(30, 50%, 30%);
    font-size: 40px;
    margin-top: 20px;
    margin-bottom: 20px;
}

main .content p {
    color: rgb(143, 102, 61);
    font-size: 25px;
    line-height: 1.6;
    margin-bottom: 15px;
}

.nav-links.active {
    display: flex;
  }

.nav-links li {
  margin: 15px 0;
}

.nav-links li a {
  color: #9c6e2e;
  text-decoration: none;
  font-size: 1.5rem;
  margin: 25px;
}

.nav-links li a:hover {
  color: rgb(252, 192, 138);
  transition: 0.3s;
}

main {
    padding: 20px;
    text-align: center;
}

.content {
    margin-bottom: 40px;
}

.form-container {
    background-color: white;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    padding: 20px;
    width: 80%;
    margin: 15px auto;
}

.image-container {
    text-align: center;
    margin-bottom: 20px;
}

.image-container img {
    width: 100%;
    height: auto;
    border-radius: 8px;
}

h2 {
    color: #333;
    margin-bottom: 15px;
}

p {
    color: #666;
    margin-bottom: 20px;
}

label {
    display: block;
    margin-bottom: 5px;
    text-align: left;
}

input[type="text"],
input[type="email"],
input[type="number"],
input[type="password"] {
    width: calc(100% - 20px);
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input:focus {
    border-color: #66afe9;
    outline: none;
    }

button {
    background-color: #f0e5d8; 
    color: black;
    border: none;
    padding: 10px 15px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

button:hover {
    background-color: #A66E38;;
}

.results {
    border: 1px solid #ccc;
    padding: 20px;
    border-radius: 8px;
    background-color: #f9f9f9;
    max-width: 600px;
    margin: 20px auto;
    font-family: Arial, sans-serif;
}

.results h3 {
    color: #333;
}

.results p {
    font-family: Arial, sans-serif;
}

.results p strong {
    font-weight: bold;
}

.results p:last-of-type {
    color: red;
}

.hamburger {
  display: none;
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
  background-color: #7c6c43;
  margin: 4px;
  transition: 0.3s;
}

@media (max-width: 768px) {

    .nav-links {
    display: none;
    flex-direction: column;
    position: absolute;
    top: 60px;
    right: 20px;
    background-color: #333;
    padding: 10px;
  }

    .hamburger {
    align-items: flex-start;
    display: flex;
    flex-direction: column;
    cursor: pointer;
    position: fixed;
    top: 25px;
    right: 20px;
    z-index: 9999;
    }

    nav {
        flex-direction: column;
        align-items: flex-start;
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

    .nav-links li {
        margin: 10px 0;
    }

    .nav-links li a {
        color: white; 
        text-decoration: none;
        font-size: 18px;
    }

    .dark-mode-toggle {
        margin-top: 10px;
    }

    .banner {
        height: 50vh;
    }

    .banner-text h1 {
        font-size: 8vw;
        margin-top: 90px;
        margin-bottom: 20px;
        
    }

    .banner-text p {
        font-size: 5vw;
    }

    .content {
        padding: 30px;
    }

    main .content h2 {
        font-size: 28px;
    }

    main .content p {
        font-size: 18px;
    }
}

@media (max-width: 480px) {
    .logo {
        font-size: 35px;
    }

    .navbar {
        padding: 15px;
    }

    .banner {
        height: 30vh;
    }

    .banner-text h1 {
        font-size: 6vw;
    }


    .banner-text p {
        font-size: 3.5vw;
    }

    .content {
        padding: 20px;
    }

    main .content h2 {
        font-size: 24px;
    }

    main .content p {
        font-size: 16px;
    }

    .form-container {
        max-width: 100%;
        padding: 10px;
    }
    .nav-links li a {
    font-size: 0.9rem;
  }

}


</style>
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="logo">Museum Lan</div>
            <ul class="nav-links">
                <li><a href="index.php">Home</a></li>
                <li><a href="ticket.php">Ticket</a></li>
                <li><a href="galery.php">Gallery</a></li>
                <button id="dark-mode-toggle" class="dark-mode-toggle">Dark Mode</button>
            </ul>

            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </nav>

        

        <div class="banner">
            <video autoplay muted loop id="banner-video">
                <source src="ShortFilm.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <div class="banner-text">
                <h1>JOIN US</h1>
                <p>Your support makes the museum thrive.</p>
            </div>
        </div>
    </header>

    <main>
        <section class="content">
            <h2>Join a community driven to explore Earth’s epic journey</h2>
            <p>"The Lan National Museum of Natural History is a place of awe and wonder, preserving an irreplaceable record of Earth’s ever-changing physical, biological, and cultural diversity. Join our community today and together we will fuel curiosity and inspire the next generation of knowledge seekers through active exploration and discovery."</p>
        </section>
    </main>

    <div class="form-container">
        <div class="image-container">
            <img src="deep-time-email-signup-banner-pre-open.jpg" alt="Museum" />
        </div>

    <h2>Join us online!</h2>
    <p>Sign up to receive email communication from the Museum, and we'll send you the latest news about scientific discovery, details on exciting exhibit openings, and other programming that occurs only at your National Museum of Natural History.</p>
    <p>Please provide your contact information below:</p>

    <!-- Form Submission -->
    <form method="POST" action="">
        <!-- First Name Input (Text) -->
        <label for="first-name">First Name: <span style="color: red;">*</span></label>
        <input type="text" id="first-name" name="first-name" placeholder="Enter your first name" required><br><br>

        <!-- Last Name Input (Text) -->
        <label for="last-name">Last Name: <span style="color: red;">*</span></label>
        <input type="text" id="last-name" name="last-name" placeholder="Enter your last name" required><br><br>

        <!-- Email Input -->
        <label for="email">Email: <span style="color: red;">*</span></label>
        <input type="email" id="email" name="email" placeholder="Enter your email" required><br><br>

        <!-- Age Input (Number) -->
        <label for="age">Age:</label>
        <input type="number" id="age" name="age" placeholder="Enter your age"><br><br>

        <!-- City Input -->
        <label for="city">City:</label>
        <input type="text" id="city" name="city" placeholder="Enter your city"><br><br>

        <!-- State / Province Input -->
        <label for="state">State / Province:</label>
        <input type="text" id="state" name="state" placeholder="Enter your state or province"><br><br>

        <!-- Country Input -->
        <label for="country">Country: <span style="color: red;">*</span></label>
        <input type="text" id="country" name="country" placeholder="Enter your country" required><br><br>

        <!-- Password Input -->
        <label for="password">Password: <span style="color: red;">*</span></label>
        <input type="password" id="password" name="password" placeholder="Create a password" required><br><br>

        <!-- Submit Button -->
        <button type="submit">Submit</button>
    </form>
</section>

<?php if ($showResults): ?>
            <div class="results">
                <h3>Your Submitted Information:</h3>
                <p><strong>First Name:</strong> <?php echo $firstName; ?></p>
                <p><strong>Last Name:</strong> <?php echo $lastName; ?></p>
                <p><strong>Email:</strong> <?php echo $email; ?></p>
                <p><strong>Age:</strong> <?php echo $age; ?></p>
                <p><strong>City:</strong> <?php echo $city; ?></p>
                <p><strong>State / Province:</strong> <?php echo $state; ?></p>
                <p><strong>Country:</strong> <?php echo $country; ?></p>
             
                <p><strong>Password:</strong> <?php echo $password; ?></p>
            </div>
        <?php endif; ?>
    </div>
        
    <script>
    const hamburger = document.querySelector(".hamburger");
    const navLinks = document.querySelector(".nav-links");

    hamburger.addEventListener("click", () => {
      navLinks.classList.toggle("active");
    });
        const toggleButton = document.getElementById("dark-mode-toggle");

      toggleButton.addEventListener("click", () => {
        document.body.classList.toggle("dark-mode");
        document.querySelector("nav").classList.toggle("dark-mode");

        const links = document.querySelectorAll("a");
        links.forEach((link) => link.classList.toggle("dark-mode"));

        ent.querySelector("footer").classList.toggle("dark-mode");
      });
    </script>
    
</body>
</html>
