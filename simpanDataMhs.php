<?php
include "koneksi.php";

/*
  Versi tahan banting:
  - Pastikan request method POST
  - Cek keberadaan setiap field sebelum pakai
  - Tangani checkbox hobi yang mungkin tidak dikirim
  - Escape input sebelum insert
*/

// pastikan halaman diakses lewat POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo "<p style='color:red;'>Akses salah. Silakan isi form dari <a href='tambahDataMhs.php'>tambahDataMhs.php</a>.</p>";
    exit;
}

// helper untuk ambil POST dengan default
function post($key, $default = '') {
    return isset($_POST[$key]) ? $_POST[$key] : $default;
}

// ambil data (cek keberadaan)
$nim          = post('nim');
$nama         = post('nama');
$tempatLahir  = post('tempatLahir');      // pastikan name di form = tempatLahir
$tglLahir     = post('tanggalLahir');     // pastikan name di form = tanggalLahir
$jmlSaudara   = post('jmlSaudara');
$alamat       = post('alamat');
$kota         = post('kota');
$jenisKelamin = post('jenisKelamin');     // pastikan name di form = jenisKelamin
$statusKeluarga = post('statusKeluarga'); // pastikan name di form = statusKeluarga

// hobi mungkin array (checkbox). aman-kan:
$hobi_raw = isset($_POST['hobi']) ? $_POST['hobi'] : array();
if (!is_array($hobi_raw)) {
    // bila tidak array (misalnya string) ubah jadi array atau kosong
    $hobi_raw = array();
}
$hobi = implode(", ", $hobi_raw);

// simple validation - lihat field yang kosong (bisa disesuaikan)
$missing = array();
if ($nim === '') $missing[] = 'nim';
if ($nama === '') $missing[] = 'nama';
if ($tempatLahir === '') $missing[] = 'tempatLahir';
if ($tglLahir === '') $missing[] = 'tanggalLahir';
if ($jmlSaudara === '') $missing[] = 'jmlSaudara';
if ($alamat === '') $missing[] = 'alamat';
if ($kota === '') $missing[] = 'kota';
if ($jenisKelamin === '') $missing[] = 'jenisKelamin';
if ($statusKeluarga === '') $missing[] = 'statusKeluarga';
if ($email = post('email') === '') $missing[] = 'email'; // optional, jika wajib

if (!empty($missing)) {
    echo "<p style='color:red;'>Field berikut belum terisi / tidak terkirim: <b>" . implode(", ", $missing) . "</b>.</p>";
    echo "<p>Pastikan kamu mengisi form melalui <a href='tambahDataMhs.php'>tambahDataMhs.php</a> dan nama field (name=\"...\") sesuai.</p>";
    exit;
}

// escape semua input sebelum insert
$nim_e          = mysqli_real_escape_string($koneksi, $nim);
$nama_e         = mysqli_real_escape_string($koneksi, $nama);
$tempatLahir_e  = mysqli_real_escape_string($koneksi, $tempatLahir);
$tglLahir_e     = mysqli_real_escape_string($koneksi, $tglLahir);
$jmlSaudara_e   = mysqli_real_escape_string($koneksi, $jmlSaudara);
$alamat_e       = mysqli_real_escape_string($koneksi, $alamat);
$kota_e         = mysqli_real_escape_string($koneksi, $kota);
$jenisKelamin_e = mysqli_real_escape_string($koneksi, $jenisKelamin);
$statusKeluarga_e = mysqli_real_escape_string($koneksi, $statusKeluarga);
$hobi_e         = mysqli_real_escape_string($koneksi, $hobi);
$email_e        = mysqli_real_escape_string($koneksi, post('email'));
$pass_e         = mysqli_real_escape_string($koneksi, post('pass'));

// pastikan INSERT ke tabel yang benar (mhs atau mhs2)
// -> ganti 'mhs2' jika tabelmu bernama 'mhs'
$sql = "INSERT INTO mhs2
    (nim, nama, tempatLahir, tglLahir, jmlSaudara, alamat, kota,
     jeniskelamin, statuskeluarga, hobi, email, pass)
    VALUES
    ('$nim_e', '$nama_e', '$tempatLahir_e', '$tglLahir_e', '$jmlSaudara_e',
     '$alamat_e', '$kota_e', '$jenisKelamin_e', '$statusKeluarga_e',
     '$hobi_e', '$email_e', '$pass_e')";

if (mysqli_query($koneksi, $sql)) {
    echo "<p style='color:green;'>Data berhasil disimpan.</p>";
    echo "<a href='tampilDataMhs.php'>Lihat Data</a>";
} else {
    echo "<p style='color:red;'>Gagal menyimpan: " . mysqli_error($koneksi) . "</p>";
    echo "<p>SQL yang dijalankan: <pre>$sql</pre></p>";
}
?>
