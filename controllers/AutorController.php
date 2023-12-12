<?php

namespace Controllers;

use Models\Usuario;
use Models\Autor;
use MVC\Router;

class AutorController{

    public static function vistaAutores(Router $router) {

        $usuario = new Usuario();
        $autor = new Autor();
        $alertas = [];
        $tipoAlerta = '';
        $id_modificar = '';
        $ban = false;
        $autores = self::leerItems($autor);

        // $usuMod = $usuario->find('id_usuario', $_SESSION['id']);
     

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            // $usuMod->nombre_usuario = $_POST['nombre_usuario'];
            // $usuMod->apellido_usuario = $_POST['apellido_usuario'];

            // $usuario->sincronizar($usuMod);

            // // Modificar el usuario
            // $usuario->actualizar($usuMod->id_usuario);

            // // autor
            // $autor->biografia = $_POST['biografia'];
            // $autor->id_usuario = $usuMod->id_usuario;
            // // guardar autor
            // $autor->guardar($autor->id_autor);

            // $autorFind = $autor->find('id_usuario', $usuario->id_usuario);

            // if($autorFind) {
            //     $autorFind = true;
            // }

            // session_destroy();
            // session_start();
            // $_SESSION['id'] = $usuario->id_usuario;
            // $_SESSION['nombre'] = $usuario->nombre_usuario;
            // $_SESSION['apellido'] = $usuario->apellido_usuario;
            // $_SESSION['email'] = $usuario->email;
            // $_SESSION['rol'] = $usuario->rol;
            // $_SESSION['login'] = true;
            // $_SESSION['autor'] = $autorFind;


            // Create - Crear
            if($_POST['tipo'] === 'agregar'){

                $addAutor = self::addItem($autor, $usuario);

                // if($addCategoria['alertas']) {
                //     $alertas = $addCategoria['alertas'];
                // }
                // $tipoAlerta = 'agregar';
                // $ban = $addCategoria;
            }

            // Update - Modificar
            if($_POST['tipo'] === 'modificar'){

                $updAutor = self::updItem($autor, $usuario);
            }

            // Delete - Eliminar
            if($_POST['tipo'] === 'eliminar'){
            }

            // Create - Crear

            
            // header('Location: /autor');
                    
        }

        // $usuario->find('id_usuario', $au->id_usuario)->nombre_usuario;

        $router->render('editor/adm-autores', [
            'autores' => $autores,
            'usuario' => $usuario
            // 'categorias'=> $categorias,
            // 'alertas'=> $alertas,
            // 'alertasModal'=> $alertasModal,
            // 'tipoAlertaModal'=> $tipoAlertaModal,
            // 'idmodificarModal' => $idmodificarModal,
            // 'banJS' => $banJS
        ]);
    }

    public static function addItem(Autor $autor, Usuario $usuario) {
        
        $ban = false;

        $usuario->nombre_usuario = $_POST['nombre_usuario'];
        $usuario->apellido_usuario = $_POST['apellido_usuario'];
        $usuario->email = "";
        $usuario->password = "";
        $usuario->rol = 0;
        $usuario->email_confirmado = 0;

        $usuario->sincronizar($usuario);

        $usuario->guardar($usuario->id_usuario);

        $autor->biografia = "";
        $autor->estado_autor = 1;
        $autor_usu_id = $usuario::ultimoID('id_usuario');
        $autor->id_usuario = $autor_usu_id->id_usuario;

        $autor->sincronizar($autor);
        $autor->guardar($autor->id_autor);

        return $ban;
        
    }

    public static function updItem(Autor $autor, Usuario $usuario) {

        $ban = false;
        $usuario->sincronizar($_POST);

        $usuario->email = "";
        $usuario->password = "";
        $usuario->rol = 0;
        $usuario->email_confirmado = 0;

        $usuario->actualizar($usuario->id_usuario);

        return $ban;
    }
    


    private static function leerItems(Autor $elemt) {
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

