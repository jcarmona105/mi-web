<?php

define('TEMPLATES_URL', __DIR__ . '/templantes');
define('FUNCIONES_URL', __DIR__ .'/funciones.php');

function incluirTemplate(string $nombre, bool $inicio = false) {
    // Define la clase del body si es la página principal
    $claseBody = $inicio ? 'pagina-principal' : '';
    include TEMPLATES_URL . "/${nombre}.php";
}

