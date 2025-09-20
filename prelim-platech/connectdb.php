<?php 

    $connectionToDatabase = mysqli_connect("localhost", "root", "", "marathon");

    if(!$connectionToDatabase){
        die ("connection failed" . mysqli_connect_error());
    }


?>