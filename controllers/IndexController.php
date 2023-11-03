<?php

namespace Controllers;

use MVC\Router;

class Indexcontroller {

    public static function inicio(Router $router) {

        $pagina = 'inicio';

        if(isset($_SESSION['login'])){

            if($_SESSION['rol'] === '1') {
                $pagina = 'dashboard-admin';
            }

            if($_SESSION['rol'] === '2') {
                $pagina = 'dashboard-editor';
            }
        }
        
        $router->render("dashboard/" . $pagina);
    }
}