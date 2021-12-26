<?php

include '../connection.php';
  session_start();
    

    if(!isset($_SESSION['username']))
    {
        header('location:../admin.php');
    }

    $id = $_GET['id'];
    
    //$tablename = "plans";

    $showq = " SELECT * FROM `plans` WHERE `id` = $id ";
    $showdata = mysqli_query($con, $showq);
    if (!$showdata) {
        printf("Error: %s\n", mysqli_error($con));
        exit();
    }
    $arrdata = mysqli_fetch_array($showdata);

    

    if(isset($_POST['editPlan']))
    {
        
        $title = mysqli_real_escape_string($con, $_POST['title']);
        $money = mysqli_real_escape_string($con, $_POST['money']);
        $time = mysqli_real_escape_string($con, $_POST['time']);

        $updatequery = " UPDATE `plans` SET `id`=$id, `title`='$title',`money`='$money',`time`='$time' WHERE `id`=$id;";        
        
        $iquery = mysqli_query($con, $updatequery);

        if($iquery)
        {


            ?>
            <script>
                alert("Plan updated Successfully");
                location.replace('admPlans.php');
            </script>
            <?php
        }

        else
        {
            ?>
            <script>
                alert("Something went wrong");
            </script>

            <?php
        }

    }


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhaijaan+2:wght@500&family=Rubik&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>SSS Services</title>
</head>

<body>
    <!-- navbar  -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark nav sticky-top">
        <div class="container-fluid">
            <img src="../images/logo4.png" alt="logo" class="logo">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link nvb" aria-current="page" href="admWel.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nvb" aria-current="page" href="admPlans.php">Our plans</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nvb" aria-current="page" href="admReg.php">Registration</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nvb" aria-current="page" href="admOwners.php">Owners</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nvb" aria-current="page" href="admLogout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- navbar ends  -->


    <!-- registration  -->
    <section class="container-fluid owner_reg">
        <div class="container mx-auto mt-2">
            <h1 class="text-center mb-3 form_h1">SSS Services</h1>
        </div>
        <div class="container mx-auto bg-success bg-opacity-10 mb-3 shadow">
            <div class="py-1">
                <h4 class="text-center my-3">Please fill plan information</h4>
            </div>
            <form action="" method="post" class="row  needs-validation" novalidate>
 
    
            <div class="col-md-7 mx-auto py-2">
                    <div class="pt-3">
                        <p>Plan Name</p>
                    </div>
                    <div class="input-group has-validation">
                        <input autocomplete="off" type="text" name="title" value="<?php echo $arrdata['title']; ?>" class="form-control" placeholder="Plan Name"
                            id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                        <div class="invalid-feedback">
                            Please write valid Plan Name.
                        </div>
                    </div>
                </div>

                <div class="col-md-7 mx-auto py-2">
                    <div class="pt-3">
                        <p>Amount (in ₹) </p>
                    </div>
                    <div class="input-group has-validation">
                        <input type="text" autocomplete="off" name="money" value="<?php echo $arrdata['money']; ?>" class="form-control"
                            id="validationCustomUsername" placeholder="Amount (in ₹)" aria-describedby="inputGroupPrepend"
                            required>
                        <div class="invalid-feedback">
                            Please write valid Amount
                        </div>
                    </div>
                </div>


                <div class="col-md-7 mx-auto py-2">
                    <div class="pt-3">
                        <p>Time period</p>
                    </div>
                    <div class="input-group has-validation">
                        <input type="text" autocomplete="off" name="time" value="<?php echo $arrdata['time']; ?>" class="form-control"
                            id="validationCustomUsername" placeholder="Time Period" aria-describedby="inputGroupPrepend"
                            required>
                        <div class="invalid-feedback">
                            Please write valid time period
                        </div>
                    </div>
                </div>

                <div class="col-12 mx-auto mt-3">
                    <p class="h5 my-1 text-center mx-auto">
                        <button type="submit" name="editPlan" class="btn btn-success">Update Plan</button>
                        <hr class="w-50 mx-auto" />
                    </p>
                </div>

            </form>
        </div>

    </section>
    <!-- registration ends  -->

    <!-- footer  -->
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

    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function () {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function (form) {
                    form.addEventListener('submit', function (event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>

</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
</html>