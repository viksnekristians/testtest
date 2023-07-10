<?php
namespace App\Components;

abstract class Controller {

    public function view(string $viewName, array $data = []) {
        return (new View($viewName, $data))->render();
    }

    public function redirect(string $path) {
        header("Location: $path");
    }
}