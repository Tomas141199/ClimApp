<?php

namespace Singleton;

class Database
{
    // Variables de configuracion
    private static $instance = null;
    private $db;
    private $host = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $name = 'climapp';

    //Conexion establecida en el constructor privado
    private function __construct()
    {
        $db = new \mysqli($this->host, $this->user, $this->pass, $this->name);
        if (!$db) {
            echo "Error no se pudo conecetar";
            exit;
        }
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new Database;
        }

        return self::$instance;
    }

    public function conectarDB()
    {
        return $this->db;
    }
}