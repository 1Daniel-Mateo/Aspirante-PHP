<?php
include 'conexion.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];

    $eliminar = "DELETE FROM aspirante WHERE id = ?";
    $stmt = $mysqliconnect->prepare($eliminar);

    if ($stmt) {
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            session_destroy();
            header("Location: ../index.php?status=eliminar");
            exit();
        } else {
            header("Location: ../views/panel.php?status=error");
            exit();
        }
        $stmt->close();
    } else {
        echo "Error en la consulta: " . $mysqliconnect->error;
    }

    $mysqliconnect->close();
}


?>