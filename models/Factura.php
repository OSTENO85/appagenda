<?php

namespace Model;

use Model\ActiveRecord;

class Factura extends ActiveRecord{
    //Base de datos
    protected static $tabla = 'facturas';
    protected static $columnasDB = ['id', 'nombre', 'detalle' , 'estado', 'total', 'moneda'];
    
    public $id;
    public $nombre;
    public $detalle;
    public $estado;
    public $total;
    public $moneda;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->detalle = $args['detalle'] ?? '';
        $this->estado = $args['estado'] ?? '';
        $this->total = $args['total'] ?? 0;
        $this->moneda = $args['moneda'] ?? '';

    }

    public function validarFactura(){
        if(!$this->nombre){
            self::$alertas['error'] [] =  ' El nombre es obligatorio';
        }
        return self::$alertas;
    }
}