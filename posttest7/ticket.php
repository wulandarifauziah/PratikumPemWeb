<?php
session_start();

// Cek untuk login dulu
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include 'koneksi.php';

$searchQuery = "";

if (isset($_POST['search'])) {
    $searchQuery = $_POST['search'];
}

if ($_SESSION['role'] === 'admin') {
    header("Location: admin_ticket.php");
    exit();
}

// Fungsi untuk menyoroti kata kunci yang dicari
function highlight_keyword($text, $keyword) {
    if ($keyword) {
        $escaped_keyword = preg_quote($keyword, '/');
        return preg_replace('/(' . $escaped_keyword . ')/i', '<span class="highlight">$1</span>', $text);
    }
    return $text;
}

// Query searching
if ($searchQuery != "") {
    $sql = "SELECT * FROM tickets WHERE title LIKE ? OR description LIKE ?";
    $searchKeyword = "%" . $searchQuery . "%";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $searchKeyword, $searchKeyword);
} else {
    $sql = "SELECT * FROM tickets";
    $stmt = $conn->prepare($sql);
}

$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Louvre Ticketing Service</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<style>
/* General styling */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

.wrapper {
    max-width: 1200px;
    width: 90%;
    margin: 0 auto;
}

header {
    background-color: #AAB396;
    color: white;
    padding: 20px;
}

.header-top {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
}

.header-top h1 {
    font-size: 40px;
    text-align: center;
    margin: 0 auto;
}


.logo {
    text-align: center;
    width: 240px;
    height: auto;
}

.header-links button {
    background-color: #F7EED3;
    color: #674636;
    border: none;
    padding: 10px;
    margin-top: 12px;
    border-radius: 5px;
    margin-left: 10px;
    cursor: pointer;
}

.header-banner {
    background-color: #f8f8f8;
    color: black;
    padding: 20px;
    border-radius: 5px;
    margin-top: 20px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
}

.header-banner a {
    text-decoration: none;
    color: #8ab330;
}

main {
    background-color: #e9dac3;
    padding: 20px;
}

.tickets h2 {
    color: #445645;
    text-align: center;
    margin-bottom: 30px;
}

.ticket-info a {
    color: #e9dac3;
    text-decoration: none;
    font-weight: bold;
}

.ticket-info a:hover {
    text-decoration: underline;
    color: #6e8a24;
}

.ticket-option {
    display: flex;
    align-items: center;
    background-color: #3C3D37;
    margin-bottom: 20px;
    border-radius: 5px;
    overflow: hidden;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    padding: 10px;
}

.ticket-option h3 {
    padding: 10px;
}

.ticket-option img {
    width: 150px;
    height: 150px;
    object-fit: cover;
    flex-shrink: 0;
    border-radius: 5px;
}

.ticket-info {
    padding: 15px;
    flex-grow: 1;
}

.ticket-info h3,
.ticket-info p {
    margin: 0;
    color: #ffffff;
}

.ticket-info h3 {
    margin: 0;
    color: #ffffff;
}

.ticket-info p {
    background-color: #3C3D37;
    color: #ECDFCC;
    font-size: 16px;
    padding: 10px;
    border-radius: 7px;
    margin: 5px 0 0;
}

.back-button {
    text-align: center;
    margin-top: 20px;
}

.back-button button {
    margin-right: rem;
    margin-bottom: 23px;
    background-color: #6e8a24;
    color: rgb(255, 255, 255);
    border: none;
    border-radius: 5px;
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.back-button button:hover {
    background-color: #6a9a25;
}

.search-container {
    text-align: center;
    margin-bottom: 20px;
}

.search-input {
    padding: 10px;
    width: 60%;
    border: 2px solid #AAB396;
    border-radius: 5px;
    font-size: 16px;
    outline: none;
}

.search-input:focus {
    border-color: #6e8a24;
}

.search-button {
    padding: 10px 15px;
    background-color: #6e8a24;
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    margin-left: 5px;
    transition: background-color 0.3s ease;
}

.search-button:hover {
    background-color: #5d761d;
}

.highlight {
    background-color: #6e8a24;
    color: black;
    font-weight: bold;
}

.ticket-info p {
    margin: 5px 0;
    color: #ECDFCC;
    font-size: 16px;
}

.ticket-info .buy-ticket {
    display: inline-block;
    margin-top: 10px;
    padding: 8px 12px;
    background-color: #6e8a24;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    font-weight: bold;
    font-size: 14px;
    transition: background-color 0.3s ease;
}

.ticket-info .buy-ticket:hover {
    background-color: blanchedalmond;
}


.action-buttons {
    display: flex;
    justify-content: flex-end;
    gap: 10px;
    margin-top: 15px;
}

.action-buttons a {
    color: #fff;
    background-color: #007bff;
    padding: 8px;
    text-decoration: none;
    border-radius: 5px;
    font-size: 16px;
    display: inline-block;
}

@media (max-width: 768px) {
    .wrapper {
        width: 100%;
        padding: 0 15px;
    }

    .back-button {
        margin-right: 30rem;
    }

    .header-top {
        flex-direction: column;
        align-items: flex;
    }

    .header-links {
        margin-top: 15px;
    }

    .ticket-option {
        flex-direction: column;
        text-align: center;
    }

    .ticket-option img {
        width: 100%;
        height: auto;
    }

    .ticket-info {
        padding: 15px;
    }

    .ticket-option img {
        width: 100%;
        height: auto;
    }
}

@media (max-width: 480px) {
    .header-top h1 {
        font-size: 1.5rem
    }

    .ticket-info p {
        font-size: 14px;
    }
}
</style>

<body>
    <div class="wrapper">
        <header>
            <?php if (isset($_SESSION['username'])): ?>
            <div style="text-align: left;">
                <span>Welcome, <?php echo $_SESSION['username']; ?>!</span>
            </div>
            <?php endif; ?>

            <div class="back-button">
                <button onclick="window.location.href='index.php';">
                    <i class="fas fa-arrow-left"></i> Kembali
                </button>
            </div>

            <div class="header-top">
                <img src="img/Logo.png" alt="Louvre Logo" class="logo" />
                <h1>Official Ticketing Service</h1>
                <div class="header-links">
                    <?php if (isset($_SESSION['user_id'])): ?>
                    <button onclick="window.location.href='logout.php'">Logout</button>
                    <?php else: ?>
                    <button onclick="window.location.href='login.php'">Login</button>
                    <button onclick="window.location.href='register.php'">Register</button>
                    <?php endif; ?>
                </div>
            </div>

            <div class="header-banner">
                <h2>Welcome to the Museum Lan's official online sales site</h2>
                <p>
                    Entry to the exhibitions
                    <strong>The Met at the Lan...</strong> is included with a museum admission ticket. To prepare
                    your visit, please consult
                    <a href="#">schedule of open rooms</a>.
                </p>
            </div>
        </header>

        <main>
            <div class="search-container">
                <input type="text" name="search" class="search-input" placeholder="Cari tiket..."
                    value="<?php echo htmlspecialchars($searchQuery); ?>">
            </div>

            <section class="tickets">
                <h2>Choose your ticket</h2>

                <?php
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
                }
                } else {
                echo '<p style="text-align:center;">Tidak ada tiket yang ditemukan.</p>';
                }
                ?>
            </section>
        </main>
    </div>

    <!-- untuk searching  -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.querySelector('.search-input');
        const resultsContainer = document.querySelector('.tickets');

        searchInput.addEventListener('input', function() {
            const query = searchInput.value;

            fetch('live_search.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: 'search=' + encodeURIComponent(query)
                })
                .then(response => response.text())
                .then(data => {
                    resultsContainer.innerHTML = data; // Update hasil searching
                })
                .catch(error => console.error('Error:', error));
        });
    });
    </script>
</body>

</html>