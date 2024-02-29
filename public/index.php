<?php 

require_once __DIR__ . '/../includes/app.php';

use Controllers\APIController;
use Controllers\CitaController;
use Controllers\loginController;
use MVC\Router;

$router = new Router();

//iniciar sesion
$router->get('/', [loginController::class, 'login'] );
$router->post('/', [loginController::class, 'login'] );
$router->get('/logout', [loginController::class, 'logout'] );

//recuperar password
$router->get('/olvide', [loginController::class, 'olvide'] );
$router->post('/olvide', [loginController::class, 'olvide'] );
$router->get('/recuperar', [loginController::class, 'recuperar'] );
$router->post('/recuperar', [loginController::class, 'recuperar'] );

//crear cuenta
$router->get('/crear-cuenta', [loginController::class, 'crear'] );
$router->post('/crear-cuenta', [loginController::class, 'crear'] );

//confirmar cuenta
$router->get('/confirmar-cuenta', [loginController::class, 'confirmar'] );
$router->get('/mensaje', [loginController::class, 'mensaje'] );

//Area privada
$router->get('/cita', [CitaController::class, 'index']);

//API de citas
$router->get('/api/servicios', [APIController::class, 'index']);




// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();