<?php
// Sertakan file koneksi.php agar bisa terhubung ke database
include 'koneksi.php';

// Cek apakah form sudah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Ambil dan sanitasi input dari form
    $fullName = isset($_POST['full_name']) ? trim($_POST['full_name']) : null;
    $email = isset($_POST['email']) ? trim($_POST['email']) : null;
    $age = isset($_POST['Age']) ? (int)$_POST['Age'] : null;
    $city = isset($_POST['City']) ? trim($_POST['City']) : null;
    $state = isset($_POST['state']) ? trim($_POST['state']) : null;
    $country = isset($_POST['country']) ? trim($_POST['country']) : null;
    $subscription_type = isset($_POST['subscription_type']) ? trim($_POST['subscription_type']) : null;
    $password = isset($_POST['password']) ? $_POST['password'] : null;

    // Validasi input yang diperlukan
    if (!$fullName || !$email || !$country || !$subscription_type || !$password) {
        die('Harap isi semua kolom yang wajib diisi.');
    }

    // Hash password sebelum disimpan
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Buat query dengan prepared statements untuk keamanan
    $sql = "INSERT INTO `join` (full_name, email, age, city, state, country, subscription_type, password) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    // Siapkan statement
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die('Prepare Error: ' . $conn->error);
    }

    // Bind parameter ke statement
    $stmt->bind_param("ssisssss", $fullName, $email, $age, $city, $state, $country, $subscription_type, $hashedPassword);

    // Eksekusi statement
    if ($stmt->execute()) {
        echo "Pendaftaran berhasil! Data Anda telah disimpan.";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Tutup statement dan koneksi
    $stmt->close();
    mysqli_close($conn);
}
?>