<?php

namespace Controllers;

use MVC\Router;

class LoginController {

    public static function login(Router $router) {
        
        $router->render('auth/login');
    }

    public static function logout() {
        echo "--> Logout";
    }

    public static function olvideContraseña() {
        echo "--> olvideContraseña";
    }

    public static function recuperarContraseña() {
        echo "--> recuperarContraseña";
    }

    public static function creaCuenta(Router $router) {

        $router->render('auth/registro');
    }
}