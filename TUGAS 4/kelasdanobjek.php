<?php
// Definisikan kelas Buah
class Buah {
    // Properti
    public $nama;
    public $warna;
    public $rasa;

    // Konstruktor untuk mengisi properti
    public function __construct($nama, $warna, $rasa) {
        $this->nama = $nama;
        $this->warna = $warna;
        $this->rasa = $rasa;
    }

    // Method untuk menampilkan informasi buah
    public function deskripsi() {
        return "Buah ini adalah $this->nama, warnanya $this->warna, dan rasanya $this->rasa.";
    }
}

// Membuat objek dari kelas Buah
$apel = new Buah("Apel", "Merah", "Manis");
$jeruk = new Buah("Jeruk", "Oranye", "Asam");

// Mengakses properti dan method
echo $apel->deskripsi(); // Output: Buah ini adalah Apel, warnanya Merah, dan rasanya Manis.
echo "<br>";
echo $jeruk->deskripsi(); // Output: Buah ini adalah Jeruk, warnanya Oranye, dan rasanya Asam.
?>
