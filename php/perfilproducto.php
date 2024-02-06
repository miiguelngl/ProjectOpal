<?php
    //MUESTRA LOS PERFILES DEL PRODUCTO
    include "conexion.php";
    $consulta1 = "SELECT * FROM `idZapatilla` WHERE `Apodo` = ?";
    $stmt = $conexion->prepare($consulta1);
    $stmt->bind_param("s", $username);
    $exito = $stmt->execute();
    if ($exito) {
        
    }
?>