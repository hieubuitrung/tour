<?php
    require "connect.php";
    $delete_reply=$_GET['delete_reply'];
    $sql="DELETE FROM khachsan_phanhoi WHERE khachsan_phanhoi.makhachhang = '$delete_reply'";
    if ($conn->query($sql)){
        header('location: hotel.php');
    }else {echo "fail" ;}
?>