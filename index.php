<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/formulario.css">
    <title>Login</title>
</head>
<body>
<div class="contenedor">
    <form method="POST" action="models/login.php" class="form">
    <h1 class="titulo">Inicia Sesión</h1>
    <div class="campos">

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
        <a href="views/registro.php">REGISTRO</a>

        </div>
    </form>


    <?php

if (isset($_GET['status']) && $_GET['status'] == 'success') {
    echo "<p>Registro exitoso.</p>";
}

if (isset($_GET['status']) && $_GET['status'] == 'salida') {
    echo "<p>Sesion Cerrada.</p>";
}

if (isset($_GET['status']) && $_GET['status'] == 'eliminar') {
    echo "<p>Usuario Eliminado.</p>";
}
?>



<?php if (isset($_GET['error'])): ?>
        <p>Error: <?php echo htmlspecialchars($_GET['error']); ?></p>
    <?php endif; ?>

</div>
</body>
</html>