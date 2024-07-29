<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/formulario.css">
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

    if (isset($_GET['status']) && $_GET['status'] == 'success') {
        echo "<p class='mensaje-valido visible'> Registro exitoso.</p>";
    }

    if (isset($_GET['status']) && $_GET['status'] == 'salida') {
        echo "<p class='mensaje-valido visible'>Sesion Cerrada.</p>";
    }

    if (isset($_GET['status']) && $_GET['status'] == 'eliminar') {
        echo "<p class='mensaje-valido visible'>Usuario Eliminado.</p>";
    }
    //Errores de ingreso
    if (isset($_GET['error']) && $_GET['error'] == 'login') {
        echo "<p class='mensaje-error visible'>Error en correo o contraseña. </p>";
    }
    if (isset($_GET['error']) && $_GET['error'] == 'campos') {
        echo "<p class='mensaje-error visible'>Por favor, complete todos los campos. </p>";
    }


    ?>

    <script src="js/mensaje.js"></script>
</body>

</html>