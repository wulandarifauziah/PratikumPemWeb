<?php
session_start(); 

if (isset($_SESSION['message'])) {
    echo "<div class='alert'>" . $_SESSION['message'] . "</div>";
    unset($_SESSION['message']);
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'koneksi.php';

echo "<style>
        .alert {
            padding: 10px;
            margin: 20px 0;
            background-color: #f44336; 
            color: white;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 20px;
            background-color: #e9ecef;
            color: #495057;
        }
        h2 {
            color: #705C53;
            border-bottom: 2px solid #A66E38;
            padding-bottom: 10px;
        }
        .data-container {
            margin-bottom: 20px;
            background-color: #ffffff;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transition: transform 0.2s;
        }
        .data-container:hover {
            transform: scale(1.02);
        }
        .data-container strong {
            display: block;
            margin: 5px 0;
        }
        .button {
            font-weight: bold;
            padding: 10px 15px;
            margin-top: 15px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s, transform 0.2s;
        }
        .edit-button {
            margin-right: 7px;
            background-color:#ECDFCC;
            color: #705C53;
        }
        .delete-button {
            background-color: #ECDFCC;
            color: #705C53;
        }
        .edit-button:hover {
            background-color: #A66E38;
            transform: translateY(-1px);
        }
        .delete-button:hover {
            background-color: #A66E38;
            transform: translateY(-1px);
        }

        /* Responsif untuk perangkat mobile */
        @media (max-width: 600px) {
            body {
                margin: 10px;
            }
            h2 {
                font-size: 18px;
                padding-bottom: 8px;
            }
            .data-container {
                padding: 15px;
                margin-bottom: 15px;
            }
            .button {
                width: 100%;
                padding: 12px;
                font-size: 16px;
            }
            .edit-button, .delete-button {
                width: 100%;
                margin: 10px 0;
            }
        }
      </style>";


    // Tampilkan hanya satu data terakhir dari tabel 'join'
    $sql = "SELECT * FROM `join` ORDER BY ID_pelanggan DESC LIMIT 1";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        echo "<h2>Data Terbaru yang Dimasukkan:</h2>";
        $row = $result->fetch_assoc(); // Ambil satu data terbaru
        echo "<div class='data-container'>";
        echo "<strong>Full Name:</strong> " . htmlspecialchars($row['full_name']) . "<br>";
        echo "<strong>Email:</strong> " . htmlspecialchars($row['email']) . "<br>";
        echo "<strong>Age:</strong> " . htmlspecialchars($row['Age']) . "<br>";
        echo "<strong>City:</strong> " . htmlspecialchars($row['City']) . "<br>";
        echo "<strong>State / Province:</strong> " . htmlspecialchars($row['state']) . "<br>";
        echo "<strong>Country:</strong> " . htmlspecialchars($row['country']) . "<br>";
        echo "<strong>Password:</strong> " . htmlspecialchars($row['password']) . "<br>";
        echo "</div>";
    } else {
        echo "<h2>Tidak ada data ditemukan!</h2>";
    }

// Tampilkan semua data dari tabel 'join'
$sql = "SELECT * FROM `join`";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    echo "<h2>Semua Data yang Dimasukkan:</h2>";
    while ($row = $result->fetch_assoc()) {
        echo "<div class='data-container'>";
        echo "<strong>Full Name:</strong> " . htmlspecialchars($row['full_name']) . "<br>";
        echo "<strong>Email:</strong> " . htmlspecialchars($row['email']) . "<br>";
        echo "<strong>Age:</strong> " . htmlspecialchars($row['Age']) . "<br>";
        echo "<strong>City:</strong> " . htmlspecialchars($row['City']) . "<br>";
        echo "<strong>State / Province:</strong> " . htmlspecialchars($row['state']) . "<br>";
        echo "<strong>Country:</strong> " . htmlspecialchars($row['country']) . "<br>";
        echo "<strong>Password:</strong> " . htmlspecialchars($row['password']) . "<br>";
        
        // Tombol Edit
        echo "<form method='POST' action='edit.php' style='display:inline;'>
                <input type='hidden' name='id' value='" . htmlspecialchars($row['ID_pelanggan']) . "'>
                <button type='submit' class='button edit-button'>Edit</button>
              </form>";
        
        // Tombol Hapus
        echo "<form method='POST' action='hapus.php' style='display:inline;'>
                <input type='hidden' name='id' value='" . htmlspecialchars($row['ID_pelanggan']) . "'>
                <button type='submit' class='button delete-button' onclick=\"return confirm('Are you sure you want to delete this record?');\">Delete</button>
              </form>";
        
        echo "</div>";
    }
} else {
    echo "<h2>Tidak ada data ditemukan!</h2>";
}

// Tutup koneksi
$conn->close();
?>
