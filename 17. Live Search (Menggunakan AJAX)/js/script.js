// ambil elemen yang dibutuhkan menggunakan teknik penelusuran DOM
var keyword = document.getElementById('keyword');
var tombolCari = document.getElementById('tombol-cari');
var container = document.getElementById('container');

// tambahkan event ketika keyword ditulis
// keypress = ketika kita mengetik sesuatu didalam input
// keyup = ketika melepaskan tangan dari keyboard
keyword.addEventListener('keyup', function() {
    // buat object ajax
    var xhr = new XMLHttpRequest();

    // cek kesiapan ajax
    xhr.onreadystatechange = function() {
        // readystate nilainya 0-4 (4 itu artinya sumbernya sudah ready)
        // status 200 itu sumbernya ok / pasti ada
        if (xhr.readyState == 4 && xhr.status == 200) {
            // responsetext = berisi apapun isi dari sumbernya (coba.txt)
            // console.log(xhr.responseText);
            container.innerHTML = xhr.responseText;
        }
    }

    // ekseksusi ajax
    // parameter = (method, sumber datanya darimana, true = asynchronus false = synchronus )
    // xhr.open('GET', 'ajax/coba.txt', true);
    xhr.open('GET', 'ajax/mahasiswa.php?keyword=' + keyword.value, true);
    xhr.send();



});