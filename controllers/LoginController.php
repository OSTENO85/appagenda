<?php

namespace Controllers;

use Model\Usuario;
use MVC\Router;



class LoginController {

    //LOGIN USUARIOS////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public static function login(Router $router) {
        $alertas = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $auth = new Usuario($_POST);
            $alertas = $auth->validarLogin();
    
            if (empty($alertas)) {
                // Comprobar que existe el usuario
                $usuario = Usuario::where('email', $auth->email);
    
                if ($usuario) {
                    // Verificar el password
                    if ($usuario->comprobarPassword($auth->password)) {
                        // Autenticar usuario
                        if (session_status() === PHP_SESSION_NONE) {
                            session_start(); // Iniciar la sesión
                        }
                        // Guardar información del usuario en la sesión
                        $_SESSION['id'] = $usuario->id;
                        $_SESSION['nombre'] = $usuario->nombre;
                        $_SESSION['email'] = $usuario->email;
                        $_SESSION['perfil'] = $usuario->perfil; // Aquí asignas el perfil del usuario
                        $_SESSION['login'] = true;

                        header('Location: /principal-admin');
                        exit(); // Terminar ejecución
    
                       
                    } else {
                        Usuario::setAlerta('error', 'Contraseña incorrecta');
                    }
                } else {
                    Usuario::setAlerta('error', 'Usuario no encontrado');
                }
            }
        }
    
        $alertas = Usuario::getAlertas();
        $router->render('auth/login', [
            'alertas' => $alertas
        ]);
    }
    
    //PAGINA PRINCIPAL/////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
    public static function principalAdmin(Router $router) {
  

        $router->render('principal/principal-admin', [
            
        ]);
    }

    //LOGOUT////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public static function logout() {
        session_start();
        $_SESSION = [];
        header('Location: /');

    }

    public static function cambiar() {
        echo "Desde cambiar";
    }

    //CREAR USUARIOS/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public static function crear(Router $router) {
        $usuario = new Usuario;
        $alertas = [];
        //alertas vacias
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $usuario->sincronizar($_POST);
            $alertas = $usuario->validarNuevaCuenta();

            //revisar que la alerta este vacia
            if(empty($alertas)){
                //verificar que usuario no este registrado
               $resultado = $usuario->existeUsuario();

               if($resultado->num_rows){
                 $alertas = Usuario::getAlertas();
               }else{
                    //HASHEAR EL PASSWORD
                    $usuario->hashPassword();

                    //CREAR EL USUARIO
                    $resultado = $usuario->guardar();
              
         
                    if($resultado){
                       Usuario::setAlerta('exito', 'Usuario creado correctamente');
                    }

               }
            }
         
        }
        $alertas = Usuario::getAlertas();
        $router->render('auth/crear-cuenta', [
            'usuario' => $usuario,
            'alertas' => $alertas
            
        ]);
    }

    //VER USUARIOS//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public static function ver(Router $router) {
        $router->render('auth/ver-cuenta', [
            
        ]);
    }

        
    }