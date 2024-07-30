<?php
require_once '../models/consultar.php';

//Funcion para mostrar mensajes
function mostrar_mensaje($tipo, $mensaje) {
    echo "<p class='mensaje-$tipo visible'>$mensaje</p>";
}

//Mnsajes de confirmacion
$status_messages = [
    'modificado' => 'Datos modificados.',
    'saludo' => 'Bienvenido a tu perfil de Aspirante en Grupo ASD.'
];

//Mensajes de error
$error_messages = [
    'nombre' => 'El nombre solo debe contener letras y espacios.',
    'documento' => 'Documento solo debe contener números.',
    'correo' => 'El formato del correo no es válido.',
    'cargo' => 'El cargo solo debe contener letras y espacios.',
    'modificar' => 'Fallo al modificar datos.',
    'NoElimina' => 'Fallo al eliminar usuario.'
];

$status = $_GET['status'] ?? '';
$error = $_GET['error'] ?? '';

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Portal de usuario para las vacantes.">
    <meta name="keywords" content="login, inicio de sesión, portal, registro">
    <meta name="Mateo" content="Grupo ASD">
    <meta name="robots" content="index, follow">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../assets/css/panel.css">
    <link rel="icon" href="../assets/img/icono.ico">
    <title>Portal de usuario</title>
</head>
<body>
    <div class="contenedor">
        <!-- menu con estilos bootstrap -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">GRUPO ASD ASPIRANTE</a>
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
            <!-- mensajes php -->
            <?php
            //condiciones para mensajes para evaluacion si su tipo es valido o es un error
            if ($status && array_key_exists($status, $status_messages)) {
                mostrar_mensaje('valido', $status_messages[$status]);
            }
            if ($error && array_key_exists($error, $error_messages)) {
                mostrar_mensaje('error', $error_messages[$error]);
            }

            ?>
            <h2>Datos del usuario</h2>
            <p>Nombre Completo: <?php echo htmlspecialchars($usuario['nombre']); ?></p>
            <p>Tipo de documento: <?php echo htmlspecialchars($usuario['tipo_doc']); ?></p>
            <p>No. Documento: <?php echo htmlspecialchars($usuario['documento']); ?></p>
            <p>Correo electrónico: <?php echo htmlspecialchars($usuario['correo']); ?></p>
            <p>Cargo Aspirado: <?php echo htmlspecialchars($usuario['cargo']); ?></p>
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
                        <!-- formulario para eliminar el usuario en la sesion -->
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
            <!-- Ventana modal para la modificacion de los datos del usuario -->
            <div class="modal fade" id="modificar" tabindex="-1" aria-labelledby="modificarLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modificarLabel">Ventana de Modificación</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- formulario para modificar los datos -->
                            <form method="POST" action="../models/modificar.php">
                                <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">
                                <div class="mb-3">
                                    <label for="nombre" class="col-form-label">Nombre:</label>
                                    <input name="nombre" type="text" class="form-control" id="nombre" value="<?php echo htmlspecialchars($usuario['nombre']); ?>">
                                </div>
                                <label for="tipo_doc" class="col-form-label">Tipo de documento:</label>
                                <select name="tipo_doc" class="form-select form-select-sm" aria-label=".form-select-sm example">
                                    <option selected><?php echo htmlspecialchars($usuario['tipo_doc']); ?></option>
                                    <option value="CC">Cedula de Ciudadania</option>
                                    <option value="CE">Cedula Extranjeria</option>
                                    <option value="RT">Registro Civil</option>
                                    <option value="TI">Tarjeta de Identidad</option>
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
                                    <label for="cargo" class="col-form-label">Cargo Aspirado:</label>
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
        </section>
        <!-- pie de pagina -->
        <footer class="final_pagina">
                <p>Dirección: Bogota D.C, Colombia</p>
                <p>Teléfono: 3641400</p>
                <p>Email: teosuapilo@gmail.com</p>
                <p>&copy; 2024 Grupo ASD. Todos los derechos reservados.</p>
        </footer>
        <script src="../assets/js/mensaje.js"></script>
</body>

</html>