<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/subirProducto.css">
    <script defer src="js/menuDesplegable.js"></script>
    <script defer src="js/formularioProducto.js"></script>
    <title>Opal</title>
</head>
<body>
    <?php
        include './php/header.php';
    ?>
    <main>
        <div class="container">
            <h2>Subir producto</h2>
            <div class="case">
                <form action="./formulario/SubirProducto/procesarProducto.php" method="post" enctype="multipart/form-data" name="fProducto">
                    <label for="nombre">Nombre de la Zapatilla:</label>
                    <input type="text" id="nombre" name="nombre" placeholder="Nombre..." required>
                
                    <label for="marca">Marca de la Zapatilla:</label>
                    <select id="marca" name="marca" required>
                        <option value="Nike">Nike</option>
                        <option value="Adidas">Adidas</option>
                        <option value="New Balance">New Balance</option>
                        <option value="Converse">Converse</option>
                        <option value="Vans">Vans</option>
                    </select> 
                
                    <label for="descripcion">Descripción del Estado del Producto:</label>
                    <textarea id="descripcion" name="descripcion" rows="4" maxlength="200" placeholder="Descripción de las sneakers..." required></textarea>
                
                    <label for="foto">Foto de la Zapatilla:</label>
                    <input type="file" id="foto" name="foto" accept="image/*" required>

                    <label for="talla">Talla:</label>
                    <input type="number" id="talla" name="talla" placeholder="Talla" required>

                    <label for="precio">Precio Sugerido:</label>
                    <input type="number" id="precio" name="precio" step="any" placeholder="No te pases..." required>

                    <input type="submit" id="enviar" name="enviar" value="Enviar">
                </form>
            </div>
        </div>
    </main>
    <?php
        include './php/footer.php';
    ?>
</body>
</html>