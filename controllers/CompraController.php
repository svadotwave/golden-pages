<?php

namespace Controllers;

use Models\Usuario;
use Models\Compra;
use Models\Libro;
use MVC\Router;

class CompraController{

    public static function verLibros(Router $router) {

        $usuario = new Usuario();
        $libro = new Libro();
        $compra = new Compra();

        $compras = self::leerItems($compra);
     

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            if($_POST['tipo'] === 'compra'){

                $addAutor = self::addItem($compra);

                header('Location: /biblioteca');

                // if($addCategoria['alertas']) {
                //     $alertas = $addCategoria['alertas'];
                // }
                // $tipoAlerta = 'agregar';
                // $ban = $addCategoria;
            }

            if($_POST['tipo'] === 'descarga'){

                // Lógica para la descarga...
                $idLibro = $_POST['url']; // Asegúrate de obtener el ID del libro de alguna manera

                // Obtén la ruta del archivo PDF basándote en el ID del libro (esto es un ejemplo)
                $rutaArchivo = "D:/Materias/MAT-U/00--Taller2/Golden Pages Project/Prototipo/golden-pages/public$idLibro";

                // Configura las cabeceras para la descarga
                header('Content-Type: application/pdf');
                header('Content-Disposition: attachment; filename="' . $_POST['titulo'] . '".pdf"');

                // Lee y envía el contenido del archivo al navegador
                readfile($rutaArchivo);

                // Termina la ejecución para evitar que se renderice la vista
                exit();
            }

                    
        }

        $router->render('dashboard/biblioteca', [
            'usuario' => $usuario,
            'compras' => $compras,
            'libro' => $libro
        ]);
    }
    
    public static function addItem(Compra $compra) {

        $compra->sincronizar($_POST);

        $compra->guardar($compra->id_compra);
        
    }


    private static function leerItems(Compra $elemt) {
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

