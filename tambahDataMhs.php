<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Input Data Mahasiswa</title>
</head>
<body>

<h2>Form Input Mahasiswa</h2>

<form action="simpanDataMhs.php" method="POST">

NIM: 
<input type="text" name="nim" required><br><br>

Nama: 
<input type="text" name="nama" required><br><br>

Tempat Lahir:
<input type="text" name="tempatLahir" required><br><br>

Tanggal Lahir:
<input type="date" name="tanggalLahir" required><br><br>

Jumlah Saudara:
<input type="number" name="jmlSaudara" required><br><br>

Alamat: <br>
<textarea name="alamat" rows="5" cols="50" required></textarea><br><br>

Kota:
<select name="kota" required>
    <option value="Semarang">Semarang</option>
    <option value="Solo">Solo</option>
    <option value="Brebes">Brebes</option>
    <option value="Kudus">Kudus</option>
    <option value="Demak">Demak</option>
    <option value="Salatiga">Salatiga</option>
</select>
<br><br>

Jenis Kelamin:
<input type="radio" name="jenisKelamin" value="L" required> Laki-laki
<input type="radio" name="jenisKelamin" value="P" required> Perempuan
<br><br>

Status Keluarga:
<input type="radio" name="statusKeluarga" value="K" required> Kawin
<input type="radio" name="statusKeluarga" value="B" required> Belum Kawin
<br><br>

Hobi:<br>
<input type="checkbox" name="hobi[]" value="Membaca"> Membaca<br>
<input type="checkbox" name="hobi[]" value="Olahraga"> Olahraga<br>
<input type="checkbox" name="hobi[]" value="Musik"> Musik<br>
<input type="checkbox" name="hobi[]" value="Traveling"> Traveling<br><br>

Email:
<input type="email" name="email" required><br><br>

Password:
<input type="password" name="pass" required><br><br>

<input type="submit" value="Simpan">
</form>

</body>
</html>
