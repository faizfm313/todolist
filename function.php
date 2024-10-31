<?php
require 'connection.php';
//jika terdapat 'action' dan 'id' maka melakukan sesuatu
if (isset($_GET['action']) && isset($_GET['id'])) {
    $action = $_GET['action'];
    $id = $_GET['id'];

    switch ($action) {
        case 'delete':
            delete_data($id);
            break;
        case 'edit':
            echo "";
    }
} else {
    echo "Aksi dan ID tidak di definisikan!";
}



function delete_data($id)
{
    global $connection;
    $res = mysqli_query($connection, "DELETE FROM tb_kegiatan WHERE id = " . $id);

    if ($res) {
        //jika true
        header("Location: index.php?messages=Berhasil dihapus");
        exit();
    } else {
        //jika false
        header("Location: index.php?messages=Gagal dihapus");
        exit();
    }
}

function update($data)
{
    global $connection;

    $id = $data['id_kegiatan'];

    $nama_kegiatan = $connection->real_escape_string($data['txt_nama_kegiatan']);
    $tanggal = $data['txt_tanggal'];
    $waktu = $data['txt_waktu'];
    $status = $data['status'];

    //menformat tanggal
    $tanggal_baru = new DateTime($tanggal);
    $formatted_tanggal = $tanggal_baru->format('Y-m-d');

    $query = "UPDATE tb_kegiatan SET
    
        nama_kegiatan = '$nama_kegiatan', 
        tanggal = '$tanggal', 
        waktu = '$waktu'
        status ='$status',
        WHERE id = $id";

    if (mysqli_query($connection, $query)) {
        return mysqli_affected_rows($connection);
    }
}
