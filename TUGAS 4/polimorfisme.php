<?php
class Hewan {
    public function suara() {
        return "Suara hewan";
    }
}

class Kucing extends Hewan {
    public function suara() {
        return "Meow";
    }
}

class Anjing extends Hewan {
    public function suara() {
        return "Bark";
    }
}

class Kambing extends Hewan {
    public function suara() {
        return "Mbee";
    }
}

$hewanArray = array(new Kucing(), new Anjing(), new Kambing());

foreach ($hewanArray as $hewan) {
    echo $hewan->suara() . "<br>";
}
?>
