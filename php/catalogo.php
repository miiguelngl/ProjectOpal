<?php
include("conexion.php");
$condi= "";
//Si tiene un usuario iniciado  NO le muestra su propios productos
if (isset($_SESSION['Usu']) && $_SESSION['Usu'] !== null) {
    $apodo = $_SESSION['Usu'];
    $sql = "SELECT * FROM Usuario WHERE apodo = ?";
    $consulta = $conexion->prepare($sql);
    $consulta->bind_param('s', $apodo);
    $consulta->execute();
    $resultados = $consulta->get_result()->fetch_all(MYSQLI_ASSOC);
    $condi .= " AND (`IdUsuario` != {$resultados[0]['IdUsuario']})";
}

$consulta1 = "SELECT * FROM `Zapatillas` WHERE `Validada` = 1 " . "$condi";
$resultado = $conexion->query($consulta1);
if ($resultado) {
    
    //Obtiene los resultados de la consulta como una array asociativo

    $idZapatillas = [];
    
        while($array = $resultado->fetch_assoc()){
            $idZapatillas [] = $array['IdZapatilla'];
    
         
    }
    // Obtener el valor de la columna 'total'
    shuffle($idZapatillas);

    for ($i = 1; $i <= 5; $i++) {
        //Consulta de la zapatila
        $consulta2="SELECT * FROM `Zapatillas` WHERE `IdZapatilla` = $idZapatillas[$i]"; 
        $resultado = $conexion->query($consulta2);
        $fila = $resultado->fetch_assoc();
        
        //Consulta de la imagen de la zapatilla
        $consulta3 = "SELECT * FROM `Fotos` WHERE `IdZapatilla` = $idZapatillas[$i]";
        $resultado2 = $conexion->query($consulta3);
        $fila2 = $resultado2->fetch_assoc();
        
        $blob = base64_encode($fila2['Foto']);

        //El nombre si tiene mas de 17 caracter se corta
        $nombre = (strlen($fila['Nombre']) > 15) ? substr($fila['Nombre'], 0, 14) . '...' : $fila['Nombre'];
        echo '<div class="card" style="">';
        echo '<div class="imgContainer">';
            echo '<img src="data:image/bin;base64,'. $blob .'" alt="...">';
        echo '</div>';
            echo '<div class="card-body" alt="...">';
                echo '<h5 class="card-title">'.$nombre.'</h5>';
                echo '<p class="card-text">Talla: '.$fila['Talla'].'</p>';
                echo '<p class="card-text" e="'.$fila['IdZapatilla'].'">'.$fila['Precio'].'€</p>';
                echo '<a href="#" class="card-button">Comprar</a>';
            echo '</div>';
        echo'</div>';
    }
}
