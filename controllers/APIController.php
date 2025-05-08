<?php

namespace Controllers;

use Model\Tipo;
use MVC\Router;
use Model\Reserva;


class APIController{
    public static function index(){
        $tipos = Tipo::all();
        echo json_encode($tipos);
    }


    public static function guardar(){
       $reserva = new Reserva($_POST);
        $resultado = $reserva->guardar();
       echo json_encode($resultado);
    }
}