<?php
// Kelas BungaProtected dengan protected access modifier
class BungaProtected {
    protected $nama; // Atribut protected hanya bisa diakses dari dalam kelas ini dan kelas turunannya

    public function __construct($nama) {
        $this->nama = $nama;
    }

    public function getNama() {
        return $this->nama;
    }
}
// Contoh penggunaan
$bunga3 = new BungaProtected("Anggrek");
echo "Nama Bunga : " . $bunga3->getNama() . "<br>";
?>