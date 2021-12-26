<?php
    session_start();

    if(!isset($_SESSION['email']))
    {
        header('location:../login.php');
    }

    include '../connection.php';
    $email = $_SESSION['email'];
    $emailSearch = " select * from owners where email = '$email' ";
    $query = mysqli_query($con, $emailSearch);
    $emailPass = mysqli_fetch_assoc($query);
    $dbgym = $emailPass['gym'];


?>

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
        include 'ownNav.php';
    ?>
    <!-- navbar ends  -->

     <!-- search bar + add owner -->
     <section class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <div class="navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="ownMemReg.php">
                                <button type="button" class="btn btn-dark">Add New Member</button></a>
                        </li>
                    </ul>
                    <form class="d-flex" action="" method="post" >
                        <input class="form-control me-2" type="search" name="searchMember" autocomplete="off" placeholder="Search by phone/name"
                            aria-label="Search">
                        <button class="btn btn-outline-success" type="submit" name="searchMem">Search</button>
                    </form>
                </div>
            </div>
        </nav>
    </section>
    <!-- search bar + add owner ends-->
    
    <section class="container-fluid my-2 w-100">
        <div class="container-fluid mx-auto mt-2 p-3">
            <h1 class="text-center mb-2 form_h1"><?php echo $dbgym ;?></h1>

        </div>
        <div class="container-fluid bg-dark bg-opacity-10 shadow">
            <h2 class="text-center py-3 mx-auto plans">Our Members</h2>
            <div class="row gy-5">
                <?php
                    
                    $tablename = $_SESSION['email'] ."_mems";
                    $flag = 0;
                    if(isset($_POST['searchMem']))
                    {
                        $temp = mysqli_real_escape_string($con, $_POST['searchMember']);
                        $selectquery = " select * from `$tablename` where name like '%$temp%' or mobile like '%$temp%'";
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

                        <div class="col-sm-10 col-md-10 col-lg-10 mx-auto" >
                            <h3 class="text-center mx-auto my-5" style="color: red; font-weight: bolder;">
                                <?php echo "No Members found !"; ?>
                                </h3>
                                <p class="text-center mx-auto my-5">
                                <a class="nav-link active" aria-current="page" href="ownMemReg.php">
                                    <button type="button" class="btn btn-dark">Add New Member</button></a>
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
                           // $temp = $tablename . $res['id'];

                            ?>
                            <div class="col-sm-10 col-md-4 col-lg-4 mx-auto ">
                                <div class="card mx-auto" style="width: 18rem;">
                                    <div class="card-body">
                                        <div style="background-color: black; color: white;">
                                            <h5 class="card-title text-center mx-auto" ><?php echo $res['name'] ?></h5>
                                            <hr class="w-25 mx-auto" />
                                        </div>
                                        <p class="card-text"><i class="fa fas fa-mobile"
                                                style="font-size: 1.2rem; margin-right: 0.5rem;"></i><?php echo $res['mobile'] ?></p>
                                        <p class="card-text"><i class="fa fas fa-address-book"
                                                style="font-size: 1.2rem; margin-right: 0.5rem;"></i><?php echo $res['address'] ?></p>
                                        <p class="card-text"><i class="fa fa-light fa-hourglass-half"
                                                style="font-size: 1.2rem; margin-right: 0.5rem;"></i><?php echo $newStartDate . " to " . $newEndDate?></p>
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
                                            <a href="ownerMemEdit.php?id=<?php echo $res['id']; ?>" class="edit1 card-link col-2 text-center" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Edit info"><i class="fa fas fa-edit"
                                                    style="font-size: 2rem;"></i></a>
                                            <a href="ownMemDel.php?id=<?php echo $res['id']; ?>" class="edit2 card-link col-2 text-center" data-bs-toggle="tooltip"
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
                                <a class="nav-link active" aria-current="page" href="ownMembers.php">
                                    <button type="button" class="btn btn-dark">See all Members</button></a>
                                </p>
                                <?php
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