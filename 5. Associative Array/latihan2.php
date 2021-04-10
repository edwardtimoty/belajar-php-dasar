<?php 
// $mahasiswa = [
//     ["Edward", "10416045", "Sistem Informasi"],
//     ["Timoty", "10416055", "Teknik Informatika"]
// ];
?>

<?php 
// Associative Array
// definisinya sama seperti array numerik kecuali keynya adalah string yang kita buat sendiri
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
    <title>PHP Dasar | Associative Array | Latihan 2</title>
    <style>
        ul li {
            list-style: none;
        }
    </style>
</head>
<body>
    <h1>Daftar Mahasiswa</h1>
    <?php foreach($mahasiswa as $mhs) : ?>
    <ul>
        <li>
            <img src="img/<?= $mhs["gambar"]; ?>" alt="">
        </li>
        <li>Nama : <?= $mhs["nama"]; ?></li>
        <li>NPM : <?= $mhs["npm"]; ?></li>
        <li>Jurusan : <?= $mhs["jurusan"]; ?></li>
    </ul>
    <?php endforeach; ?>
</body>
</html>