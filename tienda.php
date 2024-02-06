<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/tienda.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/productoCase.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script defer src="js/menuDesplegable.js"></script>
    <title>Opal</title>
</head>
<body>
    <?php
        include './php/header.php';
    ?>
    <main>
        <?php
            include './php/tienda.php';
        ?>
    </main>
    <?php
        include './php/footer.php';
    ?>

</body>
<script src="./js/enlaces.js"></script>
</html>