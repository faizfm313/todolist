<?php
// Beberapa variable yang penting ada di connection
$hostname = 'localhost';
$user = 'root';
$password = '';
$db_name = 'db_todolist';

// Global variable connection
$connection = mysqli_connect($hostname, $user, $password, $db_name);

// Mengambil data (Fetching)
// mysqli_fetch_row() Ini yang biasa di pakai, Dipelajari
// mysqli_fetch_assoc()
// mysqli_fetch_array() Kemungkinan data double
// mysqli_fetch_object() Ini yang biasa di pakai

function myquery($query){
global $connection;
$res = mysqli_query($connection, $query);
$returns = [];

while( $data = mysqli_fetch_assoc($res) ){
    $returns[] = $data;
}

return $returns;
}



?>