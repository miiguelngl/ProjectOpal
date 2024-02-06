<?php

    include "conexion.php";
        
    if(isset($_GET['pt'])) {
        // Recupera el valor del parámetro "id"
        $p = $_GET['pt'];
        
        //Consulta 
        $consultaZapa = "SELECT * FROM `Zapatillas` WHERE `IdZapatilla` = ?";

        $stmt = $conexion->prepare($consultaZapa);
        $stmt->bind_param("s", $p);
        $stmt->execute();

        $result1 = $stmt->get_result();

        if($result1->num_rows == 1) {
            $arrayZapa = $result1->fetch_array(MYSQLI_ASSOC);
            $idUsu= $arrayZapa['IdUsuario'];
            $consultaUsu = "SELECT * FROM `Usuario` WHERE `IdUsuario` = ?";
            
            $stmt2 = $conexion->prepare($consultaUsu);
            $stmt2->bind_param("s", $idUsu);
            $stmt2->execute();

            $result2 = $stmt2->get_result();
            
            if($result2->num_rows == 1) {
                $arrayUsu = $result2->fetch_array(MYSQLI_ASSOC);

                $consultaFoto = "SELECT * FROM `Fotos` WHERE `IdZapatilla` = ?";

                $stmt3 = $conexion->prepare($consultaFoto);
                $stmt3->bind_param("s", $p);
                $stmt3->execute();
    
                $result3 = $stmt3->get_result();
    
                if($result3->num_rows > 0) {
                    $arrayFoto = $result3->fetch_array(MYSQLI_ASSOC);
                    $imagenZapa = base64_encode($arrayFoto['Foto']);    
                            echo "<div id='caseProduct'>";
                                echo "<div id='caseProductImg'>";
                                    echo "<img src='data:image/jpeg;base64, $imagenZapa' alt='Imagen del usuario'>";
                                echo "</div>";
                            echo "</div>";
                            echo "<div id='caseProductInfo'>";
                                    echo "<h3>".$arrayZapa['Nombre']."</h3>";
                                    echo "<h5>".$arrayZapa['Marca']."</h5>";
                                    echo "<p>Vendido por ".$arrayUsu['Apodo']."</p>";
                                    // echo "<p>".$arrayZapa['Precio']."€</p>";
                            echo "</div>";
                }
            }
         }      
    } else {
        echo "No existe producto";
    }
?>
