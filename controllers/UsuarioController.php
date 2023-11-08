<?php

namespace Controllers;

use MVC\Router;
use Models\Libro;

class UsuarioController {

    public static function vistaPrincipal(Router $router) {

        $pagina = 'dashboard-usuario';
        $libro = new Libro();
        $allLibros = $libro->all();

        // debuguear($_SESSION['autor']);

        if(isset($_SESSION['login'])){

            if($_SESSION['rol'] === '1') {
                $pagina = 'dashboard-admin';
            }

            if($_SESSION['rol'] === '2') {
                $pagina = 'dashboard-editor';
            }
        }
        
        $router->render("dashboard/" . $pagina, [
            'libros' => $allLibros
        ]);
    }
}