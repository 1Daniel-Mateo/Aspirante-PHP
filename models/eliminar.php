<?php
//conexion a base de datos
include 'conexion.php';
// Obtener variables de inicio de sesión
session_start();

// Obtener el ID del usuario de la sesión
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    //Metodo de consulta SQL para eliminacion de datos
    $eliminar = "DELETE FROM aspirante WHERE id = ?";
    //variable stmt para vinculación con la base de datos
    $stmt = $mysqliconnect->prepare($eliminar);

    if ($stmt) {
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            // Destruir la sesión si la eliminación fue exitosa
            session_destroy();

            // Redirigir al usuario con un mensaje de éxito
            header("Location: ../index.php?status=eliminar");
            exit();
        } else {
            // Redirigir al usuario con un mensaje de falla
            header("Location: ../views/panel.php?error=NoElimina");
            exit();
        }
        $stmt->close();
    } else {
        echo "Error en la consulta: " . $mysqliconnect->error;
    }

    $mysqliconnect->close();
}
