<?php

namespace Controllers;

use MVC\Router;

class EditorController{

    public static function view(Router $router) {

        $router->render('editor/adm-categorias');
    }

}