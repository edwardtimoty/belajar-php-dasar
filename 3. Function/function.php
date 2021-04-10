<?php 
// User-defined function
// sebuah function biasanya mengembalikan (boleh tidak mengembalikan nilai tapi biasanya mengembalikan nilai)

// ketika pada saat pemanggilan function tidak ada parameter yang dikirim maka yang digunakan parameter default jika ada parameter yang dikirim maka default diabaikan
// "Datang" parameter default waktu, "Admin" = parameter default nama
function Salam($waktu = "Datang", $nama = "Admin") {
    return "Selamat $waktu, $nama";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Dasar | Latihan Function</title>
</head>
<body>
    <h1><?php echo salam("Pagi", "Edward"); ?></h1>
</body>
</html>