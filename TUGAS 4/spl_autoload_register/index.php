<?php
// Fungsi autoload
spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});
// Menggunakan kelas-kelas burung
$penguin = new Penguin();
$sparrow = new Sparrow();
$eagle = new Eagle();

echo $penguin->sound() . "<br>";  // Output: Penguin: Quack!
echo $sparrow->sound() . "<br>";  // Output: Sparrow: Tweet!
echo $eagle->sound();              // Output: Eagle: Screech!
?>