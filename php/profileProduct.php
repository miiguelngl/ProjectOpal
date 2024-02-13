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
                
                //SI tiene iniciada la sesion y la zapatilla pertene al que tiene la sesion iniciada 
                if (isset($_SESSION['Usu']) && $_SESSION['Usu'] !== null) {

                }

                if($result3->num_rows > 0) {
                    $arrayFoto = $result3->fetch_array(MYSQLI_ASSOC);
                    $imagenZapa = base64_encode($arrayFoto['Foto']);
                    echo "<div class='container' id='caseCenter'>";
                        echo "<div class='case'>";
                            echo "<div id='userName'>";
                                echo "<svg xmlns='http://www.w3.org/2000/svg' width='22' height='22' fill='#5b85d9' class='bi bi-person-fill' viewBox='0 0 16 16'>";
                                    echo "<path d='M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6'/>";
                                echo "</svg>";
                                echo "<h4>".$arrayUsu['Apodo']."</h4>";
                            echo "</div>";        
                            echo "<div id='caseProduct'>";
                                echo "<div id='caseProductImg'>";
                                    echo "<img src='data:image/jpeg;base64, $imagenZapa' alt='Imagen del usuario'>";
                                echo "</div>";
                                echo "<div id='caseProductInfo'>";
                                    echo "<h3 class='text-center'>".$arrayZapa['Nombre']."</h3>";
                                    echo "<h5>".$arrayZapa['Marca']."</h5>";
                                    echo "<h5>Talla: ".$arrayZapa['Talla']."</h5>";
                                    echo "<p>".$arrayZapa['Precio']."€</p>";
                                    echo "<a href='#' class='card-button'>Comprar</a>";
                                echo "</div>";
                            echo "</div>";
                            echo "<hr>";
                            echo "<div>";
                                    echo "<h3>Descripcion del producto</h3>";
                                    echo "<p>".$arrayZapa['Descripcion']."</p>";
                            echo "</div>";
                        echo "</div>";
                    echo "</div>";  
                }
            }
         }      
    } else {
        echo "No existe producto";
    }
?>
