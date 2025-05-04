<?php

    $host = "localhost";
    $dbname = "Bookstore";
    $user = "root";
    $pass = "";
    
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // just for checking
    // if($conn){ 
    //     echo "worked successfully";
    // } else{
    //     echo "error in db connection";
    // }