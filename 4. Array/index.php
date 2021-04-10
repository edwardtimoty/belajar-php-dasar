<?php 
// Array = variabel yang dapat memiliki banyak nilai
// elemen pada array boleh memiliki tipe data yang berbeda
// pasangan antara key dan value
// keynya adalah index, yang dimulai dari 0

// Membuat array
// Cara lama :
$hari = array("Senin", "Selasa", "Rabu");

// Cara baru :
$bulan = ["Januari", "Februari", "Maret"];
$arr = [123, "tulisan",false];
	
// menampilkan array
// var_dump() / print_r()
// echo "menampilkan menggunakan var_dump <br>";
// var_dump($bulan);
// echo "<br>";
// echo "menampilkan menggunakan print_r <br>";
// print_r($bulan);
// echo "<br>";

// menampilkan satu elemen pada array
// echo "menampilkansatu elemen menggunakan echo <br>";
// echo $arr[1];

// menambahkan elemen baru pada array
var_dump($hari);
$hari[] = "Kamis";
$hari[] = "Sabtu";
echo "<br>";
var_dump($hari);


?>