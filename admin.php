<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opal admin</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>
    
<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
include './php/conexion.php';
session_start();
//Comprobar que tiene sesion iniciada
include"./php/header.php";
if(isset($_SESSION["Usu"])){
    $idUsu = $_SESSION["Usu"];
    //Comprobar que la sesion iniciada se Admin
    $consulta1 = "SELECT * FROM `Usuario` WHERE `Apodo` =  ?";
    
    $stmt = $conexion->prepare($consulta1);
    $stmt->bind_param("s", $idUsu);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0){
        $array = $result->fetch_assoc();
        
        if($array["Admin"] == 1){
            //CONTENIDO DEL ADMIN.PHP
            

            //MOSTRAR TODAS LAS ZAPATILLAS NO VALIDADAS

            $consulta2 = "SELECT * FROM `Zapatillas` WHERE `Validada` = ?";

            $stmt2 = $conexion->prepare($consulta2);
            $validada = false;
            $stmt2->bind_param("i", $validada);
            $stmt2->execute();
            $result2 = $stmt2->get_result();
            if($result2->num_rows > 0){
                //Bucle para cada solicitud
                echo "<table>";
                echo "<tr><th>Nombre</th><th>Marca</th><th>Talla</th><th>Precio</th><th>Estado  </th></tr>";
                while ($array2 = $result2->fetch_assoc()) {
                    echo "<tr><td><a href='./producto.php?pt=".$array2['IdZapatilla']."'>".$array2['Nombre']."</a></td><td>".$array2['Marca']."</td><td>".$array2['Talla']."</td><td>".$array2['Precio']."€</td><td><button type='button' class='btn btn-success'>VALIDAR</button><button type='button' class='btn btn-danger'>ELIMINAR</button></td></tr>";
                }
                echo "</table>";
            }else{
                echo "No hay Solicitudes";
            }
        }else{
            echo("<h4>ERROR 404 NOT FOUND<h5>");
        }
    }else{
        echo("<h4>ERROR 404 NOT FOUND<h5>");
    }
    }else{
        echo("<h4>ERROR 404 NOT FOUND<h5>");
    }
    include "./php/footer.php";

?>
</body>
</html>