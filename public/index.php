<?php

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\LoginController;
use Controllers\RegistroController;
use Controllers\UsuarioController;
use Controllers\EditorController;
use Controllers\AutorController;

$router = new Router();

// Index
$router->get('/', [UsuarioController::class, 'vistaPrincipal']);

// Registrarse
$router->get('/registrarse', [RegistroController::class, 'creaCuenta']);
$router->post('/registrarse', [RegistroController::class, 'creaCuenta']);

// Confirmar cuenta por email
$router->get('/confirmar-cuenta', [RegistroController::class, 'confirmar']);
$router->get('/mensaje-confirmación', [RegistroController::class, 'mensaje']);

// Iniciar Sesión
$router->get('/login', [LoginController::class, 'login']);
$router->post('/login', [LoginController::class, 'login']);

$router->get('/logout', [LoginController::class, 'logout']);

// Recuperar password
$router->get('/olvide-contraseña', [LoginController::class, 'olvideContraseña']);
$router->post('/olvide-contraseña', [LoginController::class, 'olvideContraseña']);

$router->get('/recuperar-contraseña', [LoginController::class, 'recuperarContraseña']);
$router->post('/recuperar-contraseña', [LoginController::class, 'recuperarContraseña']);

// Editor
$router->get('/dashboard-editor', [EditorController::class, 'view']);

$router->get('/adm-categorias', [EditorController::class, 'crearCategoria']);
$router->post('/adm-categorias', [EditorController::class, 'crearCategoria']);

$router->get('/adm-libros', [EditorController::class, 'crearLibros']);
$router->post('/adm-libros', [EditorController::class, 'crearLibros']);

$router->get('/adm-autores', [EditorController::class, 'crearAutores']);
$router->post('/adm-autores', [EditorController::class, 'crearAutores']);

//Autor
$router->get('/autor', [AutorController::class, 'crearAutor']);
$router->post('/autor', [AutorController::class, 'crearAutor']);


// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();