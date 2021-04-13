<?php 
require '../function.php';
// keyword ini dapat dari ajax yang sudah dikirimkan kesini
$keyword = $_GET["keyword"];

$query = "SELECT * FROM mahasiswa WHERE 
            nama LIKE '%$keyword%' OR
            npm LIKE '%$keyword%' OR
            email LIKE '%$keyword%' OR
            jurusan LIKE '%$keyword%'
            ";
$mahasiswa = query($query);

?>

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