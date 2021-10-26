<?php

namespace Model;

class Usuario extends ActiveRecord
{

    protected static $tabla = "usuario";
    protected static $columnasDB = ["id", "nombre", "app", "apm", "email", "password", "is_admin"];

    public $id;
    public $nombre;
    public $app;
    public $apm;
    public $email;
    public $password;
    public $is_admin;


    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->app = $args['app'] ?? '';
        $this->apm = $args['apm'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->is_admin = $args['is_admin'] ?? false;
    }

    //Para el login 
    public function validarLogin()
    {
        if (!$this->email) {
            self::$errores[] = "El Correo es obligatorio";
        }

        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL) && $this->email) {
            self::$errores[] = "El Formato del Correo es Invalido";
        }

        if (!$this->password) {
            self::$errores[] = "La Contraseña es obligatoria";
        }
        return self::$errores;
    }

    //Para el registro de un nuevo usuario 
    public function validar()
    {
        if (!$this->nombre) {
            self::$errores[] = "El Correo es obligatorio";
        }

        if (!$this->app) {
            self::$errores[] = "El Apellido Paterno es obligatorio";
        }

        if (!$this->apm) {
            self::$errores[] = "El Apellido Materno es obligatorio";
        }


        if (!$this->email) {
            self::$errores[] = "El Correo es obligatorio";
        }


        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL) && $this->email) {
            self::$errores[] = "El Formato del Correo es Invalido";
        }

        if (!$this->password) {
            self::$errores[] = "La Contraseña es obligatoria";
        } elseif (strlen($this->password) < 6) {
            self::$errores[] = "La Contraseña debe ser de almenos 6 caracteres";
        }
        return self::$errores;
    }


    public function existeUsuario()
    {
        //Revisa si un usuario existe o no 
        $query = "SELECT * FROM " . self::$tabla . " WHERE email='$this->email'";
        $resultado = self::$db->query($query);

        if ($resultado->num_rows === 0) {
            self::$errores[] = 'El usuario no existe';
            return;
        }

        return $resultado;
    }

    public function comprobarPassword($resultado)
    {
        $usuario = $resultado->fetch_object();
        $autenticado = $this->password === $usuario->password;

        if (!$autenticado) {
            self::$errores[] = 'La Contraseña es incorrecta';
        }
        $this->id = $usuario->id;
        $this->nombre = $usuario->nombre;
        $this->is_admin = $usuario->is_admin;
        return $autenticado;
    }

    public function autenticar()
    {
        session_start();
        //Se llena el arreglo de sesion
        $_SESSION['usuario'] = $this->id;
        $_SESSION['nombre'] = $this->nombre;
        $_SESSION['login'] = true;
        $_SESSION['is_admin'] = $this->is_admin;
        header('Location: /predecir-clima');
    }
}