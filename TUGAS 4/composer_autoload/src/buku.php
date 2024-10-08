<?php
namespace composer_autoload;

class buku {
    protected $title;

    public function __construct($title) {
        $this->title = $title;
    }

    public function getTitle() {
        return $this->title;
    }
}
?>
