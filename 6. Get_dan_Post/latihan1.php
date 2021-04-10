<?php 
$mahasiswa = [
    [
        "nama" => "Edward",
        "npm"   => "10416045",
        "jurusan" => "Sistem Informasi",
        "gambar" => "tes.jpg"
    ],
    [
        "nama" => "Timoty",
        "npm"   => "10416055",
        "jurusan" => "Teknik Informatika",
        "gambar" => "tes.jpg"
        ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Dasar | GET</title>
</head>
<body>
<h1>Daftar Mahasiswa</h1>
<ul>
    <?php foreach($mahasiswa as $mhs) : ?>
        <li>
            <a href="latihan2.php?nama=<?= $mhs["nama"];?>&npm=<?= $mhs["npm"];?>&jurusan=<?= $mhs["jurusan"];?>&gambar=<?= $mhs["gambar"];?>"><?= $mhs["nama"]; ?></a>
        </li>
    <?php endforeach; ?>
</ul>
</body>
</html>