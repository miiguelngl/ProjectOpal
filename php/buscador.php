<?php
include "conexion.php";

// Verificar si hay una sesión iniciada
session_start();

$columnas = ['Nombre', 'Marca', 'IdZapatilla'];
$tabla = 'Zapatillas';
$campo = isset($_POST['campo']) ? $conexion->real_escape_string($_POST['campo']) : null;
$tecla = isset($_POST['tecla']) ? $conexion->real_escape_string($_POST['tecla']) : null;

$condicion = '';

if ($campo != '') {
    $condicion = ' WHERE `Validada` = 1 AND (';

    for ($i = 0; $i < count($columnas); $i++) {
        $condicion .= $columnas[$i] . " LIKE '%" . $campo . "%' OR ";
    }
    $condicion = substr_replace($condicion, "", -3);
    $condicion .= ")";
    
    // Si tiene una sesión iniciada no acceda a sus zapatillas
    if (isset($_SESSION['Usu']) && $_SESSION['Usu'] !== null) {
        $apodo = $_SESSION['Usu'];
        $sql = "SELECT * FROM Usuario WHERE apodo = ?";
        $consulta = $conexion->prepare($sql);
        $consulta->bind_param('s', $apodo);
        $consulta->execute();
        $resultados = $consulta->get_result()->fetch_all(MYSQLI_ASSOC);

        // Verificar si hay resultados antes de acceder al índice 0
        if (!empty($resultados)) {
            $condicion .= " AND (`IdUsuario` != {$resultados[0]['IdUsuario']})";
        }
    }


$consulta = "SELECT " . implode(',', $columnas) . " FROM `$tabla` $condicion";

$resultado = $conexion->query($consulta);



    $data = array();

    if ($resultado) {
        while ($row = $resultado->fetch_assoc()) {
            $data[] = $row;
        }
    }

    echo json_encode($data);
}else{
    echo json_encode('<li>sin resultados<li>');

}?>

