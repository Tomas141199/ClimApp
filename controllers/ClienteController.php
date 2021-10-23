<?php

namespace Controllers;

use MVC\Router;


class ClienteController
{

    public static function predecir(Router $router)
    {
        $router->render('client/predecir', []);
    }
}