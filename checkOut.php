<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/normalize.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/checkOut.css">
    <script defer src="js/menuDesplegable.js"></script>
    <script defer src="js/inputID.js"></script>
    <title>Opal</title>
</head>
<body>
    <?php
        include './php/header.php';
    ?>
    <main>
        <?php
             if(isset($_GET['pt'])) {
                $idZ= $_GET['pt'];
                $consultaUsu = "SELECT * FROM `Zapatilla` WHERE `IdZapatilla` = ?";
            
                $stmt2 = $conexion->prepare($consultaUsu);
                $stmt2->bind_param("s", $idZ);
                $stmt2->execute();

                $result2 = $stmt2->get_result();
            
                if($result2->num_rows == 1) {
                    $arrayZapa = $result2->fetch_array(MYSQLI_ASSOC);
                    if (isset($_SESSION['Usu']) && $_SESSION['Usu'] !== null) {
                        $sesionIni=$_SESSION['Usu'];
                        $consultaUsu = "SELECT * FROM `Usuario` WHERE `Apodo` = ?";

                        $stmt = $conexion->prepare($consultaUsu);
                        $stmt->bind_param("s", $sesionIni);
                        $stmt->execute();
                        if ($sesionIni == $arrayUsu['Apodo']){

                        }else 
                    }
                   
                }
        ?>
        <div class="container" id="posicionCase">
            <div class="case">
                <h4>Realizar compra</h4>
                <hr>
                <div id="formularioContacto">
                    <form action="formulario/ProductoComprado/venderProducto.php" method="post" enctype="multipart/form-data">
                        <label for="correo">Nombre:</label>
                        <input type="text" id="nombre" name="nombre" placeholder="Nombre..." required>

                        <label for="telefono">Número de teléfono:</label>
                        <input type="tel" id="telefono" name="telefono" placeholder="Teléfono...">

                        <label for="asunto">Dirección:</label>
                        <input type="text" id="direccion" name="direccion" placeholder="Dirección de envío..." required>

                        <label for="asunto">Código postal:</label>
                        <input type="number" min="0" pattern="[0-9]{5}" id="cp" name="cp" placeholder="CP..." required>

                        <label for="descripcion">Observaciones:</label>
                        <textarea id="descripcion" name="descripcion" rows="4" placeholder="Dejar en recepción, dejarselo al conserje..."></textarea>

                        <div class="form-row">
                            <div class="col">
                                <label for="asunto">Tarjeta:</label><br>
                                <input type="number" min="0" pattern="[0-9]{12}" id="tarjeta" name="tarjeta" placeholder="Número tarjeta..." required>
                            </div>
                            <div class="col">
                                <label for="asunto">CVV:</label><br>
                                <input type="number" min="0" pattern="[0-9]{3}" id="cvv" name="cvv" placeholder="CVV..." required>
                            </div>
                        </div>

                        <input type="number" id="id" name="id" class="d-none">

                        <input type="submit" id="enviar" value="Enviar">
                    </form>
                </div>
            </div>
            <div class="case">
                <h4>Producto</h4>
                <hr>
                <?php
                    include './php/productoCheckOut.php';
                ?>
            </div>
        </div>
    </main>
    <?php
        include './php/footer.php';
    ?>
</body>
</html>