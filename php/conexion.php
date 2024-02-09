<?php
    $servername = "localhost";          //Nombre del servidor de la base de datos
    $username = "OpalAdmin";            //Nombre de usuario de la base de datos
    $password = "Yovoyahaceruncorral";  //Contraseña de la base de datos Yovoyahaceruncorral
    $bdname = "Opal";                   //Nombre de la base de datos
    // Crear conexión
    $conexion = new mysqli ($servername, $username, $password, $bdname);
    if ($conexion->connect_error) {
        die ("No se pudo conectar a la base de datos:". $conexion->connect_error);
    }  
    
?>
