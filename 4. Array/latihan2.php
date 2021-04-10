<?php 
// Array Numeric = array yang indexnya angka yg dimulai dari 0
$mahasiswa = [
    ["Edward", "10416045", "Sistem Informasi", "edwardtimoty@gmail.com"],
    ["Timoty", "10416055", "Teknik Informatika", "timoty@gmail.com"]
];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Dasar | Array | Latihan 2</title>
</head>
<body>
<h1>Daftar Mahasiswa</h1>

<?php foreach($mahasiswa as $mhs) : ?>
<ul>
    <li>Nama :<?= $mhs[0]; ?></li>
    <li>NPM : <?= $mhs[1]; ?></li>
    <li>Jurusan : <?= $mhs[2]; ?></li>
    <li>Email : <?= $mhs[3]; ?></li>
</ul>
    <?php endforeach; ?>
</body>
</html>