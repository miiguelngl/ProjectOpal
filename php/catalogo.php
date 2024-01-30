<?php
include("conexion.php");
$consulta1 = mysqli_query($conexion, "SELECT COUNT(*) AS total FROM `Zapatillas`");

if ($consulta1) {
    //Obtiene los resultados de la consulta como una array asociativo
    $fila = mysqli_fetch_assoc($consulta1);
    // Obtener el valor de la columna 'total'
    $totalZapatillas = $fila['total'];

    for ($i = 0; $i < $totalZapatillas; $i++) {
        $consulta2=mysqli_query($conexion, "SELECT COUNT(*) AS total FROM `Zapatillas`");
    echo '<h5 class=card-text px-2 mt-1></h5>';
        

    }


}

?>