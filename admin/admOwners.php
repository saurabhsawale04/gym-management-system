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
        include 'admNav.php';
    ?>
    <!-- search bar + add owner -->
    <section class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <div class="navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="admReg.php">
                                <button type="button" class="btn btn-dark">Add New Gym Owner</button></a>
                        </li>
                    </ul>
                    <form class="d-flex" action="" method="post" >
                        <input class="form-control me-2" type="search" name="searchOwner" autocomplete="off" placeholder="Search by gym/owner"
                            aria-label="Search">
                        <button class="btn btn-outline-success" type="submit" name="searchOwn">Search</button>
                    </form>
                </div>
            </div>
        </nav>
    </section>
    <!-- search bar + add owner ends-->
    
    <section class="container-fluid my-2 w-100">
        <div class="container-fluid mx-auto mt-2 p-3">
            <h1 class="text-center mb-2 form_h1">SSS Services</h1>

        </div>
        <div class="container-fluid bg-dark bg-opacity-10 shadow">
            <h2 class="text-center py-3 mx-auto plans">Our Customers</h2>
            <div class="row gy-5">
                <?php
                    include '../connection.php';
                    $tablename = 'owners';
                    $flag = 0;
                    if(isset($_POST['searchOwn']))
                    {
                        $temp = mysqli_real_escape_string($con, $_POST['searchOwner']);
                        $selectquery = " select * from `$tablename` where gym like '%$temp%' or owner like '%$temp%'";
                        $flag = 1;
                    }

                    else{
                        $selectquery = " select * from `$tablename` ";
                        $flag = 0;
                    }
                    
                    $query = mysqli_query($con, $selectquery);
                    $count = mysqli_num_rows($query);

                    if($count == 0)
                    {
                        ?>
                        <div class="col-sm-10 col-md-10 col-lg-10 mx-auto">
                        <h3 class="text-center mx-auto my-5" style="color: red; font-weight: bolder;">
                                <?php echo "No Owners found !"; ?>
                                </h3>
                                <p class="text-center mx-auto my-5">
                                <a class="nav-link active" aria-current="page" href="admReg.php">
                                    <button type="button" class="btn btn-dark">Add New Owner</button></a>
                                </p>
                        </div>
        
                        <?php
                    }
        
                    else
                    {
                        while($res = mysqli_fetch_array($query))
                        {
                            $newStartDate = date("d-m-Y", strtotime($res['startdate']));
                            $newEndDate = date("d-m-Y", strtotime($res['enddate']));
                            ?>
                            <div class="col-sm-10 col-md-4 col-lg-4 mx-auto ">
                                <div class="card mx-auto" style="width: 18rem;">
                                    <div class="card-body">
                                        <div style="background-color: black; color: white;">
                                            <h5 class="card-title text-center mx-auto"><?php echo $res['gym'] ?></h5>
                                            <h6 class="card-subtitle mb-3 text-muted text-center mx-auto"><?php echo $res['owner'] ?></h6>
                                        </div>
                                        <p class="card-text"><i class="fa fas fa-mobile"
                                                style="font-size: 1.2rem; margin-right: 0.5rem;"></i><?php echo $res['mobile'] ?></p>
                                        <p class="card-text"><i class="fa fa-light fa-envelope"
                                                style="font-size: 1.2rem; margin-right: 0.5rem;"></i><?php echo $res['email'] ?></p>
                                        <p class="card-text"><i class="fa fas fa-address-book"
                                                style="font-size: 1.2rem; margin-right: 0.5rem;"></i><?php echo $res['address'] ?></p>
                                        <p class="card-text"><i class="fa fas fa-hourglass-start"
                                                style="font-size: 1.2rem; margin-right: 0.5rem;"></i><?php echo $res['plan'] ?></p>
                                        <p class="card-text"><i class="fa fa-light fa-hourglass-half"
                                                style="font-size: 1.2rem; margin-right: 0.5rem;"></i><?php echo $newStartDate ." to " . $newEndDate ?></p>
                                                <?php
                                        if($res['status'] === 'Not Paid' || date('Y-m-d')>$res['enddate']){
                                            $ans = 'Not Paid';
                                            if($res['status'] === 'Paid')
                                            {
                                                $ans = 'Validity Ended';
                                            }
                                            
                                        ?>
                                        <p class="card-text" style="background-color: red;"><i class="fa fas fa-credit-card"
                                            style="font-size: 1.2rem; margin-right: 0.5rem;"></i><span class="status"
                                            style="color: white;"><?php echo $ans ?></span></p>
                                        <?php
                                        }
                                        else{
                                           
                                            ?>
                                        <p class="card-text" style="background-color: green;"><i class="fa fas fa-credit-card"
                                                style="font-size: 1.2rem; margin-right: 0.5rem;"></i><span class="status"
                                                style="color: white;"><?php echo $res['status'] ?></span></p>
                                        <?php
                                        }
                                        ?>
                                        <div class="d-flex justify-content-around">
                                            <a href="admEditOwner.php?email=<?php echo $res['email']; ?>" class="edit1 card-link col-2 text-center" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Edit info"><i class="fa fas fa-edit"
                                                    style="font-size: 2rem;"></i></a>
                                            <a href="admDelOwner.php?email=<?php echo $res['email']; ?>" class="edit2 card-link col-2 text-center" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Delete Gym Owner"><i class="fa fas fa-trash"
                                                    style="font-size: 2rem;"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }

                    if($flag == 1)
                    {
                        ?>
                        <p class="text-center mx-auto my-5">
                                <a class="nav-link active" aria-current="page" href="admOwners.php">
                                    <button type="button" class="btn btn-dark">See all Owners</button></a>
                                </p>
                                <?php
                    }
                ?>
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