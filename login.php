<?php
require 'includes/confi/database.php';
$db = conectarBD();

$errores = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validar y limpiar entradas
    $email = mysqli_real_escape_string(
        $db,
        filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)
    );
    $password = mysqli_real_escape_string($db, $_POST['password']);

    // Validaciones básicas
    if (!$email) {
        $errores[] = "El email es obligatorio o no es válido.";
    }

    if (!$password) {
        $errores[] = "La contraseña es obligatoria.";
    }

    if (empty($errores)) {
        // Buscar el usuario por email
        $query = "SELECT * FROM usuarios WHERE email = '${email}'";
        $resultado = mysqli_query($db, $query);

        if ($resultado && $resultado->num_rows > 0) {
            // El usuario existe
            $usuario = mysqli_fetch_assoc($resultado);

            // ✅ Verificar que la contraseña ingresada coincida con la encriptada
            $auth = password_verify($password, $usuario['password']);

            if ($auth) {
                // La contraseña es correcta → iniciar sesión
                session_start();

                $_SESSION['usuario'] = $usuario['email'];
                $_SESSION['login'] = true;

                // Redirigir al panel administrativo
                header('Location: /bienesraices/admin');
                exit;
            } else {
                $errores[] = "La contraseña es incorrecta.";
            }
        } else {
            $errores[] = "El usuario no existe.";
        }
    }
}

require 'includes/funciones.php';
incluirTemplate('header');
?>

<main class="contenedor seccion contenido-centrado">
    <h1>Iniciar Sesión</h1>

    <?php foreach ($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form method="POST" class="formulario">
        <fieldset>
            <legend>Email y Password</legend>

            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" placeholder="Tu Email" required value="<?php echo htmlspecialchars($_POST['email'] ?? '') ?>">

            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Tu Password" required>
        </fieldset>

        <input type="submit" class="boton boton-verde" value="Iniciar Sesión">
    </form>
</main>

<?php
incluirTemplate('footer');
?>

