<?php

include 'conexion.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $tipo_doc = $_POST['tipo_doc'];
    $documento = $_POST['documento'];
    $correo = $_POST['correo'];
    $cargo = $_POST['cargo'];

    // Verificar si los campos están vacíos
    if (empty($nombre) || empty($tipo_doc) || empty($documento) || empty($correo) || empty($cargo)) {
        header("Location: ../views/registro.php?error=Por favor, complete todos los campos");
        exit();
    }

    // Validar el nombre (solo letras y espacios)
    if (!preg_match("/^[a-zA-Z ]*$/", $nombre)) {
        header("Location: ../views/registro.php?error=El nombre solo debe contener letras y espacios");
        exit();
    }
    // Validar el tipo de documento (solo letras y números)
    if (!preg_match("/^[a-zA-Z0-9]*$/", $documento))
    {
        header("Location: ../views/registro.php?error=Documento solo debe contar con numeros");
        exit();
    }

     // Validar el correo (formato de correo electrónico)
     if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../views/registro.php?error=El formato del correo no es válido");
        exit();
    }

    // Validar el cargo (solo letras y espacios)
    if (!preg_match("/^[a-zA-Z ]*$/", $cargo)) {
        header("Location: ../views/registro.php?error=El cargo solo debe contener letras y espacios");
        exit();
    }

     // Uso de prepared statements para evitar inyección SQL
     $consulta = "UPDATE aspirante SET nombre = ?, tipo_doc = ?, documento = ?, correo = ?, cargo = ? WHERE id = ?";
     $stmt = $mysqliconnect->prepare($consulta);
     if ($stmt) {
        $stmt->bind_param('sssssi', $nombre, $tipo_doc, $documento, $correo, $cargo, $id);
        if ($stmt->execute()) {
            header("Location: ../views/panel.php?status=sucess");
            exit();
        } else {
            header("Location: ../views/panel.php?status=error");
            exit();
        }
        $stmt->close();
    }else {
        echo "Error al preparar la consulta: " . $mysqliconnect->error;
    }


    $mysqliconnect->close();
}


?>