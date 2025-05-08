<?php

namespace Controllers;

use MVC\Router;
use Model\Comida;

class ComidasController{
    public static function ver(Router $router){

        $comidas = Comida::all1();


        $router->render('principal/comidas-ver',[
            'comidas' => $comidas
       
        ]);
    }


    public static function crear(Router $router){

        $comida = new Comida;
        $alertas = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $comida->sincronizar($_POST);
            $alertas = $comida->validar();

            if(empty($alertas)){
                $comida->guardar();
                header('Location: /comidas-ver');
            }

        }

        $router->render('principal/comidas-crear',[
            'comida' => $comida,
            'alertas' => $alertas
        ]);
     }
 
     public static function modificar(Router $router){


        $id = is_numeric($_GET['id']);
        if(!$id) return;
        $comida = Comida::find($_GET['id']);
        $alertas = [];
          if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $comida->sincronizar($_POST);
            $comida->guardar();
            header('Location: /comidas-ver');
        }

        $router->render('principal/comidas-modificar',[
            'comida' => $comida,
            'alertas' => $alertas
        ]);
     }
}