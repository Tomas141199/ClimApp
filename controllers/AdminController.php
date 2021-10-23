<?php

namespace Controllers;

use MVC\Router;


class AdminController
{

    public static function registro(Router $router)
    {
        $router->render('admin/registro', []);
    }
}