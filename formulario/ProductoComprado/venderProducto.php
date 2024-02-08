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
            $consulta1 = "DELETE FROM `Fotos` WHERE `IdZapatilla` = ?";
            $stmt = $conexion->prepare($consulta1);
            $stmt->bind_param("s", $id);
            $stmt->execute();
        
            $consulta2 = "DELETE FROM `Zapatillas` WHERE IdZapatilla = ?";
            $stmt = $conexion->prepare($consulta2);
            $stmt->bind_param("s", $id);
            $stmt->execute();

            // $actualizarIds = "SET @num := 0; UPDATE `Zapatillas` SET `IdZapatilla` = @num := @num + 1; ALTER TABLE `Zapatillas` AUTO_INCREMENT = 1;";
            // $conexion->query($actualizarIds);

            // $actualizarIdsFotos = "SET @num := 0; UPDATE `Fotos` SET `IdFoto` = @num := @num + 1; ALTER TABLE `Fotos` AUTO_INCREMENT = 1;";
            // $conexion->query($actualizarIdsFotos);

            header("Location: ../../index.php");
        }
    }else{
        header("Location: ../IniciarSesion/signIn.html");
    }
?>
    
    