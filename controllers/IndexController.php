<?php

namespace Controllers;

use MVC\Router;
use Models\Libro;

class Indexcontroller {

    public static function inicio(Router $router) {

        $pagina = 'inicio';

        $libro = new Libro();

        $libros = $libro->all();

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
            'libros' => $libros
        ]);
    }
}