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
    <section class="mb-5">
        <div class="container py-5">
            <h1 class=" mx-auto text-center">Check our <b>FEATURES</b></h1>
            <hr class="w-50 mx-auto" />
        </div>
        <div class="container w-75">
            <div class="row gy-5">
                <div class="col-sm-10 col-md-5 col-lg-5 mx-auto bg-success bg-opacity-10 shadow">
                    <div class="py-1">
                        <h2 class="text-center">client management</h2>
                    </div>
                    <p class="text-center">Easily Manage large clients</p>
                    <hr class="w-25 mx-auto" />
                </div>

                <div class="col-sm-10 col-md-5 col-lg-5 mx-auto bg-success bg-opacity-10 shadow">
                    <div class="py-1">
                        <h2 class="text-center">Mobile-P.C. access</h2>
                    </div>
                    <p class="text-center">Access from any device and from anywhere</p>
                    <hr class="w-25 mx-auto" />
                </div>
                <div class="col-sm-10 col-md-5 col-lg-5 mx-auto bg-success bg-opacity-10 shadow">
                    <div class="py-1">
                        <h2 class="text-center">Daily safe back-up</h2>

                    </div>
                    <p class="text-center">Backup daily saved data easily</p>
                    <hr class="w-25 mx-auto" />
                </div>
                <div class="col-sm-10 col-md-5 col-lg-5 mx-auto bg-success bg-opacity-10 shadow">
                    <div class="py-1">
                        <h2 class="text-center">Finance</h2>

                    </div>
                    <p class="text-center">Complete finance management including collection and expenses.</p>
                    <hr class="w-25 mx-auto" />
                </div>
                <div class="col-sm-10 col-md-5 col-lg-5 mx-auto bg-success bg-opacity-10 shadow">
                    <div class="py-1">
                        <h2 class="text-center">Staff Management</h2>

                    </div>
                    <p class="text-center">Manage easily their attendances, salaries and many more</p>
                    <hr class="w-25 mx-auto" />
                </div>
                <div class="col-sm-10 col-md-5 col-lg-5 mx-auto bg-success bg-opacity-10 shadow">
                    <div class="py-1">
                        <h2 class="text-center">Manage Rates & offers</h2>

                    </div>
                    <p class="text-center">Add, edit and delete new rates and offers for customers</p>
                    <hr class="w-25 mx-auto" />
                </div>

            </div>
        </div>
    </section>

    <!-- /*-- Footer --*/ -->
    <footer class="container-fluid footer">
        <p class="mx-auto text-center my-4 mx-auto">© <span id="year"></span> <b> SSS
                Services</b> All Rights Reserved</p>
    </footer>
</body>
<script>
    let dt = new Date();
    let yr = dt.getFullYear();
    let temp = document.getElementById('year');
    temp.innerHTML = yr;

</script>

</html>