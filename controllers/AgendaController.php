<?php

namespace Controllers;

use MVC\Router;
use Model\Reserva;
use Model\Usuario;
use Model\AdminReserva;

class AgendaController{

    public static function AgendaDashboard(Router $router) {

        
        $router->render('principal/agenda-dashboard', [
            
        ]);
    }


    public static function modificar(Router $router) {
        if(!isset($_SESSION)) { 
            session_start(); 
        } 
        isAuth();
    
        if(!is_numeric($_GET['id'])) return;
    
        $reserva = Reserva::find($_GET['id']);
        $alertas = [];
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $reserva->sincronizar($_POST);
            $alertas = $reserva->validar();
    
            if(empty($alertas)){
                $reserva->guardar();
                header('Location:/agenda-ver');
            }
        }
    
        $router->render('principal/agenda-modificar', [
            'nombre' => $_SESSION['nombre'],
            'id' => $_SESSION['id'],
            'reserva' => $reserva
        ]);
    }
    



    public static function crear(Router $router) {
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 
        isAuth();
        $router->render('principal/agenda-crear', [
            'nombre' => $_SESSION['nombre'],
            'id' => $_SESSION['id']
        ]);
    }


    //VER RESERVAS//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public static function ver(Router $router) {

        if(!isset($_SESSION)) { 
            session_start(); 
        } 
        isAuth();
    
        $fecha = $_GET['fecha'] ?? '';
        $reservas = [];
    
        // Validar si hay fecha
        if ($fecha !== '') {
            $fechas = explode('-', $fecha);
    
            if( !checkdate( $fechas[1], $fechas[2], $fechas[0])) {
                header('Location: /404');
                exit;
            }
        }
    
        // Consulta base
        $consulta = "SELECT reservas.id, reservas.nombre as nombreEvento, reservas.fecha, reservas.hora, ";
        $consulta .= " reservas.detalles, tipos.nombre as nombreTipo, reservas.estado, usuarios.nombre as creadoPor ";
        $consulta .= " FROM reservas ";
        $consulta .= " LEFT OUTER JOIN usuarios ON reservas.usuarioId = usuarios.id ";
        $consulta .= " LEFT OUTER JOIN tipos ON reservas.tipoId = tipos.id ";
        $consulta .= " WHERE reservas.estado = 0 ";
    
        // Agregar condición de fecha solo si se ingresó
        if ($fecha !== '') {
            $consulta .= " AND reservas.fecha = '$fecha' ";
        }
    
        $consulta .= " ORDER BY reservas.fecha ASC ";
    
        $reservas = AdminReserva::SQL($consulta);
    
        $router->render('principal/agenda-ver', [
            'nombre' => $_SESSION['nombre'],
            'id' => $_SESSION['id'],
            'reservas' => $reservas,
            'fecha' => $fecha
        ]);
    }
    

   //VER RESERVAS//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
   public static function verCompletos(Router $router) {

    if(!isset($_SESSION)) { 
        session_start(); 
    } 
    isAuth();

    $fecha = $_GET['fecha'] ?? '';
    $reservas = [];

    // Validar si hay fecha
    if ($fecha !== '') {
        $fechas = explode('-', $fecha);

        if( !checkdate( $fechas[1], $fechas[2], $fechas[0])) {
            header('Location: /404');
            exit;
        }
    }

    // Consulta base
    $consulta = "SELECT reservas.id, reservas.nombre as nombreEvento, reservas.fecha, reservas.hora, ";
$consulta .= "reservas.detalles, tipos.nombre as nombreTipo, reservas.estado, usuarios.nombre as creadoPor ";
$consulta .= "FROM reservas ";
$consulta .= "LEFT OUTER JOIN usuarios ON reservas.usuarioId = usuarios.id ";
$consulta .= "LEFT OUTER JOIN tipos ON reservas.tipoId = tipos.id ";
$consulta .= "WHERE reservas.estado = 1 ";




    // Agregar condición de fecha solo si se ingresó
    if ($fecha !== '') {
        $consulta .= " AND reservas.fecha = '$fecha' ";
    }

    $consulta .= " ORDER BY reservas.fecha DESC ";
    $consulta .= "LIMIT 30";

    $reservas = AdminReserva::SQL($consulta);

    $router->render('principal/agenda-verCompletos', [
        'nombre' => $_SESSION['nombre'],
        'id' => $_SESSION['id'],
        'reservas' => $reservas,
        'fecha' => $fecha
    ]);
}

}