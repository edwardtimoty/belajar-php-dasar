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
	// $gambar = htmlspecialchars($data["gambar"]);

    // upload gambar (fungsinya kalo berhasil gambar diupload dan akan dikirimkan nama gambar)
    $gambar = upload();
    if( !$gambar ) {
        return false;
    }


    // query insert data
	$query = "INSERT INTO mahasiswa
    VALUES
    ('', '$npm', '$nama', '$email', '$jurusan', '$gambar')
    ";

    mysqli_query($koneksi, $query); 

    return mysqli_affected_rows($koneksi);

}

function upload() {
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // cek apakah tidak ada gambar yang diupload
    // 4 = tidak ada gambar yang di upload  (pesan yang ditampilkan oleh error)
    if ($error === 4) {
        echo "<script>
                    alert('pilih gambar terlebih dahulu !');
              </script>";
        return false;
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
        echo "<script>
                    alert('yang anda upload bukan gambar !');
              </script>";
        return false;
    }

    // cek jika ukurannya terlalu besar
    // 1000000 dalam byte = 1mb
    if( $ukuranFile > 1000000 ) {
        echo "<script>
                    alert('ukuran gambar terlalu besar !');
              </script>";
        return false;
    }
    // generate nama gambar baru
    // uniqid = akan membangkitkan string / angka random 
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    // lolos pengecekan, gambar siap diupload
    // move_uploaded_file(filename, destination)
    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

    return $namaFileBaru;

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
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    // cek apakah user pilih gambar baru / tidak
    if ($_FILES['gambar']['error'] === 4 ) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }

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

function cari($keyword) {
    // % (wildcard) = akan mencari apapun keyword didepannya dan dibelakangnya
    $query = "SELECT * FROM mahasiswa WHERE nama LIKE '%$keyword%' OR
             npm LIKE '%$keyword%' OR
             email LIKE '%$keyword%' OR
             jurusan LIKE '%$keyword%'
             ";
    // memanggil function yang sudah dibuat didalam function baru
    return query($query);
}

function registrasi($data) {
    global $koneksi;
    // stripslashes = membersihkan / menghilagkan jika ada karakter \ (backslash)
    $username = strtolower( stripslashes($data["username"]) );
    // mysqli_real_escape_string() = untuk memungkinkan user memasukkan password ada tanda kutip dan dimasukkan ke database secara aman
    $password = mysqli_real_escape_string($koneksi,$data["password"]);
    $password2 = mysqli_real_escape_string($koneksi, $data["password2"]);

    // cek username sudah ada / belum
    $result = mysqli_query($koneksi, "SELECT username FROM user WHERE username = '$username'");

    if ( mysqli_fetch_assoc($result) ) {
        echo "<script>
                alert('username sudah terdaftar !');
              </script>";
        return false;
    }

    // cek konfirmasi password
    if($password !== $password2) {
        echo "<script>
                alert('konfirmasi password tidak sesuai');
             </script>";
        return false;
    }

    // enkripsi password
    // password_hash(password apa yg mau diacak, mengacaknya pake algoritma apa)
    $password = password_hash($password, PASSWORD_DEFAULT);
    
    // tambahkan user baru ke database
    mysqli_query($koneksi, "INSERT INTO user VALUES('', '$username', '$password')"); 
    
    return mysqli_affected_rows($koneksi);
}

?>