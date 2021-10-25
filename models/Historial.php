<?php

namespace Model;

use Model\ActiveRecord;

class Historial extends ActiveRecord
{

    protected static $tabla = "historial";
    protected static $columnasDB = ["id", "temperatura_h", "humedad_h", "velocidadViento_h", "resultado_h", "usuario_id_usuario"];

    public $id;
    public $temperatura_h;
    public $humedad_h;
    public $velocidadViento_h;
    public $resultado_h;
    public $usuario_id_usuario;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->temperatura_h = $args['temperatura_h'] ?? '';
        $this->humedad_h = $args['humedad_h'] ?? '';
        $this->velocidadViento_h = $args['velocidadViento_h'] ?? '';
        $this->resultado_h = $args['resultado_h'] ?? '';
        $this->usuario_id_usuario = $args['usuario_id_usuario'] ?? null;
    }
}