<?php
//Inicia sesion
session_start();

//Si el método es POST entonces recoge los datos
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    //Recoge datos form
    $usuario = $_POST["your_name"];
    $contraseña = password_hash($_POST["your_pass"], PASSWORD_DEFAULT);
    
    //Conexion BBDD
    $servidor = "localhost";
    $username = "OpalAdmin";
    $password = "Yovoyahaceruncorral";
    $base = "Opal";

    $conexion = new mysqli($servidor, $username, $password, $base);
    
    //Comprobaciones antes de enviar datos
    //Comprueba que exista un USUARIO con el APODO o EMAIL introducido y que tenga la CONTRASEÑA introducida;
    $comprobacion = "SELECT * FROM `Usuario` WHERE `Apodo` = '$usuario' OR `Correo` = '$usuario' AND `Contraseña` =  '$contraseña'";
    $resultado = $conexion->query($comprobacion);


    if ($conexion->connect_error) {
        die("Conexion fallida ". $conexion->connect_error);
    }
    //Si resultado devuelve alguna fila significa que ya existe un usuario con ese apodo
    if ($resultado->num_rows == 1){
        // "La sesion es correcta";
        $_SESSION['Usu'] = $usu;
        header("Location: ../../index.php");
        exit();
    
    //Si resultado no devuelve ninguna fila significa que los datos no han sido correctamente introducidos
    }else{
        // "La sesion NO es correta";
        header("Location: ./signIn.html");
        exit();
   
    }
    $conexion->close();
}
?>