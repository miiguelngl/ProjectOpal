<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/normalize.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/producto.css">
    <script defer src="js/menuDesplegable.js"></script>
    <title>Opal</title>
</head>
<body>
    <?php
        include './php/header.php';
    ?>
    <main>
        <div class="container" id="caseCenter">
            <div class="case">
                <div id="userName">
                    <h4>miiguelngl</h4>
                </div>
                <div id="caseProduct">
                    <div id="caseProductImg">
                        <img src="img/pabloMotos.jpeg" alt="">
                    </div>
                    <div id="caseProductInfo">
                        <h3>Jordan Air 1</h3>
                        <h5>Nike</h5>
                        <p>250€</p>
                        <a href="#" class="card-button">Comprar</a>
                    </div>
                </div>
                <hr>
                <div>
                    <h3>Estado del producto</h3>
                    <p>
                    Estas zapatillas usadas, lejos de mostrar signos de decadencia, revelan una elegancia desgastada que añade un toque distintivo a tu estilo. Descubre el encanto único de unas zapatillas que han ganado carácter con cada paso, convirtiéndose en más que simples accesorios: son piezas de una historia que continúa con cada nuevo dueño.
                    </p>
                </div>
            </div>
        </div>
    </main>
    <?php
        include './php/footer.php';
    ?>
</body>
</html>