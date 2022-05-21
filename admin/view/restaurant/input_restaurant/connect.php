<?php
    $servername= "localhost";
    $username="root";
    $password="";
    $db="quanlydulich";
    $conn= new mysqli($servername, $username, $password, $db);
    if($conn->connect_error){
        die("Connection failed: ".$conn->connect_error);
    }  
    echo "Connection successfully <br>";
    mysqli_set_charset($conn, 'UTF8');
?>