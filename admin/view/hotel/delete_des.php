<?php
    require "connect.php";
    $delete_destination=$_GET['delete_destination'];
    $sql="DELETE FROM khachsan WHERE khachsan.`diachi` = '$delete_destination'";
    if ($conn->query($sql)){
        header('location: hotel.php');
    }else {echo "fail" ;}
?>