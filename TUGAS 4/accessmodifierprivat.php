<?php
// Kelas Bunga dengan private access modifier
class Bunga {
    private $nama; // Atribut private hanya bisa diakses dari dalam kelas ini

    public function __construct($nama) {
        $this->nama = $nama;
    }

    public function getNama() {
        return $this->nama;
    }
}
// Contoh penggunaan
$bunga1 = new Bunga("Mawar");
echo "Nama Bunga : " . $bunga1->getNama() . "<br>";
?>