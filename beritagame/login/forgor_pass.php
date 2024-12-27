<?php
include '../assets/script/connection.php';

$error = false;
$success = false;

if (isset($_POST['reset_password'])) {
    $username = $_POST['username'];
    $result = mysqli_query($connection, "SELECT * FROM login WHERE username = '$username'");

    if (mysqli_num_rows($result) === 1) {
        session_start();
        $_SESSION['reset_user'] = $username;
        header("Location: reset_password.php");
        exit;
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
    <title>Lupa Password - Admin</title>
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
        h2 {
            margin-bottom: 20px; 
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
    <h2>Cari Username</h2>
    <?php if ($error): ?>
        <p style="color: red;">Username tidak ditemukan.</p>
    <?php endif; ?>
    <form action="" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required>
        <button type="submit" name="reset_password">Cari Akun</button>
    </form>
    </div>
</body>

</html>