<?php
include 'koneksi.php'; // Menghubungkan ke database

// Tampilkan error untuk debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Cek apakah data sudah dikirim melalui metode POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form registrasi
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role']; // Ambil data role dari form (admin atau user)

    // Hash password sebelum menyimpannya ke database untuk keamanan
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Langkah 1: Cek apakah email sudah terdaftar di tabel `join`
    $sqlCheckJoin = "SELECT * FROM `join` WHERE email = ?";
    $stmtJoin = $conn->prepare($sqlCheckJoin);
    $stmtJoin->bind_param("s", $email);
    $stmtJoin->execute();
    $resultJoin = $stmtJoin->get_result();

    if ($resultJoin->num_rows > 0) {
        // Jika email sudah ada di tabel `join`, arahkan ke halaman login
        echo "<script>
                alert('Email sudah terdaftar di layanan berlangganan. Silakan login.');
                window.location.href = 'login.php'; // Arahkan ke halaman login
              </script>";
        exit();
    }

    // Langkah 2: Cek apakah email sudah terdaftar di tabel `users`
    $sqlCheckUsers = "SELECT * FROM `users` WHERE email = ?";
    $stmtUsers = $conn->prepare($sqlCheckUsers);
    $stmtUsers->bind_param("s", $email);
    $stmtUsers->execute();
    $resultUsers = $stmtUsers->get_result();

    if ($resultUsers->num_rows > 0) {
        // Jika email sudah ada di tabel `users`, tolak registrasi
        echo "<script>
                alert('Email sudah digunakan untuk akun lain. Silakan gunakan email lain.');
                window.location.href = 'register.php'; // Kembali ke halaman registrasi
              </script>";
        exit();
    }

    // Jika email belum digunakan, lakukan proses registrasi
    $sql = "INSERT INTO `users` (username, email, password, role) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die('Error prepare: ' . $conn->error);
    }

    // Bind parameter yang akan dimasukkan ke dalam tabel
    $stmt->bind_param("ssss", $username, $email, $hashedPassword, $role);

    // Eksekusi query untuk menyimpan data
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