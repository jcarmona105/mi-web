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

    <section class="seccion contenedor pago-servicio">
        <div class="pago-servicio__intro">
            <h2>Pago seguro de tu servicio</h2>
            <p>Completa tu solicitud y liquida el servicio sin fricciones. Mantén tus datos protegidos y recibe confirmación inmediata.</p>
        </div>
        <div class="pago-servicio__opciones">
            <article class="pago-servicio__opcion">
                <h3>Métodos de pago</h3>
                <p>Aceptamos tarjetas de crédito, débito y transferencias para que elijas la opción que mejor se adapte a ti.</p>
                <ul>
                    <li>Visa, MasterCard y American Express</li>
                    <li>Transferencia bancaria con referencia</li>
                    <li>Pagos recurrentes para planes de mantenimiento</li>
                </ul>
            </article>
            <article class="pago-servicio__opcion">
                <h3>Transparencia y soporte</h3>
                <p>Recibirás un comprobante digital y soporte personalizado para cualquier duda o ajuste en tu pago.</p>
                <ul>
                    <li>Resumen detallado antes de confirmar</li>
                    <li>Factura electrónica disponible</li>
                    <li>Asistencia por chat y teléfono</li>
                </ul>
            </article>
        </div>
        <div class="pago-servicio__accion">
            <p>¿Listo para contratar? Gestiona el pago con nuestro equipo y asegura tu servicio hoy mismo.</p>
            <a href="contacto.php" class="boton-verde">Solicitar enlace de pago</a>
        </div>
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