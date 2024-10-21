<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <style>
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

    input[type="text"],
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

    input[type="text"]:focus,
    input[type="email"]:focus,
    input[type="password"]:focus {
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

    @media (max-width: 600px) {
        .container {
            padding: 20px;
        }
    }
    </style>
</head>

<body>
    <div class="container">
        <h2>Form Registrasi</h2>
        <!-- Form registrasi mengirim data ke register_process.php -->
        <form action="register_process.php" method="POST">
            <div class="form-group">
                <label for="username">Nama Lengkap:</label>
                <input type="text" name="username" id="username" placeholder="Masukkan nama lengkap" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" placeholder="Masukkan email" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" placeholder="Masukkan password" required>
            </div>

            <div class="form-group">
                <label for="role">Daftar Sebagai:</label>
                <select name="role" id="role" required>
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
            </div>

            <button type="submit">Daftar</button>
        </form>
    </div>
</body>

</html>