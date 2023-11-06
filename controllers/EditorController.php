<?php

namespace Controllers;

use Models\Categoria;
use Models\Libro;
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

    public static function crearLibros(Router $router) {

        $libro = new Libro($_POST);
        $categoria = new Categoria($_POST);

        // Reader - Leer
        $leerLibros = $libro->all();
        $allCategoria = $categoria->all();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $libro->sincronizar($_POST);

            // Update - Modificar
            if($_POST['tipo'] === 'modificar'){
                $id_libro = $_POST['id_libro'];
                // debuguear($id_libro);
                $libro->actualizar($id_libro);
            }

            // Delete - Eliminar
            if($_POST['tipo'] === 'eliminar'){
                $id_libro = $_POST['id_libro'];
                $libro->eliminar($id_libro);
            }

            // Create - Crear
            // Imagen
            if (isset($_FILES['img_libro']) && $_FILES['img_libro'] != '') {
                // Ruta donde se guardarán las imágenes en el servidor
                $imagen = $_FILES['img_libro']['name'];
                $tipo = $_FILES['img_libro']['type'];
                $tmp = $_FILES['img_libro']['tmp_name'];
                

                $rutaServer = '/build/img/';
                $imagePath = $rutaServer . basename($imagen);
                $rutaGlobal =  dirname(__DIR__) . "\public\build\img\\";

                move_uploaded_file($tmp, $rutaGlobal . $imagen);
                $libro->img_libro = $imagePath;

                
                
            }

            // Archivo
            if (isset($_FILES['content_libro']) && $_FILES['content_libro'] != '') {
                // Ruta donde se guardarán las imágenes en el servidor
                $archivo = $_FILES['content_libro']['name'];
                $tipo_a = $_FILES['content_libro']['type'];
                $tmp_a = $_FILES['content_libro']['tmp_name'];
                

                $rutaServer_a = '/build/pdf/';
                $archivoPath = $rutaServer_a . basename($archivo);
                $rutaGlobal_a =  dirname(__DIR__) . "\public\build\pdf\\";

                move_uploaded_file($tmp_a, $rutaGlobal_a . $archivo);
                $libro->content_libro = $archivoPath;
            
            }

            // estado
            $libro->estado = 1;
            // publicado
            $libro->publicado = 1;

            $libro->id_autor = 1;

            $libro->guardar($libro->id_libro);

            
            
            header('Location: /adm-libros');
                    
        }

        $router->render('editor/adm-libros', [
            'libros' => $leerLibros,
            'categorias' => $allCategoria
        ]);
    }

}