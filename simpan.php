


<?php
    if (!empty($_GET['halaman'])) {
        if ($_GET['halaman'] == 'home') {
        } else if ($_GET['halaman'] == 'todolist') {
            include "todolist/todolist.php";
        } else if ($_GET['halaman'] == 'tambah_todolist') {
            include "todolist/tambah_todolist.php";
        } else if ($_GET['halaman'] == 'edit_todolist') {
            include "todolist/edit_todolist.php";
        } else {
            echo "Halaman Tidak Ditemukan";
        }
    }
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome-free-6.6.0-web/css/all.min.css">

    <style>
        .container {
            padding: 25px;
            background: linear-gradient(to right, #232526, #414345);
            background-size: cover;
            background-position: center;
            filter:opacity(0.9);
            background-color: orange;
            border-radius: 50px;
            box-shadow: 0px 16px 64px rgba(44, 12, 1, 5);
            margin-top: 15px;
        }
        .header-text {
            text-align: center;
            color: green ;
        
        }
    
        
    </style>
</head>
<!-- navbar -->

<body class="home d-flex flex-column min-vh-100">
    <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container-fluid">
            <nav class="navbar bg-dark d-flex w-100">
            <a class="navbar-brand" href="#">TO DO</a>
                <form class="align-items-center">
                    
                    <a class="btn btn-outline-success me-2" type="button" href="index.php?halaman=home">HOME</a>
                    <a class="btn  btn-outline-success me-2" type="button" href="todolist.php?halaman=home">TODOLIST</a>
                </form>
            </nav>
            <a class="btn btn-danger " href="logout.php?halaman=home">Log Out</a>
        </div>
    </nav>
    <!-- end navbar -->
    <div class="container content">
        <div class="header-text">
            <h3>Selamat Datang di Aplikasi To Do List</h3>
            <p>Gunakan aplikasi ini untuk menjadwalkan rencana jangka pendek maupun jangka panjang Anda.</p>
            <p>Lihat perubahan yang terjadi!</p>
        </div>
    </div>
    <!--footer-->
    <footer class="my-footer mt-auto">
        <marquee>
            <address>JADIKAN HARI INI LEBIH BAIK DARI HARI SEBELUMNYA </address>
        </marquee>
    </footer>
    <!--end footer-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="./assets/js/bootstrap.min.js"></script>

</body>

</html>