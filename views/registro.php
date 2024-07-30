<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Formulario de crear cuenta de vacante para acceder a portal.">
    <meta name="keywords" content="login, inicio de sesión, portal, registro">
    <meta name="Mateo" content="Grupo ASD">
    <meta name="robots" content="index, follow">
    <link rel="stylesheet" href="../assets/css/formulario.css">
    <link rel="icon" href="../assets/img/icono.ico">
    <title>Registrar</title>
</head>
<body>
    <form method="POST" action="../models/crear.php" class="form" id="form">
        <H1 class="titulo">Crear Cuenta</H1>
        <div class="campos">
            <div class="group_form">
                <input type="text" id="nombre" name="nombre" placeholder=" ">
                <label for="nombre">Nombre completo</label>
                <span class="linea"></span>
            </div>
            <select name="tipo_doc" class="seleccion">
                <option selected>Tipo de documento</option>
                <option value="CC">Cedula de Ciudadania</option>
                <option value="CE">Cedula Extranjeria</option>
                <option value="RT">Registro Civil</option>
                <option value="TI">Tarjeta de Identidad</option>
            </select>
            <div class="group_form">
                <input type="text" id="documento" name="documento" placeholder=" ">
                <label for="documento">No. documento</label>
                <span class="linea"></span>
            </div>
            <div class="group_form">
                <input type="email" id="correo" name="correo" placeholder=" ">
                <label for="correo">Correo electrónico</label>
                <span class="linea"></span>
            </div>
            <div class="group_form">
                <input type="text" id="cargo" name="cargo" placeholder=" ">
                <label for="cargo">Cargo aspirado</label>
                <span class="linea"></span>
            </div>
            <button type="submit" class="boton">Registrar</button>
        </div>
    </form>

    <?php
    function mostrar_mensaje($tipo, $mensaje) {
        echo "<p class='mensaje-$tipo visible'>$mensaje</p>";
    }
//Mensajes de error
    if (isset($_GET['error'])) {
        switch ($_GET['error']) {
            case 'vacio':
                mostrar_mensaje('error', 'Por favor, complete todos los campos.');
                break;
            case 'nombre':
                mostrar_mensaje('error', 'El nombre solo debe contener letras y espacios.');
                break;
            case 'documento':
                mostrar_mensaje('error', 'El documento solo debe contener números.');
                break;
            case 'cargo':
                mostrar_mensaje('error', 'El cargo solo debe contener letras y espacios.');
                break;
            case 'repetido':
                mostrar_mensaje('error', 'El correo ya está registrado.');
                break;
            case 'error':
                mostrar_mensaje('error', 'Error al guardar los datos.');
                break;
        }
    }
    ?>
    <script src="../assets/js/mensaje.js"></script>
</body>
</html>