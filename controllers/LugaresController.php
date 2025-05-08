<?php

namespace Controllers;


use MVC\Router;
use Model\Lugar;

class LugaresController{
    public static function ver(Router $router){

        $lugares = Lugar::all();


        $router->render('principal/lugares-ver',[
            'lugares' => $lugares
       
        ]);
    }



    public static function crear(Router $router){

      $lugar = new Lugar;
      $alertas = [];
      if ($_SERVER['REQUEST_METHOD'] === 'POST'){
          $lugar->sincronizar($_POST);
          $alertas = $lugar->validar();

          if(empty($alertas)){
              $lugar->guardar();

              
              header('Location: /lugares-ver');
          }

      }

      $router->render('principal/lugares-crear',[
          'lugar' => $lugar,
          'alertas' => $alertas
      ]);
   }

    public static function modificar(Router $router){

        $id = is_numeric($_GET['id']);
        if(!$id) return;
        $lugar = Lugar::find($_GET['id']);
        $alertas = [];
         if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $lugar->sincronizar($_POST);
            $lugar->guardar();
            header('Location: /lugares-ver');
       }


       $router->render('principal/lugares-modificar',[
        'lugar' => $lugar,
        'alertas' => $alertas
       ]);
    }
}