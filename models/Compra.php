<?php

namespace Models;

use Models\ActiveRecord;

class Compra extends ActiveRecord {

    protected static $tabla = 'compras';
    protected static $idColumn = 'id_compra';
    protected static $columnasDB = ['id_usuario', 'id_libro'];

    public $id_compra;
    public $id_usuario; // llave foranea
    public $id_libro; // lave foranea

    public function __construct($args = []) {

        $this->id_compra = $args['id'] ?? null;
        $this->id_usuario = $args['id_usuario'] ?? null;
        $this->id_libro = $args['id_libro'] ?? null;
    }

}