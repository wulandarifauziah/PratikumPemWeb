<?php
session_start();

// Periksa apakah pengguna sudah login dan role-nya admin
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php"); // Jika bukan admin, redirect ke halaman login
    exit();
}

include 'koneksi.php'; // Koneksi ke database

// Proses penghapusan tiket
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $sql_delete = "DELETE FROM tickets WHERE id = ?";
    $stmt_delete = $conn->prepare($sql_delete);
    $stmt_delete->bind_param("i", $delete_id);
    
    if ($stmt_delete->execute()) {
        echo "<script>alert('Tiket berhasil dihapus.'); window.location.href='admin_ticket.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus tiket.');</script>";
    }
    $stmt_delete->close();
}

// Menambahkan tiket baru
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_ticket'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name']; // Nama file gambar

    // Upload gambar
    if ($image) {
        $target_dir = "img/";
        $target_file = $target_dir . basename($image);
        move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
    }

    // Insert tiket baru ke dalam database
    $sql_insert = "INSERT INTO tickets (title, description, image) VALUES (?, ?, ?)";
    $stmt_insert = $conn->prepare($sql_insert);
    $stmt_insert->bind_param("sss", $title, $description, $image);
    
    if ($stmt_insert->execute()) {
        echo "<script>alert('Tiket berhasil ditambahkan.'); window.location.href='admin_ticket.php';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan tiket.');</script>";
    }
    $stmt_insert->close();
}

// Mendapatkan semua tiket
$sql = "SELECT * FROM tickets";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Ticket Management</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
    @font-face {
        font-family: "QESTERO";
        src: url("QESTERO-Regular.ttf") format("truetype");
    }

    body {
        background-color: #f4f4f4;
        margin: 0;
        padding: 20px;
    }

    .container {
        max-width: 900px;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
        font-family: "QESTERO", serif;
        letter-spacing: 2px;
        text-align: center;
    }

    .add-ticket-form,
    .ticket-list {
        margin-top: 30px;
    }

    .add-ticket-form input[type="text"],
    .add-ticket-form textarea {
        width: 96%;
        margin-right: 10px;
        padding: 10px;
        margin-bottom: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
    }

    .add-ticket-form input[type="file"] {
        margin-bottom: 10px;
    }

    .add-ticket-form button {
        padding: 10px 20px;
        background-color: #6e8a24;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .add-ticket-form button:hover {
        background-color: #5c7720;
    }

    .ticket-list table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .ticket-list th,
    .ticket-list td {
        padding: 10px;
        border: 1px solid #ddd;
        text-align: center;
    }

    .ticket-list th {
        background-color: #6e8a24;
        color: white;
    }

    .ticket-list img {
        width: 100px;
        height: auto;
    }

    .ticket-list .edit,
    .ticket-list .delete {
        display: inline-block;
        margin: right 20px;
        margin-bottom: 5px;
        color: white;
        padding: 5px 10px;
        text-decoration: none;
        border-radius: 5px;
    }

    .ticket-list .edit {

        background-color: #f39c12;
        color: white;
    }

    .ticket-list .delete {
        background-color: #e74c3c;
        color: white;
    }
    </style>

</head>

<body>
    <div class="container">
        <h2>Admin Ticket Management</h2>

        <!-- Form untuk menambahkan tiket baru -->
        <div class="add-ticket-form">
            <h3>Tambah Tiket Baru</h3>
            <form action="admin_ticket.php" method="POST" enctype="multipart/form-data">
                <input type="text" name="title" placeholder="Judul Tiket" required>
                <textarea name="description" placeholder="Deskripsi Tiket" rows="4" required></textarea>
                <input type="file" name="image" accept="image/*" required>
                <button type="submit" name="add_ticket">Tambah Tiket</button>
            </form>
        </div>

        <!-- Daftar semua tiket -->
        <div class="ticket-list">
            <h3>Daftar Tiket</h3>
            <table>
                <thead>
                    <tr>
                        <th>Gambar</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td><img src='img/" . $row['image'] . "' alt='" . $row['title'] . "'></td>";
                            echo "<td>" . $row['title'] . "</td>";
                            echo "<td>" . $row['description'] . "</td>";
                            echo "<td>
                                    <a href='edit_ticket.php?id=" . $row['id'] . "' class='edit'><i class='fas fa-edit'></i> Edit</a>
                                    <a href='admin_ticket.php?delete_id=" . $row['id'] . "' class='delete' onclick='return confirm(\"Apakah Anda yakin ingin menghapus tiket ini?\");'><i class='fas fa-trash'></i> Hapus</a>
                                  </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>Tidak ada tiket yang ditemukan.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>

<?php
$conn->close();
?>