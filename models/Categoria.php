<?php

namespace Models;

use Models\ActiveRecord;

class Categoria extends ActiveRecord {

    protected static $tabla = 'categorias';
    protected static $idColumn = 'id_categoria';
    protected static $columnasDB = ['nombre_categoria', 'estado_categoria'];

    public $id_categoria;
    public $nombre_categoria;
    public $estado_categoria;

    public function __construct($args = []) {

        $this->id_categoria = $args['id'] ?? null;
        $this->nombre_categoria = $args['nombre_usuario'] ?? '';
        $this->estado_categoria = $args['nombre_usuario'] ?? '';
    }

    // metodo existeCategoria()
    public function existeCategoria() {
        $query = "SELECT * FROM " . self::$tabla . " WHERE nombre_categoria = '" . $this->nombre_categoria . "' LIMIT 1";

        $resultado = self::$db->query($query);

        if($resultado->num_rows) {
            self::$alertas['error']['categoria'] = 'La Categoria ya está registrada';
        } 

        return $resultado;
    }

    public function buscarCategoria() {
        $query = "SELECT * FROM " . self::$tabla . " WHERE nombre_categoria LIKE'" . $this->nombre_categoria . "%' ";

        $resultado = self::$db->query($query);

        return $resultado;
    }

}