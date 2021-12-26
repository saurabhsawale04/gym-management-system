<?php

    session_start();

?>

<?php

    include 'connection.php';

    if(isset($_POST['submit']))
    {
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
    

        $pass = 'Saurabh@2000';
        $em = 'saurabhsawale04@gmail.com';

        $_SESSION['username'] = 'Saurabh';

        if($email == $em)
        {
            if($password == $pass)
            {
                // echo "Login succesful";
                ?>
                <script>
                    alert('login succesfull');
                    location.replace('admin/admWel.php');
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
                <h4 class="text-center my-3">Login to Admin page</h4>
            </div>
            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" class="row g-3 needs-validation" novalidate>
                <div class="col-md-7 mx-auto py-2">
                    <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend"><i
                                class="fa fa-duotone fa-user" style="font-size: 1.5rem;"></i></span>
                        <input type="text" name="email" class="form-control" placeholder="Email" id="validationCustomUsername"
                            aria-describedby="inputGroupPrepend" required>
                        <div class="invalid-feedback">
                            Please write valid email.
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
                            Please write valid password.
                        </div>
                    </div>
                </div>

                <div class="col-12 mx-auto">
                    <p class="h5 my-1 text-center mx-auto">
                        <button type="submit" name="submit" class="btn btn-success">Login here</button>
                        <hr class="w-50 mx-auto" />
                    </p>
                </div>

                <div class="col-12">
                    <p class="mb-4 text-center mx-auto p_form"><a href="index.php">Not an admin ?</a></p>
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