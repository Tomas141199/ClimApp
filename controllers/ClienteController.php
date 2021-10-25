<?php

namespace Controllers;

use MVC\Router;
use Model\Historial;


class ClienteController
{

    public static function predecir(Router $router)
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        //Verifica que haya una sesion iniciada 
        $auth_id = $_SESSION['usuario'] ?? false;

        $historial = Historial::getById(3, $auth_id);
        $router->render('client/predecir', ["band" => true, "historial" => $historial]);
    }
}