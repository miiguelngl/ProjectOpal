<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    include "conexion.php";

    $columnas = ['Nombre', 'Marca'];
    $tabla = 'Zapatillas';
    $campo = isset($_POST['campo']) ? $conexion->real_escape_string($_POST['campo']) : null;

    $condicion = '';

    if ($campo != '') {
        $condicion = 'WHERE (';

        for ($i = 0; $i < count($columnas); $i++) {
            $condicion .= $columnas[$i] . " LIKE '%" . $campo . "%' OR ";
        }
        $condicion = substr_replace($condicion, "", -3);
        $condicion .= ")";
    

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

