<?php
// Sertakan file koneksi.php agar bisa terhubung ke database
include 'koneksi.php';

// Cek apakah form sudah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form dan sanitasi input
    $ID_pelanggan =  mysqli_real_escape_string($conn, $_POST['ID_pelanggan']);
    $fullName = mysqli_real_escape_string($conn, $_POST['full_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $age = mysqli_real_escape_string($conn, $_POST['Age']);
    $city = mysqli_real_escape_string($conn, $_POST['City']);
    $state = mysqli_real_escape_string($conn, $_POST['state']);
    $country = mysqli_real_escape_string($conn, $_POST['country']);
    $subscription_type = mysqli_real_escape_string($conn, $_POST['subscription_type']);
    
    // Hashing password sebelum disimpan
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Buat query untuk menyimpan data ke dalam tabel
    $query = "INSERT INTO `join` (ID_pelanggan, full_name, email, age, city, state, country, subscription_type, password) 
              VALUES ('$ID_pelanggan', '$fullName', '$email', " . ($age !== null ? "'$age'" : "NULL") . ", '$city', '$state', '$country', '$subscription_type', '$hashedPassword')";

    // Jalankan query
    if (mysqli_query($conn, $query)) {
        echo "Pendaftaran berhasil! Data Anda telah disimpan.";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    // Tutup koneksi
    mysqli_close($conn);
}
?>