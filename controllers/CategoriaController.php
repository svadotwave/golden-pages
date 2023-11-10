<?php

namespace Controllers;

use Models\Categoria;
use Models\Libro;
use Models\Usuario;
use Models\Autor;
use MVC\Router;

class CategoriaController {

    public static function vistaCategorias(Router $router) {


        $categoria = new Categoria();
        $alertas = [];
        $categorias = self::leerCategorias($categoria);

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            if($_POST['tipo'] === 'agregar') {

                $addCategoria = self::addCategoria($categoria);

                $alertas = $addCategoria['alertas'];
            }

            if($_POST['tipo'] === 'modificar') {

                $updCategoria = self::updCategoria($categoria);

                $alertas = $updCategoria['alertas'];
                
            }

            if($_POST['tipo'] === 'eliminar') {

                self::delCategoria($categoria);
                
            }

            if($_POST['tipo'] === 'buscar') {

                $nombre_categoria = $_POST['nombre_categoria'];

                if($nombre_categoria != '') {

                    $searchCategorias = self::searchCategoria($categoria);

                    $categorias = $searchCategorias['categorias'];
                }
            }
        }

        $alertasModal = json_encode($alertas);

        $router->render('editor/adm-categorias', [
            'categorias'=> $categorias,
            'alertas'=> $alertas,
            'alertasModal'=> $alertasModal
        ]);
    }

    public static function addCategoria(Categoria $categoria) {

        $categoria->sincronizar($_POST);
        $alertas = [];

        $existe = $categoria->existeCategoria();

        // Comparamos con el resultado obtenido de la BD
        if ($existe->num_rows) {
            // Esta registrado
            $alertas = Usuario::getAlertas();
            
        } else {
            // No esta registrado
            $categoria->estado_categoria = 1;
            $categoria->guardar($categoria->id_categoria);

            header('Location: /adm-categorias');
        }

        return ['alertas' => $alertas];
        
    }

    public static function updCategoria(Categoria $categoria) {

        $categoria->sincronizar($_POST);
        $alertas = [];
                
        $id_categoria = $_POST['id_categoria'];
        $updCategoria = $categoria->find('id_categoria', $id_categoria);

        if($updCategoria->nombre_categoria === $_POST['nombre_categoria']) {
            
            $updCategoria->actualizar($id_categoria);
            
            header('Location: /adm-categorias');

        } else {

            $existe = $categoria->existeCategoria();

            if($existe->num_rows) {

                $alertas = Usuario::getAlertas();

            } else {

                $updCategoria->nombre_categoria = $_POST['nombre_categoria'];
                $updCategoria->actualizar($id_categoria);

                header('Location: /adm-categorias');
            }
        }

        return ['alertas' => $alertas];
    
    }

    public static function delCategoria(Categoria $categoria) {

        $categoria->sincronizar($_POST);

        $id_categoria = $_POST['id_categoria'];
        $delCategoria = $categoria->find('id_categoria', $id_categoria);

        if($delCategoria->estado_categoria === '1') {
            $delCategoria->estado_categoria = 0;
        } else {
            $delCategoria->estado_categoria = 1;
        }

        $delCategoria->actualizar($id_categoria);

        header('Location: /adm-categorias');
        
    }

    public static function searchCategoria(Categoria $categoria) {

        $categoria->sincronizar($_POST);
        $searchCategoria = $categoria->buscarCategoria();
        $categorias = $searchCategoria->fetch_all(MYSQLI_ASSOC);

        return ['categorias' => $categorias]; 
    }

    private static function leerCategorias(Categoria $categoria) {
        $allCategorias = $categoria->all();
    
        foreach ($allCategorias as $cat) {
            if (is_object($cat)) {
                $arrayCategoria = get_object_vars($cat);
                $categorias[] = $arrayCategoria;
            }
        }
    
        return $categorias;
    }
}