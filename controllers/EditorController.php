<?php

namespace Controllers;

use Models\Categoria;
use Models\Libro;
use Models\Usuario;
use Models\Autor;
use MVC\Router;

class EditorController{

    public static function crearLibros(Router $router) {

        $libro = new Libro($_POST);
        $categoria = new Categoria();
        $autor = new Autor();
        $usuario = new Usuario();

        // Reader - Leer
        $allLibros = $libro->all();
        $allCategorias = $categoria->all();
        $allAutores = $autor->all(); 

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $libro->sincronizar($_POST);

            // Update - Modificar
            if($_POST['tipo'] === 'modificar'){
                $id_libro = $_POST['id_libro'];

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

                $libro->actualizar($id_libro);

                header('Location: /adm-libros');
                
            }

            // Delete - Eliminar
            if($_POST['tipo'] === 'eliminar'){
                $id_libro = $_POST['id_libro'];
                $libro->eliminar($id_libro);

                header('Location: /adm-libros');
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
            $libro->estado_libro = 1;

            $libro->guardar($libro->id_libro);
            
            header('Location: /adm-libros');
            
        }

        $router->render('editor/adm-libros', [
            'libros' => $allLibros,
            'categorias' => $allCategorias,
            'autores' => $allAutores,
            'usuario' => $usuario,
            'autor' => $autor,
            'categoria' => $categoria
        ]);
    }

    public static function crearAutores(Router $router) {

        $usuario = new Usuario();
        $autor = new Autor();
        $allAutores = $autor->all();
     

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Update - Modificar
            if($_POST['tipo'] === 'modificar'){
            }

            // Delete - Eliminar
            if($_POST['tipo'] === 'eliminar'){
                $id_autor = $_POST['id_autor'];
                $autor_search = $autor->find('id_autor', $id_autor);
                $id_usuario = $autor_search->id_usuario;
                $usuario->eliminar($id_usuario);

                header('Location: /adm-autores');
            }

            if($_POST['tipo'] === 'crear') {

                // Create - Crear
                $usuario->nombre_usuario = $_POST['nombre_usuario'];
                $usuario->apellido_usuario = $_POST['apellido_usuario'];
                $usuario->rol = 0;

                // guardar usuario
                $usuario->guardar($usuario->id_usuario);
                $resultado = $usuario->ultimoID('id_usuario');

                // guardar autor
                $autor->id_usuario = $resultado->id_usuario;
                $autor->guardar($autor->id_autor);
                
                header('Location: /adm-autores');
            }

                    
        }

        $router->render('editor/adm-autores', [
            'autores' => $allAutores,
            'usuario' => $usuario
        ]);
    }

}