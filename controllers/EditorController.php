<?php

namespace Controllers;

use Models\Categoria;
use MVC\Router;

class EditorController{

    public static function crearCategoria(Router $router) {

        $categoria = new Categoria($_POST);

        // Reader - Leer
        $leerCategorias = $categoria->all();      

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Update - Modificar
            if($_POST['tipo'] === 'modificar'){
                $id_cat = $_POST['id_categoria'];
                $categoria->actualizar($id_cat);
            }

            // Delete - Eliminar
            if($_POST['tipo'] === 'eliminar'){
                $id_cat = $_POST['id_categoria'];
                $categoria->eliminar($id_cat);
            }

            // Create - Crear
            $categoria->sincronizar($_POST);
            $categoria->guardar($categoria->id_categoria);
            
            header('Location: /adm-categorias');
                    
        }

        $router->render('editor/adm-categorias', [
            'categorias' => $leerCategorias
        ]);
    }

}