<?php 
<<<<<<< HEAD
use Dotenv\Dotenv;
use Model\ActiveRecord;


require __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

require 'funciones.php';
require 'database.php';


// Conectarnos a la base de datos

=======

require 'funciones.php';
require 'database.php';
require __DIR__ . '/../vendor/autoload.php';

// Conectarnos a la base de datos
use Model\ActiveRecord;
>>>>>>> 25ce17e (nuevos cambios)
ActiveRecord::setDB($db);