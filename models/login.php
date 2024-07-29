<?php
include 'conexion.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $correo = $_POST['correo'];
    $contraseña = $_POST['documento'];


    // Verificar si los campos están vacíos
    if (empty($correo) || empty($contraseña)) {
        header("Location: ../index.php?error=campos");
        exit();
    }
    
    // Uso de prepared statements para evitar inyección SQL
    $consulta = "SELECT * FROM aspirante WHERE correo = ? AND documento = ?";
    $stmt = $mysqliconnect->prepare($consulta);
    if ($stmt) {
        $stmt->bind_param('ss', $correo, $contraseña);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Usuario autenticado con éxito
            //Almacenamiento de id
            $usuario = $result->fetch_assoc();
            $_SESSION['id'] = $usuario['id'];
            header("Location: ../views/panel.php?success=Bienvenido a tu perfil de Aspirante en Grupo ASD");
            exit();
        } else {
            // Error en la autenticación
            header("Location: ../index.php?error=login");
            exit();
        }

        $stmt->close();
    } else {
        // Error en la preparación de la consulta
        echo "Error al preparar la consulta: " . $mysqliconnect->error;
    }
}

$mysqliconnect->close();
?>
