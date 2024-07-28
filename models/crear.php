<?php

include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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

    // Verificacion de que si el correo ya está registrado
    $consultaCorreo = "SELECT * FROM aspirante WHERE correo = ?";
    $stmtCorreo = $mysqliconnect->prepare($consultaCorreo);
    if ($stmtCorreo) {
        $stmtCorreo->bind_param('s', $correo);
        $stmtCorreo->execute();
        $resultCorreo = $stmtCorreo->get_result();

        if ($resultCorreo->num_rows > 0) {
            // Correo ya registrado
            header("Location: ../views/registro.php?error=El correo ya está registrado");
            exit();
        }

        $stmtCorreo->close();
    } else {
        echo "Error al preparar la consulta: " . $mysqliconnect->error;
        exit();
    }

    // Inserción de datos en la base de datos
    $insertar = "INSERT INTO aspirante (nombre, tipo_doc, documento, correo, cargo) VALUES (?, ?, ?, ?, ?)";
    $stmtInsertar = $mysqliconnect->prepare($insertar);
    if ($stmtInsertar) {
        $stmtInsertar->bind_param('sssss', $nombre, $tipo_doc, $documento, $correo, $cargo);
        $stmtInsertar->execute();

        if ($stmtInsertar->affected_rows > 0) {
            header("Location: ../index.php?status=success");
            exit();
        } else {
            header("Location: ../index.php?error=Error al guardar los datos");
            exit();
        }

        $stmtInsertar->close();
    } else {
        echo "Error al preparar la consulta: " . $mysqliconnect->error;
    }

    $mysqliconnect->close();
}


?>
