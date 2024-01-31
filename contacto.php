<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="css/carousel.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/contacto.css">
    <script defer src="js/menuDesplegable.js"></script>
    <title>Opal</title>
</head>
<body>
    <?php
        include './php/header.php';
    ?>
    <main>
        <div class="container">
            <div id="caseContact">
                <div id="caseContactInfo">
                    <h2>¡Contáctanos!</h2>
                    <p>
                        En Opal, valoramos la comunicación directa y estamos aquí para responder a tus preguntas y atender tus necesidades. 
                        Ya sea que estés buscando más información sobre nuestros productos, desees realizar una compra especial o estés 
                        interesado en vender tus zapatillas exclusivas, nuestro equipo está listo para ayudarte.
                    </p>
                    <h3>Información de contacto:</h3>
                    <ul>
                        <li>Teléfono
                            <ul>
                                <li>+34 963 41 52 85</li>
                            </ul>
                        </li>
                        <li>Correo de información
                            <ul>
                                <li>info@opal.com</li>
                            </ul>
                        </li>
                        <li>Correo de incidencias
                            <ul>
                                <li>ayuda@opal.com</li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div id="formularioContacto">
                    <form action="procesar_formulario.php" method="post" enctype="multipart/form-data">
                        <label for="correo">Correo:</label>
                        <input type="email" id="correo" name="correo" placeholder="Correo..." required>

                        <label for="telefono">Número de teléfono:</label>
                        <input type="tel" id="telefono" name="telefono" placeholder="Teléfono...">

                        <label for="asunto">Asunto:</label>
                        <input type="text" id="asunto" name="asunto" placeholder="Asunto..." required>
                    
                        <label for="descripcion">Dinos que necesitas:</label>
                        <textarea id="descripcion" name="descripcion" rows="4" placeholder="¿Que ocurre?" required></textarea>
                    
                        <input type="submit" id="enviar" value="Enviar">
                    </form>
                </div>
            </div>
        </div>
    </main>
    <?php
        include './php/footer.php';
    ?>
</body>
</html>