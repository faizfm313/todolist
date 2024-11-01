<?php
include "connection.php";

if (isset($_POST["ubah"])) {
    $nama_kegiatan = $_POST['txt_nama_kegiatan'];
    $tanggal = $_POST['txt_tanggal'];
    $waktu = $_POST['txt_waktu'];
    $status = $_POST['status'];
    $id_kegiatan = $_POST['id_kegiatan'];

    $sql = "UPDATE tb_kegiatan SET
            nama_kegiatan='$nama_kegiatan',
            tanggal='$tanggal',
            waktu='$waktu',
            status='$status'
            WHERE id='$id_kegiatan'";

    if (mysqli_query($connection, $sql)) {
        header("location:?halaman=edit_todolist&pesan=edit_berhasil&id=$id_kegiatan");
    } else {
        header("location:?halaman=edit_todolist&pesan=edit_gagal&id=$id_kegiatan");
    }
}

$id = isset($_GET['id']) ? $_GET['id'] : null;

if ($id === null) {
    echo "ID tidak ditemukan. Pastikan URL menyertakan parameter 'id'.";
    exit;
}

$sql = "SELECT * FROM tb_kegiatan WHERE id='$id'";
$hasil = mysqli_query($connection, $sql);

if (mysqli_num_rows($hasil) == 0) {
    echo "Data tidak ditemukan.";
    exit;
}

$baris = mysqli_fetch_array($hasil);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<!-- navbar -->

<body class="edit d-flex flex-column min-vh-100">
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

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="mt-4 mb-2">Edit Data</h3>
                <a href="./todolist.php" class="d-block mb-4">Kembali</a>


                <?php
                if (isset($_GET['pesan']) && $_GET['pesan'] == 'edit_berhasil') {
                ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Pesan!</strong> Edit berhasil.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php
                } elseif (isset($_GET['pesan']) && $_GET['pesan'] == 'edit_gagal') {
                ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Pesan!</strong> Edit gagal. Tidak ada perubahan!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php
                }
                ?>


                <div class="card mb-4">
                    <div class="card-body">
                        <form method="POST">
                            <input type="hidden" name="id_kegiatan" value="<?php echo $baris['id']; ?>">
                            <div class="mb-3">
                                <label>Nama Kegiatan</label>
                                <input type="text" name="txt_nama_kegiatan" class="form-control" placeholder="Input nama kegiatan" value="<?php echo $baris['nama_kegiatan']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label>Tanggal</label>
                                <input type="date" name="txt_tanggal" class="form-control" value="<?php echo $baris['tanggal']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label>Waktu</label>
                                <input type="time" name="txt_waktu" class="form-control" value="<?php echo $baris['waktu']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label>Status</label>
                                <select name="status" class="form-select" required>
                                    <option value="belum selesai" <?php echo $baris['status'] == 'belum selesai' ? "selected" : ""; ?>>Belum Selesai</option>
                                    <option value="selesai" <?php echo $baris['status'] == 'selesai' ? "selected" : ""; ?>>Selesai</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary" name="ubah">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--footer-->
    <footer class="my-footer mt-auto">
        <marquee>
            <address>JADIKAN HARI INI LEBIH BAIK DARI HARI SEBELUMNYA </address>
        </marquee>
    </footer>
    <!--end footer-->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>