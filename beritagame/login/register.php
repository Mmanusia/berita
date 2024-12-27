<?php
include '../assets/script/connection.php';

if (isset($_POST["register"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $password_confirm = $_POST["password_confirm"];

    $result = mysqli_query($connection, "SELECT username FROM login WHERE username = '$username'");
    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('Username sudah terdaftar. Silakan gunakan username lain.');</script>";
    } elseif ($password !== $password_confirm) {
        echo "<script>alert('Konfirmasi password tidak sesuai!');</script>";
    } else {
        $password_hashed = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO login (username, password) VALUES ('$username', '$password_hashed')";

        if (mysqli_query($connection, $query)) {
            echo "<script>alert('User baru berhasil ditambahkan');</script>";
            header("Location: login.php");
        } else {
            echo "<script>alert('Gagal menambahkan user: ');</script>" . mysqli_error($connection);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Admin</title>
    <link rel="stylesheet" href="../assets/styles/style.css">
    <link rel="icon" href="../assets/img/logo.png" type="png">
    <script src="assets/script/script.js"></script>
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
        }

        .form_div {
            background: #fff;
            padding: 20px 30px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            max-width: 400px;
            width: 100%;
        }

        form table {
            width: 100%;
        }

        input[type="text"],
        input[type="password"],
        button {
            width: 100%;
            padding: 10px;
            margin-top: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
        }

        input[type="checkbox"] {
            margin-right: 10px;
        }

        button {
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        p {
            text-align: center;
            margin-top: 10px;
            color: red;
        }
    </style>
</head>

<body>
    <div class="form_div">
        <form action="" method="post">
            <table>
                <tr>
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" required>
                </tr>
                <tr>
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required>
                </tr>
                <tr>
                    <label for="password_confirm">Konfirmasi Password</label>
                    <input type="password" name="password_confirm" id="password_confirm" required>
                </tr>
                <tr>
                    <button type="submit" name="register">Register</button>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>