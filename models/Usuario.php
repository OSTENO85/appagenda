<?php
namespace Model;

use Model\ActiveRecord;

class Usuario extends ActiveRecord {
    //Base de datos
    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'email', 'perfil', 'password'];

    public $id;
    public $nombre;
    public $apellido;
    public $email;
    public $perfil;
    public $password;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? ''; // Ahora es una cadena vacía en lugar de null
        $this->apellido = $args['apellido'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->perfil = $args['perfil'] ?? '';
        $this->password = $args['password'] ?? '';
    }
    

    //mensajes de validacion para la creacion de una cuenta
    public function validarNuevaCuenta()
    {
        if(!$this->nombre){
            self::$alertas['error'][] =  ' El nombre es obligatorio';
        }

        if(!$this->apellido){
            self::$alertas['error'][] = ' El apellido es obligatorio';
        }

        if(!$this->email){
            self::$alertas['error'][] = ' El email es obligatorio';
        }

        if($this->perfil === null || $this->perfil === ''){
            self::$alertas['error'][] = ' El perfil es obligatorio';
        }
        

        if(!$this->password){
            self::$alertas['error'][] = ' El password es obligatorio';
        }

        if(strlen ($this->password)<6){
            self::$alertas['error'][] = ' El password debe tener al menos 6 caracteres';
        }

        return self::$alertas;
    }

    //VALIDAR LOGIN//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        public function validarLogin(){
            if(!$this->email){
                self::$alertas['error'] [] = 'El Email es obligatorio';
            }

            if(!$this->password){
                self::$alertas['error'] [] = 'El password es obligatorio';
            }

            return self::$alertas;
        }

     //EXISTE USUAARIO///////////////////////////////////////////////////////////////////////////////////////////////////////////////   

        public function existeUsuario(){
            $query = " SELECT * FROM " . self::$tabla . " WHERE email = '" . $this->email . "' LIMIT 1";
           $resultado = self::$db->query($query);
           if($resultado->num_rows){
            self::$alertas['error'][] = 'El usuario ya está registrado';
           }

           return $resultado;
        }

        public function hashPassword(){
            $this->password = password_hash($this->password, PASSWORD_BCRYPT);
        }

    //COMPROBAR PASSWORD/////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function comprobarPassword($password){
            $resultado = password_verify($password, $this->password);
            return $resultado;
        
    }
}