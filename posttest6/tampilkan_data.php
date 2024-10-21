<?php
session_start(); 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'koneksi.php';

echo "<style>

        @font-face {
        font-family: 'Arthouse';
        src: url('fonts/Arthouse.ttf') format('truetype');
        
        }

        .container-pesan {
            display: flex;
            flex-direction: column;
            align-items: center;
            // justify-content: center;
            width: 100%;
            margin-top: 20px; 

        }
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            background-color: #f44336; /* Warna merah untuk pesan */
            color: white;
            display: block;
            width: 80%;
            // text-align: center;
            margin-top:20px;
            max-width: 800px;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        body {
            font-family: Cormorant Garamond, serif;
            margin: 0;
            padding: 0;
            background-color: #D8D2C2;
            color: #4b3832;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Pastikan container vertikal berada di tengah */
        }
        h2 {
            color: #705C53;
            text-align: center;
            border-bottom: 2px solid #A66E38;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .table-container {
            margin-top: 50px;
            max-width: 80%;
            background-color: #fffaf0;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #d4a373;
            color: white;
        }
        td {
            background-color: #fffaf0;
        }
        .button {
            font-weight: bold;
            padding: 10px 15px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            font-size: 14px;
            background-color: #e8d5b7; /* Warna pastel cream untuk tombol */
            color: #4b3832;
            transition: background-color 0.3s, transform 0.2s;
        }
        .edit-button {
            background-color:#ecdbba; /* Warna pastel cream */
        }
        .delete-button {
            background-color: #ecdbba; 
            text-align:center;
        }
        .edit-button:hover, .delete-button:hover {
            background-color: #d4a373;
            transform: translateY(-1px);
            color: white;
        }

        /* Dark Mode Styling */
        body.dark-mode {
            background-color: #D6BD98;
            color: #D6BD98;
        }
        nav.dark-mode {
            background-color: #333;
            color: #e0e0e0;
        }
        .dark-mode-toggle {
            font-family: 'Cormorant Garamond', serif;
            background-color: #333;
            background-color: #e0e0e0;
            color: #333;
        }
        .dark-mode a {
            color: #e0e0e0;
        }
        table.dark-mode, td.dark-mode {
            background-color: #4E3620;
            border-color: #555;
            color: #e0e0e0;
        }
        .button.dark-mode {
            background-color: #4b3832; 
            background-color: #555;
            color: #e0e0e0;
        }

        body.dark-mode .logo {
        color: #e0e0e0;
        }

        body.dark-mode .table-container {
        color: #e0e0e0;
        background-color: #333; 
        }

    
        body.dark-mode h2 {
        color: #e0e0e0;
        }

        /* Responsif untuk perangkat mobile */
        @media (max-width: 600px) {
            table, th, td {
                font-size: 12px;
            }
        }

        /* Navbar Styles */
        nav {
            top: 0;
            left: 0;
            right: 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 30px;
            background: #fffaf0; /* Warna pastel cream */
            position: fixed;
            z-index: 9999;
            width: 100%;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        nav ul {
            list-style: none;
            display: flex;
        }

        nav ul li {
            margin-left: 20px;
            margin-right: 20px;
            
        }

        nav ul li a {
            text-decoration: none;
            margin-bottom:20px;
            color: #4b3832;
            font-weight: bold;
            font-size: 20px; /* Ukuran font lebih besar */
            font-family: 'Cormorant Garamond', serif; /* Menggunakan font yang sama dengan body */
        }

        .logo {
            font-family: 'Arthouse', serif;
            font-size: 50px;
            color: #7c6c43;
        }

        .dark-mode-toggle {
            margin-right:50px;
            padding: 10px 20px;
            cursor: pointer;
            background-color: #d4a373;
            color: #fffaf0;
            font-weight: bold;
            border-radius: 50px;
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
            nav ul {
                display: none;
            }
            .hamburger {
                display: flex;
            }
            .nav-links.active {
                display: block;
                position: absolute;
                top: 60px;
                right: 20px;
                background-color: #4b3832;
                padding: 10px;
            }
        }
      </style>";

// Navbar
echo "
<header>
    <nav class='navbar'>
        <div class='logo'>Museum Lan</div>
        <ul class='nav-links'>
            <li><a href='index.php'>Home</a></li>
            <li><a href='formulir.php'>Formulir</a></li>
            <li><a href='galery.php'>Gallery</a></li>
            <button id='dark-mode-toggle' class='dark-mode-toggle'>Dark Mode</button>
        </ul>
        <div class='hamburger'>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </nav>
</header>
";

// Javascript untuk dark mode dan hamburger
echo "<script>
        const hamburger = document.querySelector('.hamburger');
        const navLinks = document.querySelector('.nav-links');

        hamburger.addEventListener('click', () => {
            navLinks.classList.toggle('active');
        });

        const toggleButton = document.getElementById('dark-mode-toggle');
        toggleButton.addEventListener('click', () => {
            document.body.classList.toggle('dark-mode');
            document.querySelectorAll('table, th, td').forEach(el => {
                el.classList.toggle('dark-mode');
            });
            document.querySelector('nav').classList.toggle('dark-mode');
            document.querySelectorAll('a').forEach(link => {
                link.classList.toggle('dark-mode');
            });
        });
      </script>";

echo "<div class='container-pesan'>";

// Tampilkan pesan alert jika ada
if (isset($_SESSION['message'])) {
    echo "<div class='alert'>" . $_SESSION['message'] . "</div>";
    unset($_SESSION['message']); // Hapus pesan setelah ditampilkan
}

$sql = "SELECT * FROM `join`";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    echo "<div class='table-container'>";
    echo "<h2>Semua Data yang Dimasukkan:</h2>";
    echo "<table>";
    echo "<thead><tr>
            <th>Full Name</th>
            <th>Email</th>
            <th>Age</th>
            <th>City</th>
            <th>State</th>
            <th>Country</th>
            <th>Photo</th>
            <th>Actions</th>
          </tr></thead>";
    echo "<tbody>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['full_name']) . "</td>";
        echo "<td>" . htmlspecialchars($row['email']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Age']) . "</td>";
        echo "<td>" . htmlspecialchars($row['City']) . "</td>";
        echo "<td>" . htmlspecialchars($row['state']) . "</td>";
        echo "<td>" . htmlspecialchars($row['country']) . "</td>";

        echo "<td>";
        if (!empty($row['photo'])) {
            echo "<img src='" . htmlspecialchars($row['photo']) . "' alt='User Photo' style='max-width: 100px; height: auto;'>";
        } else {
            echo "No Photo";
        }
        echo "</td>";

        // Tombol Edit dan Hapus
        echo "<td>
                <form method='POST' action='edit.php' style='display:inline;'>
                    <input type='hidden' name='id' value='" . htmlspecialchars($row['ID_pelanggan']) . "'>
                    <button type='submit' class='button edit-button'>Edit</button>
                </form>
                <form method='POST' action='hapus.php' style='display:inline;'>
                    <input type='hidden' name='id' value='" . htmlspecialchars($row['ID_pelanggan']) . "'>
                    <button type='submit' class='button delete-button' onclick=\"return confirm('Are you sure you want to delete this record?');\">Delete</button>
                </form>
              </td>";
        echo "</tr>";
    }

    echo "</tbody></table>";
    echo "</div>";
} else {
    echo "<h2>Tidak ada data ditemukan!</h2>";
}

$conn->close();
?>
