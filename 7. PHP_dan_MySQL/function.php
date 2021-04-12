<?php 

// Koneksi ke database
// (host, user, pass, database)
// default XAMPP user = root, pass = ""
$koneksi = mysqli_connect("localhost", "root", "", "phpdasar");

function query($query) {
    global $koneksi;
    $result = mysqli_query($koneksi, $query) ;
    $rows = [];
    while ( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }
    return $rows;
}


?>