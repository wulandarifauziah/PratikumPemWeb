<?php
session_start();
include 'koneksi.php';

// Cek apakah pengguna memiliki akses admin
if ($_SESSION['role'] != 'admin') {
    header("Location: ticket.php");
    exit();
}

if (isset($_GET['id'])) {
    $ticket_id = $_GET['id'];

    // Hapus tiket dari database
    $sql = "DELETE FROM tickets WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $ticket_id);

    if ($stmt->execute()) {
        echo "<script>alert('Tiket berhasil dihapus!'); window.location.href = 'ticket.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>