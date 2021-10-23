<?php

namespace Model;

class Usuario extends ActiveRecord
{

    protected static $tabla = "usuario";
    protected static $columnasDB = ["id_usuario", "nombre", "app", "apm", "email", "password", "is_admin"];

    public $id_usuario;
    public $nombre;
    public $app;
    public $apm;
    public $email;
    public $password;
    public $is_admin;


    public function __construct($args = [])
    {
        $this->id_usuario = $args['id_usuario'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->app = $args['app'] ?? '';
        $this->apm = $args['apm'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->is_admin = $args['is_admin'] ?? '';
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
        if (!$this->email) {
            self::$errores[] = "El Correo es obligatorio";
        }

        if (!$this->password) {
            self::$errores[] = "La Contraseña es obligatoria";
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

        $this->is_admin = $usuario->is_admin;
        return $autenticado;
    }

    public function autenticar()
    {
        session_start();
        //Se llena el arreglo de sesion
        $_SESSION['usuario'] = $this->email;
        $_SESSION['login'] = true;
        $_SESSION['is_admin'] = $this->is_admin;
        header('Location: /predecir-clima');
    }
}