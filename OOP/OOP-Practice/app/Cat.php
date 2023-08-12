<?php

namespace App;

class Cat extends Animal {
    private $color;

    public function __construct($name, $age, $color) {
        parent::__construct($name, $age);
        $this->color = $color;
    }

    public function makeSound() {
        return "Meow!";
    }

    public function getInfo() {
        return "Name: " . $this->name . ", Age: " . $this->age . ", Color: " . $this->color;
    }
}
?>
