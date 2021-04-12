<?php
// menghubungkan ke function.php
require 'function.php';

// ambil data di URL
$id = $_GET["id"];

// query data mahasiswa berdasarkan id
$mhs = query("SELECT * FROM mahasiswa where id = $id")[0];



// mengecek apakah tombol submit sudah ditekan atau belum
if(isset( $_POST["submit"]) ) {
	// cek apakah data berhasil diubah / tidak
	if( ubah($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil diubah');
				document.location.href = 'index.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal diubah');
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
    <title>PHP Dasar | Halaman Ubah Data Mahasiswa</title>
</head>
<body>
    
    <h1>Ubah Data Mahasiswa</h1>
    <!-- POST = supaya ketika data dikirimkan tidak ada di URL -->
    <!-- action = ""  -> agar datanya dikirimkan ke form ini sendiri -->
    <form action="" method="POST">
        <!-- untuk menerima id tapi tipenya hidden / tidak terlihat -->
        <input type="hidden" name="id" value="<?= $mhs["id"]; ?>"> 
        <ul>
            <li>
                <!-- for harus nyambung dengan id -->
                <label for="npm">NPM</label>
                <input type="text" name="npm" id="npm" required value="<?= $mhs["npm"]; ?>">
            </li>
            <li>
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" required value="<?= $mhs["nama"]; ?>">
            </li>
            <li>
                <label for="email">Email</label>
                <input type="text" name="email" id="email" required value="<?= $mhs["email"]; ?>">
            </li>
            <li>
                <label for="jurusan">Jurusan</label>
                <input type="text" name="jurusan" id="jurusan" required value="<?= $mhs["jurusan"]; ?>">
            </li>
            <li>
                <label for="gambar">Gambar</label>
                <input type="text" name="gambar" id="gambar" value="<?= $mhs["gambar"]; ?>">
            </li>
            <li>
                <button type="submit" name="submit">Ubah Data</button>
            </li>
        </ul>
    
    
    
    </form>

</body>
</html>