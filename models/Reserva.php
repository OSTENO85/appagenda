<?php

namespace Model;

class Reserva extends ActiveRecord {
    //base de datos
    protected static $tabla = 'reservas';
    protected static $columnasDB = ['id', 'nombre', 'tipoId', 'fecha', 'hora', 'detalles', 'usuarioId', 'estado'];

    public $id;
    public $nombre;
    public $tipoId;
    public $fecha;
    public $hora;
    public $detalles;
    public $usuarioId;
    public $estado;

    public function __construct($args = [])
    {
       $this->id = $args['id'] ?? null;
       $this->nombre = $args['nombre'] ?? '';
       $this->tipoId = $args['tipoId'] ?? '';
       $this->fecha = $args['fecha'] ?? '';
       $this->hora = $args['hora'] ?? '';
       $this->detalles = $args['detalles'] ?? '';
       $this->usuarioId = $args['usuarioId'] ?? '';
       $this->estado = $args['estado'] ?? '';
       
    }


    
}