<body>
<?php
include("conexion.php");
error_reporting(E_ALL);
ini_set('display_errors', '1');
//Mensajes que se van a mostrar
$mensajitos = array('Mucha gente las quiere','Renueva tu estilo','Mejora tu outfit','Combinan con todo','Sneakers recientes','Sube de nivel');
shuffle($mensajitos);
$idValidadas = [];
$e = 2;
$condi = "WHERE `Validada` = 1 ";

//Si recibe un parametro get se lo añade a la condición
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['pt'])  && $_GET['pt'] !== null) {
    $condicion = $_GET['pt'];
    $condi .= "AND (`Nombre` LIKE '%$condicion%' OR `MARCA` LIKE '%$condicion%')";
    $e = 1;
}
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
// for ($i = 1; $i <= $e; $i++) {
    $consulta4 = "SELECT * FROM `Zapatillas` $condi";
    $stmt4 = $conexion->prepare($consulta4);

    if ($stmt4) {
        $stmt4->execute();
        $resultado4 = $stmt4->get_result();
        if ($resultado4) {
            while ($fila4 = $resultado4->fetch_assoc()) {
                $idValidadas[] = $fila4['IdZapatilla'];
            }
        }

        $stmt4->close(); // Cierra la declaración preparada
    }
// }


if(count($idValidadas)==0){
    echo "<p class='text-center'>No hay resultados</p>";
}else{
        shuffle($idValidadas);
        echo '<div class="container">';
        echo '<div id="mensaje">';
            echo '<h5 class="card-title">'.$mensajitos[0].'</h5>';
        echo '</div>';
        echo '<hr>';
        echo'<div class="containerBody">';
        echo'<div class="containerBodyC">';
        //Calcular las iteraciones del siguiente for
        $totalZ = count($idValidadas);
        $iteraciones;
        switch ($totalZ) {
            //Si hay menos de 6 Zapatillas el bucle se realiza la cantidad de zapatillas que haya
            case ($totalZ < 6):
                $iteraciones = $totalZ;
                break;
            //Si hay entre de 6 y 11 Zapatillas el bucle se realiza 6 veces
            case ($totalZ >= 6 && $totalZ < 12):
                $iteraciones = 6;
                break;
            //Si hay entre de 12 y 17 Zapatillas el bucle se realiza 6 veces
            case ($totalZ >= 12 && $totalZ < 18):
                $iteraciones = 12;
                break;
                //Si hay entre de 18 y 23 Zapatillas el bucle se realiza 18 veces
            case ($totalZ >= 18 && $totalZ < 24):
                $iteraciones = 18;
                break;
                //Si hay mas de 24 Zapatillas el bucle se realiza 24 veces
            default:
            $iteraciones = 24;
                break;
        }
        for ($j = 0; $j < $iteraciones; $j++){
            //Si son 12 o 24 iteraciones se va a mostrar 2 mensajes, si vale menos de 12 o 18 se mostrará 1 mensaje
            if($j == $iteraciones/2 && $iteraciones>6 && ($iteraciones==12 || $iteraciones == 24)){                
                echo '</div>'; // Cierra el div containerBodyC
                echo '</div>'; // Cierra el div containerBody
                echo '<div id="mensaje">';
                    echo '<h5 class="card-title">'.$mensajitos[1].'</h5>';
                echo '</div>';
                echo '<hr>';
                echo'<div class="containerBody">';
                echo'<div class="containerBodyC">';
            }
            $consulta2 = "SELECT * FROM `Zapatillas` WHERE `IdZapatilla` = ?";

            // Crear una sentencia preparada
            $stmt = $conexion->prepare($consulta2);

            // Vincular el parámetro
            $stmt->bind_param("i", $idValidadas[$j]);
            
            // Ejecutar la consulta
            $stmt->execute();

            $resultados = ($stmt->get_result())->fetch_assoc();

            //Consulta de la imagen de la zapatilla
            $consulta3 = "SELECT * FROM `Fotos` WHERE `IdZapatilla` = $idValidadas[$j]";
            $resultado2 = $conexion->query($consulta3);
            $fila2 = $resultado2->fetch_assoc();

            $blob = base64_encode($fila2['Foto']);

            //El nombre si tiene más de 17 caracteres se corta
            $nombre = (strlen($resultados['Nombre']) > 15) ? substr($resultados['Nombre'], 0, 14) . '...' : $resultados['Nombre'];

            echo '<div class="card">';
                echo '<div class="imgContainer">';
                    echo '<img src="data:image/jpeg;base64,'. $blob .'" alt="...">';
                echo '</div>';
                echo '<div class="card-body">';
                    echo '<h5 class="card-title">'.$nombre.'</h5>';
                    echo '<p id="talla">Talla: '.$resultados['Talla'].'</p>';
                    echo '<p class="card-text" e='."$resultados[IdZapatilla]".'>'.$resultados['Precio'].'€</p>';
                    echo '<a href="#" class="card-button">Comprar</a>';
                echo '</div>';
            echo'</div>';
            $stmt->close();
        }
        if($iteraciones>6 && ($iteraciones==12 || $iteraciones == 24)){
            echo '</div>'; // Cierra el div containerBodyC
            echo'</div>';// Cierra el div containerBody
        }
    }

?>
</body>
