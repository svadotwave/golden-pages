<?php

namespace Controllers;

use Models\Categoria;
use Models\Libro;
use Models\Usuario;
use Models\Autor;
use MVC\Router;

class EditorController{

    public static function crearLibros(Router $router) {

        $usuario = new Usuario();
        $autor = new Autor();
        $categoria = new Categoria();
        $libro = new Libro();
        $alertas = [];
        $tipoAlerta = '';
        $id_modificar = '';
        $ban = false;

        // Reader - Leer
        $libros = self::leerItem($libro);
        $autores = self::leerAutores($autor);
        $categorias = self::leerCategorias($categoria);

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Create - Crear
            if($_POST['tipo'] === 'agregar'){

                $addLibro = self::addItem($libro, $usuario, $autor);

                header('Location: /adm-libros');
            }

            // Update - Modificar
            if($_POST['tipo'] === 'modificar'){

                $updLibro = self::addItem($libro, $usuario, $autor);

                header('Location: /adm-libros');
                
            }

            // Delete - Eliminar
            if($_POST['tipo'] === 'eliminar'){
                $id_libro = $_POST['id_libro'];
                $libro->eliminar($id_libro);

                header('Location: /adm-libros');
            }

            
        }

        $router->render('editor/adm-libros', [
            'libros' => $libros,
            'autores' => $autores,
            'categorias' => $categorias,
            'usuario' => $usuario,
            'autor' => $autor,
            'categoria' => $categoria
        ]);
    }

    public static function addItem(Libro $libro, Usuario $usuario, Autor $autor) {
        
        $ban = false;

        // URL de Imagen
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

        }// Imagen

        // URL de PDF
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
        
        }// Archivo

        // $usuario->nombre_usuario = $_POST['nombre_usuario'];
        // $usuario->apellido_usuario = $_POST['apellido_usuario'];
        // $usuario->email = "";
        // $usuario->password = "";
        // $usuario->rol = 0;
        // $usuario->email_confirmado = 0;

        $libro->estado_libro = 1;
        $libro->sincronizar($_POST);

        $libro->guardar($libro->id_libro);

        return $ban;
        
    }

    public static function updItem(Libro $libro, Usuario $usuario, Autor $autor) {

        $ban = false;

        // URL de Imagen
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

        }// Imagen

        // URL de PDF
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
        
        }// Archivo

        $usuario->actualizar($usuario->id_usuario);

        return $ban;
    }
    


    private static function leerItem(Libro $elemt) {
        $elementos = $elemt->all();
    
        foreach ($elementos as $e) {
            if (is_object($e)) {
                $item = get_object_vars($e);
                $array[] = $item;
            }
        }
    
        return $array;
    }

    private static function leerAutores(Autor $elemt) {
        $elementos = $elemt->all();
    
        foreach ($elementos as $e) {
            if (is_object($e)) {
                $item = get_object_vars($e);
                $array[] = $item;
            }
        }
    
        return $array;
    }

    private static function leerCategorias(Categoria $elemt) {
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