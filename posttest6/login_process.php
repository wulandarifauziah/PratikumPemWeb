<?php
session_start();
include 'koneksi.php'; // Menghubungkan ke database

// Ambil data dari form login
$email = $_POST['email'];
$password = $_POST['password'];
$loginRole = $_POST['role']; // Role yang dipilih user saat login

// Langkah 1: Cek apakah pengguna ada di tabel `join`
$sql = "SELECT * FROM `join` WHERE email = ?";
$stmt = $conn->prepare($sql);

// Jika prepare() gagal, tampilkan pesan error
if ($stmt === false) {
    die('Error prepare: ' . $conn->error);
}

// Bind parameter email ke query
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Jika pengguna ditemukan di tabel `join`
    $user = $result->fetch_assoc();

    // Verifikasi password yang di-hash
    if (password_verify($password, $user['password'])) {
        // Cek apakah role yang dipilih saat login sesuai dengan role yang tersimpan di database
        if ($loginRole != 'user') {
            $_SESSION['login_error'] = 'Role Anda terdaftar sebagai User, silakan login dengan role User.';
            header("Location: login.php");
            exit();
        }
        
        // Set session untuk pengguna yang sudah berlangganan
        $_SESSION['user_id'] = $user['ID_pelanggan'];
        $_SESSION['username'] = $user['full_name'];
        $_SESSION['role'] = 'user'; // Set role default sebagai user untuk tabel join
        
        header("Location: ticket.php"); // Redirect ke halaman tiket
        exit();
    } else {
        // Jika password salah
        $_SESSION['login_error'] = 'Password salah.';
        header("Location: login.php");
        exit();
    }
} else {
    // Langkah 2: Jika pengguna tidak ditemukan di tabel `join`, cek di tabel `users`
    $sql = "SELECT * FROM `users` WHERE email = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die('Error prepare: ' . $conn->error);
    }

    // Bind parameter email ke query
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Jika pengguna ditemukan di tabel `users`
        $user = $result->fetch_assoc();

        // Verifikasi password dengan password_verify() karena password di-hash
        if (password_verify($password, $user['password'])) {
            // Cek apakah role yang dipilih saat login sesuai dengan role yang tersimpan di database
            if ($loginRole != $user['role']) {
                $_SESSION['login_error'] = 'Role Anda terdaftar sebagai ' . $user['role'] . ', silakan login dengan role yang benar.';
                header("Location: login.php");
                exit();
            }

            // Set session untuk pengguna dari tabel users
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];

            // Cek role apakah admin atau user
            if ($user['role'] == 'admin') {
                header("Location: admin_ticket.php"); // Redirect ke halaman admin
            } else {
                header("Location: ticket.php"); // Redirect ke halaman tiket user
            }
            exit();
        } else {
            // Jika password salah
            $_SESSION['login_error'] = 'Password salah.';
            header("Location: login.php");
            exit();
        }
    } else {
        // Jika pengguna tidak ditemukan di kedua tabel
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