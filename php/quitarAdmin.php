<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');

    $id=$_POST["id"];

    //Conexion BBDD
    include("conexion.php");

    session_start();
    //Comprueba si existe sesion iniciada
    if(isset($_SESSION['Usu'])){
        $Us = $_SESSION['Usu'];

        if($conexion) {
            $consulta1 = "UPDATE `Usuario` SET `Admin` = '0' WHERE `Usuario`.`IdUsuario` = ?;";
            $stmt = $conexion->prepare($consulta1);
            $stmt->bind_param("s", $id);
            $stmt->execute();

            header("Location: ../validarAdmin.php");
        }
    }else{
        header("Location: ../IniciarSesion/signIn.html");
    }
?>