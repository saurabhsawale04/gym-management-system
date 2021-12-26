<?php
    
    session_start();

    if(!isset($_SESSION['email']))
    {
        header('location:../login.php');
    }


    include '../connection.php';
    
    $tablename = $_SESSION['email'] . "_trains";
    $email = $_SESSION['email'];
    $emailSearch = " select * from owners where email = '$email' ";
    $query = mysqli_query($con, $emailSearch);
    $emailPass = mysqli_fetch_assoc($query);
    $dbgym = $emailPass['gym'];

    if(isset($_POST['addTrain']))
    {
        
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $mobile = mysqli_real_escape_string($con, $_POST['mobile']);
        $address = mysqli_real_escape_string($con, $_POST['address']);
        $type = mysqli_real_escape_string($con, $_POST['type']);
        $status = mysqli_real_escape_string($con, $_POST['status']);
        $date = mysqli_real_escape_string($con, $_POST['date']);

        $newDate = date("Y-m-d", strtotime($date));
        

        $insertquery = " INSERT INTO `$tablename` (`name`, `mobile`, `address`, `type`, `status`, `date`) VALUES ('$name', '$mobile', '$address','$type', '$status', '$newDate'); ";
                
        $iquery = mysqli_query($con, $insertquery);

        if($iquery)
        {


            ?>
            <script>
                alert("Trainer added Successfully");
                location.replace('ownTrainers.php');
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
            <h1 class="text-center mb-3 form_h1"><?php echo $dbgym?></h1>
        </div>
        <div class="container mx-auto bg-success bg-opacity-10 mb-3 shadow">
            <div class="py-1">
                <h4 class="text-center my-3">Please fill Trainer information</h4>
            </div>
            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" class="row  needs-validation"
                novalidate>
                <div class="col-md-7 mx-auto py-2">
                    <div class="pt-3">
                        <p>Trainer Name</p>
                    </div>
                    <div class="input-group has-validation">
                        <input autocomplete="off" type="text" name="name" class="form-control" placeholder="Trainer Name"
                            id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                        <div class="invalid-feedback">
                            Please write validName.
                        </div>
                    </div>
                </div>

                <div class="col-md-7 mx-auto py-2">
                    <div class="pt-3">
                        <p>Mobile</p>
                    </div>
                    <div class="input-group has-validation">
                        <input type="text" autocomplete="off" name="mobile" class="form-control"
                            id="validationCustomUsername" placeholder="Trainer Mobile no." aria-describedby="inputGroupPrepend"
                            required>
                        <div class="invalid-feedback">
                            Please write valid Mobile no.
                        </div>
                    </div>
                </div>

                <div class="col-md-7 mx-auto py-2">
                    <div class="pt-3">
                        <p>Address</p>
                    </div>
                    <div class="input-group has-validation">
                        <textarea name="address" class="form-control" id="validationCustomUsername"
                            placeholder="Trainer Address" aria-describedby="inputGroupPrepend" required cols="30" rows="5"
                            autocomplete="off"></textarea>
                        <div class="invalid-feedback">
                            Please write valid address.
                        </div>
                    </div>
                </div>

                <div class="col-md-7 mx-auto py-2">
                    <div class="pt-3">
                        <p>Trainer Type</p>
                    </div>
                    <div class="input-group has-validation">
                        <input autocomplete="off" type="text" name="type" class="form-control" placeholder="Trainer Type"
                            id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                        <div class="invalid-feedback">
                            Please write valid Trainer type.
                        </div>
                    </div>
                </div>

                <div class="col-md-7 mx-auto py-2">
                    <div class="pt-3">
                        <p>Salary Status</p>
                    </div>
                    <div class="input-group has-validation row">
                        <div class="form-check col-md-2 col sm-10 mx-auto">
                            <input class="form-check-input" type="radio" name="status" value="Paid" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Paid
                            </label>
                        </div>
                        <div class="form-check col-md-2 col-sm-10 mx-auto">
                            <input class="form-check-input" type="radio" name="status" value="Not Paid" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Not Paid
                            </label>
                        </div>
                    </div>
                </div>

                <div class="col-md-7 mx-auto py-2">
                    <div class="pt-3">
                        <p>Date of salary</p>
                    </div>
                    <div class="input-group has-validation">
                        <input type="date" name="date" class="form-control" id="validationCustomUsername"
                            aria-describedby="inputGroupPrepend" required>
                        <div class="invalid-feedback">
                            Please select Date.
                        </div>
                    </div>
                </div>

                <div class="col-12 mx-auto mt-3">
                    <p class="h5 my-1 text-center mx-auto">
                        <button type="submit" name="addTrain" class="btn btn-success">Add Trainer</button>
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