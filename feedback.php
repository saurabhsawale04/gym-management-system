<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SSS Services</title>
</head>

<body>

    <?php
        include 'navbar.php';
    ?>

    <section class=" feedback_sec my-5">
        <div class="container">
            <h1 class="text-center">trusted by many people across the world</h1>

            <h5 class="text-center">Some of our happy customers</h5>
            <hr class="w-25 mx-auto" />

        </div>
        <div class="container">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active  mb-3">
                        <img src="images/p7.jpg" class="d-block w-50 mx-auto" alt="p6">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Saikiran Narawad</h5>
                            <p>It took me few minutes to know the working of software</p>
                        </div>
                    </div>
                    <div class="carousel-item  mb-3">
                        <img src="images/p8.jpg" class="d-block w-50 mx-auto" alt="p6">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Niraj Garudkar</h5>
                            <p>it is very easy to use. Really helpful</p>
                        </div>
                    </div>
                    <div class="carousel-item  mb-3">
                        <img src="images/p9.jpg" class="d-block w-50 mx-auto" alt="p6">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Monali Thakur</h5>
                            <p>The best part of software is we can customise it according to our need</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>

    <footer class="container-fluid footer">
        <p class="mx-auto text-center my-4 mx-auto">© <span id="year"></span> <b> SSS
                Services</b> All Rights Reserved</p>
    </footer>
    <script>
        let dt = new Date();
        let yr = dt.getFullYear();
        let temp = document.getElementById('year');
        temp.innerHTML = yr;

    </script>
</body>

</html>