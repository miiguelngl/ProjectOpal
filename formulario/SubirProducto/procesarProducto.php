<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

 $nombre=$_POST["nombre"];
 $marca=$_POST["marca"];
 $desc=$_POST["descripcion"];
 $foto=$_POST["foto"];
 $talla=$_POST["talla"];
 $precio=$_POST["precio"];


 //Conexion BBDD
 $servidor = "localhost";
 $username = "OpalAdmin";
 $password = "Yovoyahaceruncorral";
 $base = "Opal";

 $conexion = new mysqli($servidor, $username, $password, $base);

 $idusu = ($conexion->query("SELECT `idUsuario` FROM `Usuario` WHERE `Apodo` = '{$_SESSION['Usuario']}"));
$idZap = (mysqli_fetch_row($conexion->query('SELECT COUNT(*) FROM `Zapatillas`'))[0] + 1);
 
 die("Conexion fallida ". $conexion->connect_error);
 $consulta = "INSERT INTO `Zapatillas` (IdZapatilla, IdUsuario, Nombre, Marca, Descripcion, Validada, Talla, Precio) VALUES ('$idZap', '$idusu', '$nombre', '$marca', '$descripcion', 0, $talla, $precio )";
 if ($conexion->query($consulta) === TRUE) {
    

    
}
?>