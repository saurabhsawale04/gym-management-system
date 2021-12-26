<?php

    $server = "localhost";
    $username = "root";
    $password = "";
    $db = "gms";  //database name

    $con = mysqli_connect($server, $username, $password, $db);

    if(!$con)
    {
        die('connection failed due to ' . mysqli_connect_error());
    }


?>
