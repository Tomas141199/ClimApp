<?php

//Archivo de configuracion de la base de datos 
use Singleton\Database;
//Archivo de funciones para debuguear o cualquier funcion util o verificaciones 
require 'funciones.php';
//Autoload
require __DIR__ . '/../vendor/autoload.php';

//Conexion a la base datos 
$instance = Database::getInstance();
$db = $instance->conectarDB();

use Model\ActiveRecord;

ActiveRecord::setDB($db);