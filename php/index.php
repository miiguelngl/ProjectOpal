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
    <title>Opal</title>
</head>
<body>
    <?php
        include 'header.php';
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
                    <div class="container">
                      <div class="carousel-caption text-start">
                        <h2>Customized solutions.</h2>
                        <p class="opacity-75">We offer personalized solutions that adapt to your needs, carrying out projects from the conceptual phase to flawless execution.</p>
                        <p><a class="btn btn-lg btn-dark" href="#">Know more</a></p>
                      </div>
                    </div>
                </div>
                <div class="carousel-item" id="imgSlider2">
                    <div class="container">
                        <div class="carousel-caption">
                          <h2>We merge creativity with functionality.</h2>
                          <p class="opacity-75">With a passion for design and a fresh perspective, our team of talented creators strive to exceed expectations.</p>
                            <p><a class="btn btn-lg btn-dark" href="#">Know more</a></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item" id="imgSlider3">
                    <div class="container">
                        <div class="carousel-caption text-end">
                            <h2>Ready to take your project to the next level?</h2>
                            <p>Contact us for an initial consultation and find out how we can make your vision shine.</p>
                            <p><a class="btn btn-lg btn-dark" href="#">Contact us</a></p>
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
    </main>
    <?php
        include 'footer.php';
    ?>
</body>
</html>