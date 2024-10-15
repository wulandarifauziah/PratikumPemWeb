<?php
session_start(); 
include 'koneksi.php'; 
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];

    $sqlSelect = "SELECT photo FROM `join` WHERE ID_pelanggan = ?";
    $stmtSelect = $conn->prepare($sqlSelect);
    $stmtSelect->bind_param("i", $id);
    $stmtSelect->execute();
    $result = $stmtSelect->get_result();
    $row = $result->fetch_assoc();
    
    if ($row && !empty($row['photo'])) {
        $photoPath = $row['photo'];
        if (file_exists($photoPath)) {
            unlink($photoPath); 
        }
    }

    $stmtSelect->close();

    $sql = "DELETE FROM `join` WHERE ID_pelanggan = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id); 

    if ($stmt->execute()) {
        $_SESSION['message'] = "Record and associated photo deleted successfully!";
        header("Location: tampilkan_data.php"); 
        exit();
    } else {
        $_SESSION['message'] = "Error deleting record: " . $stmt->error;
        header("Location: tampilkan_data.php"); 
        exit();
    }

    $stmt->close(); 
} else {
    $_SESSION['message'] = "ID tidak ditemukan!";
    header("Location: tampilkan_data.php");
}

$conn->close();
?>
