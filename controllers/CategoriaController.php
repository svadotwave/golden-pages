<?php

namespace Controllers;

use Models\Categoria;
use Models\Libro;
use Models\Usuario;
use Models\Autor;
use MVC\Router;

class CategoriaController {

    public static function gestionarCategoria(Router $router) {

        $categoria = new Categoria($_POST);
        $alertas = [];
        $alertasJSON = json_encode($alertas);

        // Reader - Leer
        $allCategorias = $categoria->all();

        // POST
        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Create - Crear
            if($_POST['tipo'] === 'crear'){
                $categoria->sincronizar($_POST);

                $existe = $categoria->existeCategoria();

                // Comparamos con el resultado obtenido de la BD
                if($existe->num_rows) {
                    // Esta registrado
                    $alertas = Usuario::getAlertas();

                    $alertasJSON = json_encode($alertas);

                } else {
                    // No esta registrado

                    $categoria->estado_categoria = 1;
                    $categoria->guardar($categoria->id_categoria);

                    header('Location: /adm-categorias');
                }

            }

            // Update - Modificar
            if($_POST['tipo'] === 'modificar'){

                $categoria->sincronizar($_POST);
                
                $id_categoria = $_POST['id_categoria'];
                $updCategoria = $categoria->find('id_categoria', $id_categoria);

                if($updCategoria->nombre_categoria === $_POST['nombre_categoria']) {
                    
                    $updCategoria->actualizar($id_categoria);

                    header('Location: /adm-categorias');

                } else {

                    $existe = $categoria->existeCategoria();

                    if($existe->num_rows) {

                        $alertas = Usuario::getAlertas();
                        $alertasJSON = json_encode($alertas);

                    } else {

                        $updCategoria->nombre_categoria = $_POST['nombre_categoria'];
                        $updCategoria->actualizar($id_categoria);

                        header('Location: /adm-categorias');
                    }
                }
                 
            }

            // Delete - Eliminar
            if($_POST['tipo'] === 'eliminar'){

                $id_categoria = $_POST['id_categoria'];
                $updCategoria = $categoria->find('id_categoria', $id_categoria);
                
                $updCategoria->nombre_categoria = $_POST['nombre_categoria'];

                if($updCategoria->estado_categoria === '1') {
                    $updCategoria->estado_categoria = 0;
                } else {
                    $updCategoria->estado_categoria = 1;
                }

                $updCategoria->actualizar($id_categoria);

                header('Location: /adm-categorias');
            }
                    
        }

        $alertas = Usuario::getAlertas();

        $router->render('editor/adm-categorias', [
            'categorias' => $allCategorias,
            'alertas' => $alertas,
            'alertasJSON' => $alertasJSON
        ]);
    }
}