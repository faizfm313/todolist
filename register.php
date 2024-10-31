<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_todolist";

    // Koneksi ke database
    $connection = new mysqli($servername, $username, $password, $dbname);

    // Cek koneksi
    if ($connection->connect_error) {
        die("Koneksi gagal: " . $connection->connect_error);
    }

    // Ambil data dari form
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    // Query untuk menyimpan data ke database
    $sql = "INSERT INTO tb_user (fullname, username, email, password) VALUES ('$fullname', '$username', '$email', '$password')";

    if ($connection->query($sql) === TRUE) {
        echo "Registrasi berhasil!";
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampilan Register</title>
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
<div class="daftar">
    <div class="container register-container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="inidaftar card">
                    <div class="card-header text-center">
                        <h4>Registrasi</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            <div class="gformregist form-group">
                                <label for="fullname">Fullname</label>
                                <input type="text" name="fullname" class="cformregist form-control" placeholder="Enter fullname" required>
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" class="cformregist form-control" placeholder="Enter username" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="cformregist form-control" placeholder="Enter email" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="cformregist form-control" placeholder="Enter password" required>
                            </div>
                            <button type="submit" class="tombol btn btn-primary btn-block">Daftar</button>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <small>Sudah punya akun? <a href="proses_login.php">Masuk di sini</a></small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>