<?php
session_start();
include 'koneksi.php'; 

$searchQuery = "";
if (isset($_POST['search'])) {
    $searchQuery = $_POST['search'];
}

function highlight_keyword($text, $keyword) {
    if ($keyword) {
        $escaped_keyword = preg_quote($keyword, '/');
        return preg_replace('/(' . $escaped_keyword . ')/i', '<span class="highlight">$1</span>', $text);
    }
    return $text;
}

// Query searching
$sql = "SELECT * FROM tickets WHERE title LIKE ? OR description LIKE ?";
$stmt = $conn->prepare($sql);
$searchKeyword = "%" . $searchQuery . "%";
$stmt->bind_param("ss", $searchKeyword, $searchKeyword);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $highlighted_title = highlight_keyword($row['title'], $searchQuery);
        $highlighted_description = highlight_keyword($row['description'], $searchQuery);

        echo '<div class="ticket-option">';
        echo '<img src="img/' . $row['image'] . '" alt="' . $row['title'] . '">';
        echo '<div class="ticket-info">';
        echo '<h3>' . $highlighted_title . '</h3>';
        echo '<p>' . $highlighted_description . '</p>';
        echo '<a href="checkout.php?ticket_id=' . $row['id'] . '" class="buy-ticket">Beli Tiket</a>';
        echo '</div>';
        echo '</div>';

        if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
            echo '<div class="action-buttons">';
            echo '<a href="edit_ticket.php?id=' . $row['id'] . '" class="edit-button"><i class="fas fa-edit"></i></a>';
            echo '<a href="delete_ticket.php?id=' . $row['id'] . '" class="delete-button" onclick="return confirm(\'Apakah Anda yakin ingin menghapus tiket ini?\');"><i class="fas fa-trash-alt"></i></a>';
            echo '</div>';
        }
    }
} else {
    echo '<p style="text-align:center;">Tidak ada tiket yang ditemukan.</p>';
}

$stmt->close();
$conn->close();
?>