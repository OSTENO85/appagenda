<?php

namespace Controllers;

use Model\Factura;
use MVC\Router;

class FacturaController {
    public static function FacturaDashboard(Router $router){


        $router->render('principal/factura-dashboard', [
        
        ]);
    }


    public static function actualizarTotal() {
        $id = $_POST['id'] ?? null;
        $total = $_POST['total'] ?? null;

        if(!$id || $total === null) {
            echo json_encode([
                'tipo' => 'error',
                'mensaje' => 'Datos incompletos'
            ]);
            return;
        }

        $factura = Factura::find($id);
        if($factura) {
            $factura->total = $total;
            $factura->guardar();

            echo json_encode([
                'tipo' => 'exito',
                'mensaje' => 'Total actualizado correctamente'
            ]);
        } else {
            echo json_encode([
                'tipo' => 'error',
                'mensaje' => 'Factura no encontrada'
            ]);
        }
    }



    //CREAR FACTURA///////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public static function crear(Router $router){
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 
        isAuth();
        $alertas = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            
         $factura = new Factura($_POST);
         //validacion
         $alertas = $factura->validarFactura();

            if(empty($alertas)){
                $factura->estado = 0;

                //guardar factura
                $factura->guardar();
                //redireccionar
                header('Location: /factura-ver');
            }

        }

        $router->render('principal/factura-crear', [
            'alertas' => $alertas
        ]);
    }

    //VER FACTURAS PENDIENTE//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public static function ver(Router $router){

            $facturas = Factura::belongsTo('estado',0);

        $router->render('principal/factura-ver', [
            'facturas' => $facturas
        
        ]);
    }

    //VER FACTURA/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public static function factura(Router $router){
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 
        isAuth();
        $alertas = [];

        $token = $_GET['id'];
        $factura = factura::where('id', $token);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $factura->sincronizar($_POST);
            $alertas = $factura->validar();
    
            if(empty($alertas)){
                $factura->guardar();
                header('Location:/factura-ver');
            }
        }
       

        $router->render('principal/factura', [
            'alertas' => $alertas,
            'titulo' => 'Nombre de la factura',
            'factura' => $factura
        ]);
    }

    //VER FACUTRAS COMPLETAS//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public static function verCompletos(Router $router){
        $facturas = Factura::belongsTo('estado',1);

        $router->render('principal/factura-verCompletos', [
            'facturas' => $facturas
        ]);
    }


    //ITEM FACTURAS/////////////////////////////////////////////////////////////////////////////////////////////////////////

    public static function items(Router $router){
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 
        isAuth();
        $alertas = [];

        $token = $_GET['id'];
        $factura = factura::where('id', $token);
       

        $router->render('principal/factura-items', [
            'alertas' => $alertas,
            'titulo' => 'Nombre de la factura',
            'factura' => $factura
        ]);
    }
}

