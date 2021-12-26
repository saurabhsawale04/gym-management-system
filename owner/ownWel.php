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

    <img src="../images/p7.jpg" alt="img" class="img1">
    <div class="container">
        <p class="text-center mx-auto main_head">Welcome <?php echo $dbgym ;?> </p>
        <p class="text-center mx-auto main_p">Please select option from navbar</p>
    </div>


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