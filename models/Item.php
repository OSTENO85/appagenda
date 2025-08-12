<?php
namespace Model;

class Item extends ActiveRecord{
    protected static $tabla = 'items';
    protected static $columnasDB = ['id', 'nombre','monto', 'facturaId'];
    
    public $id;
    public $nombre;
    public $monto;
    public $facturaId;

public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->monto = $args['monto'] ?? '';
        $this->facturaId = $args['facturaId'] ?? '';

    }

}