<?php
// Identitas
echo "<div style='font-size:14px; color:blue; margin-bottom:10px;'>
        NIM : A12.2024.07155 <br>
        Nama : Salsabila Bhany
      </div>";

// Koneksi database
$host = "localhost";
$user = "root";
$pass = "";
$db   = "universitas";

$koneksi = mysqli_connect($host, $user, $pass, $db);

// Cek koneksi
if(!$koneksi){
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
