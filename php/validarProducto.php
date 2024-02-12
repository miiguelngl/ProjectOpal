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
        $conexion = new mysqli($servidor, $username, $password, $base);

        if($conexion) {
            $consulta1 = "UPDATE `Zapatillas` SET `Validada` = '1' WHERE `Zapatillas`.`IdZapatilla` = ?;";
            $stmt = $conexion->prepare($consulta1);
            $stmt->bind_param("s", $id);
            $stmt->execute();

            header("Location: ../admin.php");
        }
    }else{
        header("Location: ../IniciarSesion/signIn.html");
    }
?>