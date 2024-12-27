<?php
// session_start();
$error = false;

if (isset($_COOKIE['login']) && isset($_COOKIE['key'])) {
    $key = $_COOKIE['key'];

    $result = mysqli_query($connection, "SELECT username FROM login WHERE username = '$key'");
    $row = mysqli_fetch_assoc($result);

    if ($key === $row['username']) {
        $_SESSION['login'] = true;
    }
}


if (isset($_SESSION["login"])) {
    header("Location: ../admin/list_news.php");
    exit;
}

include '../assets/script/connection.php';

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];


    $result = mysqli_query($connection, "SELECT * FROM login WHERE username = '$username'");

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        // Verifikasi password
        if (password_verify($password, $row["password"])) {
            $_SESSION["login"] = true;

            // cek remember me
            if (isset($_POST['remember'])) {
                // cookie
                setcookie('login', 'true', time() + 60);
                setcookie('key', $row['username'], time() + 60);
                //setcookie('login', 'true', time() + 20);

            }

            header("Location: ../admin/list_news.php");
            exit;
        }
    }
    $error = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Admin</title>
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
                    <label for="username">Username:</label>
                    <input type="text" name="username" id="username" required>
                </tr>
                <tr>
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" required>
                </tr>
                <tr>
                    <label for="remember">Remember Me:</label>
                    <input type="checkbox" name="remember" id="remember">
                </tr>
                <tr>
                    <button type="submit" name="login">Login</button>
                </tr>
                <tr>
                    <a href="register.php" style="color: blue;">daftar</a>
                    <br>
                    <a href="forgor_pass.php" style="color: blue;">Lupa password?</a>
                </tr>
                <?php if ($error): ?>
                    <p style="color: red;">Username atau password salah!</p>
                <?php endif; ?>
            </table>
        </form>
    </div>
</body>

</html>