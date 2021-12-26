<?php
    include '../connection.php';
    session_start();

    if(!isset($_SESSION['username']))
    {
        header('location:../admin.php');
    }

    
   // $tableName = 'owners';
    $email = $_GET['email'];
    $deletequery = " DELETE FROM `owners` WHERE `email`='$email' ";
    $query = mysqli_query($con, $deletequery);

    if(!$query)
    {
        ?>
        <script>alert('not deleted');</script>
        <?php
    }


    
    $plan = $email . "_plans";
    $mem = $email . "_mems";
    $train = $email . "_trains";

    $planq = "DROP TABLE `$plan` " ;
    $query1 = mysqli_query($con, $planq);

    $memq = "DROP TABLE `$mem` ";
    $query2 = mysqli_query($con, $memq);

    $trainq = "DROP TABLE `$train` ";
    $query3 = mysqli_query($con, $trainq);



    header('location:admOwners.php');

?>