<?php
    session_start();
?>

<?php

    include 'connection.php';

    if(isset($_POST['login']))
    {
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);

        $emailSearch = " select * from owners where email = '$email' ";
        $query = mysqli_query($con, $emailSearch);

        $emailCount = mysqli_num_rows($query);

        if($emailCount>0)
        {
            $emailPass = mysqli_fetch_assoc($query);
            $dbPass = $emailPass['password'];

            $passDecode = password_verify($password, $dbPass);
            if($passDecode)
            {
                // echo "Login succesful";
                $_SESSION['email'] = $email;
                $res = mysqli_fetch_array($query);
                //$_SESSION['gym'] = $email;
                ?>
                <script>
                    alert('login succesfull');
                    location.replace('owner/ownWel.php');
                </script>

                <?php
            }

            else{
                // echo "Password Incorrect";
                ?>
                <script>
                    alert('Password Incorrect');
                </script>

                <?php
            }
        }

        else{
            ?>
            <script>
                // let temp = document.getElementById('email');
                // temp.innerHTML = "Email Incorrect";
                alert("Email Incorrect");
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
        include 'navbar.php'
    ?>

    <section class="container-fluid">
        <div class="container mx-auto mt-5">
            <h1 class="text-center mb-3 form_h1">SSS Services</h1>
        </div>
        <div class="container mx-auto bg-success bg-opacity-10 mb-3 shadow">
            <div class="py-1">
                <h4 class="text-center my-3">Login to SSS Services</h4>
            </div>
            <form action="" method="post" class="row g-3 needs-validation" novalidate>
                <div class="col-md-7 mx-auto py-2">
                    <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend"><i
                                class="fa fa-duotone fa-user" style="font-size: 1.5rem;"></i></span>
                        <input type="text" class="form-control" placeholder="Email" id="validationCustomUsername"
                            aria-describedby="inputGroupPrepend" name="email" required>
                        <div class="invalid-feedback">
                            Please write email.
                        </div>
                    </div>
                </div>

                <div class="col-md-7 mx-auto py-2">
                    <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend"><i
                                class="fa fa-duotone fa-lock" style="font-size: 1.5rem;"></i></span>
                        <input type="password" name="password" class="form-control" id="validationCustomUsername" placeholder="Password"
                            aria-describedby="inputGroupPrepend" required>
                        <div class="invalid-feedback">
                            Please write password.
                        </div>
                    </div>
                </div>

                <div class="col-12 mx-auto">
                    <p class="h5 my-1 text-center mx-auto">
                        <button type="submit" name="login" class="btn btn-success">Login here</button>
                        <hr class="w-50 mx-auto" />
                    </p>
                </div>

                <div class="col-sm-12 col-lg-12">
                    <p class="mb-4 text-center mx-auto p_form"><a href="contact.php">forgotten password ?</a></p>
                </div>

                <div class="col-sm-12 col-lg-12">
                    <p class="mb-4 text-center mx-auto p_form"><a href="contact.php" class=" text-end">Don't have subscription ?</a></p>
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