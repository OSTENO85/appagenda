<?php

namespace Model;

class AdminReserva extends ActiveRecord {
    //base de datos
    protected static $tabla = 'reservas';
    protected static $columnasDB = ['id', 'nombreEvento', 'fecha', 'hora', 'detalles', 'nombreTipo', 'estado', 'creadoPor'];

    public $id;
    public $nombreEvento;
    public $fecha;
    public $hora;
    public $detalles;
    public $nombreTipo;
    public $estado;
    public $creadoPor;

    public function __construct($args = [])
    {
       $this->id = $args['id'] ?? null;
       $this->nombreEvento = $args['nombreEvento'] ?? '';
       $this->fecha = $args['fecha'] ?? '';
       $this->hora = $args['hora'] ?? '';
       $this->detalles = $args['detalles'] ?? '';
       $this->nombreTipo = $args['nombreTipo'] ?? '';
       $this->estado = $args['estado'] ?? '';
       $this->creadoPor = $args['creadoPor'] ?? '';
       
    }
}