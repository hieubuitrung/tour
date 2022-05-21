<?php
    require "connect.php";
    $makhachsan=$_GET['MaKhachSan'];
    $sql="DELETE FROM khachsan WHERE khachsan.`MaKhachSan` = $makhachsan";
    if ($conn->query($sql)){
        header('location: hotel.php');
    }else {echo "fail" ;}
?>