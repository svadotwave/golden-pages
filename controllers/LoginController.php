<?php

namespace Controllers;

use FileServices\Email;
use MVC\Router;
use Models\Usuario;

class LoginController {

    public static function login(Router $router) {
        
        $auth = new Usuario($_POST);
        $alertas = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $auth->sincronizar($_POST);

            // Validar datos del formulario
            $alertas = $auth->validarLogin();
            
            if(empty($alertas)) {
                // Comprobar si existe el usuario
                $usuario = Usuario::where('email', $auth-> email);

                if($usuario) {
                    // Verificar la contraseña
                    if($usuario->comprobarPassAndVerificado($auth->password)) {
                        // Autenticar al usuario
                        if(!isset($_SESSION)) {
                            session_start();
                        }

                        $_SESSION['id'] = $usuario->id_usuario;
                        $_SESSION['nombre'] = $usuario->nombre_usuario;
                        $_SESSION['email'] = $usuario->email;
                        $_SESSION['login'] = true;
                        
                        // Aqui ya se puede asignar roles
                        header('Location: /');
                    }

                } else {
                    // No existe usuario
                    Usuario::setAlerta('usuario', 'error', 'Usuario no encontrado');
                }
            }
        }

        $alertas = Usuario::getAlertas();
        
        $router->render('auth/login', [
            'alertas' => $alertas,
            'auth' => $auth
        ]);
    }

    public static function logout() {

        session_destroy();

        header('Location: /');
    }

    public static function olvideContraseña(Router $router) {

        $alertas = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $auth = new Usuario($_POST);
            $alertas = $auth->validarEmail();

            if(empty($alertas)) {
                // Verificar si el usuario existe
                $usuario = Usuario::where('email', $auth->email);

                if($usuario && $usuario->email_confirmado === "1") {
                    
                    // generar token
                    $usuario->crearToken();

                    $usuario->guardar($usuario->id_usuario);

                    // enviar email
                    $email = new Email($usuario->email, $usuario->nombre_usuario, $usuario->token);
                    $email->enviarInstrucciones();

                    Usuario::setAlerta('usuario', 'exito', 'Revisa tu correo');

                } else {
                    Usuario::setAlerta('usuario', 'error', 'el usuario no esxiste o no esta confirmado');
                    
                }  
            }
        }

        $alertas = Usuario::getAlertas();
        
        $router->render('auth/olvide-contraseña', [
            'alertas' => $alertas
        ]);
    }

    public static function recuperarContraseña(Router $router) {

        $alertas = [];

        // if(isset($_GET['token'])) {

        // }

        $token = s($_GET['token']);

        // Buscar usuario por su token
        $usuario = Usuario::where('token', $token);

        if(empty($usuario)) {
            Usuario::setAlerta('token', 'error', 'Token no valido');
        }



        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            // LEER EL NUEVO PASSWORD Y GUARDARLO
            $password = new Usuario($_POST);

            $alertas = $password->validarPassword();

            if(empty($alertas)) {

                $usuario->password = null;
                $usuario->password = $password->password;
                $usuario->hashPassword();
                $usuario->token = null;

                $resultado = $usuario->guardar($usuario->id_usuario);

                if($resultado) {
                    header('Location: /login');
                }
            }
        }

        $alertas = Usuario::getAlertas();
        
        $router->render('auth/recuperar-contraseña', [
            'alertas' => $alertas,
            'token' => $usuario->token
        ]);

    }

}