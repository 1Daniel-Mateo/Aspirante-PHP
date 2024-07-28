<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
</head>
<body>
    <H1>Formulario de registro</H1>
    
    <form method="POST" action="../models/crear.php">
        <div>
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre">
        </div>
        <select name="tipo_doc">
            <option value="cc">cc</option>
            <option value="ce">ce</option>
          </select>
        <div>
            <label for="documento">Documento</label>
            <input type="text" name="documento">
        </div>
        <div>
            <label for="correo">Correo electrónico</label>
            <input type="email" name="correo">
        </div>
        <div>
            <label for="cargo">Cargo</label>
            <input type="text" name="cargo">
        </div>
    
        <button type="submit">Registrar</button>
    </form>

    <?php if (isset($_GET['error'])): ?>
        <p>Error: <?php echo htmlspecialchars($_GET['error']); ?></p>
    <?php endif; ?>
</body>
</html>