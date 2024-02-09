<div id="productos">
    <h2>Productos en venta</h2>
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
            $consulta2 = "SELECT * FROM `Zapatillas` WHERE `IdUsuario` = ?";
            $stmt = $conexion->prepare($consulta2);
            $stmt->bind_param("s", $fila['IdUsuario']);
            $exito = $stmt->execute();
            if ($exito) {
                $resultadoZapatillas = $stmt->get_result();
                // Bucle para cada resultado de la consulta
                echo'<div class="ventas">';
                $i = 0;
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
                        if ($filaZapatilla['Validada'] == 0) {
                            echo '<div class="card disabled">';
                            echo '<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="#EF2A31" class="bi bi-x" viewBox="0 0 16 16">
                                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                                <p class="pending">Pendiente</p>
                          </svg>';
                        }else{
                            echo '<a href="producto.php?pt=' . $filaZapatilla['IdZapatilla'] . '">';
                            echo '<div class="card" style="">';
                        }
                        $nombre = (strlen($filaZapatilla['Nombre']) > 17) ? substr($filaZapatilla['Nombre'], 0, 15) . '...' : $filaZapatilla['Nombre'];
                        
                            echo '<div class="imgContainer">';
                            if ($filaZapatilla['Validada'] == 0) {
                                echo '<img src="data:image/bin;base64,'. $blob .'" alt="..." style="filter: brightness(50%)">';
                            }else{
                                echo '<img src="data:image/bin;base64,'. $blob .'" alt="...">';
                            }
                            echo '</div>';
                            echo '<div class="card-body" alt="...">';
                                echo '<h5 class="card-title">'.$nombre.'</h5>';
                                echo '<p class="card-tex" e="'.$filaZapatilla['IdZapatilla'].'">'.$filaZapatilla['Precio'].'€</p>';
                            echo '</div>';
                            if($i%5==0){
                                echo '<br>';
                            }
                        echo'</div>';
                        if ($filaZapatilla['Validada'] == 1) {
                            echo '</a>';
                        }

                    }
                    $i++;
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
