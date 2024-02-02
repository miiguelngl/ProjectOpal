<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/normalize.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/productoCase.css">
    <link rel="stylesheet" href="./css/profile.css">
    <script defer src="js/menuDesplegable.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Opal</title>
</head>
<body>
    <?php
        include './php/header.php';
    ?>
    <main>
        <div class="container">
            <div class="case">
                <?php
                    include './php/profile.php';

                    include './php/productosEnVenta.php';
                ?>
            </div>
        </div>
    </main>
    <?php
        include './php/footer.php';
    ?>
</body>
</html>
