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
    <link rel="stylesheet" href="css/index.css">
    <script defer src="js/menuDesplegable.js"></script>
    <title>Opal</title>
</head>
<body>
   <?php
        include './php/header.php';
    ?>
    <main>
        <div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active" id="imgSlider1">
                    <div class="imgSliderCapa"></div>
                    <div class="container">
                      <div class="carousel-caption text-start">
                        <h2>Tu Destino para el Estilo Único.</h2>
                        <p class="opacity-75">En Opal, no solo vendemos zapatillas de marca, sino que ofrecemos una experiencia única centrada en el estilo personal de cada cliente.</p>
                        <p><a class="btn btn-lg btn-dark" href="tienda.php">Visitar tienda</a></p>
                      </div>
                    </div>
                </div>
                <div class="carousel-item" id="imgSlider2">
                    <div class="imgSliderCapa"></div>
                    <div class="container">
                        <div class="carousel-caption">
                          <h2>Servicios de Compra y Venta.</h2>
                          <p class="opacity-75">Entendemos que cada cliente es único, y así es como tratamos cada transacción. Nuestro servicio de compra y venta personalizado te permite encontrar las zapatillas que se adaptan a tus gustos y necesidades específicas.</p>
                            <p><a class="btn btn-lg btn-dark" href="subirProducto.html">Subir producto</a></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item" id="imgSlider3">
                    <div class="imgSliderCapa"></div>
                    <div class="container">
                        <div class="carousel-caption text-end">
                            <h2>Tu Satisfacción es Nuestra Prioridad.</h2>
                            <p>En Opal, la satisfacción del cliente es nuestra máxima prioridad. Nos esforzamos por ofrecer un servicio impecable desde el momento en que exploras nuestro catálogo hasta que recibes tus zapatillas en la puerta de tu hogar.</p>
                            <p><a class="btn btn-lg btn-dark" href="#">Contáctanos</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div class="container">
            <div class="shop">
                <div class="shopInfo">
                    <h2>Vuestras ventas</h2>
                    <a href="">Ver todo...</a>
                </div>
                <div class="shopBody">
                    <?php
                        include './php/catalogo.php';
                    ?>
                </div>
            </div>
        </div>
        <div id="sobreNosotros">
            <div id="sobreNosotrosInfo">
                <h2>Elevando el estilo personal</h2>
                <p>
                    En Opal, entendemos que la moda es una forma de expresión personal, 
                    y las zapatillas son una parte esencial de ese lenguaje. 
                    Creemos que el estilo es una extensión de la identidad de cada individuo, 
                    y estamos aquí para ayudarte a encontrar las zapatillas que reflejen tu personalidad única.
                </p>
                <button><a href="">Leer más</a></button>
            </div>
        </div>
        <div id="sobreNosotrosPC">
            <div class="container">
                <div id="sobreNosotrosPCFotos">
                    <img src="img/sobreNosotros1.jpg" alt="" height="350px" id="foto1">
                    <img src="img/sobreNosotros2.jpg" alt="" height="350px" id="foto2">
                </div>
                <div id="sobreNosotrosPCInfo">
                    <h2>Elevando el estilo personal</h2>
                    <p>
                        En Opal, entendemos que la moda es una forma de expresión personal, 
                        y las zapatillas son una parte esencial de ese lenguaje. 
                        Creemos que el estilo es una extensión de la identidad de cada individuo, 
                        y estamos aquí para ayudarte a encontrar las zapatillas que reflejen tu personalidad única.
                    </p>
                    <button><a href="">Leer más</a></button>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="shop">
                <div class="shopInfo">
                    <h2>Sneakers más baratas</h2>
                    <a href="">Ver todo...</a>
                </div>
                <div class="shopBody">
                    <?php
                        include './php/catalogo.php';
                    ?>
                </div>
            </div>
        </div>
        <section  id="marcas">
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
        include './php/footer.php'
    ?>
</body>
</html>