<?php

namespace Controllers;

use MVC\Router;
use Models\Usuario;

class LoginController {

    public static function login(Router $router) {
        
        $router->render('auth/login');
    }

    public static function logout() {
        echo "--> Logout";
    }

    public static function olvideContraseña(Router $router) {
        
        $router->render('auth/olvide-contraseña');
    }

    public static function recuperarContraseña() {
        echo "--> recuperarContraseña";
    }

}