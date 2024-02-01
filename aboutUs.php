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
        <div>

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
    <footer>
        <div class="infoFooter">
            <div><img src="img/LogoOpal.png" alt="" height="150px" width="150px"></div>
            <div class="infoFooterMenu">
                <h3>Menú</h3>
                <a href="">Tienda</a>
                <a href="subirProducto.html">Subir producto</a>
                <a href="aboutUs.html">Sobre nosotros</a>
                <a href="contacto.html">Contacto</a>
            </div>
            <div>
                <h3>Contact:</h3>
                <p>Tel: +34 963 41 52 85<br>
                    Mail: info@opal.com<br>
                    Indicencias: ayuda@opal.com</p>
            </div>
            <div class="infoFooterMenu">
                <h3>Legal</h3>
                <a href="">Protección de datos</a>
                <a href="">Terminos y condiciones</a>
            </div>
            
        </div>
        <div class="social-media">
            <a href="">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="rgba(91, 133, 217, 1)" class="bi bi-instagram" viewBox="0 0 16 16">
                    <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"/>
                </svg>
            </a>
            <a href="">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="rgba(91, 133, 217, 1)" class="bi bi-twitter-x" viewBox="0 0 16 16">
                    <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z"/>
                </svg>
            </a>
            <a href="">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="rgba(91, 133, 217, 1)" class="bi bi-facebook" viewBox="0 0 16 16">
                    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/>
                </svg>
            </a>
        </div>
        <div class="copyright">
            <p>© Copyright Opal 2024. All rights reserved. Privacy Policy - Legal Notice - Conditions of Sale and Withdrawal.</p>
        </div>
    </footer>
</body>
</html>