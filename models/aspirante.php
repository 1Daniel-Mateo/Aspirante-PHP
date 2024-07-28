<?php

include 'conexion.php';


    $nombre=$_POST['nombre'];
    $tipo_doc=$_POST['tipo_doc'];
    $documento=$_POST['documento'];
    $correo=$_POST['correo'];
    $cargo=$_POST['consultcargo'];

    // if (empty($nombre) || empty($tipo_doc) || empty($documento) || empty($correo) || empty($cargo)) {
    //     header("Location: ../views/registro.php?error=Por favor, complete todos los campos");
    //     exit();
    // }

   $insertar = "insert into aspirante VALUES (null,'$nombre', '$tipo_doc', '$documento', '$correo', '$cargo')";



   $resultado = $mysqliconnect->query("SELECT * FROM aspirante");
   $resultado = $mysqliconnect->query($insertar);

   

   if($resultado){
    // echo "Datos agregados";
    header("Location: ../index.php?status=success");
    exit();
   }else{
    echo "Error al guardar los datos";
   }

   mysqli_close($mysqliconnect);


?>