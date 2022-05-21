<?php
    $severname = "localhost";
    $username = "root";
    $password = "";
    $db ="test";
    $conn = new mysqli($severname, $username, $password, $db);
    if($conn->connect_error){
        die("Connection failed: ". $conn->connect_error);
    }
    echo"";
?>