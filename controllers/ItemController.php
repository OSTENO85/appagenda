<?php

namespace Controllers;

use Model\Item;
use Model\Factura;

class ItemController{
    public static function index(){
        $facturaId = $_GET['id'];
        $factura = Factura::where('id', $facturaId);
    
        $items = Item::belongsTo('facturaId', $factura->id);
        echo json_encode(['items' => $items]);
    }


    public static function crear(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $facturaId = $_POST['facturaId'];
                $factura = Factura::where('id', $facturaId );
              
                

                $item = new Item($_POST);
                $resultado = $item->guardar();

        
                
                $respuesta = [
                    'tipo' => 'exito',
                    'id' => $resultado['id'],
                    'mensaje' => 'Item creado correctamente'

                ];
                echo json_encode($respuesta);
        }
    }


    


    public static function eliminar(){
          if($_SERVER['REQUEST_METHOD'] === 'POST'){
            
        }
    }
}