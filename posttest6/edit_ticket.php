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

    // Ambil data tiket berdasarkan ID
    $sql = "SELECT * FROM tickets WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $ticket_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $ticket = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Update data tiket
    $title = $_POST['title'];
    $description = $_POST['description'];
    $image = $ticket['image']; // Default gambar lama

    // Jika ada file gambar baru yang diupload
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $target_dir = "img/";
        $image = basename($_FILES["image"]["name"]);
        $target_file = $target_dir . $image;
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    }

    $sql = "UPDATE tickets SET title = ?, description = ?, image = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $title, $description, $image, $ticket_id);

    if ($stmt->execute()) {
        echo "<script>alert('Tiket berhasil diperbarui!'); window.location.href = 'ticket.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Tiket</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .container {
        background-color: #ffffff;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        max-width: 600px;
        width: 80%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    h1 {
        text-align: center;
        color: #445645;
        font-size: 24px;
        margin-bottom: 20px;
    }

    form {
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 100%;
    }

    label {
        margin-bottom: 8px;
        font-size: 16px;
        color: #333;
        text-align: left;
        width: 100%;
    }

    input[type="text"],
    input[type="file"] {
        padding: 10px;
        margin-bottom: 20px;
        border-radius: 5px;
        border: 1px solid #ccc;
        font-size: 16px;
        width: 100%;
    }

    button[type="submit"] {
        padding: 12px;
        background-color: #6e8a24;
        color: white;
        font-size: 16px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        width: 100%;
    }

    button[type="submit"]:hover {
        background-color: #5c7720;
    }

    img.preview {
        max-width: 100%;
        height: auto;
        border-radius: 5px;
        margin-bottom: 20px;
    }

    @media (max-width: 600px) {
        .container {
            padding: 20px;
        }
    }
    </style>
</head>

<body>
    <div class="container">
        <h1>Edit Tiket</h1>
        <form action="edit_ticket.php?id=<?php echo $ticket_id; ?>" method="POST" enctype="multipart/form-data">
            <label for="title">Judul Tiket:</label>
            <input type="text" name="title" value="<?php echo $ticket['title']; ?>" required>

            <label for="description">Deskripsi:</label>
            <input type="text" name="description" value="<?php echo $ticket['description']; ?>" required>

            <label for="image">Gambar Tiket:</label>
            <input type="file" name="image">

            <!-- Tampilkan gambar yang ada -->
            <?php if (!empty($ticket['image'])): ?>
            <img src="img/<?php echo $ticket['image']; ?>" alt="Preview" class="preview">
            <?php endif; ?>

            <button type="submit">Update Tiket</button>
        </form>
    </div>
</body>

</html>