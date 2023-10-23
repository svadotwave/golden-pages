<?php

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\LoginController;
use Controllers\Indexcontroller;

$router = new Router();

// Index
$router->get('/', [Indexcontroller::class, 'inicio']);

// Iniciar Sesión
$router->get('/login', [LoginController::class, 'login']);
$router->post('/login', [LoginController::class, 'login']);
$router->get('/logout', [LoginController::class, 'logout']);

// Recuperar password
$router->get('/olvide-contraseña', [LoginController::class, 'olvideContraseña']);
$router->post('/olvide-contraseña', [LoginController::class, 'olvideContraseña']);
$router->get('/recuperar-contraseña', [LoginController::class, 'recuperarContraseña']);
$router->post('/recuperar-contraseña', [LoginController::class, 'recuperarContraseña']);

// Crear Cuenta
$router->get('/registrarse', [LoginController::class, 'creaCuenta']);
$router->post('/registrarse', [LoginController::class, 'creaCuenta']);


// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();