<?php

require_once __DIR__ . '/../includes/app.php';

use Controllers\EjemploController;
use MVC\Router;


$router = new Router();

$router->get('/ejemplo', [EjemploController::class, 'index']);

$router->comprobarRutas();