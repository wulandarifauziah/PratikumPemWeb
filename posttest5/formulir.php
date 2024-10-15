<?php

    include 'koneksi.php';

    $showResults = false; 
    $fullName = $email = $age = $city = $state = $country = $subscriptionType = $password = "";
    $photoPath = ""; 

    $maxFileSize = 2 * 1024 * 1024;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
        $fullName = $_POST['full_name'] ?? '';
        $email = $_POST['email'] ?? '';
        $age = $_POST['age'] ?? '';
        $city = $_POST['city'] ?? '';
        $state = $_POST['state'] ?? '';
        $country = $_POST['country'] ?? '';
        $subscriptionType = $_POST['subscription_type'] ?? '';
        $password = $_POST['password'] ?? '';

        if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
            $fileTmpPath = $_FILES['photo']['tmp_name'];
            $fileName = $_FILES['photo']['name'];
            $fileSize = $_FILES['photo']['size'];
            $fileType = $_FILES['photo']['type'];
            $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

            if ($fileSize > $maxFileSize) {
                echo "Ukuran file melebihi batas 2MB!";
                exit;
            }

            $newFileName = date('Y-m-d H.i.s') . '.' . $fileExtension;
            $uploadFileDir = './uploads/';
            $dest_path = $uploadFileDir . $newFileName;

            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                $photoPath = $dest_path; 
            } else {
                echo "Terjadi kesalahan saat mengunggah file!";
                exit;
            }
        }

        $sql = "INSERT INTO `join` (full_name, email, Age, City, state, country, subscription_type, password, photo) 
                VALUES ('$fullName', '$email', '$age', '$city', '$state', '$country', '$subscriptionType', '$password', '$photoPath')";

        if ($conn->query($sql) === TRUE) {
            header("Location: tampilkan_data.php");
            exit; 
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();

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
    background-color: #E1D7C6; 
    color: #333; 
}

.hamburger .dark-mode{
    color: #E1D7C6;
}
body.dark-mode .logo {
    color: white; 
    
}

.dark-mode .content p{
    color: #130d06
   
}

.dark-mode .content{
    background-color: #d9bf9d;
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

#banner-image {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
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
input[type="password"],
select{
    width: calc(100% - 20px);
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type="file"] {
    width: calc(100% - 20px);
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    background-color: #fff;
    cursor: pointer;
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
select {
    color:  #495057;
}
@media (max-width: 768px) {
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
            <img src="img/formulir.png" alt="Museum Banner" id="banner-image" style="width: 100%; height: auto;">
        </div>

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
        <form method="POST" action="" enctype="multipart/form-data">
            <!-- Full Name Input -->
            <label for="full_name">Full Name <span style="color: red;">*</span></label>
            <input type="text" id="full_name" name="full_name" placeholder="Enter your full name" required><br><br>

            <!-- Email Input -->
            <label for="email">Email: <span style="color: red;">*</span></label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required><br><br>

            <!-- Age Input -->
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

            <!-- Subscription Input -->
            <label for="subscription_type">Subscription: <span style="color: red;">*</span></label>
            <select name="subscription_type" id="subscription_type" required>
                <option value="">-- Select Subscription Type --</option>
                <option value="general">General Museum News</option>
                <option value="science">Scientific Discoveries</option>
                <option value="events">Exhibitions & Events</option>
            </select><br><br>

            <!-- Password Input -->
            <label for="password">Password: <span style="color: red;">*</span></label>
            <input type="password" id="password" name="password" placeholder="Create a password" required><br><br>

            <!-- Foto Upload Input -->
            <label for="photo">Upload Foto:</label>
            <input type="file" id="photo" name="photo" accept="image/*"><br><br>

            <!-- Submit Button -->
            <button type="submit">Submit</button>
        </form>


            <?php if ($showResults): ?>
                <div class="results">
                    <h3>Your Submitted Information:</h3>
                    <p><strong>Full Name:</strong> <?php echo htmlspecialchars($fullName); ?></p>
                    <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
                    <p><strong>Age:</strong> <?php echo htmlspecialchars($age); ?></p>
                    <p><strong>City:</strong> <?php echo htmlspecialchars($city); ?></p>
                    <p><strong>State / Province:</strong> <?php echo htmlspecialchars($state); ?></p>
                    <p><strong>Country:</strong> <?php echo htmlspecialchars($country); ?></p>
                    <p><strong>Password:</strong> <?php echo htmlspecialchars($password); ?></p>
                    <form method="POST" action="edit.php">
                        <input type="hidden" name="id" value="<?php echo $conn->insert_id; ?>">
                        <button type="submit">Edit</button>
                    </form>
                    <form method="POST" action="delete.php">
                        <input type="hidden" name="id" value="<?php echo $conn->insert_id; ?>">
                        <button type="submit">Delete</button>
                    </form>
                </div>
            <?php endif; ?>
        </div>
    </main>

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
        });
    </script>
</body>
</html>