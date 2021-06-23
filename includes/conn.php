<?php
    $serverName = "163.44.198.39";
    $userName = "cp896519_admin2";
    $userPassword = "#asd0960404810";
    $dbName = "cp896519_kohphaluay";

    $conn = mysqli_connect($serverName,$userName,$userPassword,$dbName) or die("Error: " . mysqli_error($con));
    mysqli_query($conn, "SET NAMES 'utf8' "); 
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>