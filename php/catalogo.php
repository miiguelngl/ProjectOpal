<?php
include("conexion.php");
$consulta1 = "SELECT MAX(`IdZapatilla`) AS total FROM `Zapatillas`";
$resultado = $conexion->query($consulta1);
if ($resultado) {
    
    //Obtiene los resultados de la consulta como una array asociativo
    $fila = $resultado->fetch_assoc();
    
    // Obtener el valor de la columna 'total'
    $totalZapatillas = $fila['total'];

    for ($i = 1; $i <= 5; $i++) {
        //Consulta de la zapatila
        $consulta2="SELECT * FROM `Zapatillas` WHERE `IdZapatilla` = $i"; 
        $resultado = $conexion->query($consulta2);
        $fila = $resultado->fetch_assoc();
        
        //Consulta de la imagen de la zapatilla
        $consulta3 = "SELECT * FROM `Fotos` WHERE `IdZapatilla` = $i";
        $resultado2 = $conexion->query($consulta3);
        $fila2 = $resultado2->fetch_assoc();
        
        $blob = base64_encode($fila2['Foto']);

        //El nombre si tiene mas de 17 caracter se corta
        $nombre = (strlen($fila['Nombre']) > 17) ? substr($fila['Nombre'], 0, 15) . '...' : $fila['Nombre'];
        echo '<div class="card" style="">';
        echo '<div class="imgContainer">';
            echo '<img src="data:image/bin;base64,'. $blob .'" alt="...">';
        echo '</div>';
            echo '<div class="card-body" alt="...">';
                echo '<h5 class="card-title">'.$nombre.'</h5>';
                echo '<p class="card-tex">'.$fila['Precio'].'€</p>';
                echo '<a href="#" class="btn btn-primary">Comprar</a>';
            echo '</div>';
        echo'</div>';
    }
}
