<?php session_start(); ?>

<?php
if (isset($_GET['pesan']) and $_GET['pesan'] == 'hapus beerhasil') {
    //code
?>
    <div class="alert alert-succes alert-dismissible fade show mt-2" role="alert">
        <strong>pesan!</strong> hapus berhasil.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
    </div>
<?php
} elseif (isset($_GET['pesan']) and $_GET['pesan'] == 'hapus gagal') {
?>
    <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
        <strong>pesan!</strong> hapus gagal!. tidak ada perubahan!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
    </div>
<?php
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List</title>
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>


<!-- navbar -->

<body class="todolist d-flex flex-column min-vh-100">
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

    <!-- Main -->
    <div class="container-fluid">
        <h3 class="judul mt-4 mb-2">To Do List</h3>
        <a href="tambah_todolist.php">
            <button type="button" class="tombol2 btn btn-primary">Tambah</button>
        </a>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Kegiatan</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Waktu</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "connection.php";
                //hapus
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $sql = "DELETE FROM tb_kegiatan WHERE id='$id'";
                    mysqli_query($connection, $sql);
                    if (mysqli_affected_rows($connection) > 0) {
                        header("location:?halaman=todolist&pesan=hapus_berhasil");
                    } else {
                        header("location:?halaman=todolist&pesan=hapus_gagal");
                    }
                }

                //baca
                $sql = "SELECT * FROM tb_kegiatan WHERE user_id=" . $_SESSION['user_id'];
                $tabel = mysqli_query($connection, $sql);
                $no = 0;
                while ($baris = mysqli_fetch_array($tabel)) {
                ?>
                    <tr>
                        <th scope="row"><?php echo ++$no; ?></th>
                        <td><?php echo $baris['nama_kegiatan']; ?></td>
                        <td><?php echo $baris['tanggal']; ?></td>
                        <td><?php echo $baris['waktu']; ?></td>
                        <td><?php echo $baris['status']; ?></td>
                        <td>
                            <a href="edit_todolist.php?id=<?= $baris['id'] ?>">
                                <button class="btn btn-warning">Edit</button>
                            </a>
                            <a onclick="return confirm('Apakah kamu yakin?');" href="function.php?action=delete&id=<?= $baris['id'] ?>">
                                <button class="btn btn-danger">Delete</button>
                            </a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <!-- End Main -->

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