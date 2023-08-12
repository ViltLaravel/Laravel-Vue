<?php

namespace App;

abstract class Animal {
    protected $name;
    protected $age;

    public function __construct($name, $age) {
        $this->name = $name;
        $this->age = $age;
    }

    abstract public function makeSound();
    abstract public function getInfo();
}
?>
