<?php
    $con = mysqli_connect("localhost","root","","toko_online");

    // Check connection
    // if ($mysqli) {
    //     echo "connected";
    // }
    // else {
    //     echo "not connected";
    // }
    if ($con -> connect_errno) {
        echo "Failed to connect to MySQL: " . $con -> connect_error;
        exit();
    }
?>