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
            $consulta1 = "DELETE FROM `Fotos` WHERE `IdZapatilla` = ?";
            $stmt = $conexion->prepare($consulta1);
            $stmt->bind_param("s", $id);
            $stmt->execute();
        
            $consulta2 = "DELETE FROM `Zapatillas` WHERE IdZapatilla = ?";
            $stmt = $conexion->prepare($consulta2);
            $stmt->bind_param("s", $id);
            $stmt->execute();

            header("Location: ../admin.php");
        }
    }else{
        header("Location: ../IniciarSesion/signIn.html");
    }
?>