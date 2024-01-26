<?php

 $nombre=$_POST["nombre"];
 $marca=$_POST["marca"];
 $desc=$_POST["descripcion"];
 $foto=$_POST["foto"];
 $precio=$_POST["precio"];


 //Conexion BBDD
 $servidor = "localhost";
 $username = "OpalAdmin";
 $password = "Yovoyahaceruncorral";
 $base = "Opal";

 $conexion = new mysqli($servidor, $username, $password, $base);
 
 $consulta = "INSERT INTO `Zapatillas` (IdZapatilla, IdUsuario, Nombre, Marca, Descripcion, Validada, Talla, Precio) VALUES ('$usuario', '$nombre', '$apellidos', '$email', '$contrasena', $idUsu, 0)";
 if ($conexion->query($consulta) === TRUE) {
    
}
?>