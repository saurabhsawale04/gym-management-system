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

    <section class="container-fluid">
        <div class="container py-5  bg-success bg-opacity-10 my-5 shadow">
            <div class="py-3">
                <h1 class=" mx-auto text-center">Contact Us</h1>
                <p class="mx-auto text-center">For anyBusiness Queries and Login Activation</p>
                <hr class="w-50 mx-auto" />
            </div>
            <div class="container">
                <div class="row gy-4">
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="py-1">
                            <p class="h2 my-3"><i class="fa fa-brands fa-whatsapp"
                                    style="font-size: 2rem; margin-right: 1rem;"></i>Whatsapp Us</p>
                        </div>
                        <p class="text-center">7507622734</p>
                        <hr class="w-25 mx-auto" />
                    </div>

                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="py-1">
                            <p class="h2 my-3"><i class="fa fa-brands fa-facebook"
                                    style="font-size: 2rem; margin-right: 1rem;"></i>Msg on FB</p>
                        </div>
                        <p class="text-center">SSS Services</p>
                        <hr class="w-25 mx-auto" />
                    </div>

                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="py-1">
                            <p class="h2 my-3"><i class="fa fa-brands fa-instagram"
                                    style="font-size: 2rem; margin-right: 1rem;"></i>Msg on IG</p>
                        </div>
                        <p class="text-center">@sss_services</p>
                        <hr class="w-25 mx-auto" />
                    </div>

                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="py-1">
                            <p class="h2 my-3"><i class="fa fa-light fa-envelope"
                                    style="font-size: 2rem; margin-right: 1rem;"></i>Email Us</p>
                        </div>
                        <p class="text-center">sss.services@gmail.com</p>
                        <hr class="w-25 mx-auto" />
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