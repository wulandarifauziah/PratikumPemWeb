<?php
include 'koneksi.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role']; 

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sqlCheckJoin = "SELECT * FROM `join` WHERE email = ?";
    $stmtJoin = $conn->prepare($sqlCheckJoin);
    $stmtJoin->bind_param("s", $email);
    $stmtJoin->execute();
    $resultJoin = $stmtJoin->get_result();

    if ($resultJoin->num_rows > 0) {
        echo "<script>
                alert('Email sudah terdaftar di layanan berlangganan. Silakan login.');
                window.location.href = 'login.php'; // Arahkan ke halaman login
              </script>";
        exit();
    }

    $sqlCheckUsers = "SELECT * FROM `users` WHERE email = ?";
    $stmtUsers = $conn->prepare($sqlCheckUsers);
    $stmtUsers->bind_param("s", $email);
    $stmtUsers->execute();
    $resultUsers = $stmtUsers->get_result();

    if ($resultUsers->num_rows > 0) {
        echo "<script>
                alert('Email sudah digunakan untuk akun lain. Silakan gunakan email lain.');
                window.location.href = 'register.php'; // Kembali ke halaman registrasi
              </script>";
        exit();
    }

    $sql = "INSERT INTO `users` (username, email, password, role) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die('Error prepare: ' . $conn->error);
    }

    $stmt->bind_param("ssss", $username, $email, $hashedPassword, $role);

    if ($stmt->execute()) {
        echo "<script>
                alert('Registrasi berhasil! Silakan login.');
                window.location.href = 'login.php'; // Arahkan ke halaman login setelah registrasi
              </script>";
    } else {
        echo "Registrasi gagal, coba lagi.";
    }

    $stmt->close();
    $stmtJoin->close();
    $stmtUsers->close();
    $conn->close();
}
?>