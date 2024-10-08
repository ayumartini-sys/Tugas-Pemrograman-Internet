<?php

abstract class Bunga {
    protected $nama;
    protected $warna;

    public function __construct($nama, $warna) {
        $this->nama = $nama;
        $this->warna = $warna;
    }

    abstract public function getDetail();

    public function getWarna() {
        return $this->warna;
    }
}

class Mawar extends Bunga {
    public function getDetail() {
        return "Ini adalah {$this->nama}, berwarna {$this->warna} dan melambangkan cinta.";
    }
}

class Tulip extends Bunga {
    public function getDetail() {
        return "Ini adalah {$this->nama}, yang memiliki berbagai warna termasuk {$this->warna} dan mewakili keanggunan.";
    }
}

class BungaMatahari extends Bunga {
    public function getDetail() {
        return "Ini adalah {$this->nama}, dengan warna {$this->warna} yang cerah dan melambangkan pengagungan.";
    }
}

$mawar = new Mawar("Mawar", "merah");
$tulip = new Tulip("Tulip", "kuning");
$bungaMatahari = new BungaMatahari("Bunga Matahari", "kuning");

$bungas = [$mawar, $tulip, $bungaMatahari];

foreach ($bungas as $bunga) {
    echo $bunga->getDetail() . "<br>";
}

?>