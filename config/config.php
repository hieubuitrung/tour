<?php
    $server = "localhost"; //server của database
    $username = "root"; 
    $password = "";
    $db = "quanlydulich"; // tên database

    $conn = new mysqli($server, $username, $password, $db);
    if ($conn->connect_error) {
        die ("Connect failed". $conn->connect_error);
    }
?>