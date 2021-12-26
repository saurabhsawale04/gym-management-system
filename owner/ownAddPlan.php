<?php
    
    session_start();

    if(!isset($_SESSION['email']))
    {
        header('location:../login.php');
    }


    include '../connection.php';
    
    $tablename = $_SESSION['email'] . "_plans";
    $email = $_SESSION['email'];
    $emailSearch = " select * from owners where email = '$email' ";
    $query = mysqli_query($con, $emailSearch);
    $emailPass = mysqli_fetch_assoc($query);
    $dbgym = $emailPass['gym'];

    if(isset($_POST['addPlan']))
    {
        
        $title = mysqli_real_escape_string($con, $_POST['title']);
        $money = mysqli_real_escape_string($con, $_POST['money']);
        $time = mysqli_real_escape_string($con, $_POST['time']);


        

        $insertquery = " INSERT INTO `$tablename` (`title`, `money`, `time`) VALUES ('$title', '$money', '$time'); ";
                
        $iquery = mysqli_query($con, $insertquery);

        if($iquery)
        {


            ?>
            <script>
                alert("Plan added Successfully");
                location.replace('ownPlans.php');
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
    <title>SSS Services</title>
</head>

<body>
    <!-- navbar  -->
    <?php
        include 'ownNav.php';
    ?>
    <!-- navbar ends  -->

    <!-- registration  -->
    <section class="container-fluid owner_reg">
        <div class="container mx-auto mt-2">
            <h1 class="text-center mb-3 form_h1"><?php echo $dbgym ;?></h1>
        </div>
        <div class="container mx-auto bg-success bg-opacity-10 mb-3 shadow">
            <div class="py-1">
                <h4 class="text-center my-3">Please fill plan information</h4>
            </div>
            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" class="row  needs-validation" novalidate>
                <div class="col-md-7 mx-auto py-2">
                    <div class="pt-3">
                        <p>Plan Name</p>
                    </div>
                    <div class="input-group has-validation">
                        <input autocomplete="off" type="text" name="title" class="form-control" placeholder="Plan Name"
                            id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                        <div class="invalid-feedback">
                            Please write valid Plan Name.
                        </div>
                    </div>
                </div>

                <div class="col-md-7 mx-auto py-2">
                    <div class="pt-3">
                        <p>Amount (in ₹)</p>
                    </div>
                    <div class="input-group has-validation">
                        <input type="text" autocomplete="off" name="money" class="form-control"
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
                        <input type="text" autocomplete="off" name="time" class="form-control"
                            id="validationCustomUsername" placeholder="Time Period" aria-describedby="inputGroupPrepend"
                            required>
                        <div class="invalid-feedback">
                            Please write valid time period
                        </div>
                    </div>
                </div>

                <div class="col-12 mx-auto mt-3">
                    <p class="h5 my-1 text-center mx-auto">
                        <button type="submit" name="addPlan" class="btn btn-success">Add Plan</button>
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

</html>