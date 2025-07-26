<?php 
require 'includes/funciones.php';

incluirTemplate('header', ); 

?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Guia para decoracion de tu hogar</h1>

        

        <picture>
            <source srcset="build/img/destacada2.webp" type="image/webp">
            <source srcset="build/img/destacada2.jpg" type="image/jpeg">
            <img loading="lazy" src="build/img/destacada2.jpg" alt="imagen de propiedad">
        </picture>
        <p class="informacion-meta">Escrito el: <span>25/05/2025</span> por: <span>Admin</span></p>
        <div class="resumen-propiedad">
            
                <p>Lorem ipsum dolor sit, amet consectetur
                adipisicing elit. Reiciendis delectus eaque 
                qui a maiores ratione, eos consectetur tempore 
                quod ut aut expedita, deleniti, omnis harum autem!
                 Asperiores cum vero deserunt?
                Lorem ipsum dolor sit, amet consectetur
                adipisicing elit. Reiciendis delectus eaque 
                qui a maiores ratione, eos consectetur tempore 
                quod ut aut expedita, deleniti, omnis harum autem!
                 Asperiores cum vero deserunt?</p>

        </div>
    </main>

<?php 


incluirTemplate('footer', ); 

?>