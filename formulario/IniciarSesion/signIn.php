<?php
//Inicia sesion
error_reporting(E_ALL);
ini_set('display_errors', '1');
session_start();

//Si el método es POST entonces recoge los datos
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    //Recoge datos form
    include '../../php/conexion.php';
    $usuario = mysqli_real_escape_string($conexion, $_POST["your_name"]);
    $contraseña_ingresada = $_POST["your_pass"];
    
    //Comprobaciones antes de enviar datos
    //Comprueba que exista un USUARIO con el APODO o EMAIL introducido y que tenga la CONTRASEÑA introducida;
    $comprobacion = "SELECT * FROM `Usuario` WHERE `Apodo` = ? OR `Correo` = ?";
    $stmt = $conexion->prepare($comprobacion);
    $stmt->bind_param("ss", $usuario, $usuario);
    $stmt->execute();
    $resultado = $stmt->get_result();
    //Si resultado devuelve alguna fila significa que ya existe un usuario con ese apodo
    if ($resultado->num_rows == 1){
        $fila = $resultado->fetch_assoc();
        // Compara la contraseña ingresada con la almacenada
        if (password_verify($contraseña_ingresada, $fila['Contrasena'])) {
            // La sesión es correcta
            $_SESSION['Usu'] = $fila['Apodo'];

            if ($fila['Admin'] == '1') {
                header("Location: ../../admin.php");
            }else{
                header("Location: ../../index.php");
            }
            exit();
        }else{
            // "La contraseña NO es correcta";
            header("Location: ./signIn.html");
            exit();
       
        }
    
    //El usuario o el email no son correctos
    }else{
        // "La sesion NO es correta";
        header("Location: ./signIn.html");
        exit();
   
    }
    $stmt->close();
    $conexion->close();
}
?>