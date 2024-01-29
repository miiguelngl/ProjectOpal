<?php
include("conexion.php");
$consulta = mysqli_query($conexion, "SELECT COUNT(*) AS total FROM `Zapatillas`");

if ($consulta) {
    //Obtiene los resultados de la consulta como una array asociativo
    $fila = mysqli_fetch_assoc($consulta);
    // Obtener el valor de la columna 'total'
    $totalZapatillas = $fila['total'];

    for ($i = 0; $i < $totalZapatillas; $i++) {
    echo '<h5 class=card-text px-2 mt-1></h5>'
        

    }

    // Liberar el conjunto de resultados
    mysqli_free_result($consulta);
}

?>