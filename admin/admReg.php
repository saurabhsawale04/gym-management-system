<?php
    include '../connection.php';

    if(isset($_POST['addOwner']))
    {
        
        $gym = mysqli_real_escape_string($con, $_POST['gym']);
        $owner = mysqli_real_escape_string($con, $_POST['owner']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $mobile = mysqli_real_escape_string($con, $_POST['mobile']);
        $address = mysqli_real_escape_string($con, $_POST['address']);
        //$plan = mysqli_real_escape_string($con, $_POST['plan']);
        $startdate = mysqli_real_escape_string($con, $_POST['startdate']);
        $enddate = mysqli_real_escape_string($con, $_POST['enddate']);
        $status = mysqli_real_escape_string($con, $_POST['status']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);

        $passhash = password_hash($password, PASSWORD_BCRYPT);
       // $cpasshash = password_hash($cpassword, PASSWORD_BCRYPT); 

        $email_search = " select * from owners where email='$email' ";
        $query = mysqli_query($con, $email_search);
        $email_count = mysqli_num_rows($query);
        if($email_count>0)
        {
            ?>
            <script>
                alert('email already exist');
            </script>

            <?php
        }

        else
        {
            if($password === $cpassword)
            {
                $newStartDate = date("Y-m-d", strtotime($startdate));
                $newEndDate = date("Y-m-d", strtotime($enddate));

                $insertquery = " INSERT INTO `owners` (`gym`, `owner`, `email`, `mobile`, `address`, `plan`, `startdate`, `enddate`, `status`, `password`) VALUES ('$gym', '$owner', '$email', '$mobile', '$address', 'NA', '$newStartDate', '$newEndDate', '$status', '$passhash'); ";
                
                $iquery = mysqli_query($con, $insertquery);

                if($iquery)
                {
                    $plans = $email . '_plans';
                    $members = $email . '_mems';
                    $trainers = $email . '_trains';
                    $iplans = "CREATE TABLE `$plans`(
                        `id` INT(8)  PRIMARY KEY AUTO_INCREMENT, 
                        `title` VARCHAR(255) NOT NULL,
                        `money` VARCHAR(255) NOT NULL,
                        `time` VARCHAR(255) NOT NULL
                        )";

                    $qplans = mysqli_query($con, $iplans);

                    $imembers = "CREATE TABLE `$members`(
                        `id` INT(8)  PRIMARY KEY AUTO_INCREMENT, 
                        `name` VARCHAR(255) NOT NULL,
                        `mobile` VARCHAR(255) NOT NULL,
                        `address` TEXT NOT NULL,
                        `status` VARCHAR(255) NOT NULL,
                        `startdate` DATE NOT NULL,
                        `enddate` DATE NOT NULL
                        )";

                    $qmembers = mysqli_query($con, $imembers);

                    $itrainers = "CREATE TABLE `$trainers`(
                        `id` INT(8)  PRIMARY KEY AUTO_INCREMENT, 
                        `name` VARCHAR(255) NOT NULL,
                        `mobile` VARCHAR(255) NOT NULL,
                        `address` TEXT NOT NULL,
                        `type` VARCHAR(255) NOT NULL,
                        `status` VARCHAR(255) NOT NULL,
                        `date` DATE NOT NULL
                        
                        )";

                    $qtrainers = mysqli_query($con, $itrainers);

                    ?>
                    <script>
                        alert("Owner added Successfully");
                        location.replace('admOwners.php');
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

            else{
                ?>
                <script>
                        alert("Password and Confirm Password must be Same !");
                </script>
                <?php
            }
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
    <?php
        include 'admNav.php';
    ?>

    <!-- registration  -->
    <section class="container-fluid owner_reg">
        <div class="container mx-auto mt-2">
            <h1 class="text-center mb-3 form_h1">SSS Services</h1>
        </div>
        <div class="container mx-auto bg-success bg-opacity-10 mb-3 shadow">
            <div class="py-1">
                <h4 class="text-center my-3">Please fill Gym owner's information</h4>
            </div>
            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" class="row  needs-validation"
                novalidate>
                <div class="col-md-7 mx-auto py-2">
                    <div class="pt-3">
                        <p>Gym Name</p>
                    </div>
                    <div class="input-group has-validation">

                        <input autocomplete="off" type="text" name="gym" class="form-control" placeholder="Gym Name"
                            id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                        <div class="invalid-feedback">
                            Please write valid Gym Name.
                        </div>

                    </div>
                </div>

                <div class="col-md-7 mx-auto py-2">
                    <div class="pt-3">
                        <p>Owner Name</p>
                    </div>
                    <div class="input-group has-validation">

                        <input autocomplete="off" type="text" name="owner" class="form-control" placeholder="Owner Name"
                            id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                        <div class="invalid-feedback">
                            Please write valid owner name.
                        </div>

                    </div>
                </div>

                <div class="col-md-7 mx-auto py-2">
                    <div class="pt-3">
                        <p>Email</p>
                    </div>
                    <div class="input-group has-validation">
                        <input type="email" autocomplete="off" name="email" class="form-control"
                            id="validationCustomUsername" placeholder="Email" aria-describedby="inputGroupPrepend"
                            required>
                        <div class="invalid-feedback">
                            Please write valid Email.
                        </div>
                    </div>
                </div>

                <div class="col-md-7 mx-auto py-2">
                    <div class="pt-3">
                        <p>Mobile</p>
                    </div>
                    <div class="input-group has-validation">
                        <input type="text" autocomplete="off" name="mobile" class="form-control"
                            id="validationCustomUsername" placeholder="Mobile no." aria-describedby="inputGroupPrepend"
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
                            placeholder="Address" aria-describedby="inputGroupPrepend" required cols="30" rows="5"
                            autocomplete="off"></textarea>
                        <div class="invalid-feedback">
                            Please write valid address.
                        </div>
                    </div>
                </div>

                <div class="col-md-7 mx-auto py-2">
                    <div class="pt-3">
                        <p>Start Date</p>
                    </div>
                    <div class="input-group has-validation">
                        <input type="date" name="startdate" class="form-control" id="validationCustomUsername"
                            aria-describedby="inputGroupPrepend" required>
                        <div class="invalid-feedback">
                            Please select date.
                        </div>
                    </div>
                </div>

                <div class="col-md-7 mx-auto py-2">
                    <div class="pt-3">
                        <p>End Date</p>
                    </div>
                    <div class="input-group has-validation">
                        <input type="date" name="enddate" class="form-control" id="validationCustomUsername"
                            aria-describedby="inputGroupPrepend" required>
                        <div class="invalid-feedback">
                            Please select date.
                        </div>
                    </div>
                </div>

                <div class="col-md-7 mx-auto py-2">
                    <div class="pt-3">
                        <p>Status</p>
                    </div>
                    <div class="input-group has-validation row">
                        <div class="form-check col-md-2 col sm-10 mx-auto">
                            <input class="form-check-input" type="radio" name="status" value="Paid"
                                id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Paid
                            </label>
                        </div>
                        <div class="form-check col-md-2 col-sm-10 mx-auto">
                            <input class="form-check-input" type="radio" name="status" value="Not Paid"
                                id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Not Paid
                            </label>
                        </div>
                    </div>
                </div>



                <div class="col-md-7 mx-auto py-2">
                    <div class="pt-3">
                        <p>Password</p>
                    </div>
                    <div class="input-group has-validation">
                        <input type="password" name="password" class="form-control" id="validationCustomUsername"
                            placeholder="Password" aria-describedby="inputGroupPrepend" required>
                        <div class="invalid-feedback">
                            Please write valid password.
                        </div>
                    </div>
                </div>

                <div class="col-md-7 mx-auto py-2">
                    <div class="pt-3">
                        <p>Confirm Password</p>
                    </div>
                    <div class="input-group has-validation">
                        <input type="password" name="cpassword" class="form-control" id="validationCustomUsername"
                            placeholder="Confirm Password" aria-describedby="inputGroupPrepend" required>
                        <div class="invalid-feedback">
                            Please write valid password.
                        </div>
                    </div>
                </div>

                <div class="col-12 mx-auto mt-3">
                    <p class="h5 my-1 text-center mx-auto">
                        <button type="submit" name="addOwner" class="btn btn-success">Add Gym Owner</button>
                        <hr class="w-50 mx-auto" />
                    </p>
                </div>

            </form>
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