<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/aboutUs.css">
    <link href="css/carousel.css" rel="stylesheet">
    <script defer src="js/menuDesplegable.js"></script>
    <title>Opal</title>
</head>
<body>
    <?php
        include './php/header.php';
    ?>
    <main>
        <div class="videoCase">
            <video autoplay muted loop>
                <source src="img/videoAboutUs.mp4" type="video/mp4">
            </video>
            <div class="overlay">
                <div id="infoVideo">
                    <h2>La satisfacción de <span>vender</span> <br> bien y <span>comprar</span> mejor</h2>
                </div>
                <button>
                    <a href="#servicios">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="white" class="bi bi-arrow-down" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1"/>
                        </svg>
                    </a>
                </button>
            </div>
        </div>
        <div id="servicios">
            <h2>Servicios</h2>
            <h4>Porque nos interesa tu estilo</h4>
            <div id="serviciosCase">
                <div class="serviciosCaseInfo">
                    <h3>Comprar</h3>
                    <hr>
                    <p>
                        En nuestra plataforma, ofrecemos un servicio de compra de zapatillas que simplifica tu experiencia.
                    </p>
                </div>
                <div class="serviciosCaseInfo">
                    <h3>Vender</h3>
                    <hr>
                    <p>
                        ¿Tienes zapatillas en buen estado que ya no necesitas? Aprovecha nuestro servicio de venta. Registra tus zapatillas en nuestra plataforma, establece un precio justo y llega a una audiencia apasionada por el calzado.
                    </p>
                </div>
                <div class="serviciosCaseInfo">
                    <h3>Asesoramiento</h3>
                    <hr>
                    <p>
                        En Opal, nos importa tu estilo y preferencias. Nuestro servicio de asesoramiento personalizado está diseñado para ayudarte a encontrar las zapatillas perfectas.
                    </p>
                </div>
            </div>
        </div>
        <section  id="marcas">
            <div id="marcasInfo">
                <h2>Nuestras marcas</h2>
                <h4>Estilo y Autenticidad en Cada Paso</h4>
                <div class="container">
                    <p class="text-center">
                        Descubre el mundo de la moda y la autenticidad con las marcas principales que forman parte de nuestra plataforma dedicada a la compra y venta de zapatillas. En ZapatillasPlus, nos enorgullece colaborar con algunas de las marcas más reconocidas y respetadas en la industria del calzado.
                    </p>
                </div>
                <div class="container">
                    <div class="marcasInfoText">
                        <div id="textoDerecha">
                            <h3>gigantes de la moda</h3>
                            <p>
                                Entre nuestras marcas destacadas se encuentran gigantes de la moda deportiva como Nike, Adidas, y New Balance, que han dejado una huella imborrable en la cultura urbana. Desde estilos icónicos hasta innovaciones vanguardistas, estas marcas son sinónimo de calidad y autenticidad.
                            </p>
                        </div>
                        <div class="marcasInfoImg">
                            <img src="img/sneaker-air-jordan-11.png" alt="" height="250px">
                        </div>
                    </div>
                    <div class="marcasInfoText">
                        <div class="marcasInfoImg">
                            <img src="img/sneaker-adidas-forum-low-x-bad-bunny-cloud-white.png" alt="" height="250px">
                        </div>
                        <div id="textoIzquierda">
                            <h3>opciones clásicas y atemporales</h3>
                            <p>Además, contamos con opciones clásicas y atemporales de Converse, que han acompañado a generaciones con su distintivo diseño. Y para aquellos que buscan la perfecta combinación entre comodidad y estilo, nuestras opciones de Vans ofrecen un toque urbano que marca la diferencia.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container d-none d-md-flex">
                <div class="row align-items-around">
                    <div class="col-4 col-sm-3 col-md row align-items-center">
                        <img src="img/nike.png" alt="Logo de Nike" class="img-fluid mb-7 mb-md-0">
                    </div>
                    <div class="col-4 col-sm-3 col-md row align-items-center">
                        <img src="img/Adidas_Logo.svg" alt="Logo de Adidas" class="img-fluid mb-7 mb-md-0">
                    </div>
                    <div class="col-4 col-sm-3 col-md row align-items-center">
                        <img src="img/New_balance.png" alt="Logo de New Balance" class="img-fluid mb-7 mb-md-0">
                    </div>
                    <div class="col-4 col-sm-3 col-md row align-items-center">
                        <img src="img/Converse_logo.svg.png" alt="Logo de Converse" class="img-fluid mb-7 mb-md-0">
                    </div>
                    <div class="col-4 col-sm-3 col-md row align-items-center">
                        <img src="img/Vans-logo.svg.png" alt="Logo de Vans" class="img-fluid mb-7 mb-md-0">
                    </div>
                </div>
            </div>
            <div id="carouselExample" class="carousel slide d-md-none">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <div class="container row align-items-center justify-content-center h-100">
                        <img src="img/nike.png" alt="Logo de Nike" class="img-fluid d-block w-75">
                    </div>
                  </div>
                  <div class="carousel-item">
                    <div class="container row align-items-center justify-content-center h-100">
                        <img src="img/Adidas_Logo.svg" alt="Logo de Adidas" class="img-fluid d-block w-75">
                    </div>
                  </div>
                  <div class="carousel-item">
                    <div class="container row align-items-center justify-content-center h-100">
                        <img src="img/New_balance.png" alt="Logo de New Balance" class="img-fluid d-block w-75">
                    </div>
                  </div>
                  <div class="carousel-item">
                    <div class="container row align-items-center justify-content-center h-100">
                        <img src="img/Converse_logo.svg.png" alt="Logo de Converse" class="img-fluid d-block w-75">
                    </div>
                  </div>
                  <div class="carousel-item">
                    <div class="container row align-items-center justify-content-center h-100">
                        <img src="img/Vans-logo.svg.png" alt="Logo de Vans" class="img-fluid d-block w-75">
                    </div>
                  </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
            </div>
        </section>
    </main>
    <?php
        include './php/footer.php';
    ?>
</body>
</html>