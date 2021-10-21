<?php

namespace Controllers;

use MVC\Router;

class EjemploController
{

    public static function index(Router $router)
    {
        $router->render('ejemplo', ['saludo' => 'mundo', 'bg' => 'bg-storm']);
    }
}