<?php
$servername = "localhost";
$username = "root";  
$password = "";  
$dbname = "daftar_kunjungan";  

// Membuat koneksi
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Cek koneksi
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
