<?php

namespace Models;

use Models\ActiveRecord;

class Libro extends ActiveRecord {

    protected static $tabla = 'libros';
    protected static $idColumn = 'id_libro';
    protected static $columnasDB = ['nombre_libro', 'descrip_libro', 'precio_libro', 'img_libro', 'content_libro', 'estado', 'id_autor', 'id_categoria'];

    public $id_libro;
    public $nombre_libro;
    public $descrip_libro;
    public $precio_libro;
    public $img_libro;
    public $content_libro;
    public $estado;
    public $id_autor;
    public $id_categoria;  

    public function __construct($args = []) {

        $this->id_libro = $args['id'] ?? null;
        $this->nombre_libro = $args['nombre_usuario'] ?? '';
        $this->descrip_libro = $args['descrip_libro'] ?? '';
        $this->precio_libro = $args['precio_libro'] ?? '';
        $this->img_libro = $args['img_libro'] ?? '';
        $this->content_libro = $args['content_libro'] ?? '';
        $this->estado = $args['estado'] ?? '';
        $this->id_autor = $args['id_autor'] ?? '';
        $this->id_categoria = $args['id_categoria'] ?? '';
        
    }

}