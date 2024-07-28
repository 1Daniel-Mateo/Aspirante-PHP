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