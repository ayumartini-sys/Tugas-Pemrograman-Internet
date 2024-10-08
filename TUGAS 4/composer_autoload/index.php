<?php
require 'vendor/autoload.php';

use composer_autoload\fiksi;  // Perbaiki nama kelas dan namespace
use composer_autoload\nonfiksi; // Perbaiki nama kelas dan namespace

$book1 = new fiksi("The Great Gatsby");
$book2 = new nonfiksi("Sapiens: A Brief History of Humankind");

echo $book1->getTitle() . " is a " . $book1->getGenre() . " book.<br>";
echo $book2->getTitle() . " is a " . $book2->getGenre() . " book.";
?>
