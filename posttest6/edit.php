<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'koneksi.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $sql = "SELECT * FROM `join` WHERE ID_pelanggan = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "<h2>Data tidak ditemukan!</h2>";
        exit;
    }
} else {
    echo "<h2>ID tidak dikirim!</h2>";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $city = $_POST['city']; 
    $state = $_POST['state'];
    $country = $_POST['country'];
    $password = $_POST['password'];
    
    if (!empty($password)) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    } else {
        $hashedPassword = $row['password'];
    }

    $photoPath = $row['photo']; 
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['photo']['tmp_name'];
        $fileName = $_FILES['photo']['name'];
        $fileSize = $_FILES['photo']['size'];
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        $maxFileSize = 2 * 1024 * 1024;
        if ($fileSize > $maxFileSize) {
            echo "Ukuran file melebihi batas 2MB!";
            exit;
        }

        $newFileName = date('Y-m-d H.i.s') . '.' . $fileExtension;
        $uploadFileDir = './uploads/';
        $dest_path = $uploadFileDir . $newFileName;

        if (move_uploaded_file($fileTmpPath, $dest_path)) {
          
            if (!empty($row['photo']) && file_exists($row['photo'])) {
                unlink($row['photo']);
            }
        
            $photoPath = $dest_path;
        } else {
            echo "Terjadi kesalahan saat mengunggah file!";
            exit;
        }
    }

    // Update data ke database
    $sql = "UPDATE `join` SET full_name = ?, email = ?, age = ?, city = ?, state = ?, country = ?, password = ?, photo = ? WHERE ID_pelanggan = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssisssssi", $full_name, $email, $age, $city, $state, $country, $hashedPassword, $photoPath, $id);

    if ($stmt->execute()) {
        echo "<h2>Data berhasil diperbarui!</h2>";
        header("Location: tampilkan_data.php");
        exit();
    } else {
        echo "<h2>Gagal memperbarui data: " . $stmt->error . "</h2>";
    }
}

echo "<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #D8D2C2; /* Warna pastel cream */
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh; /* Membuat tinggi minimal 100% dari viewport */
    }
    .container {
        text-align: center;
        padding: 20px;
        background-color: #fffaf0; /* Warna cream */
        border-radius: 10px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        width: 100%;
        max-width: 400px;
        margin: 0 20px;
    }
    form {
        margin-top: 20px;
    }
    label {
        display: block;
        margin-top: 10px;
        font-weight: bold;
        text-align: left;
    }
    input[type='text'], input[type='email'], input[type='number'], input[type='password'], input[type='file'] {
        width: 100%;
        padding: 10px;
        margin: 5px 0 20px 0;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }
    button {
        background-color: #d4a373; /* Warna pastel untuk tombol */
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        width: 100%;
    }
    button:hover {
        background-color: #c89666; /* Warna yang lebih gelap untuk efek hover */
    }
    .back-btn {
        margin-top: 15px;
        display: inline-block;
        text-decoration: none;
        color: #4b3832;
        padding: 10px 15px;
        background-color: #ecdbba;
        border-radius: 5px;
    }
    .back-btn:hover {
        background-color: #d4a373;
        color: white;
    }

    /* Responsif untuk layar kecil */
    @media (max-width: 600px) {
        .container {
            width: 90%;
            padding: 15px;
        }
        label {
            text-align: left;
        }
        button {
            width: 100%;
        }
        .back-btn {
            width: 100%;
            text-align: center;
        }
    }
</style>";

echo "<div class='container'>
    <h2>Edit Data Pelanggan</h2>
    <form method='POST' action='edit.php' enctype='multipart/form-data'>
        <input type='hidden' name='id' value='" . htmlspecialchars($id) . "'>
        <label>Full Name:</label>
        <input type='text' name='full_name' value='" . htmlspecialchars($row['full_name']) . "' required><br>
        <label>Email:</label>
        <input type='email' name='email' value='" . htmlspecialchars($row['email']) . "' required><br>
        <label>Age:</label>
        <input type='number' name='age' value='" . htmlspecialchars($row['Age']) . "'><br>
        <label>City:</label>
        <input type='text' name='city' value='" . htmlspecialchars($row['City']) . "'><br>
        <label>State / Province:</label>
        <input type='text' name='state' value='" . htmlspecialchars($row['state']) . "'><br>
        <label>Country:</label>
        <input type='text' name='country' value='" . htmlspecialchars($row['country']) . "'><br>
        <label>Password (kosongkan jika tidak diubah):</label>
        <input type='password' name='password'><br>

        <!-- Tambahkan input untuk upload foto -->
        <label>Upload Foto Baru (opsional):</label>
        <input type='file' name='photo' accept='image/*'><br>

        <button type='submit' name='submit'>Update</button>
    </form>
    <a href='tampilkan_data.php' class='back-btn'>Kembali</a>
</div>";

$conn->close();
?>