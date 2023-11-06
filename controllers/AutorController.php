<?php

namespace Controllers;

use Models\Categoria;
use Models\Usuario;
use Models\Autor;
use Models\Libro;
use MVC\Router;

class AutorController{

    public static function crearAutor(Router $router) {

        $usuario = new Usuario();
        $autor = new Autor();
        $libro = new Libro();

        $usuMod = $usuario->find('id_usuario', $_SESSION['id']);
     

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $usuMod->nombre_usuario = $_POST['nombre_usuario'];
            $usuMod->apellido_usuario = $_POST['apellido_usuario'];

            $usuario->sincronizar($usuMod);

            // Modificar el usuario
            $usuario->actualizar($usuMod->id_usuario);

            // autor
            $autor->biografia = $_POST['biografia'];
            $autor->id_usuario = $usuMod->id_usuario;
            // guardar autor
            $autor->guardar($autor->id_autor);

            $autorFind = $autor->find('id_usuario', $usuario->id_usuario);

            if($autorFind) {
                $autorFind = true;
            }

            session_destroy();
            session_start();
            $_SESSION['id'] = $usuario->id_usuario;
            $_SESSION['nombre'] = $usuario->nombre_usuario;
            $_SESSION['apellido'] = $usuario->apellido_usuario;
            $_SESSION['email'] = $usuario->email;
            $_SESSION['rol'] = $usuario->rol;
            $_SESSION['login'] = true;
            $_SESSION['autor'] = $autorFind;


            // Update - Modificar
            if($_POST['tipo'] === 'modificar'){
            }

            // Delete - Eliminar
            if($_POST['tipo'] === 'eliminar'){
            }

            // Create - Crear

            
            header('Location: /autor');
                    
        }

        $router->render('dashboard/dashboard-autor');
    }


}