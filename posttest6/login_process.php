<?php
session_start();
include 'koneksi.php'; 

// Ambil data dari form login
$email = $_POST['email'];
$password = $_POST['password'];
$loginRole = $_POST['role']; 

//  Cek apakah pengguna ada di tabel `join`
$sql = "SELECT * FROM `join` WHERE email = ?";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die('Error prepare: ' . $conn->error);
}

$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();

    if (password_verify($password, $user['password'])) {
        if ($loginRole != 'user') {
            $_SESSION['login_error'] = 'Role Anda terdaftar sebagai User, silakan login dengan role User.';
            header("Location: login.php");
            exit();
        }
        
        $_SESSION['user_id'] = $user['ID_pelanggan'];
        $_SESSION['username'] = $user['full_name'];
        $_SESSION['role'] = 'user'; 
        
        header("Location: ticket.php"); 
        exit();
    } else {
        $_SESSION['login_error'] = 'Password salah.';
        header("Location: login.php");
        exit();
    }
} else {
    // cek di tabel users
    $sql = "SELECT * FROM `users` WHERE email = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die('Error prepare: ' . $conn->error);
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            if ($loginRole != $user['role']) {
                $_SESSION['login_error'] = 'Role Anda terdaftar sebagai ' . $user['role'] . ', silakan login dengan role yang benar.';
                header("Location: login.php");
                exit();
            }

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];

            // Cek role apakah admin atau user
            if ($user['role'] == 'admin') {
                header("Location: admin_ticket.php");
            } else {
                header("Location: ticket.php"); 
            }
            exit();
        } else {
            $_SESSION['login_error'] = 'Password salah.';
            header("Location: login.php");
            exit();
        }
    } else {
        echo "<script>
                alert('Pengguna tidak ditemukan. Silakan registrasi terlebih dahulu.');
                window.location.href = 'register.php'; // Arahkan ke halaman registrasi
              </script>";
        exit();
    }
}

$stmt->close();
$conn->close();
?>