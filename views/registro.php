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
    <form method="POST" action="../models/crear.php" class="form">
        <H1 class="titulo">Crear Cuenta</H1>
        <div class="campos">
            <div class="group_form">
                <input type="text" name="nombre" placeholder=" ">
                <label for="nombre">Nombre Completo</label>
                <span class="linea"></span>
            </div>
            <select name="tipo_doc" class="seleccion">
                <option selected>Tipo de documento</option>
                <option value="cc">CC</option>
                <option value="ce">CE</option>
            </select>
            <div class="group_form">
                <input type="text" name="documento" placeholder=" ">
                <label for="documento">Documento</label>
                <span class="linea"></span>
            </div>
            <div class="group_form">
                <input type="email" name="correo" placeholder=" ">
                <label for="correo">Correo electrónico</label>
                <span class="linea"></span>
            </div>
            <div class="group_form">
                <input type="text" name="cargo" placeholder=" ">
                <label for="cargo">Cargo</label>
                <span class="linea"></span>
            </div>

            <button type="submit" class="boton">Registrar</button>
        </div>
    </form>

    <?php if (isset($_GET['error'])) : ?>
        <p>Error: <?php echo htmlspecialchars($_GET['error']); ?></p>
    <?php endif; ?>
</body>

</html>