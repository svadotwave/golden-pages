<?php

namespace Models;

use Models\ActiveRecord;

class Autor extends ActiveRecord {

    protected static $tabla = 'autores';
    protected static $idColumn = 'id_autor';
    protected static $columnasDB = ['biografia', 'estado_autor','id_usuario'];

    public $id_autor;
    public $biografia;
    public $estado_autor;
    public $id_usuario; // lave foranea

    public function __construct($args = []) {

        $this->id_autor = $args['id'] ?? null;
        $this->biografia = $args['nombre_usuario'] ?? '';
        $this->estado_autor = $args['estado_autor'] ?? '';
        $this->id_usuario = $args['id_usuario'] ?? null;
    }

}