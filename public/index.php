<?php

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\AdminController;
use Controllers\AuthController;
use Controllers\ClienteController;

//GET = solo es informacion de lectura(cargar la vista, informacion)
//POST = Se va a guardar informcion o eliminar 

$router = new Router();
//Vistas Generales 
$router->get('/', [AuthController::class, 'login']);
$router->get('/registro', [AuthController::class, 'registro']);

//Vista Protegidas(Solo para usuario autenticados)
//Login 
$router->post('/', [AuthController::class, 'login']);
$router->get('/logout', [AuthController::class, 'logout']);
//Admin 
$router->get('/registro-clima', [AdminController::class, 'registro']);
//Cliente/Admin 
$router->get('/predecir-clima', [ClienteController::class, 'predecir']);

$router->comprobarRutas();