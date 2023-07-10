<?php

namespace App\Controllers;

use App\Services\UserService;
use App\Components\Controller;
use App\Components\ActiveUser;

class AuthController extends Controller {
    public function __construct(private UserService $userService= new UserService()) {
    }

    public function register() {
        if (ActiveUser::isLoggedIn()) {
            return parent::redirect('/');
        }
        
    }

    public function login() {
        if (ActiveUser::isLoggedIn()) {
            return parent::redirect('/');
        }

    }
}