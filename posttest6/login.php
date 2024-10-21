<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
    /* Styling umum */
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #D8D2C2;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .container {
        background-color: #fff5e1;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        max-width: 400px;
        width: 100%;
    }

    h2 {
        text-align: center;
        color: #875c36;
        margin-bottom: 20px;
    }

    label {
        display: block;
        margin-bottom: 8px;
        color: #875c36;
        font-weight: bold;
    }

    input[type="email"],
    input[type="password"],
    select[name="role"] {
        width: 100%;
        padding: 12px;
        margin-bottom: 15px;
        border: 2px solid #e0c3a1;
        border-radius: 8px;
        background-color: #fffaf3;
        box-sizing: border-box;
        font-size: 14px;
        color: #875c36;
    }

    input[type="email"]:focus,
    input[type="password"]:focus,
    select[name="role"]:focus {
        border-color: #875c36;
        outline: none;
    }

    button {
        width: 100%;
        padding: 12px;
        background-color: #e0c3a1;
        color: white;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s ease;
    }

    button:hover {
        background-color: #c49b70;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .center {
        text-align: center;
    }

    /* Responsive Design */
    @media (max-width: 600px) {
        .container {
            padding: 20px;
        }
    }
    </style>
</head>

<body>

    <div class="container">
        <h2>Login</h2>

        <!-- Tampilkan pesan error jika ada -->
        <?php
        session_start();
        if (isset($_SESSION['login_error'])) {
            echo "<p class='error' style='color: red;'>{$_SESSION['login_error']}</p>";
            unset($_SESSION['login_error']); // Hapus pesan error setelah ditampilkan
        }
        ?>

        <form action="login_process.php" method="POST">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" placeholder="Masukkan email" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" placeholder="Masukkan password" required>
            </div>

            <div class="form-group">
                <label for="role">Login Sebagai:</label>
                <select name="role" id="role" required>
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
            </div>

            <button type="submit">Login</button>
        </form>

        <div class="center">
            <p>Belum punya akun? <a href="register.php" style="color: #c49b70;">Daftar di sini</a></p>
        </div>
    </div>

</body>

</html>