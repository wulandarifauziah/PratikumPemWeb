<?php
session_start(); // Memulai sesi
include 'koneksi.php'; // Menyertakan koneksi database

// Pastikan ID diambil dari permintaan POST
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];

    // Gunakan prepared statement untuk mencegah SQL Injection
    $sql = "DELETE FROM `join` WHERE ID_pelanggan = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id); // Bind parameter sebagai integer

    // Eksekusi query
    if ($stmt->execute()) {
        // Simpan pesan sukses ke sesi
        $_SESSION['message'] = "Record deleted successfully!";
        header("Location: tampilkan_data.php"); 
        exit();
    } else {
        // Simpan pesan error ke sesi
        $_SESSION['message'] = "Error deleting record: " . $stmt->error;
        header("Location: tampilkan_data.php"); 
        exit();
    }

    $stmt->close(); // Tutup statement
} else {
    $_SESSION['message'] = "ID tidak ditemukan!";
    header("Location: tampilkan_data.php");
}

$conn->close();
?>
