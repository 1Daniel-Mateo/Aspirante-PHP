<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/formulario.css">
    <title>Registrar</title>
</head>
<body>
    <form method="POST" action="../models/crear.php" class="form" id="form">
        <H1 class="titulo">Crear Cuenta</H1>
        <div class="campos">
            <div class="group_form">
                <input type="text" id="nombre" name="nombre" placeholder=" ">
                <label for="nombre">Nombre Completo</label>
                <span class="linea"></span>
            </div>
            <select name="tipo_doc" class="seleccion">
                <option selected>Tipo de documento</option>
                <option value="CC">Cedula de Ciudadania</option>
                <option value="CE">Cedula Extranjeria</option>
                <option value="RT">Registro Civil</option>
                <option value="TI">Tarjeta de I</option>
            </select>
            <div class="group_form">
                <input type="text" id="documento" name="documento" placeholder=" ">
                <label for="documento">Documento</label>
                <span class="linea"></span>
            </div>
            <div class="group_form">
                <input type="email" id="correo" name="correo" placeholder=" ">
                <label for="correo">Correo electrónico</label>
                <span class="linea"></span>
            </div>
            <div class="group_form">
                <input type="text" id="cargo" name="cargo" placeholder=" ">
                <label for="cargo">Cargo a Aspirar</label>
                <span class="linea"></span>
            </div>

            <button type="submit" class="boton">Registrar</button>
        </div>
    </form>

    <?php
    if (isset($_GET['campos']) && $_GET['campos'] == 'vacio') {
        echo "<p class='mensaje-error visible'> Por favor, complete todos los campos.</p>";
    }else if(isset($_GET['error']) && $_GET['error'] == 'nombre'){
        echo "<p> Campos vacios.</p>";
    }
    ?>

    <script src="../js/mensaje.js"></script>
</body>
</html>