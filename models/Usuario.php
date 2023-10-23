<?php

namespace Models;

use Models\ActiveRecord;

class Usuario extends ActiveRecord {

    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id_usuario', 'nombre_usuario', 'apellido_usuario', 'email', 'password'];

    public $id_usuario;
    public $nombre_usuario;
    public $apellido_usuario;
    public $email;
    public $password;

    public function __construct($args = [] ) {

        $this->id_usuario = $args['id_usuario'] ?? null;
        $this->nombre_usuario = $args['nombre_usuario'] ?? '';
        $this->apellido_usuario = $args['apellido_usuario'] ?? '';
        $this->email = $args['email'] ?? '';;
        $this->password = $args['password'] ?? '';;
    }

    // Mensajes de validación para creación de cuentas
    public function validarNuevaCuenta() {

        if(!$this->nombre_usuario) {
            self::$alertas['error']['nombre'] = 'El nombre es Obligatorio';
        }
        if(!$this->apellido_usuario) {
            self::$alertas['error']['apellido'] = 'El apellido es Obligatorio';
        }
        if(!$this->email) {
            self::$alertas['error']['email'] = 'El email es Obligatorio';
        }

        if(strlen($this->password) < 6 && $this->password){
            self::$alertas['error']['password'] = 'La contraseña debe contener al menos 6 caracteres';
        } else {
            self::$alertas['error']['password'] = 'La contraseña es Obligatorio';
        }

        return self::$alertas;
    }

}