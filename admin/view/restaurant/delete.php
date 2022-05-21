<?php
    require "connect.php";
    $manhahang=$_GET['MaNhaHang'];
    $sql="DELETE FROM nhahang WHERE nhahang.`MaNhaHang` = $manhahang";
    if ($conn->query($sql)){
        header('location: restaurant.php');
    }else {echo "fail" ;}
?>