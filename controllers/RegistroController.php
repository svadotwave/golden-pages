<?php

namespace Controllers;

use FileServices\Email;
use MVC\Router;
use Models\Usuario;

class RegistroController{

    public static function creaCuenta(Router $router) {

        $usuario = new Usuario($_POST);
        
        $alertas = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            // error_log('------------------------');
            // error_log('Enviaste el formulario');
            // error_log('------------------------');
            
            $usuario->sincronizar($_POST);
            
            $alertas = $usuario->validarNuevaCuenta();

            // Validar que no halla nada en el array de alertas
            if(empty($alertas)) {
                
                // Verificar que el usuario no se halla registrado
                $resultado = $usuario->existeUsusario(); // me devuelve la consulta a la BD

                // Comparamos con el resultado obtenido de la BD
                if($resultado->num_rows) {
                    // Esta registrado
                    $alertas = Usuario::getAlertas();
                } else {
                    // No esta registrado

                    // Hashear el password
                    $usuario->hashPassword();

                    // Generar un token único
                    $usuario->crearToken();

                    // rol de cliente
                    $usuario->rol = 3;

                    // Enviar el email
                    $email = new Email($usuario->email, $usuario->nombre_usuario, $usuario->token);
                    $email->enviarConfirmacion();

                    // Guardar en la base de datos
                    $resultado = $usuario->guardar($usuario->id_usuario); // devuelve 'resultado' = true|false y 'id' = # (al que corresponda)



                    if($resultado) { // Si es true se guardo el Usuario
                        // usuario-> = $resultado['id'];
                        $usuario->id_usuario = $resultado['id'];

                        header('Location: /mensaje-confirmación');
                    }
                }

            }

        }

        $router->render('signup/registrarse', [
            'usuario' => $usuario,
            'alertas' => $alertas
        ]);
    }

    public static function confirmar(Router $router) {

        $alertas = [];

        $token = s($_GET['token']);

        $usuario = Usuario::where('token', $token);

        

        if(empty($usuario)) {
            // Mostrar mensaje de error
            Usuario::setAlerta('token', 'error', 'Token No Válido');  
        } else {
            // Mostrar mensaje de confirmado
            $usuario->email_confirmado = "1";
            $usuario->token = "";
            $usuario->guardar($usuario->id_usuario);
            Usuario::setAlerta('token', 'exito', 'Cuenta Comprobada Correctamente!');
        }
        
        $alertas = Usuario::getAlertas();

        $router->render('signup/confirmar-cuenta',
            ['alertas' => $alertas]
        );
    }

    public static function mensaje(Router $router) {

        $router->render('signup/mensaje-confirmación');
    }
}