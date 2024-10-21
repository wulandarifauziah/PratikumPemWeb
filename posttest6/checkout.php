<?php
session_start();
include 'koneksi.php';

if (!isset($_GET['ticket_id'])) {
    die('Tiket tidak ditemukan.');
}

// Dapatkan informasi tiket berdasarkan ID yang dikirim
$ticket_id = $_GET['ticket_id'];
$sql = "SELECT * FROM tickets WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $ticket_id);
$stmt->execute();
$result = $stmt->get_result();
$ticket = $result->fetch_assoc();

if (!$ticket) {
    die('Tiket tidak ditemukan.');
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    echo "<h2>Terima kasih, $name! Pesanan tiket untuk '{$ticket['title']}' berhasil!</h2>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - <?php echo $ticket['title']; ?></title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 600px;
        margin: 50px auto;
        padding: 20px;
        background-color: white;
        border-radius: 8px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
        text-align: center;
    }

    form {
        display: flex;
        flex-direction: column;
    }

    input[type="text"],
    input[type="email"] {
        padding: 10px;
        margin: 10px 0;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    button {
        padding: 12px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    button:hover {
        background-color: #45a049;
    }
    </style>
</head>

<body>
    <div class="container">
        <h2>Checkout Tiket: <?php echo $ticket['title']; ?></h2>
        <p><strong>Deskripsi:</strong> <?php echo $ticket['description']; ?></p>

        <form action="checkout.php?ticket_id=<?php echo $ticket['id']; ?>" method="POST">
            <label for="name">Nama Lengkap:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <button type="submit">Beli Tiket</button>
        </form>
    </div>
</body>

</html>