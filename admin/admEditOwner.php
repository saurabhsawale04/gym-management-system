<?php
    include '../connection.php';

    $email = $_GET['email'];
    
    $tablename = "owners";

    $showq = " SELECT * FROM `owners` WHERE `email` = '$email' ";
    $showdata = mysqli_query($con, $showq);
    if (!$showdata) {
        printf("Error: %s\n", mysqli_error($con));
        exit();
    }
    $arrdata = mysqli_fetch_array($showdata);


    if(isset($_POST['editOwner']))
    {
        
        $gym = mysqli_real_escape_string($con, $_POST['gym']);
        $owner = mysqli_real_escape_string($con, $_POST['owner']);
       // $email = mysqli_real_escape_string($con, $_POST['email']);
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

        


            if($password === $cpassword)
            {
                $newStartDate = date("Y-m-d", strtotime($startdate));
                $newEndDate = date("Y-m-d", strtotime($enddate));

                $updatequery = " UPDATE `$tablename` SET `gym`='$gym', `owner`='$owner',`email`='$email',`mobile`='$mobile',`address`='$address',`startdate`='$newStartDate',`enddate`='$newEndDate',`status`='$status',`password`='$passhash' WHERE `email`='$email';"; 
                
        $iquery = mysqli_query($con, $updatequery);


                if($iquery)
                {
                    

                    ?>
                    <script>
                        alert("Owner Updated Successfully");
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
                <h5 class="text-center my-3" style="color:red;">note : you can't update Email !</h>
            </div>
            <form action="" method="post" class="row  needs-validation"
                novalidate>
                <div class="col-md-7 mx-auto py-2">
                    <div class="pt-3">
                        <p>Gym Name</p>
                    </div>
                    <div class="input-group has-validation">

                        <input autocomplete="off" type="text" name="gym" value="<?php echo $arrdata['gym']; ?>" class="form-control" placeholder="Gym Name"
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

                        <input autocomplete="off" type="text" name="owner" value="<?php echo $arrdata['owner']; ?>" class="form-control" placeholder="Owner Name"
                            id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                        <div class="invalid-feedback">
                            Please write valid owner name.
                        </div>

                    </div>
                </div>

                <div class="col-md-7 mx-auto py-2">
                    <div class="pt-3">
                        <p>Mobile</p>
                    </div>
                    <div class="input-group has-validation">
                        <input type="text" autocomplete="off" name="mobile" value="<?php echo $arrdata['mobile']; ?>" class="form-control"
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
                        <textarea name="address" class="form-control" value="<?php echo $arrdata['address']; ?>" id="validationCustomUsername"
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
                        <input type="date" name="startdate" value="<?php echo $arrdata['startdate']; ?>" class="form-control" id="validationCustomUsername"
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
                        <input type="date" name="enddate" value="<?php echo $arrdata['enddate']; ?>" class="form-control" id="validationCustomUsername"
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
                    <?php
                        if($arrdata['status'] == "Not Paid")
                        {?>
                        <div class="form-check col-md-2 col sm-10 mx-auto">
                            <input class="form-check-input" type="radio" name="status"  value="Paid" id="flexRadioDefault1">
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
                        <?php
                        }
                        else{
                            ?>
                                                   <div class="form-check col-md-2 col sm-10 mx-auto">
                            <input class="form-check-input" type="radio" name="status"  value="Paid" id="flexRadioDefault1"  checked>
                            <label class="form-check-label" for="flexRadioDefault1">
                                Paid
                            </label>
                        </div>
                        <div class="form-check col-md-2 col-sm-10 mx-auto">
                            <input class="form-check-input" type="radio" name="status" value="Not Paid" id="flexRadioDefault2">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Not Paid
                            </label>
                        </div>
                        <?php
                        }
                        ?>
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
                        <input type="password" name="cpassword"  class="form-control" id="validationCustomUsername"
                            placeholder="Confirm Password" aria-describedby="inputGroupPrepend" required>
                        <div class="invalid-feedback">
                            Please write valid password.
                        </div>
                    </div>
                </div>

                <div class="col-12 mx-auto mt-3">
                    <p class="h5 my-1 text-center mx-auto">
                        <button type="submit" name="editOwner" class="btn btn-success">Update Gym Owner</button>
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