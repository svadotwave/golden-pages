<?php

namespace Models;

use Models\ActiveRecord;

class Categoria extends ActiveRecord {

    protected static $tabla = 'categorias';
    protected static $idColumn = 'id_categoria';
    protected static $columnasDB = ['nombre_categoria'];

    public $id_categoria;
    public $nombre_categoria;

    public function __construct($args = []) {

        $this->id_categoria = $args['id'] ?? null;
        $this->nombre_categoria = $args['nombre_usuario'] ?? '';
    }

}