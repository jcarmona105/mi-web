<?php 
//base de datos
require '../../includes/confi/database.php';
$db = conectarBD();

//consultr para obtener los vendedores
$consulta ="SELECT * FROM vendedores";
$resultado = mysqli_query($db, $consulta);


//arreglo con mensajes de error
$error = [];

   $titulo = '';
   $precio = '';
   $descripcion = '';
   $habitaciones = '';
   $wc = '';
   $estacionamiento = '';
   $vendedorid = '';

//ejecutar el codigo despues que el usuario envia el formulario
if($_SERVER['REQUEST_METHOD'] === 'POST'){
   //echo "<pre>";
   //var_dump($_POST);
   //echo "</pre>";

   $titulo = mysqli_real_escape_string($db, $_POST['titulo']);
   $precio = mysqli_real_escape_string($db, $_POST['precio']);
   $descripcion = mysqli_real_escape_string($db, $_POST['descripcion']);
   $habitaciones = mysqli_real_escape_string($db,  $_POST['habitaciones']);
   $wc = mysqli_real_escape_string($db, $_POST['wc']);
   $estacionamiento = mysqli_real_escape_string($db, $_POST['estacionamiento']);
   $vendedorid = mysqli_real_escape_string($db, $_POST['vendedor']);
   $creado = date('y/m/d');

   //asignar files hacia una variable
   $imagen = $_FILES['imagen'];
  

   if(!$titulo){
      $error[] = "Debes añadir un titulo";
   }

   if(!$precio){
      $error[] = "Debes añadir un precio";
   }

   if(strlen($descripcion) < 50){
      $error[] = "Debes añadir un descripcion al menos  50 caracteres";
   }

   if(!$habitaciones){
      $error[] = "Debes añadir habitaciones";
   }

   if(!$wc){
      $error[] = "Debes añadir un baño";
   }

   if(!$estacionamiento){
      $error[] = "Debes añadir un estacionamiento";
   }

   if(!$vendedorid){
      $error[] = "Debes añadir un vendedor";
   }

   if(!$imagen['name'] || $imagen['error']){
      $error[] = "La imagen es obligatoria";
   }
  
   //validar por tamaño (100 kb maximo)
   $medida = 1000 * 100;

   if ($imagen['size']> $medida){
      $error[] = "La imagen es muy pesada";
   }

   //var_dump($error);

   //revisr arreglo de error este vacio

   if(empty($error)){

      //subida de archivos

      //crear carpeta
      $carpetaImagenes = '../../imagenes';

      if(!is_dir($carpetaImagenes)){
         mkdir($carpetaImagenes);
      }

      //generar nombre unico
      $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

      //subir imagen
      move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . "/" . $nombreImagen );







   //insertar base de datos
   $query = "INSERT INTO propiedades (titulo, precio, imagen, descripcion,
habitaciones, wc, estacionamiento, creado, vendedorid ) 
VALUES ('$titulo', '$precio', '$nombreImagen', '$descripcion', '$habitaciones', '$wc', '$estacionamiento', '$creado', '$vendedorid')";


    $resultado = mysqli_query ($db, $query);
    if($resultado){

      //redireccionar al usuario
      header('Location: /bienesraices/admin?resultado=1');
    }
   } 


}


require '../../includes/funciones.php';

incluirTemplate('header', ); 

?>

     <main class="contenedor seccion">
        <h1>crear</h1>
        <a href="/bienesraices/admin" class="boton boton-verde">Volver </a>
        <?php foreach($error as $falla): ?>
    <div class="alerta error">
        <?php echo $falla; ?>
    </div>
<?php endforeach; ?>


        <form class="formulario" method="post" enctype="multipart/form-data" action="/bienesraices/admin/propiedades/crear.php" enctype="multipart/form-data">

         <fieldset>
            <legend>Informacion General</legend>

            <label for="titulo">Titulo:</label>
            <input type="text" id="titulo" name="titulo" placeholder="titulo de la propiedad" value="<?php echo $titulo; ?>">

            <label for="precio">Precio:</label>
            <input type="number" id="precio" name="precio" placeholder="precio propiedad" value="<?php echo $precio; ?>">

            <label for="imagen">imagen:</label>
            <input type="file" id="imagen"  accept="image/jpg, image/png" name="imagen">

            <label for="descripcion">Descripcion:</label>
            <textarea id="descripcion" name="descripcion" ><?php echo $descripcion; ?></textarea>

         </fieldset>

         <fieldset>
            <legend>Informacion de la propiedad</legend>

            <label for="habitaciones">Habitaciones:</label>
            <input type="number" id="habitaciones" name="habitaciones" placeholder="ej 3" min="1" max="9" value="<?php echo $habitaciones; ?>">

            <label for="wc">Baños:</label>
            <input type="number" id="wc" name="wc" placeholder="ej 3" min="1" max="9" value="<?php echo $wc; ?>">

            <label for="estacionamiento">Estacionamiento:</label>
            <input type="number" id="estacionamiento" name="estacionamiento" placeholder="ej 3" min="1" max="9" value="<?php echo $estacionamiento; ?>">

            

         </fieldset>

         <fieldset>
            <legend>Vendedor</legend>
            <select name="vendedor">
               <option value="">--seleccione--</option>
               <?php while($vendedor = mysqli_fetch_assoc($resultado)):?>
                  <option  <?php echo $vendedorid === $vendedor['id'] ? 'selected' : ''; ?>  value="<?php echo $vendedor['id']; ?>"><?php echo $vendedor['nombre'] . " " . $vendedor['apellido']; ?></option>


                <?php endwhile; ?>  

            </select>

            

            

         </fieldset>

         <input type="submit" value="crear propiedad" class="boton boton-verde">

         
        </form>
    </main>

   <?php 


incluirTemplate('footer', ); 

?>