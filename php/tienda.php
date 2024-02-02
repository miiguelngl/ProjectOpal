<body>
<?php
include("conexion.php");
$consulta1 = "SELECT COUNT(*) AS total FROM `Zapatillas`";
$resultado = $conexion->query($consulta1);
if ($resultado) {
    
    //Obtiene los resultados de la consulta como una array asociativo
    $fila = $resultado->fetch_assoc();
    
    // Obtener el valor de la columna 'total'
    $totalZapatillas = $fila['total'];
    
    
    
    $mensajitos = array('Mucha gente las quiere','Renueva tu estilo','Mejora tu outfit','Combinan con todo','Sneakers recientes','Sube de nivel');
    shuffle($mensajitos);
    
    for ($i = 1; $i <= 2; $i++){
        
        $zapatillas = range(1, $totalZapatillas);
        shuffle($zapatillas);
        echo '<h5 class="card-title">'.$mensajitos[$i].'</h5>';
        echo'<div class="container">';
        for ($j = 1; $j <= 12; $j++){
            
            $consulta2 = "SELECT * FROM `Zapatillas` WHERE `IdZapatilla` = ?";

            // Crear una sentencia preparada
            $stmt = $conexion->prepare($consulta2);

            // Vincular el parámetro
            $stmt->bind_param("i", $zapatillas[$j]);
            
            // Ejecutar la consulta
            $stmt->execute();

            $resultados = ($stmt->get_result())->fetch_assoc();

            //Consulta de la imagen de la zapatilla
            $consulta3 = "SELECT * FROM `Fotos` WHERE `IdZapatilla` = $zapatillas[$j]";
            $resultado2 = $conexion->query($consulta3);
            $fila2 = $resultado2->fetch_assoc();
        
            $blob = base64_encode($fila2['Foto']);

            //El nombre si tiene mas de 17 caracter se corta
            $nombre = (strlen($resultados['Nombre']) > 15) ? substr($resultados['Nombre'], 0, 14) . '...' : $resultados['Nombre'];

            echo '<div class="card">';
                echo '<div class="imgContainer">';
                    echo '<img src="data:image/jpeg;base64,'. $blob .'" alt="...">';
                echo '</div>';
                echo '<div class="card-body">';
                    echo '<h5 class="card-title">'.$nombre.'</h5>';
                    echo '<p class="card-text">'.$resultados['Precio'].'€</p>';
                    echo '<a href="#" class="card-button">Comprar</a>';
                echo '</div>';
            echo'</div>';
            $stmt->close();
        }
        echo'</div>';
    }
}
?>
</body>