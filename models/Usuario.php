<?php

namespace Models;

use Models\ActiveRecord;

class Usuario extends ActiveRecord {

    protected static $tabla = 'usuarios';
    protected static $idColumn = 'id_usuario';
    protected static $columnasDB = ['nombre_usuario', 'apellido_usuario', 'email', 'password', 'email_confirmado', 'token'];

    public $id_usuario;
    public $nombre_usuario;
    public $apellido_usuario;
    public $email;
    public $password;
    public $email_confirmado;
    public $token;

    public function __construct($args = []) {

        $this->id_usuario = $args['id'] ?? null;
        $this->nombre_usuario = $args['nombre_usuario'] ?? '';
        $this->apellido_usuario = $args['apellido_usuario'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->email_confirmado = $args['email_confirmado'] ?? 0;
        $this->token = $args['token'] ?? '';
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

        if(strlen(!$this->password)){
            self::$alertas['error']['password'] = 'La contraseña es Obligatorio';
        } else if(strlen($this->password) < 6) {
            self::$alertas['error']['password'] = 'La contraseña debe contener al menos 6 caracteres';
        }

        return self::$alertas;
    }

    // Revisa si el usuario existe
    public function existeUsusario() {
        $query = "SELECT * FROM " . self::$tabla . " WHERE email = '" . $this->email . "' LIMIT 1";

        $resultado = self::$db->query($query);

        if($resultado->num_rows) {
            self::$alertas['error']['email'] = 'El correo ya está registrado';
        } 

        return $resultado;
    }

    public function hashPassword() {
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
    }

    public function crearToken() {
        $this->token = uniqid();
    }

    // =============> LOGIN <=================
    public function validarLogin() {

        if(!$this->email) {
            self::$alertas['email']['error'] = 'El email es Obligatorio';
        }

        if(strlen(!$this->password)){
            self::$alertas['password']['error'] = 'La contraseña es Obligatorio';
        }

        return self::$alertas;
    }

    public function comprobarPassAndVerificado($password) {

        // Confirmar el passwor de entrada con el de la base de datos
        $resultado = password_verify($password, $this->password);

        // Verificar si confirmo su cuenta por email
        if(!$resultado || !$this->email_confirmado === '0') {
            self::$alertas['auth']['error'] = 'Contraseña Incorrecta o tu cuenta no ha sido confirmada';
        } else {
            return true;
        }
    }

    public function validarEmail() {
        if(!$this->email) {
            self::$alertas['email']['error'] = 'El email es Obligatorio';
        }

        return self::$alertas;
    }

    public function validarPassword() {
        
        if(strlen(!$this->password)){
            self::$alertas['password']['error'] = 'La contraseña es Obligatorio';
        } else if(strlen($this->password) < 6) {
            self::$alertas['password']['error'] = 'La contraseña debe contener al menos 6 caracteres';
        }

        return self::$alertas;
    }

}