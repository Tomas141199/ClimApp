<?php

namespace MVC;


class Router
{
    //Arreglo con URL's de tipo POST
    public $rutasGET = [];
    //Arreglo con URL's de tipo GET
    public $rutasPOST = [];

    //Registro de las URL's de tipo get
    public function get($url, $fn)
    {
        $this->rutasGET[$url] = $fn;
    }

    //Registro de las URL's de tipo post
    public function post($url, $fn)
    {
        $this->rutasPOST[$url] = $fn;
    }

    public function comprobarRutas()
    {
        session_start();

        $auth = $_SESSION['login'] ?? null;
        //Arreglo de ruta protegidas
        $rutas_protegidas = ['/predecir-clima','/registro-clima','/logout'];


        //Obtiene la url ingresada/solicitada por que usuario
        $urlActual = $_SERVER['REQUEST_URI'] ?? '/';
        if (strpos($urlActual, '?')) { // cuando sea un get, tome el redirect y no el request
            $urlActual = $_SERVER['REDIRECT_URL'] ?? '/';
        }

        //Obtiene el metodo de solicitud
        $metodo = $_SERVER['REQUEST_METHOD'];

        //Obtiene la funcion asignada por su metedo 
        if ($metodo === 'GET') {
            $fn = $this->rutasGET[$urlActual] ?? null;
        } else {
            $fn = $this->rutasPOST[$urlActual] ?? null;
        }

        //Proteger las rutas 
        if (in_array($urlActual, $rutas_protegidas) && !$auth) {
            header('Location: /');
        }

        //Verifica si es que la ruta tiene una funcion 
        if ($fn) {
            //Ejecucion de la funcion y paso del objeto router del index ($this->)
            call_user_func($fn, $this);
        } else {
            //Si es que la url no tiene una funcion de ejecucion 
            echo "Not found";
        }
    }

    public function render($view, $datos = [])
    {
        //Crea una variable que sea accesible para la vista 
        //Con $$ asigna le asigna el nombre de la variable dinamicamente 
        foreach ($datos as $key => $value) {
            $$key = $value;
        }

        //Uso del almecenamiento 
        ob_start();
        //Incluye la vista de la carpeta views 
        include __DIR__ . "/views/$view.php";
        //Limpia la memoria del navegador y la almcena en una variable
        $contenido = ob_get_clean();
        //Carga el layout principal como un template y el $contenido se integra
        include __DIR__ . "/views/layout.php";
    }
}