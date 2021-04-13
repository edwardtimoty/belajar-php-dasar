<?php 
// memulai session
session_start();

// mengecek ada session atau tidak
// jika tidak ada session login maka kembalikan ke halaman login
if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

// menghubungkan ke function.php
require 'function.php';
$id = $_GET["id"];

if ( hapus($id) > 0 ) {
    echo "
			<script>
				alert('data berhasil dihapus');
				document.location.href = 'index.php';
			</script>
		";
	} else {
    echo "
        <script>
            alert('data gagal dihapus');
            document.location.href = 'index.php';
        </script>
    "; 
    }

?>