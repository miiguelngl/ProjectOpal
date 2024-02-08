<?php
//Inicia sesion
error_reporting(E_ALL);
ini_set('display_errors', '1');

session_start();

//Mostrar errores 

//Si el método es POST entonces recoge los datos
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    //Recoge datos form
    $usuario = $_POST["nickname"];
    $nombre = $_POST["name"];
    $apellidos = $_POST["subname"];
    $email = $_POST["email"];
    $contrasena = password_hash($_POST["pass"], PASSWORD_DEFAULT);
    
    include '../../php/conexion.php';

    

    //Comprobaciones antes de enviar datos
    //Comprueba que el USERNAME no exista en la BBDD;
    $comprobacionUsu = "SELECT * FROM `Usuario` WHERE `Apodo` = '$usuario'";
    $resultadoUsu = $conexion->query($comprobacionUsu);
    
    //Comprueba que el CORREO no exista en la BBDD;
    $comprobacionEmail = "SELECT * FROM `Usuario` WHERE `Correo` = '$email'";
    $resultadoEmail = $conexion->query($comprobacionEmail);

    if ($conexion->connect_error) {
        die("Conexion fallida ". $conexion->connect_error);
    }
    //Si resultadoUsu devuelve alguna fila significa que ya existe un usuario con ese apodo
    if ($resultadoUsu->num_rows > 0){
        echo "El nombre de usuario no está disponible";
        //Si resultadoEmail devuelve alguna fila significa que ya existe un usuario con ese email
    }else if ($resultadoEmail->num_rows > 0){
        echo "El correo electrónico de usuario ya está en uso";
    }else{

        $consulta = "INSERT INTO `Usuario` (Apodo, Nombre, Apellidos, Correo, Contrasena, Admin) VALUES ('$usuario', '$nombre', '$apellidos', '$email', '$contrasena', 0)";
        if ($conexion->query($consulta) === TRUE) {
            echo "Datos insertados correctamente";
            $_SESSION["Usu"] = $usuario;
            header("Location: ../confirmacionCuenta.html");
            exit();
        } else {
            echo "Error al insertar datos: " /*. $conexion->error*/;
        }

        $conexion->close();
    }
}
?>