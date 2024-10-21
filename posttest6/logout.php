<?php
session_start();
session_unset(); // Hapus semua session
session_destroy(); // Hancurkan sesi
header("Location: ticket.php"); // Redirect ke halaman utama
exit();
?>