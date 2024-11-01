<?php
session_start();
if (isset($_POST["submit_insert_kegiatan"])) {
    include "connection.php";
    $user_id = $_SESSION['user_id'];
    $nama_kegiatan = $_POST['nama_kegiatan'];
    $tanggal = $_POST['tanggal'];
    $waktu = $_POST['waktu'];
    $status = $_POST['status'];

    $sql = "INSERT INTO tb_kegiatan (user_id, nama_kegiatan, tanggal, waktu, status)
            VALUES ('$user_id', '$nama_kegiatan', '$tanggal', '$waktu', '$status')";

if (mysqli_query($connection, $sql)) {
    header("Location: todolist.php?pesan=tambah_berhasil");
    exit(); 
} else {
    echo "Error: " . mysqli_error($connection);
    header("Location: todolist.php?pesan=tambah_gagal");
    exit(); 
}
}
?>


<?php
if (isset($_GET['pesan']) and $_GET['pesan'] == 'tambah_berhasil') {
?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Pesan!</strong> Tambah berhasil.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
} elseif (isset($_GET['pesan']) and $_GET['pesan'] == 'tambah_gagal') {
?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Pesan!</strong> Tambah gagal.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

    <?php
}
    ?>
    </div>



    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tambah Data</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
    </head>

    <!-- navbar -->

<body class="tambah d-flex flex-column min-vh-100">
<nav class="navbar navbar-expand-lg bg-dark">
        <div class="container-fluid">
        
            <nav class="navbar bg-dark d-flex w-100">
                <a class="navbar-brand" href="#">TO DO</a>
                <form class="align-items-center">
                    <a class="btn btn-outline-success me-2" type="button" href="index.php?halaman=home">HOME</a>
                    <a class="btn  btn-outline-success me-2" type="button" href="todolist.php?halaman=home">TODOLIST</a>
                    
                </form>
                <a class="btn btn-danger " href="logout.php?halaman=home">Log Out</a>
            </nav>
        </div>
    </nav>

    <!-- end navbar -->

        <!-- main -->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="mt-4 mb-2">Tambah Data</h3>
                    <a href="./todolist.php" class="d-block mb-4">Kembali</a>
                    <div class="card mb-4">
                        <div class="card-body">
                            <form method="POST">
                                <div class="mb-3">
                                    <label>Nama Kegiatan</label>
                                    <input type="text" name="nama_kegiatan" class="form-control" placeholder="Input nama kegiatan" autocomplete="off" required />
                                </div>
                                <div class="mb-3">
                                    <label>Tanggal</label>
                                    <input type="date" name="tanggal" class="form-control" placeholder="Pilih tanggal" required />
                                </div>
                                <div class="mb-3">
                                    <label for="txt_waktu">Waktu</label>
                                    <input type="time" name="waktu" class="form-control" placeholder="Pilih waktu" required />
                                </div>
                                <div class="mb-3">
                                    <label>Status</label>
                                    <select class="form-select" name="status">
                                        <option value="selesai">selesai</option>
                                        <option value="belum selesai">belum selesai</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <button class="btn btn-primary" name="submit_insert_kegiatan">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end main -->

        <!--footer-->
        <footer class="my-footer mt-auto">
            <marquee>
                <address>JADIKAN HARI INI LEBIH BAIK DARI HARI SEBELUMNYA </address>
            </marquee>
        </footer>
        <!--end footer-->


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>

    </html>