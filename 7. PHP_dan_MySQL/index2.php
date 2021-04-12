<?php
// Koneksi ke database
// (host, user, pass, database)
// default XAMPP user = root, pass = ""
$koneksi = mysqli_connect("localhost", "root", "", "phpdasar");

// ambil data dari tabel mahasiswa / query data mahasiswa
$result = mysqli_query($koneksi, "SELECT * FROM mahasiswa");

// ammbil data (fetch) mahasiswa dari object result
// mysqli_fetch_row() = mengembalikan array numeric 
// mysqli_fetch_assoc() = mengembalikan array associative
// mysqli_fetch_array() = mengembalikan keduanya tapi datanya double
// mysqli_fetch_object()
// $mhs = mysqli_fetch_assoc($result);
// // jika salah maka tampilkan pesan error
// if (!$result) {
// 	echo mysqli_error();
// }
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

<h1>Daftar Mahasiswa</h1>
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
	<?php while ( $row = mysqli_fetch_assoc($result) ) : ?>
	<tr>
		<td><?= $i; ?></td>
		<td>
			<a href="">Ubah</a> |
			<a href="">Hapus</a>
		</td>
		<td><img src="img/<?= $row["gambar"]; ?>" alt="" width="50px"></td>
		<td><?= $row["npm"]; ?></td>
		<td><?= $row["nama"]; ?></td>
		<td><?= $row["email"]; ?></td>
		<td><?= $row["jurusan"]; ?></td>
	</tr>
	<?php $i++; ?>
	<?php endwhile; ?>
</table>
<!-- Akhir tabel -->



</body>
</html>