<?php

namespace Model;

class Comida extends ActiveRecord{
    //Base de datos
    protected static $tabla = 'comidas';
    protected static $columnasDB = ['id', 'nombre', 'descripcion', 'tipo'];

    public $id;
    public $nombre;
    public $descripcion;
    public $tipo;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->tipo = $args['tipo'] ?? '';
    }

    public function validar(){
        if(!$this->nombre){
            self::$alertas['error'] [] =  ' El nombre es obligatorio';
        }

        if(!$this->tipo){
            self::$alertas['error'] [] =  ' El tipo es obligatorio';
        }


        return self::$alertas;
    }
}