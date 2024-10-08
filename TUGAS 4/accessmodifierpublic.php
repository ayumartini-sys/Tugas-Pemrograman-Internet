<?php
// Kelas BungaPublic dengan public access modifier
class BungaPublic {
    public $nama; // Atribut public bisa diakses dari mana saja

    public function __construct($nama) {
        $this->nama = $nama;
    }
}
// Contoh penggunaan
$bunga2 = new BungaPublic("Melati");
echo "Nama Bunga : " . $bunga2->nama . "<br>";
?>