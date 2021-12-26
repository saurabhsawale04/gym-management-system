<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SSS Services</title>
</head>

<body>
    <!-- navbar  -->
    <?php
        include 'admNav.php';
    ?>
    <!-- navbar ends  -->

    <!-- search bar + add owner -->
    <section class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <div class="navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="admAddPlan.php">
                                <button type="button" class="btn btn-dark">Add New Plan</button></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </section>
    <!-- search bar + add owner ends-->

    <!-- plans  -->
    <section class="container-fluid my-5 w-75">
        <div class="container mx-auto mt-2">
            <h1 class="text-center mb-3 form_h1">
                SSS Services
            </h1>
            <h2 class="text-center mb-3 mx-auto plans">Our Plans</h2>
        </div>
        <div class="container">
            <div class="row gy-5">
                <?php
                    include '../connection.php';
                    $tablename = "plans";
                    $selectquery = " select * from `$tablename` ";
                    $query = mysqli_query($con, $selectquery);
                    $count = mysqli_num_rows($query);

                    if($count == 0)
                    {
                        ?>

                        <div class="col-sm-10 col-md-10 col-lg-10 mx-auto" >
                            <h3 class="text-center mx-auto my-5" style="color: red; font-weight: bolder;">
                                <?php echo "No Plans found !"; ?>
                                </h3>
                                <p class="text-center mx-auto my-5">
                                <a class="nav-link active" aria-current="page" href="admAddPlan.php">
                                    <button type="button" class="btn btn-dark">Add New Plan</button></a>
                                </p>
                        </div>

                <?php
                    }

                    else
                    {
                        while($res = mysqli_fetch_array($query))
                        {
                            ?>
                <div class="col-sm-10 col-md-5 col-lg-5 mx-auto bg-success bg-opacity-10 shadow">
                    <div class="py-1">
                        <h2 class="text-center">
                            <?php echo $res['title'] ?>
                        </h2>
                    </div>
                    <p class="text-center"> <b>₹
                            <?php echo $res['money'] ?>
                        </b> for
                        <?php echo $res['time'] ?>
                    </p>
                    <hr class="w-25 mx-auto" />
                    <div class="d-flex justify-content-around">
                        <a href="admEditPlan.php?id=<?php echo $res['id']; ?>" class="edit1 card-link text-center col-2" data-bs-toggle="tooltip"
                            data-bs-placement="top" title="Edit info"><i class="fa fas fa-edit"
                                style="font-size: 2rem;"></i></a>
                        <a href="admPlanDel.php?id=<?php echo $res['id']; ?>" class="edit2 card-link text-center col-2" data-bs-toggle="tooltip"
                            data-bs-placement="top" title="Delete Plan"><i class="fa fas fa-trash"
                                style="font-size: 2rem;"></i></a>
                    </div>
                </div>
                <?php
                        }
                    }
                ?>

            </div>
        </div>
    </section>


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
</body>

</html>