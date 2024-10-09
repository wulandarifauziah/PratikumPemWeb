<?php
// Sertakan file koneksi.php agar bisa terhubung ke database
include 'koneksi.php';

// Cek apakah form sudah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $fullName = $_POST['full_name'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $country = $_POST['country'];
    $password = $_POST['password'];

    // Buat query untuk menyimpan data ke dalam tabel join
    $query = "INSERT INTO `join` (full_name, email, age, city, state, country, password) 
              VALUES ('$fullName', '$email', '$age', '$city', '$state', '$country', '$password')";

    // Jalankan query
    if (mysqli_query($conn, $query)) {
        echo "<div style='color: green; font-weight: bold;'>Pendaftaran berhasil! Data Anda telah disimpan.</div>";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }

    // Tutup koneksi
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Museum Lan - Subscription Form</title>
    <style>
        .navbar {
            display: flex;
            justify-content: space-between;
            background-color: #333;
            padding: 10px;
            color: white;
        }

        .navbar ul {
            display: flex;
            list-style: none;
        }

        .navbar ul li {
            margin-right: 20px;
        }

        .navbar a {
            color: white;
            text-decoration: none;
        }

        .banner img {
            width: 100%;
            height: auto;
        }

        .form-container {
            margin: 20px;
            padding: 20px;
            border: 1px solid #ccc;
        }

        form input {
            margin-bottom: 10px;
            width: 100%;
            padding: 8px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        form button {
            padding: 10px 20px;
            background-color: #333;
            color: white;
            border: none;
            cursor: pointer;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ccc;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
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
            <img src="img/formulir.png" alt="Museum Banner" id="banner-image">
        </div>
    </header>

    <main>
        <section class="content">
            <h2>Join a community driven to explore Earth’s epic journey</h2>
            <p>"The Lan National Museum of Natural History is a place of awe and wonder, preserving an irreplaceable record of Earth’s ever-changing physical, biological, and cultural diversity. Join our community today and together we will fuel curiosity and inspire the next generation of knowledge seekers through active exploration and discovery."</p>
        </section>

        <div class="form-container">
            <h2>Join us online!</h2>
            <p>Sign up to receive email communication from the Museum, and we'll send you the latest news about scientific discovery, details on exciting exhibit openings, and other programming that occurs only at your National Museum of Natural History.</p>
            <p>Please provide your contact information below:</p>

            <!-- Form Submission -->
            <form method="POST" action="">
                <!-- Full Name Input (Text) -->
                <label for="first-name">Full Name: <span style="color: red;">*</span></label>
                <input type="text" id="full_name" name="full_name" placeholder="Enter your full name" required><br><br>

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
        </div>
    </main>

    <table border="1">
        <tr>
            <th>No</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Age</th>
            <th>City</th>
            <th>State</th>
            <th>Country</th>
            <th>Password</th>
            <th>Action</th>
        </tr>

        <?php
        // Sertakan file koneksi
        include 'koneksi.php';
        
        // Variabel untuk nomor urut
        $no = 1;
        
        // Query untuk mengambil data dari tabel join
        $data = mysqli_query($conn, "SELECT * FROM `join`");
        
        // Tampilkan data dalam perulangan
        while ($d = mysqli_fetch_array($data)) {
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $d['full_name']; ?></td>
                <td><?php echo $d['email']; ?></td>
                <td><?php echo $d['age']; ?></td>
                <td><?php echo $d['city']; ?></td>
                <td><?php echo $d['state']; ?></td>
                <td><?php echo $d['country']; ?></td>
                <td><?php echo $d['password']; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $d['id']; ?>">EDIT</a>
                    <a href="hapus.php?id=<?php echo $d['id']; ?>">HAPUS</a>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
</body>
</html>
