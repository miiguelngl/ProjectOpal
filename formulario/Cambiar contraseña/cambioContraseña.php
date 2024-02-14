<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');

    $contrasena = password_hash($_POST["pass"], PASSWORD_DEFAULT);
    $id = $_POST["id"];

    //Conexion BBDD
    include "../../php/conexion.php";

    $consultaUsuario = "SELECT * FROM `Usuario` WHERE `Correo` = ?";
    $stmt = $conexion->prepare($consultaUsuario);
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $resultado = $stmt->get_result();
    if($resultado){

        $consultaCambioContrasena = "UPDATE `Usuario` SET `Contrasena` = '$contrasena' WHERE `Usuario`.`IdUsuario` = ?";
        $stmt = $conexion->prepare($consultaCambioContrasena);
        $stmt->bind_param("s", $id);
        $stmt->execute();

        header("Location: confirmacionCambioContraseña.html");
    }else{
        echo'El correo '. $email .' no existe en nuestra base de datos';
    }
?>
    
    