<?php

namespace Controllers;

use MVC\Router;

class Indexcontroller {

    public static function inicio(Router $router) {

        $router->render('inicio');
    }
}