<?php

//importar la conexion
require 'includes/confi/database.php';
$db = conectarBD();



//crear un mail y password
$email = "correo@.com";
$password = '123456';

$passwordHash = password_hash ($password, PASSWORD_BCRYPT);

//query para crear el usuario
$query = "INSERT INTO usuarios(email, password) VALUES ('${email}', '${passwordHash}');";
//echo $query;



//agregar a la base de datos
mysqli_query($db, $query);