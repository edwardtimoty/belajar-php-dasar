<?php
// Built in Function

// Date/Time
// date = untuk menampilkan tanggal dengan format tertentu
// hari, tanggal-bulan-tahun
    // echo date("l, d-M-Y");

// time
// UNIX Timestamp / EPOCH Time = detik yang sudah berlalu sejak 1 Januari 1970
// echo time();

// mengecek 2 hari kedepan
// echo date("l", time()+60*60*24*2);

// mktime = membuat sendiri detik (parameternya ada 6)
// jam, menit, detik, bulan, tanggal, tahun
// mktime(0,0,0,0,0,0)
// mengecek hari lahir kita
// echo date("l", mktime(0,0,0,2,28,1999));

// strtotime
// echo date("l",strtotime("28 feb 1999"));

// String 
// strlen() = untuk menghitung panjang sebuah string
// strcmp() = untuk membandingkan 2 buah string
// explode() = untuk memecah string menjadi array
// htmlspecialchars() = function khusus untuk menjaga kita dari orang yang masuk ke website kita / hacker

// Utility
// var_dump() = sebuah fungsi untuk mencetak isi dari sebuah variabel, array, objek
// isset() = untuk mengecek sebuah variabel udah dibuat atau belum dan menghasilkan nilai boolean
// empty() = untuk mengecek variabel yang ada itu ada isinya apa engga
// die() = untuk memberhentikan program kita
// sleep() = untuk memberhentikan sementara

?>