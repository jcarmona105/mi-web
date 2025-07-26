<?php
function conectarBD() : mysqli{
    $db = mysqli_connect('localhost', 'root', '', 'bienes_raices');

    if(!$db){
        echo "se conectoerror no se conecto";
        exit;

    }
    return $db;
}
