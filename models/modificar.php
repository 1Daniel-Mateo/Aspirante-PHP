<?php
//conexion a base de datos
include 'conexion.php';
// Obtener variables de inicio de sesión
session_start();

// Obtener los parametros desde el metodo post
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $tipo_doc = $_POST['tipo_doc'];
    $documento = $_POST['documento'];
    $correo = $_POST['correo'];
    $cargo = $_POST['cargo'];
    // Validar el nombre (solo letras y espacios)
    if (!preg_match("/^[a-zA-Z ]*$/", $nombre)) {
        header("Location: ../views/panel.php?error=nombre");
        exit();
    }
    // Validar el tipo de documento números
    if (!preg_match("/^[[0-9]{5,15}]*$/", $documento)) {
        header("Location: ../views/panel.php?error=documento");
        exit();
    }
    // Validar el correo (formato de correo electrónico)
    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../views/panel.php?error=correo");
        exit();
    }
    // Validar el cargo solo letras y espacios)
    if (!preg_match("/^[a-zA-Z ]*$/", $cargo)) {
        header("Location: ../views/panel.php?error=cargo");
        exit();
    }
    // Uso de prepared statements para evitar inyección SQL
    $actualiza = "UPDATE aspirante SET nombre = ?, tipo_doc = ?, documento = ?, correo = ?, cargo = ? WHERE id = ?";
    //variable stmt para vinculación con la base de datos
    $stmt = $mysqliconnect->prepare($actualiza);
    if ($stmt) {
        //Almacenamiento de las variables para la ejecucion de su actualización
        $stmt->bind_param('sssssi', $nombre, $tipo_doc, $documento, $correo, $cargo, $id);
        if ($stmt->execute()) {
            // Redirigir al usuario con un mensaje de éxito
            header("Location: ../views/panel.php?status=modificado");
            exit();
        } else {
            // Redirigir al usuario con un mensaje de falla
            header("Location: ../views/panel.php?error=modificar");
            exit();
        }
        $stmt->close();
    } else {
        echo "Error al preparar la actualiza: " . $mysqliconnect->error;
    }
    $mysqliconnect->close();
}
