<?php

namespace Model;

class RegistroClima extends ActiveRecord
{
    protected static $tabla = "registroclima";
    protected static $columnasDB = ["id", "temperatura", "humedad", "velocidadViento", "resultado"];

    public $id;
    public $temperatura;
    public $humedad;
    public $velocidadViento;
    public $resultado;

    public function __construct($args  = [])
    {
        $this->id = $args['id'] ?? null;
        $this->temperatura = $args['temperatura'] ?? '';
        $this->humedad = $args['humedad'] ?? '';
        $this->velocidadViento = $args['velocidadViento'] ?? '';
        $this->resultado = $args['resultado'] ?? '';
    }

    public function validar()
    {
        if (!$this->temperatura) {
            self::$errores[] = "La Temperatura es obligatoria";
        }
        if (!$this->humedad) {
            self::$errores[] = "La Humedad es obligatoria";
        }
        if (!$this->velocidadViento) {
            self::$errores[] = "La Velocidad del viento es obligatoria";
        }
        if (!$this->resultado) {
            self::$errores[] = "El Resultado es obligatorio";
        }

        return self::$errores;
    }
}