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

    public static function creaCuenta(Router $router) {

        $usuario = new Usuario($_POST);
        $alertas = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            // error_log('------------------------');
            // error_log('Enviaste el formulario');
            // error_log('------------------------');

            $usuario->sincronizar($_POST);
            $alertas = $usuario->validarNuevaCuenta();

        }

        $router->render('auth/registrarse', [
            'usuario' => $usuario,
            'alertas' => $alertas
        ]);
    }
}