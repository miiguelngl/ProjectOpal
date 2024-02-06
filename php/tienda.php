<body>
<?php
include("conexion.php");
error_reporting(E_ALL);
ini_set('display_errors', '1');

$mensajitos = array('Mucha gente las quiere','Renueva tu estilo','Mejora tu outfit','Combinan con todo','Sneakers recientes','Sube de nivel');
shuffle($mensajitos);
$idValidadas = [];
$e = 2;
$condi = "WHERE `Validada` = 1 ";

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['pt'])  && $_GET['pt'] !== null) {
    $condicion = $_GET['pt'];
    $condi .= "AND (`Nombre` LIKE '%$condicion%' OR `MARCA` LIKE '%$condicion%')";
    $e = 1;
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

shuffle($idValidadas);
if(count($idValidadas)==0){
    echo "<p class='text-center'>No hay resultados</p>";
}else{
    echo '<div class="container">';
    echo '<div id="mensaje">';
        echo '<h5 class="card-title">'.$mensajitos[0].'</h5>';
    echo '</div>';
    echo '<hr>';
    echo'<div class="container">';
for ($j = 0; $j < count($idValidadas); $j++){
    
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
            echo '<p class="card-text" e='."$resultados[IdZapatilla]".'>'.$resultados['Precio'].'€</p>';
            echo '<a href="#" class="card-button">Comprar</a>';
        echo '</div>';
    echo'</div>';
    $stmt->close();
}
echo '</div>'; // Cierra el div containerç
}
?>
</body>
