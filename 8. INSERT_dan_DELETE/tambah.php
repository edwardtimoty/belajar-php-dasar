<?php
require 'function.php';
// // koneksi ke DBMS
// $koneksi = mysqli_connect("localhost", "root", "", "phpdasar");

// mengecek apakah tombol submit sudah ditekan atau belum
if(isset( $_POST["submit"]) ) {
	// cek apakah data berhasil ditambah / tidak
	// if( mysqli_affected_rows($koneksi) > 0 ) {
	// 	echo "berhasil";
	// } else {
	// 	echo "gagal";
	// 	echo "<br>";
	// 	echo mysqli_error($koneksi);
	// }
	if( tambah($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil ditambahkan');
				document.location.href = 'index.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal ditambahkan');
				document.location.href = 'index.php';
			</script>
		";
	}

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Dasar | Halaman Tambah Data Mahasiswa</title>
</head>
<body>
    
    <h1>Tambah Data Mahasiswa</h1>
    <!-- POST = supaya ketika data dikirimkan tidak ada di URL -->
    <!-- action = ""  -> agar datanya dikirimkan ke form ini sendiri -->
    <form action="" method="POST">
        <ul>
            <li>
                <!-- for harus nyambung dengan id -->
                <label for="npm">NPM</label>
                <input type="text" name="npm" id="npm" required>
            </li>
            <li>
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama">
            </li>
            <li>
                <label for="email">Email</label>
                <input type="text" name="email" id="email">
            </li>
            <li>
                <label for="jurusan">Jurusan</label>
                <input type="text" name="jurusan" id="jurusan">
            </li>
            <li>
                <label for="gambar">Gambar</label>
                <input type="text" name="gambar" id="gambar">
            </li>
            <li>
                <button type="submit" name="submit">Tambah Data</button>
            </li>
        </ul>
    
    
    
    </form>

</body>
</html>