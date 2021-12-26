<?php
    include '../connection.php';
    session_start();

    if(!isset($_SESSION['username']))
    {
        header('location:../admin.php');
    }

    $id = $_GET['id'];
    $tableName = 'plans';

    $deletequery = " delete from `$tableName` where id=$id ";
    $query = mysqli_query($con, $deletequery);


    header('location:admPlans.php');

?>