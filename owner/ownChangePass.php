<?php
    
    session_start();

    if(!isset($_SESSION['email']))
    {
        header('location:../login.php');
    }


    include '../connection.php';
    
    $tablename = 'owners';
    
    $email = $_SESSION['email'];
    $email = $_SESSION['email'];
    $emailSearch = " select * from owners where email = '$email' ";
    $query = mysqli_query($con, $emailSearch);
    $emailPass = mysqli_fetch_assoc($query);
    $dbgym = $emailPass['gym'];

    
    //$tablename = "plans";

    if(isset($_POST['changePass']))
    {
        
        $oldPass = mysqli_real_escape_string($con, $_POST['oldPass']);
        $newPass = mysqli_real_escape_string($con, $_POST['newPass']);
        $newCPass = mysqli_real_escape_string($con, $_POST['newCPass']);
        $newPassHash = password_hash($newPass, PASSWORD_BCRYPT);

        $emailSearch = " select * from owners where email = '$email' ";
        $query = mysqli_query($con, $emailSearch);
        $emailPass = mysqli_fetch_assoc($query);
        $dbPass = $emailPass['password'];

        $passDecode = password_verify($oldPass, $dbPass);
        if($passDecode)
        {

            if($newCPass === $newPass)
            {
                $updatequery = " UPDATE `$tablename` SET `password`='$newPassHash' WHERE `email`='$email';"; 
                
                $iquery = mysqli_query($con, $updatequery);

                if($iquery)
                {


                    ?>
                    <script>
                        alert("Password changed successfully");
                        location.replace('ownWel.php');
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
                    printf("Error: %s\n", mysqli_error($con));
                    exit();
                }

            }

            else{
                ?>
                <script>
                    alert("new password and confirm new password didn't match");
                </script>
    
                <?php
            }

            
        }

        else{
            // echo "Password Incorrect";
            ?>
            <script>
                alert('Old Password Incorrect');
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
                <h4 class="text-center my-3">Please fill following information</h4>
            </div>
            <form action="" method="post" class="row  needs-validation"
                novalidate>

                <div class="col-md-7 mx-auto py-2">
                    <div class="pt-3">
                        <p>Previous Password</p>
                    </div>
                    <div class="input-group has-validation">
                        <input type="password" name="oldPass" class="form-control" id="validationCustomUsername"
                            placeholder="Previous Password" aria-describedby="inputGroupPrepend" required>
                        <div class="invalid-feedback">
                            Please write valid  previous password.
                        </div>
                    </div>
                </div>

                <div class="col-md-7 mx-auto py-2">
                    <div class="pt-3">
                        <p>New Password</p>
                    </div>
                    <div class="input-group has-validation">
                        <input type="password" name="newPass" class="form-control" id="validationCustomUsername"
                            placeholder="New Password" aria-describedby="inputGroupPrepend" required>
                        <div class="invalid-feedback">
                            Please write valid new password.
                        </div>
                    </div>
                </div>

                <div class="col-md-7 mx-auto py-2">
                    <div class="pt-3">
                        <p>Confirm New Password</p>
                    </div>
                    <div class="input-group has-validation">
                        <input type="password" name="newCPass" class="form-control" id="validationCustomUsername"
                            placeholder="Confirm New Password" aria-describedby="inputGroupPrepend" required>
                        <div class="invalid-feedback">
                            Please write valid Confirm New password.
                        </div>
                    </div>
                </div>

                <div class="col-12 mx-auto mt-3">
                    <p class="h5 my-1 text-center mx-auto">
                        <button type="submit" name="changePass" class="btn btn-success">Change Password</button>
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