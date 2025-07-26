<?php 
session_start();

//importar la conexion
require '../includes/confi/database.php';
$db = conectarBD();


//escribir el query
$query = "SELECT * FROM propiedades";


//consultar la BD
$resultadoConsulta = mysqli_query($db, $query);



//muestra mensaje condicional
$resultado = $_GET['resultado'] ?? null; // ✅ Correcto

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null;
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if ($id) {
        // 1. Obtener la imagen actual
        $consulta = "SELECT imagen FROM propiedades WHERE id = ${id}";
        $resultadoConsulta = mysqli_query($db, $consulta);
        $propiedad = mysqli_fetch_assoc($resultadoConsulta);

        if ($propiedad && isset($propiedad['imagen'])) {
            $rutaImagen = '../imagenes/' . $propiedad['imagen'];

            if (is_file($rutaImagen)) {
                unlink($rutaImagen); // ✅ eliminar imagen si existe
            }
        }

        // 2. Eliminar la propiedad de la base de datos
        $query = "DELETE FROM propiedades WHERE id = ${id}";
        $resultado = mysqli_query($db, $query);

        if ($resultado) {
            header('Location: /bienesraices/admin?resultado=3');
            exit;
        }
    }
}



//incluye un template
require '../includes/funciones.php';

incluirTemplate('header'); 

?>

     <main class="contenedor seccion">
  <h1>Administrador</h1>

  <?php if($resultado == 1): ?>
    <p class="alerta exito">Anuncio creado correctamente</p>
  <?php elseif($resultado == 2): ?>
    <p class="alerta exito">Anuncio actualizado correctamente</p>
  <?php elseif($resultado == 3): ?>
    <p class="alerta exito">Anuncio eliminado correctamente</p>
  <?php endif; ?>

  <a href="/bienesraices/admin/propiedades/crear.php" class="boton boton-verde">Nueva propiedad</a>


        <table class="propiedades">
         <thead>
            <tr>
               <th>ID</th>
               <th>Tituloo</th>
               <th>Imagen</th>
               <th>Precio</th>
               <th>Acciones</th>

            </tr>
         </thead>

         <tbody> <!-- Mostrar Resultados -->
            <?php while($propiedad = mysqli_fetch_assoc($resultadoConsulta)): ?>
            <tr>
               <td><?php echo $propiedad['id']; ?></td>
               <td><?php echo $propiedad['titulo']; ?></td>
               <td><img src="../imagenes/<?php echo $propiedad['imagen']; ?>" class="imagen-tabla"></td>
               <td>$<?php echo $propiedad['precio']; ?></td>
               <td>
                  <form method="POST" class="w-100">
                     <input type="hidden" name="id" value="<?php echo $propiedad['id'];?>">
                     <input type="submit" class="boton-rojo-block" value="Eliminar">


                  </form>

                  
                  <a href="/bienesraices/admin/propiedades/actualizar.php?id=<?php echo $propiedad['id'];?>" class="boton-amarillo-block">Actualizar</a>
            </td>
            </tr>
            <?php endwhile; ?>

         </tbody>

        </table>
    </main>

   <?php 

//cerrar la conexion
mysqli_close($db);
      incluirTemplate('footer' ); 

?>