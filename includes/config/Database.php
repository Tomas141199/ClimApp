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
    private $name = 'clima';

    //Conexion establecida en el constructor privado
    private function __construct()
    {
        $this->db = new \mysqli($this->host, $this->user, $this->pass, $this->name);
        if (!$this->db) {
            debuguear("no se puedo contectar");
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