<div id="productos">
    <h2>Productos</h2>
    <?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
        include "conexion.php";
        $consulta1 = "SELECT * FROM `Usuario` WHERE `Apodo` = ?";
        $username = $_SESSION['Usu'];
        $validada = 1;
        $stmt = $conexion->prepare($consulta1);
        $stmt->bind_param("s", $username);
        
        $exito = $stmt->execute();
        if ($exito) {
            $resultado = $stmt->get_result();
            $fila = $resultado->fetch_assoc();
            $consulta2 = "SELECT * FROM `Zapatillas` WHERE `IdUsuario` = ?  AND `Validada` = ?";
            $stmt = $conexion->prepare($consulta2);
            $stmt->bind_param("ss", $fila['IdUsuario'], $validada);
            $exito = $stmt->execute();
            if ($exito) {
                $resultadoZapatillas = $stmt->get_result();
                // Bucle para cada resultado de la consulta
                echo'<div class="ventas">';
                while ($filaZapatilla = $resultadoZapatillas->fetch_assoc()) {
                    // Consulta de la imagen de la zapatilla
                    $consulta3 = "SELECT * FROM `Fotos` WHERE `IdZapatilla` = ?";
                    $stmtImagen = $conexion->prepare($consulta3);
                    $stmtImagen->bind_param("s", $filaZapatilla['IdZapatilla']);
                    $exitoImagen = $stmtImagen->execute();
                    if ($exitoImagen) {
                        $resultadoImagen = $stmtImagen->get_result();
                        $filaImagen = $resultadoImagen->fetch_assoc();
    
                        $blob = base64_encode($filaImagen['Foto']);
    
                        $nombre = (strlen($filaZapatilla['Nombre']) > 17) ? substr($filaZapatilla['Nombre'], 0, 15) . '...' : $filaZapatilla['Nombre'];
                        echo '<div class="card" style="">';
                            echo '<div class="imgContainer">';
                                echo '<img src="data:image/bin;base64,'. $blob .'" alt="...">';
                            echo '</div>';
                            echo '<div class="card-body" alt="...">';
                                echo '<h5 class="card-title">'.$nombre.'</h5>';
                                echo '<p class="card-tex" e="'.$filaZapatilla['IdZapatilla'].'">'.$filaZapatilla['Precio'].'€</p>';
                                if ($filaZapatilla['Validada'] == 1) {
                                    echo '<p>Estado: En venta</p>';
                                }else{
                                    echo '<p>Estado: Sin validar</p>';
                                }
                            echo '</div>';
                        echo'</div>';
                    }
                }
                echo'</div>';
            } else {
                echo "Error en la segunda consulta: " . $conexion->error;
            }
        } else {
            echo "Error en la primera consulta: " . $conexion->error;
        }
    ?>
</div>
