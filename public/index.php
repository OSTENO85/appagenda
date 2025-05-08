<?php 

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\APIController;
use Controllers\LoginController;
use Controllers\AgendaController;
use Controllers\ComidasController;
use Controllers\LugaresController;

$router = new Router();
//LOGIN///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//iniciar sesión
$router->get('/', [LoginController::class, 'login']);
$router->post('/', [LoginController::class, 'login']);
$router->get('/logout', [LoginController::class, 'logout']);

//recuperar password
$router->get('/cambiar', [LoginController::class, 'cambiar']);
$router->get('/cambiar', [LoginController::class, 'cambiar']);

//crear cuenta
$router->get('/crear-cuenta', [LoginController::class, 'crear']);
$router->post('/crear-cuenta', [LoginController::class, 'crear']);

//ver cuentas
$router->get('/ver-cuenta', [LoginController::class, 'ver']);
$router->post('/ver-cuenta', [LoginController::class, 'ver']);



//Pagina Principal//////////////////////////////////////////////////////////////////////////////////////////////////////////////
$router->get('/principal-admin', [LoginController::class, 'principalAdmin']);


//AGENDA//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//Agenda Dashboard
$router->get('/agenda-dashboard', [AgendaController::class, 'AgendaDashboard']);

//Agenda Crear Evento
$router->get('/agenda-crear', [AgendaController::class, 'crear']);
$router->post('/agenda-crear', [AgendaController::class, 'crear']);

//Agenda Modificar Evento
$router->get('/agenda-modificar', [AgendaController::class, 'modificar']);
$router->post('/agenda-modificar', [AgendaController::class, 'modificar']);

//Agenda ver Evento
$router->get('/agenda-ver', [AgendaController::class, 'ver']);
$router->post('/agenda-ver', [AgendaController::class, 'ver']);

//Agenda ver Eventos Completos
$router->get('/agenda-verCompletos', [AgendaController::class, 'verCompletos']);
$router->post('/agenda-verCompletos', [AgendaController::class, 'verCompletos']);



//API de eventos/////////////////////////////////////////////////////////////////////////////////////////////////////////
$router->get('/api/tipos', [APIController::class, 'index']);
$router->post('/api/reservas', [APIController::class, 'guardar']);




//LUGARES/////////////////////////////////////////////////////////////////////////////////////////////////////////////

//Lugares Crear
$router->get('/lugares-crear', [LugaresController::class, 'crear']);
$router->post('/lugares-crear', [LugaresController::class, 'crear']);

//lugares Modificar
$router->get('/lugares-modificar', [LugaresController::class, 'modificar']);
$router->post('/lugares-modificar', [LugaresController::class, 'modificar']);

$router->get('/lugares-ver', [LugaresController::class, 'ver']);
$router->post('/lugares-ver', [LugaresController::class, 'ver']);

//COMIDAS//////////////////////////////////////////////////////////////////////////////////////////////////////////////

//Comidas Crear
$router->get('/comidas-crear', [ComidasController::class, 'crear']);
$router->post('/comidas-crear', [ComidasController::class, 'crear']);

//Comidas Modificar}
$router->get('/comidas-modificar', [ComidasController::class, 'modificar']);
$router->post('/comidas-modificar', [ComidasController::class, 'modificar']);

$router->get('/comidas-ver', [ComidasController::class, 'ver']);
$router->post('/comidas-ver', [ComidasController::class, 'ver']);


// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();