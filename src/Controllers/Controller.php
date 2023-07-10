<?php

namespace App\Controllers;

abstract class Controller {

    public function view() {
        echo(dirname(__DIR__));
        $data = "test data";
        include("../resources/views/index.php");
    }

    public function redirect(string $path) {

    }

}