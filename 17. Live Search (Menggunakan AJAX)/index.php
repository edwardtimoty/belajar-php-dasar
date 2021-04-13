<?php
// memulai session
session_start();

// mengecek ada session atau tidak
// jika tidak ada session login maka kembalikan ke halaman login
if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

// untuk memanggil / menghubungkan file function
require 'function.php';
// query data mahasiswa simpan dalam ke variabel mahasiswa dan jadi bentuk array
$mahasiswa = query("SELECT * FROM mahasiswa");

// ketika tombol cari ditekan
if ( isset($_POST["cari"]) ) {
	// $mahasiswa akan berisi data hasil pencarian dari function cari
	$mahasiswa = cari($_POST["keyword"]);
}


// ammbil data (fetch) mahasiswa dari object result
// mysqli_fetch_row() = mengembalikan array numeric 
// mysqli_fetch_assoc() = mengembalikan array associative
// mysqli_fetch_array() = mengembalikan keduanya tapi datanya double
// mysqli_fetch_object()
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Dasar | PHP & MySQL | Halaman Admin</title>
</head>
<body>
<a href="logout.php">Logout</a>
<h1>Daftar Mahasiswa</h1>

<a href="tambah.php">Tambah Data Mahasiswa</a>
<br><br>
<!-- Form Cari -->
<form action="" method="POST">
	<!-- autocomplete off = untuk menonaktifkan history pencarian -->
	<input type="text" name="keyword" size="30" autofocus placeholder="Masukkan Keyword Pencarian" autocomplete="off" id="keyword">
	<button type="submit" name="cari" id="tombol-cari">Cari</button>

</form>
<br>
<!-- Awal Container -->
<div id="container">
<!-- Tabel -->
<table border="1" cellpadding="10" cellspacing="0">
    
	<tr>
        <th>No.</th>
		<th>Aksi</th>
		<th>Gambar</th>
		<th>NPM</th>
		<th>Nama</th>
		<th>Email</th>
		<th>Jurusan</th>
    </tr>

	<?php $i = 1; ?>
	<!-- untuk looping array dan menampilkan datanya -->
	<?php foreach( $mahasiswa as $mhs ) : ?>
	<tr>
		<td><?= $i; ?></td>
		<td>
			<a href="ubah.php?id=<?= $mhs["id"]; ?>">Ubah</a> |
			<a href="hapus.php?id=<?= $mhs["id"]; ?>" onclick="return confirm('apakah anda yakin ?');">Hapus</a>
		</td>
		<td><img src="img/<?= $mhs["gambar"]; ?>" alt="" width="50px"></td>
		<td><?= $mhs["npm"]; ?></td>
		<td><?= $mhs["nama"]; ?></td>
		<td><?= $mhs["email"]; ?></td>
		<td><?= $mhs["jurusan"]; ?></td>
	</tr>
	<?php $i++; ?>
	<?php endforeach; ?>
</table>
<!-- Akhir tabel -->
</div>
<!-- akhir container -->

<script src="js/script.js"></script>
</body>
</html>