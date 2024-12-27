<?php
session_start();
include '../assets/script/connection.php';

if (!isset($_SESSION['reset_user'])) {
    header("Location: forgot_password.php");
    exit;
}

$error = false;
$success = false;

if (isset($_POST['change_password'])) {
    $new_password = $_POST['new_password'];
    $new_password_confirm = $_POST['new_password_confirm'];

    if ($new_password === $new_password_confirm) {
        $username = $_SESSION['reset_user'];
        $new_password_hashed = password_hash($new_password, PASSWORD_DEFAULT);

        $query = "UPDATE login SET password = '$new_password_hashed' WHERE username = '$username'";
        if (mysqli_query($connection, $query)) {
            $success = true;
            unset($_SESSION['reset_user']);
        } else {
            echo "<script>alert('Gagal mengganti password.');</script>";
        }
    } else {
        $error = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - Admin</title>
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
        <h2>Ganti Password Baru</h2>
        <?php if ($error): ?>
            <p style="color: red;">Konfirmasi password tidak sesuai.</p>
        <?php endif; ?>
        <?php if ($success): ?>
            <p style="color: green;">Password berhasil diganti.</p>
            <a style="text-align: center; color:blue" href="login.php">Login</a>
        <?php else: ?>
            <form action="" method="post">
                <label for="new_password">Password Baru:</label>
                <input type="password" name="new_password" id="new_password" required>
                <br>
                <label for="new_password_confirm">Konfirmasi Password Baru:</label>
                <input type="password" name="new_password_confirm" id="new_password_confirm" required>
                <br>
                <button type="submit" name="change_password">Ganti Password</button>
            </form>
        <?php endif; ?>
    </div>
</body>

</html>