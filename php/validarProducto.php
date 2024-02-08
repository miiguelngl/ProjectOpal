<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');

    $id=$_POST["id"];

    //Conexion BBDD
    $servidor = "localhost";
    $username = "OpalAdmin";
    $password = "Yovoyahaceruncorral";
    $base = "Opal";


    session_start();
    //Comprueba si existe sesion iniciada
    if(isset($_SESSION['Usu'])){
        $Us = $_SESSION['Usu'];
        $conexion = new mysqli($servidor, $username, $password, $base);

        if($conexion) {
            $consulta1 = "UPDATE `zapatillas` SET `Validada` = '1' WHERE `zapatillas`.`IdZapatilla` = ?;";
            $stmt = $conexion->prepare($consulta1);
            $stmt->bind_param("s", $id);
            $stmt->execute();

            header("Location: ../admin.php");
        }
    }else{
        header("Location: ../IniciarSesion/signIn.html");
    }
?>