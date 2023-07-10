<?php
namespace App\Controllers;

use App\Components\Controller;

class IndexController extends Controller
{
    public function index() {
        return parent::view('index');
    }
}

