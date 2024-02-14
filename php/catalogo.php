<?php
include("conexion.php");

$condi = "";
$params = [];

// Si hay un usuario iniciado, no mostrar sus propios productos
if (isset($_SESSION['Usu']) && $_SESSION['Usu'] !== null) {
    $apodo = $_SESSION['Usu'];
    $sql = "SELECT IdUsuario FROM Usuario WHERE apodo = ?";
    $consulta = $conexion->prepare($sql);
    $consulta->bind_param('s', $apodo);
    $consulta->execute();
    $resultados = $consulta->get_result()->fetch_all(MYSQLI_ASSOC);
    $condi .= " AND (`IdUsuario` != {$resultados[0]['IdUsuario']})";
}

// Consulta principal
$consulta1 = "SELECT z.*, f.Foto FROM `Zapatillas` z
              LEFT JOIN `Fotos` f ON z.IdZapatilla = f.IdZapatilla
              WHERE z.`Validada` = 1 $condi
              ORDER BY RAND()
              LIMIT 5";

$resultado = $conexion->query($consulta1);

if ($resultado) {
    while ($fila = $resultado->fetch_assoc()) {
        $blob = base64_encode($fila['Foto']);
        $nombre = (strlen($fila['Nombre']) > 15) ? substr($fila['Nombre'], 0, 14) . '...' : $fila['Nombre'];

        echo '<div class="card" style="">';
        echo '<div class="imgContainer">';
        echo '<img src="data:image/bin;base64,' . $blob . '" alt="...">';
        echo '</div>';
        echo '<div class="card-body" alt="...">';
        echo '<h5 class="card-title">' . $nombre . '</h5>';
        echo '<p id="talla">Talla: ' . $fila['Talla'] . '</p>';
        echo '<p class="card-text" e="' . $fila['IdZapatilla'] . '">' . $fila['Precio'] . '€</p>';
        echo '<a href="#" class="card-button">Comprar</a>';
        echo '</div>';
        echo '</div>';
    }
}
?>
