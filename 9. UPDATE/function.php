<?php 

// Koneksi ke database
// (host, user, pass, database)
// default XAMPP user = root, pass = ""
$koneksi = mysqli_connect("localhost", "root", "", "phpdasar");

function query($query) {
    // membuat variabel koneksi diluar function menjadi global dan bisa dilihat dari dalam function
    global $koneksi;
    $result = mysqli_query($koneksi, $query) ;
    $rows = [];
    while ( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }
    return $rows;
}


function tambah($data) {
    global $koneksi;
    // ambil data dari tiap elemen dalam form
    // htmlspecialchars = untuk mencegah cross-site scripting
	$npm = htmlspecialchars($data["npm"]);
	$nama = htmlspecialchars($data["nama"]);
	$email = htmlspecialchars($data["email"]);
	$jurusan = htmlspecialchars($data["jurusan"]);
	$gambar = htmlspecialchars($data["gambar"]);

    // query insert data
	$query = "INSERT INTO mahasiswa
    VALUES
    ('', '$npm', '$nama', '$email', '$jurusan', '$gambar')
    ";

    mysqli_query($koneksi, $query); 

    return mysqli_affected_rows($koneksi);

}

function hapus($id) {
    global $koneksi;

    $query = "DELETE FROM mahasiswa where id = $id";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

function ubah($data) {
    global $koneksi;

    $id = $data["id"];
    $npm = htmlspecialchars($data["npm"]);
	$nama = htmlspecialchars($data["nama"]);
	$email = htmlspecialchars($data["email"]);
	$jurusan = htmlspecialchars($data["jurusan"]);
	$gambar = htmlspecialchars($data["gambar"]);

    // query insert data
	$query = "UPDATE mahasiswa SET
             npm = '$npm',
             nama = '$nama',
             email = '$email',
             jurusan = '$jurusan',
             gambar = '$gambar'
             WHERE id = $id
            ";

    mysqli_query($koneksi, $query); 

    return mysqli_affected_rows($koneksi);
}
?>