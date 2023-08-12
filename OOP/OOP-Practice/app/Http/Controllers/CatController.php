<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cat;
use App\Abbyssinian;

class CatController extends Controller
{
    public function displayInfo()
    {
        // Create Cat objects
        $cat1 = new Cat('Whiskers', 5, 'Gray');
        $cat2 = new Cat('Mittens', 3, 'White');

        // Display information
        echo $cat1->getInfo() . PHP_EOL;
        echo "Sound: " . $cat1->makeSound() . PHP_EOL;
        echo PHP_EOL;

        echo $cat2->getInfo() . PHP_EOL;
        echo "Sound: " . $cat2->makeSound() . PHP_EOL;
    }
}
