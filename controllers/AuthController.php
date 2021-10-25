<?php

namespace Controllers;

use MVC\Router;
use Model\Usuario;

class AuthController
{

    //Metodo que carga la vista de login
    public static function login(Router $router)
    {
        $auth = new Usuario;
        $errores = [];
        $notificacion  = $_GET['resultado'] ?? null;

        //Si es que le usuario esta intentando iniciar sesion 
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //Se crea un nuevo usuario con los datos recibidos del formulario
            $auth = new Usuario($_POST['usuario']);
            //Se validan los campos necesarios para la autenticacion 
            $errores = $auth->validarLogin();

            if (empty($errores)) {

                //Si es que no hay errores se valida que el usuario exista 
                $resultado = $auth->existeUsuario();

                if ($resultado) {
                    //Si es que el usuario existe se valida que las contrasenias coincidan 
                    $auntenticado = $auth->comprobarPassword($resultado);
                    if ($auntenticado) {
                        $auth->autenticar();
                    } else {
                        $errores = $auth->getErrores();
                    }
                } else {
                    $errores = $auth->getErrores();
                }
            }
        }

        $router->render('auth/login', ['bg' => 'bg-storm', 'errores' => $errores, "auth" => $auth, "resultado" => $notificacion]);
    }

    //Metodo que carga la vista de registro 
    public static function registro(Router $router)
    {
        $usuario = new Usuario;
        $errores = [];

        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $usuario = new Usuario($_POST['usuario']);
            $errores = $usuario->validar();
            if ($usuario->password != $_POST['passwordrep']) {
                $errores[] = "Las Contrasenas deben coincidir";
            }
            if (empty($errorres)) {
                $resultado = $usuario->guardar();
                if ($resultado) {
                    //Redireccionar al usuario 
                    header('Location: /?resultado=1');
                }
            }
        }


        $router->render('auth/registro', ['bg' => 'bg-lluvia', 'usuario' => $usuario, 'errores' => $errores]);
    }

    //Metodo para cerrar la sesion del usuario
    public static function logout()
    {
        session_start();
        //Se limpia la sesion 
        $_SESSION = [];
        //Se redirige al usuario al login 
        header('Location: /');
    }
}