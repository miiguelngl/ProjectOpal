<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    //Recoge datos form
    $usuario = $_POST["nickname"];
    $nombre = $_POST["name"];
    $apellidos = $_POST["subname"];
    $email = $_POST["email"];
    $contraseña = password_hash($_POST["password"], PASSWORD_DEFAULT);

    //Conexion BBDD
    $servidor = "localhost";
    $username = "OpalAdmin";
    $password = "Yovoyahaceruncorral";
    $base = "Opal";

    $conexion = new mysqli($servidor, $username, $password, $base);

    //Conseguir el ID de Usuario
    $idUsu = intval($conexion->query("SELECT COUNT(*) FROM Usuario"))+1;

    //Comprobaciones antes de enviar datos
    //Comprueba que el USERNAME no exista en la BBDD;
    $comprobacionUsu = "SELECT * FROM Usuario WHERE Apodo = $usuario";
    $resultadoUsu = $conexion->query($comprobacionUsu);
    //Comprueba que el CORREO no exista en la BBDD;
    $comprobacionEmail = "SELECT * FROM Usuario WHERE Correo = $email";
    $resultadoEmail = $conexion->query($comprobacionEmail);

    if ($conexion->connect_error) {
        die("Conexion fallida ". $conexion->connect_error);
    }
    //Si resultadoUsu devuelve alguna fila significa que ya existe un usuario con ese apodo
    if ($resultadoUsu->num_rows > 0){
        echo "El nombre de usuario ya está en uso";
        //Si resultadoEmail devuelve alguna fila significa que ya existe un usuario con ese email
    }else if ($resultadoEmail->num_rows > 0){
        echo "El correo electrónico de usuario ya está en uso";
    }else{
        $consulta = "INSERT INTO `Usuario` (Apodo, Nombre, Apellidos, Correo, Contraseña, IdUsuario, Admin ) VALUES ($usuario, $nombre, $apellidos, $email, $contraseña, $idUsu, 0)";

        if($conexion->query($consulta) === TRUE) {
            echo "Datos insertados correctamente";
            $_SESSION["apodo"] = $usuario;

            exit();
        }else{
            echo "Error al insertar datos: ". $conexion->error;
        }
        $conexion->close();
        session_destroy();
    }
}
?>