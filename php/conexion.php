<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conexion PHP</title>
</head>
<body>
<?php
$servername = "localhost"; // Cambia esto por el nombre del servidor de tu base de datos
$username = "OpalAdmin";     // Cambia esto por tu nombre de usuario de la base de datos
$password = "Yovoyahaceruncorral";   // Cambia esto por tu contraseña de la base de datos
$dbname = "Opal";      // Cambia esto por el nombre de tu base de datos

// Crear conexión
$enlace = new mysqli("localhost", "OpalAdmin", "Yovoyahaceruncorral", "Opal");

// Verificar la conexión
if (!$enlace) {
    die("Conexión fallida: " . mysqli_error());
}
echo "Conexion existosa";
mysqli_close($enlace);
?>
</body>
</html>
