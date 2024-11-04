<?php
include "connection.php";
session_start();
$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_todolist";

    // Koneksi ke database
    $connection = new mysqli($servername, $username, $password, $dbname);

    if ($connection->connect_error) {
        die("Koneksi gagal: " . $connection->connect_error);
    }

    // Ambil data dari form
    $username = $connection->real_escape_string($_POST['username']);
    $password = $_POST['password'];

    // Ambil data pengguna dari database
    $sql = "SELECT * FROM tb_user WHERE username='$username'";
    $hasil = mysqli_query($connection, $sql);

    if (mysqli_num_rows($hasil) > 0) {
        $baris = mysqli_fetch_array($hasil);


        if (password_verify($password, $baris['password'])) {
        
            $_SESSION['username'] = $baris['username'];
            $_SESSION['user_id'] = $baris['id'];
            $_SESSION['proses_login'] = true;
            header("Location: index.php?pesan=login_berhasil");
            exit();
        } else {
            header("Location: login.php?pesan=login_gagal");
            exit();
        }
    } else {
        echo "Data Tidak Ditemukan.";
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampilan Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="inilogin">
        <div class="container login-container">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="card1">
                        <div class="card-header text-center">
                            <h4>Login</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST">
                                <div class="gformlogin form-group">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" class="cformlogin form-control" placeholder="Enter username" required>
                                </div>
                                <div class="gformlogin form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="cformlogin form-control" placeholder="Password" required>
                                </div>
                                <button type="submit" class="tombol1 btn btn-primary btn-block">Login</button>
                            </form>
                        </div>
                        <div class="card-footer text-center">
                            <small>Belum punya akun? <a href="register.php">Daftar di sini</a></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>