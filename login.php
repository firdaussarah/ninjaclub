<?php
require 'koneksi.php';

// Cek apakah pengguna sudah login

if (isset($_SESSION['id_user'])) {
    // Jika sudah login, langsung arahkan ke halaman admin
    header("Location: admin/index.php");
    exit(); // Pastikan berhenti setelah redirect
}

if (isset($_POST['btnLogin'])) {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    // Cek apakah username ada di database
    $checkUsername = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
    if ($data = mysqli_fetch_assoc($checkUsername)) {
        // Cocokkan password
        if ($password === $data['password']) {
            // Jika berhasil login, simpan data session
            $_SESSION['id_user'] = $data['id_user'];
            $_SESSION['username'] = $data['username'];

            // Redirect ke halaman admin
            header("Location: admin/index.php");
            exit();
        } else {
            // Jika password salah
            $_SESSION['error'] = "Password Salah!";
            header("Location: login.php");
            exit();
        }
    } else {
        // Jika username tidak terdaftar
        $_SESSION['error'] = "Username tidak terdaftar!";
        header("Location: login.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'assets/css/css.php'; ?>
    <title>Login Admin - Ninja Club Bogor</title>
    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/favicon.png" rel="apple-touch-icon">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            background-size: cover;
            background-repeat: no-repeat;
            background-image: url(assets/img/bglogin.jpg);
        }

        .container {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -55%);
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 mx-5 py-5 px-5 text-dark rounded border border-dark" style="background-color: rgba(204, 123, 123, 0.6);">
                <h3 class="text-center">Login Admin</h3>
                <?php
                if (isset($_SESSION['error'])) {
                    echo '<div class="alert alert-danger">' . $_SESSION['error'] . '</div>';
                    unset($_SESSION['error']);
                }
                ?>
                <form method="post">
                    <div class="form-group">
                        <label for="username"></i> Username</label>
                        <input required class="form-control rounded-pill" type="text" name="username" id="username">
                    </div>
                    <div class="form-group">
                        <label for="password"></i> Password</label>
                        <input required class="form-control rounded-pill" type="password" name="password" id="password">
                    </div>
                    <div class="form-group">
                        <!-- <a href="update_password.php">Forgot password?</a> -->
                    </div><br>
                    <div class="form-group text-center">
                        <button class="btn btn-dark rounded-pill shadow px-4 py-2 transition-all" type="submit" name="btnLogin">
                            <i class="fas fa-fw fa-sign-in-alt"></i> Login
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <footer style="position: absolute; bottom: 0; width: 100%; text-align: center;">
        <div style="background-color: transparent;" class="container-fluid mt-5">
            <div class="row justify-content-center">
                <div class="col-lg text-center text-white pt-4 pb-2">
                    <!-- Footer content here -->
                </div>
            </div>
        </div>
    </footer>
</body>

</html>