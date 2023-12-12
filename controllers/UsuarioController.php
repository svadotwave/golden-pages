<?php

namespace Controllers;

use MVC\Router;
use Models\Libro;
use Models\Autor;
use Models\Usuario;

class UsuarioController {

    public static function vistaPrincipal(Router $router) {

        $pagina = 'dashboard-usuario';
        $libro = new Libro();
        $autor = new Autor();
        $usuario = new Usuario();
        $libros = self::leerItems($libro);


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
            'libros' => $libros,
            'usuario' => $usuario,
            'autor' => $autor
        ]);
    }

    private static function leerItems(Libro $elemt) {
        $elementos = $elemt->all();
    
        foreach ($elementos as $e) {
            if (is_object($e)) {
                $item = get_object_vars($e);
                $array[] = $item;
            }
        }
    
        return $array;
    }

}