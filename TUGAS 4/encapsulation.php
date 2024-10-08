<?php
class Buah {
    private $nama;
    private $warna;

    public function __construct($nama, $warna) {
        $this->nama = $nama;
        $this->warna = $warna;
    }

    public function getNama() {
        return $this->nama;
    }

    public function getWarna() {
        return $this->warna;
    }

    public function setWarna($warna) {
        $this->warna = $warna;
    }
}

$apel = new Buah("Apel", "Merah");
echo "Buah: " . $apel->getNama() . ", Warna: " . $apel->getWarna();
?>
