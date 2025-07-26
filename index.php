<?php 
require 'includes/funciones.php';

incluirTemplate('header', $inicio = true); 

?>

    <main class="contenedor seccion">
        <h1>Mas sobre nosotros</h1>

        <div class="iconos-nosotros">
    <div class="icono">
        <img src="build/img/icono1.svg" alt="icono seguridad" loading="lazy">
        <h3>Seguridad</h3>
        <p>Lorem ipsum dolor sit amet
             consectetur adipisicing 
             elit. Aspernatur, ullam 
             voluptatum praesentium illo earum ex. 
             </p>
    </div>

    <div class="icono">
        <img src="build/img/icono2.svg" alt="icono precio" loading="lazy">
        <h3>Precio</h3>
        <p>Lorem ipsum dolor sit amet
             consectetur adipisicing 
             elit. Aspernatur, ullam 
             voluptatum praesentium illo earum ex.</p>
    </div>

    <div class="icono">
        <img src="build/img/icono3.svg" alt="icono tiempo" loading="lazy">
        <h3>A Tiempo</h3>
        <p>Lorem ipsum dolor sit amet
             consectetur adipisicing 
             elit. Aspernatur, ullam 
             voluptatum praesentium illo earum ex.</p>
    </div>
</div>


        
    </main>

    <section class="seccion contenedor">
        <h2>casas y apartamentos en venta</h2>

        <?php 
        $limite = 3;
        include 'includes/templantes/anuncios.php';
        ?>

        <!--tenido anuncio-->




        <div class="alinear-derecha">
            <a href="anuncios.php" class="boton-verde">Ver todas</a>
        </div>
    </section>

    <section class="imagen-contacto">
        <h2>Encuentra la casa de tus sueños</h2>
        <p>Llena el formulario de contacto y un asesor se pondra en contacto contigo</p>
        <a href="contacto.php" class="boton-amarillo">contactanos</a>

    </section>

    <div class="contenedor seccion seccion-inferior">
        <section class="blog">
            <h3>Nuestro Blog</h3>
            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog1.webp" type="image/webp">
                        <source srcset="build/img/blog1.jpg" type="image/jpeg">
                        <img loading="lazy" src="build/img/blog1.jpg" alt="texto entrada al blog">
                    </picture>

                </div>
                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>Terraza en el techo de tu casa</h4>
                        <p>Escrito el: <span>25/05/2025</span> por: <span>Admin</span></p>

                        <p>
                            Consejos para construir una terraza en tu casa
                        </p>

                    </a>

                </div>

            </article>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog2.webp" type="image/webp">
                        <source srcset="build/img/blog2.jpg" type="image/jpeg">
                        <img loading="lazy" src="build/img/blog2.jpg" alt="texto entrada al blog">
                    </picture>

                </div>
                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>Decoracion en tu hogar</h4>
                        <p class="informacion-meta">Escrito el: <span>25/05/2025</span> por: <span>Admin</span></p>

                        <p>
                            Maximiza el espacio en tu hogar
                        </p>

                    </a>

                </div>

            </article>

        </section>

        <section class="testimoniales">
            <h3>testimoniales</h3>
            <div class="testimonial">
                <blockquote>
                    El personal se comporto de una excelente forma, la casa cumple 
                    con mis expectativas.
                </blockquote>
                <p>-Jorge Carmona- </p>

            </div>
        </section>

    </div>

<?php 


incluirTemplate('footer', ); 

?>