<?php
include_once 'conexion.php';

// Asegúrate de que se ha iniciado la sesión
session_start();

// Obtener el ID del usuario de la sesión
if (isset($_SESSION['id'])) {
    $usuario_id = $_SESSION['id'];
} else {
    // Si no hay un usuario en la sesión, redirigir al inicio de sesión
    header("Location: ../index.php?error=Debe iniciar sesión primero");
    exit();
}

// Preparar y ejecutar la consulta
$consultar = "SELECT * FROM aspirante WHERE id = ?";
$stmt = $mysqliconnect->prepare($consultar);
if ($stmt) {
    $stmt->bind_param('i', $usuario_id);
    $stmt->execute();
    $resultado = $stmt->get_result();
    
    if ($resultado->num_rows > 0) {
        // Obtener los datos del usuario
        $usuario = $resultado->fetch_assoc();
    } else {
        echo "Error: No se encontraron datos del usuario";
        exit();
    }

    $stmt->close();
} else {
    echo "Error al preparar la consulta: " . $mysqliconnect->error;
    exit();
}

$mysqliconnect->close();
?>