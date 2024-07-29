<?php
require_once '../models/consultar.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/panel.css">
    <title>Portal de usuario</title>
</head>
<body>
<div class="contenedor">
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">GRUPO ASD CANDIDATO</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
      <ul class="navbar-nav  ">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Vacantes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="../models/cerrar.php">Cerrar sesión</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

    <section class="panel">
        <h2>Datos del usuario</h2>
        <p>Nombre: <?php echo htmlspecialchars($usuario['nombre']); ?></p>
        <p>Tipo de documento: <?php echo htmlspecialchars($usuario['tipo_doc']); ?></p>
        <p>Documento: <?php echo htmlspecialchars($usuario['documento']); ?></p>
        <p>Correo: <?php echo htmlspecialchars($usuario['correo']); ?></p>
        <p>Cargo: <?php echo htmlspecialchars($usuario['cargo']); ?></p>

        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modificar">Modificar Datos</button>
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminar">Eliminar Vacante</button>

        <!-- Ventana modal para Eliminar Candicatura Uso de Bootstrap 5-->
        <div class="modal fade" id="eliminar" tabindex="-1" aria-labelledby="eliminarLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="eliminarLabel">Verificación</h5>
                    </div>
                    <div class="modal-body">
                        <p>
                            Estas seguro de eliminar tu vacante de nuestro proceso de seleción.
                        </p>
                    </div>
                    <form action="../models/eliminar.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-danger">Sí Eliminar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <?php
    if (isset($_GET['status']) && $_GET['status'] == 'sucess') {
        echo "<p>Datos modificados.</p>";
    } else if (isset($_GET['status']) && $_GET['status'] == 'error') {
        echo "<p>Error.</p>";
    }
    ?>
     <?php if (isset($_GET['success'])) : ?>
        <p><?php echo htmlspecialchars($_GET['success']); ?></p>
    <?php endif; ?>

    

    

    

    <!-- Ventana modal para la modificacion de los datos del usuario -->
    <div class="modal fade" id="modificar" tabindex="-1" aria-labelledby="modificarLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modificarLabel">Ventana de Modificación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="../models/modificar.php">
                        <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">
                        <div class="mb-3">
                            <label for="nombre" class="col-form-label">Nombre:</label>
                            <input name="nombre" type="text" class="form-control" id="nombre" value="<?php echo htmlspecialchars($usuario['nombre']); ?>">
                        </div>
                        <label for="tipo_doc" class="col-form-label">Tipo de documento:</label>
                        <select name="tipo_doc" class="form-select form-select-sm" aria-label=".form-select-sm example">
                            <option selected>Tipo de documento</option>
                            <option value="1">CC</option>
                            <option value="2">CE</option>
                        </select>
                        <div class="mb-3">
                            <label for="documento" class="col-form-label">Documento:</label>
                            <input name="documento" type="text" class="form-control" id="documento" value="<?php echo htmlspecialchars($usuario['documento']); ?>">
                        </div>
                        <div class="mb-3">
                            <label for="correo" class="col-form-label">Correo electrónico:</label>
                            <input name="correo" type="email" class="form-control" id="correo" value="<?php echo htmlspecialchars($usuario['correo']); ?>">
                        </div>
                        <div class="mb-3">
                            <label for="cargo" class="col-form-label">Cargo:</label>
                            <input name="cargo" type="text" class="form-control" id="cargo" value="<?php echo htmlspecialchars($usuario['cargo']); ?>">
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Modificar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        
    
    </div>

    <footer class="final_pagina">
            <p>Estilos sacados de Bootstrap 5</p>
        </footer>
</body>
</html>