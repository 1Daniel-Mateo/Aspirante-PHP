<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Formulario de inicio de sesión para acceder a la plataforma.">
    <meta name="keywords" content="login, inicio de sesión, portal, registro">
    <meta name="Mateo" content="Grupo ASD">
    <meta name="robots" content="index, follow">
    <link rel="stylesheet" href="assets/css/formulario.css">
    <link rel="icon" href="assets/img/icono.ico">
    <title>Login</title>
</head>
<body>
    <form method="POST" action="models/login.php" class="form">
        <h1 class="titulo">Inicia Sesión</h1>
        <div class="campos">
            <P>Si no tienes cuenta registrate aqui <a class="enlace" href="views/registro.php">REGISTRO</a></P>
            <div class="group_form">
                <input type="email" name="correo" placeholder=" ">
                <label for="correo">Correo electrónico</label>
                <span class="linea"></span>
            </div>
            <div class="group_form">
                <input type="password" name="documento" placeholder=" ">
                <label for="documento">Contraseña</label>
                <span class="linea"></span>
            </div>
            <button type="submit" class="boton">Iniciar sesión</button>
        </div>
    </form>
    <?php
    // Función para mostrar mensajes verificando el tipo
    function mostrar_mensaje($tipo, $mensaje) {
        echo "<p class='mensaje-$tipo visible'>$mensaje</p>";
    }

    //Mensajes de confirmación
    if (isset($_GET['status'])) {
        switch ($_GET['status']) {
            case 'success':
                mostrar_mensaje('valido', 'Registro exitoso.');
                break;
            case 'salida':
                mostrar_mensaje('valido', 'Sesion Cerrada.');
                break;
            case 'eliminar':
                mostrar_mensaje('valido', 'Usuario Eliminado.');
                break;
        }
    }

    //Errores de ingreso
    if (isset($_GET['error'])) {
        switch ($_GET['error']) {
            case 'login':
                mostrar_mensaje('error', 'Error en correo o contraseña.');
                break;
            case 'campos':
                mostrar_mensaje('error', 'Por favor, complete todos los campos.');
                break;
            case 'sesion':
                mostrar_mensaje('error', 'Debes iniciar sesión primero.');
                break;
        }
    }
    ?>
    <script src="assets/js/mensaje.js"></script>
</body>
</html>