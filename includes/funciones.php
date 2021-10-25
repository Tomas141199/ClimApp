<?php

define("FUNCIONES_URL", __DIR__ . 'funciones.php');

function debuguear($variable)
{
    echo "
<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

// Muestra los mensajes 
function mostrarNotificacion($codigo)
{
    $mensaje = '';
    $code =  intval($codigo);

    switch ($code) {
        case 1:
            $mensaje = 'Su cuenta ha sido registrada correctamente, ahora solo ingrese con las credencias registradas para
                comenzar a usar la aplicacion.';
            break;
        case 2:
            $mensaje = 'El Registro se ha guardado correctamente';
            break;
        default:
            $mensaje = false;
            break;
    }

    return $mensaje;
}