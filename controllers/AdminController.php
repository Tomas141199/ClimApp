<?php

namespace Controllers;

use Model\RegistroClima;
use MVC\Router;


class AdminController
{

    public static function registro(Router $router)
    {
        $registro = new RegistroClima;
        $errores = [];
        $resultado = $_GET['resultado'] ?? null;
        $historial = RegistroClima::get(2);

        //Registro de un nuevo clima 
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $registro = new RegistroClima($_POST['registro']);

            //Validacion de las entradas
            $errores = $registro->validar();

            if (empty($errores)) {
                $resultado = $registro->guardar();
                if ($resultado) {
                    //Redireccionar al usuario 
                    header('Location: /registro-clima?resultado=2');
                }
            }
        }

        $router->render('admin/registro', [
            "registro" => $registro,
            "errores" => $errores,
            "resultado" => $resultado,
            "historial" => $historial
        ]);
    }
}