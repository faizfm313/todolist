<?php
session_start();
session_unset();
session_destroy();
header("Location: proses_login.php?pesan=logout_berhasil");
exit();
?>