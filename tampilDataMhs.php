<?php 
include "koneksi.php"; 
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
</head>
<body>

<h2>Data Mahasiswa</h2>

<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>NIM</th>
        <th>Nama</th>
        <th>Tempat Lahir</th>
        <th>Tanggal Lahir</th>
        <th>Jumlah Saudara</th>
        <th>Alamat</th>
        <th>Kota</th>
        <th>Jenis Kelamin</th>
        <th>Status Keluarga</th>
        <th>Hobi</th>
        <th>Email</th>
    </tr>

<?php  
$data = mysqli_query($koneksi, "SELECT * FROM mhs2");

while ($row = mysqli_fetch_assoc($data)) {
    echo "<tr>
        <td>{$row['id']}</td>
        <td>{$row['nim']}</td>
        <td>{$row['nama']}</td>
        <td>{$row['tempatLahir']}</td>
        <td>{$row['tglLahir']}</td>
        <td>{$row['jmlSaudara']}</td>
        <td>{$row['alamat']}</td>
        <td>{$row['kota']}</td>
        <td>{$row['jeniskelamin']}</td>
        <td>{$row['statuskeluarga']}</td>
        <td>{$row['hobi']}</td>
        <td>{$row['email']}</td>
    </tr>";
}
?>

</table>

</body>
</html>
