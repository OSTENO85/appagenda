<?php

<<<<<<< HEAD
$db = mysqli_connect(
    $_ENV['DB_HOST'],
    $_ENV['DB_USER'],
    $_ENV['DB_PASS'],
    $_ENV['DB_NAME'],
);
=======
$db = mysqli_connect('localhost', 'root', 'root', 'appagenda');
>>>>>>> 25ce17e (nuevos cambios)


if (!$db) {
    echo "Error: No se pudo conectar a MySQL.";
    echo "errno de depuración: " . mysqli_connect_errno();
    echo "error de depuración: " . mysqli_connect_error();
    exit;
}
