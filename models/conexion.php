<?php 

$mysqliconnect = mysqli_connect("localhost", "root", "", "gasd");
if ($mysqliconnect->connect_errno) {
    echo "Error al conectar la base de datos: " . $mysqliconnect->connect_error;
    exit();
} else{
    echo "Conectado a la base de datos con éxito";
}

?>