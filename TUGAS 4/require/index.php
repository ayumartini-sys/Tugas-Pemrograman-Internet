<?php
require 'anjing.php'; // Menggunakan require untuk memasukkan file anjing.php
// Atau bisa menggunakan include
// include 'anjing.php';
echo "<h1>Jenis-Jenis Anjing</h1>";
echo "<ul>";
foreach ($anjing as $nama => $deskripsi) {
    echo "<li><strong>$nama</strong>: $deskripsi</li>";
}
echo "</ul>";
?>