<?php
if (!isset($_SESSION)) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raices</title>
    <link rel="stylesheet" href="/bienesraices/build/css/app.css">




</head>
<body class="<?php echo $claseBody ?? ''; ?>">


    <header class="header <?php echo  ($inicio) ? 'inicio' : '' ?> ">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="index.php">
                <img src="/bienesraices/build/img/logo.svg" alt="logotipo de bienes raices">
                </a>
<div class="mobile-menu">
                    <img src="/bienesraices/build/img/barras.svg" alt="icono menu respo">

                </div>
                <div class="derecha">
                    <img class="dark-mode-boton" src="/bienesraices/build/img/dark-mode.svg">
                <nav class="navegacion">
                    <a href="nosotros.php">Nosotros</a>
                    <a href="anuncios.php">Anuncios</a>
                    <a href="blog.php">Blog</a>
                    <a href="contacto.php">Contacto</a>
                    <?php if (isset($_SESSION['login']) && $_SESSION['login'] === true): ?>
                    <a href="/bienesraices/cerrar_sesion.php">Cerrar sesión</a>


<?php endif; ?>


                </nav>
                </div>
                </div>

                <?php 
                if($inicio){
                    echo "<h1>Venta de Casas y Apartamentos Exclusivos de Lujo</h1>";
                }
                ?>
                </div>
    </header>