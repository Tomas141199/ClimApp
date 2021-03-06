<?php

namespace Model;

// Este modelo funciona como establece la arquitecura active record, permite la integracion de nuevos
// modelos herendado de esta clase y configurando con self las propias variables de columnasDB y tabla tabla
// que corresponden a su estructura en la base de datos, tambien con una variable de errores que guarda los errores 
// que surgan durante el metodo validar
// NOTA: Quizas no todos los metodos vayan a ser utilizados

class ActiveRecord
{
    // Base de datos 
    protected static $db;
    protected static $columnasDB = [];
    protected static $tabla = '';

    //Errores
    protected static $errores = [];

    //Definicion de la conexion a la base de datos 
    public static function setDB($database)
    {
        self::$db = $database;
    }

    public function guardar()
    {
        if (!is_null($this->id)) {
            //Actualizar
            $this->actualizar();
        } else {
            //Creacion de un nuevo registro
            return $this->crear();
        }
    }

    public function crear()
    {
        //Sanitizacion de los datos de entrada
        $atributos = $this->sanitizarAtributos();

        //Insertar en la base datos
        $query = "INSERT INTO " . static::$tabla . "(";
        $query .= join(', ', array_keys($atributos));
        $query .= " ) VALUES('";
        $query .= join("', '", array_values($atributos));
        $query .= " ');";

        //   debuguear($query);
        $resultado = self::$db->query($query);

        return $resultado;
    }

    public function actualizar()
    {
        //Sanitiza los datos
        $atributos = $this->sanitizarAtributos();

        $valores = [];

        foreach ($atributos  as $key => $value) {
            $valores[] = "$key = '$value'";
        }

        $query = "UPDATE " . static::$tabla . " SET ";
        $query .=  join(', ', $valores);
        $query .= " WHERE id=" . self::$db->escape_string($this->id);

        $resultado = self::$db->query($query);

        if ($resultado) {
            //Redireccionar al usuario 
            header('Location: /');
        }
    }

    //Elimina un registro
    public function eliminar()
    {
        $query = "DELETE FROM " . static::$tabla . " WHERE id=" . self::$db->escape_string($this->id);
        $resultado = self::$db->query($query);
        if ($resultado) {
            header("Location: /");
        }
    }

    public function atributos()
    {
        $atributos = [];
        foreach (static::$columnasDB as $columna) {
            if ($columna === 'id') continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }

    public function sanitizarAtributos()
    {
        $atributos = $this->atributos();
        $sanitizado = [];

        foreach ($atributos as $key => $value) {
            $sanitizado[$key] = self::$db->escape_string($value);
        }

        return $sanitizado;
    }

    //Validacion 
    public static function getErrores()
    {
        return static::$errores;
    }

    public function validar()
    {
        static::$errores = [];
        return static::$errores;
    }

    //Lista todas las propiedades
    public static function all()
    {
        $query = "SELECT * FROM " . static::$tabla;

        $resultado = self::consultarSQL($query);

        return $resultado;
    }

    public static function get($cantidad)
    {
        $query = "SELECT * FROM " . static::$tabla . " ORDER BY id desc LIMIT " . $cantidad;

        $resultado = self::consultarSQL($query);

        return $resultado;
    }

    public static function getById($cantidad, $id)
    {
        $query = "SELECT * FROM " . static::$tabla . " WHERE usuario_id_usuario=$id ORDER BY id desc LIMIT " . $cantidad;

        $resultado = self::consultarSQL($query);

        return $resultado;
    }


    //Busca una propiedad por su ID 
    public static function find($id)
    {
        $query = "SELECT * FROM " . static::$tabla . " WHERE id=$id";
        $resultado = self::consultarSQL($query);

        return array_shift($resultado);
    }

    public static function consultarSQL($query)
    {
        //Consulta a la base de datos
        $resultado = self::$db->query($query);
        //Iteracion a los resultados
        $array = [];

        while ($registro = $resultado->fetch_assoc()) {
            $array[] = static::crearObjeto($registro);
        }
        //Liberacion de la memoria
        $resultado->free();

        //Retorno de los resultados
        return $array;
    }

    protected static function crearObjeto($registro)
    {
        $objeto = new static;
        foreach ($registro as $key => $value) {
            if (property_exists($objeto, $key)) {
                $objeto->$key = $value;
            }
        }
        return $objeto;
    }

    //Sincroniza el objeto en memoria con los cambios realizados por el usuario
    public function sincronizar($args = [])
    {
        //Asignar los argumentos
        foreach ($args as $key => $value) {
            if (property_exists($this, $key) && !is_null($value)) {
                $this->$key = $value;
            }
        }
    }
}