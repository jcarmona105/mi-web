<?php 
require 'includes/funciones.php';

incluirTemplate('header', ); 

?>

    <main class="contenedor seccion">
       <section class="seccion contenedor">
        <h2>casas y apartamentos en venta</h2>

          <?php 
        $limite = 10;
        include 'includes/templantes/anuncios.php';
        ?>

    </main>

<?php 


incluirTemplate('footer', ); 

?>