<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Formulario de registro</h1>
    <form method="POST" action="models/login.php">
    
        <div>
            <label for="correo">Correo electrónico</label>
            <input type="email" name="correo" >
        </div>
    
        <div>
            <label for="documento">Contraseña</label>
            <input type="password" name="documento" >
        </div>
    
        <button type="submit">Iniciar sesión</button>
        <a href="views/registro.php">REGISTRO</a>
    </form>
    <?php
    
if (isset($_GET['status']) && $_GET['status'] == 'success') {
    echo "<p>Registro exitoso.</p>";
}
?>

<?php if (isset($_GET['error'])): ?>
        <p>Error: <?php echo htmlspecialchars($_GET['error']); ?></p>
    <?php endif; ?>
</body>
</html>