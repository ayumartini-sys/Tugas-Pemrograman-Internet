<?php
// Kelas induk
class Buah {
    public $nama;
    public $warna;

    public function __construct($nama, $warna) {
        $this->nama = $nama;
        $this->warna = $warna;
    }

    public function deskripsi() {
        return "Buah ini adalah $this->nama dan warnanya adalah $this->warna.";
    }
}

// Kelas turunan Apel
class Apel extends Buah {
    public $rasa;

    public function __construct($nama, $warna, $rasa) {
        parent::__construct($nama, $warna); // memanggil constructor kelas induk
        $this->rasa = $rasa;
    }

    public function deskripsi() {
        return parent::deskripsi() . " Rasanya $this->rasa.";
    }
}

// Kelas turunan Jeruk
class Jeruk extends Buah {
    public $ukuran;

    public function __construct($nama, $warna, $ukuran) {
        parent::__construct($nama, $warna);
        $this->ukuran = $ukuran;
    }

    public function deskripsi() {
        return parent::deskripsi() . " Ukurannya $this->ukuran.";
    }
}

// Membuat objek Apel dan Jeruk
$apel = new Apel("Apel", "merah", "manis");
$jeruk = new Jeruk("Jeruk", "oranye", "besar");

// Menampilkan deskripsi
echo $apel->deskripsi(); // Output: Buah ini adalah Apel dan warnanya adalah merah. Rasanya manis.
echo "<br>";
echo $jeruk->deskripsi(); // Output: Buah ini adalah Jeruk dan warnanya adalah oranye. Ukurannya besar.
?>
