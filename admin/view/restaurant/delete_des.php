<?php
    require "connect.php";
    $delete_destination=$_GET['delete_destination'];
    $sql="DELETE FROM nhahang WHERE nhahang.`diachi` = '$delete_destination'";
    if ($conn->query($sql)){
        header('location: restaurant.php');
    }else {echo "fail" ;}
?>