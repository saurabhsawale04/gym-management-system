<?php
    include '../connection.php';
    session_start();

    if(!isset($_SESSION['email']))
    {
        header('location:../login.php');
    }

    $id = $_GET['id'];
    $tableName = $_SESSION['email'] . '_trains';

    $deletequery = " delete from `$tableName` where id=$id ";
    $query = mysqli_query($con, $deletequery);


    header('location:ownTrainers.php');

?>